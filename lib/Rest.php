<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/02/19
 * Time: 17:21
 */

namespace Api\Lib;

use Api\Lib\Request;
use Api\Lib\Response;


class Rest
{
    function __construct(){
        $request=new Request();
        if(isset($_SERVER['PATH_INFO'])){
            $request->url_elements=explode('/',trim($_SERVER['PATH_INFO']), '/');
        }
        $request->method=strtoupper($_SERVER['REQUEST_METHOD']);
        switch ($request->method){
            case 'GET':
                $request->parameters=$_GET;
                break;
            case 'POST':
                $request->parameters=$_POST;
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'),$request->parameters);
                break;
            case 'DELETE':
                parse_str(file_get_contents('php://input'),$request->parameters);
                break;
        }
        // enroutamiento
        if(!empty($request->url_elements)){
            $controller_name=$request->url_elements[0];
            $file=LIB.DS.'controllers'.DS.$controller_name.'.php';
            if(is_readable($file)){
                $path_controller='\Api\Lib\Controllers\\'.$controller_name;
                $controller=new $path_controller;
                $action_name=$request->method;
                $response_str= call_user_func_array(array($controller,$action_name),array($request));

            }
            else{
                header('HTTP/1.1 404 Not found');
                $response_str='Unknow request: '.$request->url_elements[0];
            }

        }else{
            $response_str='Unknown request';
        }
        //enviar respuesta
        $rest=Response::create($response_str,$_SERVER['HTTP_ACCEPT']);
        echo $resp->render();
    }

}