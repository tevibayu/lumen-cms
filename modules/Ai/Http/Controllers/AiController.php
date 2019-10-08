<?php

namespace Modules\Ai\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class AiController extends Controller
{

    protected $jwt_auth;

    public function __construct()
    {
        parent::__construct();
        // Using non Auth
        $this->middleware('auth:api', ['except' => []]);
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $success = 1;
        if($success){

            $response = [
                'messages' => [],
                'result' => 'ai Successful.'
            ];

            return response()->json($response);
        }

        
        return response()->errorInternal(); // 500
        
        // response()->errorBadRequest(); // 400
        // response()->errorForbidden(); // 403
        // response()->errorNotFound(); // 404
        // response()->errorNotFound(); // 404
        // response()->error(MESSAGE, ERROR_CODE); // Custom
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        $success = 1;
        if($success){

            $response = [
                'messages' => [],
                'result' => 'ai Successful.'
            ];

            return response()->json($response);
        }

        
        return response()->errorInternal(); // 500
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
