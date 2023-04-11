<?php

    require_once 'vendor/autoload.php';
    use Firebase\JWT\JWT;

    // autoload
    define( "APP_PATH", dirname(__FILE__) ."" );
    spl_autoload_register(function ($file) {
        if( file_exists(APP_PATH."/lib/$file.php") ) {
            require_once APP_PATH."/lib/$file.php";
        }
    });

    $app = new Application();

?>