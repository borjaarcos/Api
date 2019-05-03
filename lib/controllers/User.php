<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/02/19
 * Time: 19:02
 */

namespace Api\Lib\Controllers;

use Api\Lib\SPDO;

class User
{
    protected  $gdb;

    function __construct(){
        $this->gdb=SPDO::singleton();
    }
    function get(){
        if($_REQUEST['REQUEST_METHOD']!='GET'){
            return ['error'=>'Request not valid'];
        }
        //select * from users
        else{
            $sql="SELECT * FROM users";
            $stmt=$this->gdb->prepare($sql);
            $stmt->execute();
            $rows=$stmt->fetchAll();
            return $rows;
        }
    }
    function post(){

    }
    function put(){

    }
    function delete(){

    }
}