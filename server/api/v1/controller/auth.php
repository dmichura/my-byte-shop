<?php

    // $this->res->setData([
    //     "success" => true,
    //     "path" => $path,
    //     "controllerPath" => $controllerPath,
    //     "method" => $method,
    //     "params" => $params,
    // ]);

    /*
        action:
            login:
                POST
                GET
                DELETE
    */
class Auth extends Controller {
    private array $routes = [
        /* "login" => [
            "GET" => ...
            "POST" => 
        ]
        
        */

    ];
    public function __construct($req, $res, $controllerPath)
    {
        $this->initRoutes();
        parent::__construct($req, $res, $controllerPath, $this->routes);
        $this->load();
    }

    private function initRoutes() : void
    {
        $this->routes = [
            // "" => [
            //     "POST" => [$this, "index"]
            // ],
            "login" => [
                "POST" => [$this, "login"],
            ],
            "register" => [
                "POST" => [$this, "register"],
            ],
        ];

    }
    
    // public function index($params) {
    //     $this->res->setCode(200);
    //     $this->res->setData([
    //         "success" => true,
    //         "params" => $params
    //     ]);   
    // }

    public function login($params) {
        
        $this->res->setCode(200);
        $this->res->setData([
            "success" => false,
            "params" => $params
        ]);
    }
    public function register($params) {

        $this->res->setCode(200);
        $this->res->setData([
            "success" => false,
            "params" => $params
        ]);
    }

}
// check method
new Auth($this->req, $this->res, $controllerPath);



?>