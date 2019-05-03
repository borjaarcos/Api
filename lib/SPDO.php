<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/02/19
 * Time: 19:13
 */

namespace Api\Lib;


class SPDO extends \PDO
{
    static $instance;

    public function __construct()
    {
        $dsn='mysql:dbname=app;host=127.0.0.1';
        $usr='app';
        $pwd='app';
        try{
            parent::__construct($dsn, $usr, $pwd);
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }


    static function singleton(){
        if(!(self::$instance) instanceof self){
            self::$instance=new self();
        }
        return self::$instance;
    }
}