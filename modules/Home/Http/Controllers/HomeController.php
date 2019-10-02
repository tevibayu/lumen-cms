<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use DB;
use Storage;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $jwt_auth; 

    public function __construct()
    {
        parent::__construct();
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        // test email
        
        // $emails[] = 'ddwijaya3@gmail.com';
        // $data = array(
        //     'app' => config('mail.from.name')
        // );
        
        // Mail::send('emails.test', $data, function($message) use ($emails)
        // {
        //     $message->to($emails)->subject('Test Email '.date('d-m-Y H:i:s').'');
        // });
        // die('success');

        // $contents = Storage::get('text.txt');

        // return $contents;
  
        $success = 1;
        if($success){
            $code_ = 200;
            $status_ = 'ok';
        } else {
            $code_ = 204;
            $status_ = 'no content';
        }

        $response = [
            'status' => $status_,
            'code' => $code_,
            'messages' => [],
            'result' => 'home'
        ];

        return response()->json($response, $code_);

    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('home::create');
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
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('home::edit');
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

    public function test(Request $request)
    {
        return 'yeah';
    }
}
