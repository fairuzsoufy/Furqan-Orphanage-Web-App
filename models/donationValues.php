<?php

set_include_path('../');
include_once './helpers/db.php';
class donationValues {

private $TableName = "donation_values";
private $TableId = "id";
public $optionId;
public $receiptId;
public $isdeleted=0;
public $value;


function GetAll() {
    $conn = db::getInstance();
    $sql = "SELECT * FROM ".$this->TableName;
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


function Insert()
    {
        $conn = db::getInstance();
    $sql="INSERT INTO `donation_values`(`donation_options_id`,`value`, `receipt_id`, `isdeleted`) 
       VALUES($this->optionId,'$this->value',$this->receiptId,$this->isdeleted)";
    $result = mysqli_query($conn,$sql);
    
    // echo $sql;
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

function deleteRelations()
{
    $conn = db::getInstance();
    $sql="UPDATE donation_options SET isdeleted=1 where donation_types_id =$this->donationTypesId";
    $result = mysqli_query($conn,$sql);
    echo $sql;
    $conn->close();
}
}