<?php

class Response {

    private const codes = [
        200 => "OK",
        201 => "Created",
        301 => "Redirect (perm)",
        302 => "Redirect (temp)",
        400 => "Bad Request",
        401 => "Unauthorized",
        403 => "Forbidden",
        404 => "Not Found",
        405 => "Method Not Allowed",
    ]; // codes

    private int $code = 404; // default code
    private array $data = [
        "success" => false
    ]; // data to send as result in json

    public function __construct() 
    {
        
    }

    // setters & getters
    public function setCode(int $code) : bool {
        if( isset( Response::codes[$code] ) ) {
            $this->code = $code;
            return true;
        }
        return false;
    }
    public function setData(array $data) : bool {
        if( isset( $data ) ) {
            $this->data = $data;
            return true;
        }
        return false;
    }

    public function resolve() : void {
        header("Content-Type: application/json");
        header("Access-Control-Allow-Origin: *");
        header( sprintf("HTTP/1.1 %d %s", $this->code, Response::codes[$this->code]) ); // set status code
        echo json_encode($this->data);
        die();
    }

}

?>