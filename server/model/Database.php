<?php

    use FFI\Exception;

    class Database {
        protected $con = null;
        public function __construct()
        {
            try {
                $this->con = new mysqli(
                    config['db']['host'],
                    config['db']['username'],
                    config['db']['password'],
                    config['db']['name'],
                );

            } catch (Exception $e) {
                throw new Exception($e->getMessage());                
            }
        }
        public function select($query = "" , $params = [])
        {
            try {
                $queryHandler = $this->queryHandler( $query , $params );
                $result = $queryHandler->get_result()->fetch_all(MYSQLI_ASSOC);               
                $queryHandler->close();
                return $result;
            } catch(Exception $e) {
                throw New Exception( $e->getMessage() );
            }
            return false;
        }
    
        private function queryHandler($query = "" , $params = [])
        {
            try {
                $queryHandler = $this->con->prepare( $query );
    
                if($queryHandler === false) {
                    throw New Exception("Unable to do prepared statement: " . $query);
                }
    
                if( $params ) {
                    $queryHandler->bind_param($params[0], $params[1]);
                }
    
                $queryHandler->execute();
    
                return $queryHandler;
            } catch(Exception $e) {
                throw New Exception( $e->getMessage() );
            }   
        }
    }
?>