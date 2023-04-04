<?php
class Application {
    private Request $req;
    private Response $res;

    public function __construct($routes = [], $nav = [])
    {
    }

    public function run()
    {
        header ('Content-Type: text/html; charset=utf-8');
    }
}
?>