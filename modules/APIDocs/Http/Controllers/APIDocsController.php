<?php

namespace Modules\APIDocs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Nwidart\Modules\Module;

class APIDocsController extends Controller
{

    protected $jwt_auth;

    public function __construct()
    {

        // $this->middleware('auth:api', ['except' => []]);

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('apidocs::index')
        ->withJson(url('/api/documentation/json'));
        
    }

    /**
     * Display a listing of the JSON.
     * @return Response
     */
    public function json()
    {

        $modules = glob('../modules/APIDocs/Modules/*');
        $files = [];

        $layouts = include base_path('modules/APIDocs/Resources/views/includes/layouts.php');
        $layouts = json_decode(json_encode($layouts), true);


        if (count($modules)) {
            foreach ($modules as $module) {
                $module_name = last(explode('/', $module));

                $my_filename = base_path('modules/APIDocs/Modules/'.$module_name);

                if (file_exists($my_filename)) {
                    $docs = include $my_filename;

                    $files = array_merge($files, $docs);
                }
                
                
            }

            $layouts['paths'] = $files;

        }

        return json_encode($layouts);

        // $jsonString = file_get_contents(base_path('modules/APIDocs/Resources/views/includes/io.json'));
        // return $jsonString;

        
    }


 
}
