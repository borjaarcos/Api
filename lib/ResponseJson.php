<?php
/**
 * Created by PhpStorm.
 * User: linux
 * Date: 27/02/19
 * Time: 18:45
 */

namespace Api\Lib;


class ResponseJson
{
    protected $data;
    public function __construct($data){
        $this->data=$data;
        return $this;
    }
    public function render(){
        header('Content-Type:application/json');
        return json_encode($this->data);
    }
}