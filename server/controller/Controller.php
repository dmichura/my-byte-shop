<?php
class Controller {
    public function __call($name, $args) {
        $this->otuput('', array('HTTP/1.1 404 Not Found'));
    }

    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }

    protected function getQueryStringParams()
    {
        return parse_str($_SERVER['QUERY_STRING'], $query);
    }

    protected function otuput($data, $headers=array())
    {
        header_remove("Set-Cookie");
        _log($headers);
        if ( is_array($headers) && count($headers) > 0 ) {
            foreach ($headers as $httpHeader) {
                header($httpHeader);
            }
        }

        echo $data;
        exit;
    }
}
?>