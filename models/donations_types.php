<?php

set_include_path('../');
include_once './helpers/db.php';

class donationsTypes {

    private $TableName = "donation_types";
    private $TableId = "id";
    public $id;
    public $name;
    public $isdeleted=0;

    function GetAll() {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. " WHERE isdeleted=0";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
        if (empty($return))
        {
        return false;
        }   
        else
        {
            return $return;
        }
        $conn->close();    
    }

    function Insert()
    {
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (`name`,isdeleted) values ('$this->name',$this->isdeleted)";
        $result = mysqli_query($conn,$sql);
        echo $sql;
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

    function getDonationOptionById($id)
    {
        $conn = db::getInstance();
        $sql="SELECT options_id from donation_options WHERE donation_types_id=$id And isdeleted=0";
    
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        if (empty($return))
        {
        return false;
        }
        $conn->close();

        return $return;
    }

    function UPDATE()
    {
        $conn = db::getInstance();
        $sql="UPDATE ".$this->TableName." SET name='$this->name' where id =".$this->id;
        $result = mysqli_query($conn,$sql);
        echo $sql;
     
    }

    function Delete()
    {
        $conn = db::getInstance();
        $sql="UPDATE " .$this->TableName." SET isdeleted=1 where id =".$this->id;
        $result = mysqli_query($conn,$sql);
        echo $sql;
        $conn->close();
    }
    
    function GetById()
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. " WHERE " .$this->TableId. " = ".$this->id;
        $result = mysqli_query($conn, $sql);
        if($result)
        { 
            $result = $result->fetch_assoc();
            $this->id = $result['id'];
            $this->name = $result['name'];
        
            return $this;
        }
        else
        {
                return false;
        }
    }
}
?>