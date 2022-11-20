<?php
    // Config file
    const config = array(
        "db" => array( // database credentials
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "name" => "my_byte",
        ),
        "dev" => TRUE, // dev mode
    );

    if (config['dev'] !== TRUE) error_reporting(0);
?>