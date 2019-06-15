<?php

set_include_path('../');
include_once './helpers/db.php';

class child 
 {

    private $TableName = "`case`";
    private $TableId = "id";
    public $id;
    public $createdAt;
    public $supervisorId;
    public $childId;
    public $updatedAt;
    public $number;
    public $address;

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
        $sql = "SELECT * FROM " .$this->TableName. " WHERE " .$TableId. " = ".$id;
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
    }
    function GetByPersonId($id) 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName." WHERE child_id=".$id;
        echo $sql;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
               return $row;
    }
    function Insert() 
    {
        $child = $this;
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (supervisor_id,child_id) values ($child->supervisorId,$child->childId)";
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
        $this->updatedAt= date('Y-d-m H:i:s',time());
        $sql="update " .$this->TableName." SET updatedAt='$this->updatedAt',supervisor_id='$this->supervisorId', WHERE " .$this->TableId. " = ".$this->id;
        $result = mysqli_query($conn,$sql);
       
    }

    function Delete() 
    {
        
        $conn = db::getInstance();
            $sql="update " .$this->TableName."SET isdeleted=".$this->isdeleted." WHERE". $this->TableId ."=".$this->id;
            $result = mysqli_query($conn,$sql);
        
    }

    function viewSupervisors() 
    {
        $conn = db::getInstance();
        $sql = "SELECT * from ".$TableName." WHERE role_id=8";
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
    }
   

    function getStat()
    
    {
    
            $conn = db::create_connection();
    
            $sql = "select gender, count(*) as number from person where role_id=6 GROUP BY gender";
    
            $result = mysqli_query($conn, $sql);
    
            $conn->close();
    
            return $result;
    
     
    
    }
    function getStat2()
    
        {
    
            $conn = db::create_connection();
    
            $sql = "select branch.address as address,count(*) as number from person inner join branch on branch.id=person.branch_id where role_id=6 GROUP by branch.address";
    
            $result = mysqli_query($conn, $sql);
    
            $conn->close();
    
            return $result;
    
     
    
        }
}

?>