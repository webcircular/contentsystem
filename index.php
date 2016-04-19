<?php
session_start();
    define('CONTROLLERS', 'application/controllers/');
    define('VIEWS', 'application/views/');
    define('MODELS', 'application/models/');
    define('HELPERS', 'system/helpers/');


    require_once 'system/error.php';
    require_once ('system/system.php');
    require_once ('system/controller.php');
    require_once ('system/model.php');
    require_once 'application/config/config.php';
    

    function __autoload($file){
		//var_dump($file);
        if (file_exists(MODELS.$file.'.php')):
             require_once(MODELS.$file.'.php');
        else:
                die('Model ou Helper nao encontrado');
        endif;
    }

    $start = new System();
    $start->run();