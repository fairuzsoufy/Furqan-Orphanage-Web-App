<?php

set_include_path('../');
include_once './helpers/db.php';
include_once "./models/document.php";
set_include_path('../');

/**
 * person.class.php
 * 
 **/
class user {

    public $TableName = "user";
    public $TableId = "id";
    public $id;
    public $username;
    public $password;
    public $personId;
    public $isdeleted=0;
    

    function GetAll()
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$TableName;
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return $result;
    }

    function GetById($id) 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. " WHERE " .$this->TableId. " = ".$id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $conn->close();
        return $row;
    }

    function Insert() 
    {
        
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (username,password,person_id)
            values ('$this->username','$this->password',$this->personId)";
            echo $sql;
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            return $conn->insert_id;
        }
        else
        {
            return false;
        }
        $conn->close();
    }

    function Update() 
    {
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET username='$this->username',password='$this->password' WHERE " .$this->TableId. " = ".$this->personId;
        echo $sql;
        $result = mysqli_query($conn,$sql);
    }

    function Delete() 
    {
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET isdeleted=".$this->isdeleted." WHERE ". $this->TableId ."=".$this->id;
        $result = mysqli_query($conn,$sql);
        echo $sql;
    }
    function login()
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM `user` WHERE `username`= '$this->username' and `password` =  '$this->password' and isdeleted=0";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_assoc();
      if($row!="")
      {
        $this->id = $row['id'];
        $this->username = $row['username'];
        $this->personId = $row['person_id'];
        return $this;
       
       }
       else
       {
         
           return false;
       } 
        
        
    }

    function GetAcessesPage($roleId)
    {
        $conn = db::getInstance();
        $sql="SELECT physical_address from page WHERE page.id 
        =(SELECT page_id from user_access WHERE role_id = $roleId)";
        $result1 = mysqli_query($conn, $sql);
        $physicalAdresses = $result1->fetch_assoc();
    }

    function signOut()
    {
        session_start();
        session_destroy();
       
    }
    function ifExists()
    {
        $conn = db::getInstance();
        $sql="SELECT * FROM `user` WHERE person_id=$this->personId";
        echo $sql;
        $result= mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)==0)
        {
         return false;
        }
        else
        {
          return true;
        }
    }

        function checkByuserName()
        {
            $conn = db::getInstance();
            $sql="SELECT * FROM `user` WHERE username ='".$this->username."'";
            //echo $sql;
           
       $result= mysqli_query($conn, $sql);
       if (mysqli_num_rows($result)==0)
       {
        return true;
       }
       else
       {
         return false;
       }
        }



        function EditcheckByuserName()
        {
            $conn = db::getInstance();
            $sql="SELECT * FROM `user` WHERE username ='".$this->username."' AND person_id !=".$this->personId;
            //echo $sql;
           
       $result= mysqli_query($conn, $sql);
       if (mysqli_num_rows($result)==0)
       {
        return true;
       }
       else
       {
         return false;
       }
        }
       
}

?>