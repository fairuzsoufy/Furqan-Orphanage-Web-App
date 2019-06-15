<?php

class db {
    static private $ServerName = "localhost";
    static private $DBUsername = "root";
    static private $DBPassword = "";
    static private $DBName= "dar_elfourkan";
    public static $instance;

    function create_connection() {
        $conn = new mysqli(self::$ServerName, self::$DBUsername, self::$DBPassword, self::$DBName);
        mysqli_query($conn,"SET NAMES 'utf8'"); 
        mysqli_query($conn,'SET CHARACTER SET utf8');
        return $conn;
    }
    public static function getInstance()
    {
        if(!self::$instance)
        {
            $db=new db();
            self::$instance= $db->create_connection();
            return self::$instance;
        }

        // echo 'xx'.self::$instance->ping().'xx';
        // if(self::$instance->connect_errno)
        //  {
        //     $db=new db();
        //     self::$instance= $db->create_connection();
        // }
       
        return self::$instance;
    }
}

?>