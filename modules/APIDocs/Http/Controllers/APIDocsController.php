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
        $list_menu = $this->json(TRUE);

        // die(print_r($list_menu));

        return view('apidocs::index')
        ->withMenu($list_menu)
        ->withJson(url('/api/documentation/json'));
        
    }

    /**
     * Display a listing of the JSON.
     * @return Response
     */
    public function json($get_menu = FALSE)
    {

        $modules = glob('../modules/APIDocs/Modules/*');
        $files = [];

        $layouts = include base_path('modules/APIDocs/Resources/views/includes/layouts.php');
        $layouts = json_decode(json_encode($layouts), true);

        $menu = [];
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

            if($get_menu){
                foreach ($files as $key => $value) {
                    if(isset($value['post'])){
                        $tags = $value['post']['tags'][0];
     
                        $menu[$tags][] = [
                            'name' => $value['post']['summary'],
                            'url' => $value['post']['tags'][0].'/'.$value['post']['operationId']
                        ];
                    }

                    if(isset($value['get'])){
                        $tags = $value['get']['tags'][0];
                        
                        $menu[$tags][] = [
                            'name' => $value['get']['summary'],
                            'url' => $value['get']['tags'][0].'/'.$value['get']['operationId']
                        ];
                    }

                    if(isset($value['put'])){
                        $tags = $value['put']['tags'][0];
      
                        $menu[$tags][] = [
                            'name' => $value['put']['summary'],
                            'url' => $value['put']['tags'][0].'/'.$value['put']['operationId']
                        ];
                    }

                    if(isset($value['patch'])){
                        $tags = $value['patch']['tags'][0];
                       
                        $menu[$tags][] = [
                            'name' => $value['patch']['summary'],
                            'url' => $value['patch']['tags'][0].'/'.$value['patch']['operationId']
                        ];
                    }

                    if(isset($value['delete'])){
                        $tags = $value['delete']['tags'][0];
                     
                        $menu[$tags][] = [
                            'name' => $value['delete']['summary'],
                            'url' => $value['delete']['tags'][0].'/'.$value['delete']['operationId']
                        ];
                    }
                    
                }

                return $menu;
            }
            

        }

        return json_encode($layouts);

        // $jsonString = file_get_contents(base_path('modules/APIDocs/Resources/views/includes/io.json'));
        // return $jsonString;

        
    }


 
}
