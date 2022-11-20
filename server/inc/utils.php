<?php

    // Utils file

    // This function print all values (such as table) with prefix & surfix pre
    function _log($v)
    {
        if ( isset($v) ) {
            echo "<pre>"; 
            print_r($v);
            echo "</pre>";
            return true;
        }
        return false;
    }

?>