<?php
    require __DIR__ . "/inc/bootstrap.php";
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = explode( '/', $url );

    if ( ( isset($url[2]) && $url[2] != 'category') || !isset($url[3])) {
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    require PATH . "/controller/CategoryController.php";

    $objFeedController = new CategoryController();
    $strMethodName = $url[3] . 'Action';
    $objFeedController->{$strMethodName}();
?>