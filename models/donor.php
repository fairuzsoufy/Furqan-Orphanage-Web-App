<?php

set_include_path('../');
include_once './helpers/db.php';
class donor 
{

    private $TableName = "donor";
    private $TableId = "id";
    public $id;
    public $name;
    public $SSN;
    public $updatedAt;
    public $isdeleted =0;


    function GetAll() {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$this->TableName;
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
    }

    function GetBySSN() {
        $conn = db::getInstance();
        $sql = "SELECT *  FROM " .$this->TableName. " WHERE national_id LIKE '%".$this->SSN."%'";
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
        } $conn->close();
    }


    function Insert() {
        
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (`name`, `national_id`,
        `isdeleted`) values ('$this->name','$this->SSN',$this->isdeleted)";

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
    function CheckNationalId()
    {
       $conn = db::getInstance();
       $sql="SELECT * FROM `donor` WHERE national_id ='$this->SSN'";
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