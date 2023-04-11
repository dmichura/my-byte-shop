<?php
// Application class
class Application {
    private Request $req;
    private Response $res;
    public function __construct()
    {
        $this->req = new Request();
        $this->res = new Response();

        $path = $this->req->getPath();
        $controllerPath = array_slice(explode("/", $path), 2);
        $pathFile = realpath( sprintf("%s//controller//%s.php", APP_PATH, strtolower($controllerPath[0])) );
        $controllerExist = file_exists($pathFile) ? true : false;
        

        if($controllerExist)
        {
            ob_start();
            include_once $pathFile;
            ob_clean();
        }
        else
        {
            $this->res->setCode(404);
            $this->res->setData([
                "success" => false,
            ]);
        }

        $this->res->resolve(  );
    }
}

?>