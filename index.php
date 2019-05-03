<?php

    namespace Api;
    use Api\Lib\Autoload;
    use Api\Lib\Rest;

    ini_set('display_errors','on');
    define('DS',DIRECTORY_SEPARATOR);
    define('ROOT',realpath(dirname(__FILE__)).DS);
    define('LIB',ROOT.'lib'.DS);

    require_once __DIR__.'lib/Autoload.php';

    $loader=new Autoload();
    $loader->addNamespace('Api\Lib','Lib');
    $loader->addNamespace('Api\Lib\Controllers','controllers');

    $app=new Rest();