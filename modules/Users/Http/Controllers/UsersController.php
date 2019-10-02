<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{

    protected $jwt_auth;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = config('access.users.default_per_page');
        if ($request->input('limit') != null) {
            $limit = (Int) $request->input('limit');
        }
        if ($request->input('page') != null) {
            $users = User::paginate($limit);
        } else {
            $users = User::limit($limit)->get();
        }


        foreach($users as $key => $user) {
            $users[$key]->permissions = $user->getDirectPermissions();
            $users[$key]->roles = $user->getRoleNames();
        }

        return response()->json([
            'messages' => [],
            'result' => $users
        ]);
    }

    /**
     * Display all of the resource.
     * @return Response
     */
    public function all(Request $request)
    {
        return response()->json([
                'message' => [],
                'result' => User::all(),
            ]);
    }

    
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Crypt::encrypt($request->password);


        DB::beginTransaction();
        if ($user->save()) {
            if ($request->permission != '') {
                $user->permission = $user->givePermissionTo(explode(',', $request->permission));
            }
            $user->role = $user->assignRole(explode(',', $request->role));

            DB::commit();
            return response()->json([
                'message' => 'User has been created successfully',
                'user' => new UserResource($user),
            ]);
        }

        DB::rollBack();
        return response()->errorInternal();
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

        $user = User::findOrFail($id);
        return response()->json([
                'message' => [],
                'result' => new UserResource($user),
            ]);
    }

    
    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username,'.$id.'|max:100',
            'email' => 'required|unique:users,email,'.$id,
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->password !== '') {
            $user->password = Crypt::encrypt($request->password);
        }

        DB::beginTransaction();
        if ($user->save()) {
            // update direct permission
            if ($request->permission != '') {
                $user->syncPermissions(explode(',', $request->permission));
            } else {
                $user->syncPermissions([]);
            }

            // update role
            // push superadmin if user id = 1;
            $roles = explode(',', $request->role);
            if ($id == 1 && !in_array('superadmin', $roles)) {
                $roles[] = 'superadmin';
            }
            $user->syncRoles($roles);

            DB::commit();
            return response()->json([
                'message' => 'User has been updated successfully',
                'user' => new UserResource($user),
            ]);
        }

        DB::rollBack();
        return response()->errorInternal();

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return response()->errorInternal('You cant delete superadmin');
        }
        if ($id == $this->getAuthUser()->id) {
            return response()->errorInternal('You cant delete current user');
        }
        DB::beginTransaction();
        $user = User::findOrFail($id);
        $user->syncPermissions([]);
        $user->syncRoles([]);
        if ($user->delete()) {
            DB::commit();
            return response()->json([
                'message' => 'User has been deleted successfully',
            ]);
        }
        DB::rollBack();
        return response()->errorInternal();
    }
}
