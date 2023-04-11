<?php

class Controller {
    protected Request $req;
    protected Response $res;
    private array $controllerPath;
    private array $routes = [];
    public function __construct($req, $res, $controllerPath, $routes)
    {
        $this->req = $req;
        $this->res = $res;
        $this->controllerPath = $controllerPath;
        $this->routes = $routes;
    }

    public function load()
    {
        // var_dump($this->routes);
        // var_dump($this->controllerPath);
        // die();
        $method = strtoupper($this->req->getMethod());
        $params = $this->req->getParams();


        if( is_array($this->controllerPath) && count($this->controllerPath) > 1 )
        {
            if( isset( $this->routes[$this->controllerPath[1]][$method] ) ) {
                $this->routes[$this->controllerPath[1]][$method]($params);
            }
            else
            {
                $this->res->setCode(405);
                $this->res->setData([
                    "success" => false,
                ]);
            }
        }

    }
}

?>