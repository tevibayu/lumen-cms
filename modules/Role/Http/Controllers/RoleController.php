<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\ACL\RoleResource;
use App\Models\User;
use DB;

class RoleController extends Controller
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
    public function index()
    {
        $limit = config('access.users.default_per_page');
        return response()->json([
            'messages' => [],
            'result' => Role::paginate($limit)
        ]);
    }

    /**
     * Display all of the resource.
     * @return Response
     */
    public function all()
    {
        return response()->json([
                'message' => [],
                'result' => Role::all(),
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
            'permissions' => 'required',
        ]);

        $data = [
          'name' => $request->name,
        ];
        DB::beginTransaction();
        $role = Role::create($data);
        if ($role) {
          $permissions = explode(',', $request->permissions);
          $role->syncPermissions($permissions);

          $users = explode(',', $request->users);
          if (count($users) > 0) {
            $users = User::whereIn('id', $users)->get();
            foreach($users as $user) {
              $user->assignRole(explode(',', $role->name));
            }
          }

          DB::commit();
          return response()->json([
            'message' => 'Role has been created successfully',
            'role' => new RoleResource($role),
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
        $role = Role::findOrFail($id);
        return response()->json([
                'message' => [],
                'result' => new RoleResource($role),
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
            'permissions' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->name;

        DB::beginTransaction();
        if ($role->save()) {

            $permissions = explode(',', $request->permissions);
            $role->syncPermissions($permissions);

            $users = explode(',', $request->users);
            // if role is superadmin force assign to Administrator
            if ($id == 1 && !in_array(1, $users)) { // role:admin
              $users[] = 1;
            }
            if (count($users) > 0) {
                $users = User::whereIn('id', $users)->get();
                foreach($users as $user) {
                  $user->assignRole($role->name);
                }
            }

            DB::commit();
            return response()->json([
              'message' => 'Role has been updated successfully',
              'role' => new RoleResource($role),
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
            return $this->response->errorInternal('You cant delete superadmin');
        }

        DB::beginTransaction();
        $role = Role::findById($id);

        // remove role from user
        $users = User::whereHas('roles', function($q) use ($id) { $q->where("id", $id); })->get();
        foreach($users as $user) {
          $user->removeRole($role);
        }

        // remove role from permission
        $role->syncPermissions([]);

        if ($role->delete()) {
            DB::commit();
            return response()->json([
                'message' => 'Role has been deleted successfully',
            ]);
        }
        DB::rollBack();
        return response()->errorInternal();
    }
}
