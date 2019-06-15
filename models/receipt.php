<?php

set_include_path('../');
include_once './helpers/db.php';

class receipt {

    private $TableName = "receipt";
    private $TableId = "id";
    public $userId;
    public $amount;
    public $donorId;
    public $donationTypeId;
    public $updatedAt;
    public $year;
    public $month;
    public $day;
    public $cc;
    public $id;
    public $childId;

    public $isdeleted =0;

    function GetAll() {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$this->TableName;
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return $result;
    }

    function GetById($id) {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. " WHERE " .$this->TableId. " = ".$id;
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return $result;
    }

    function Insert() {
        
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (`user_id`, `amount`, `donor_id`,
        `isdeleted`, `donation_type_id`) values ($this->userId,$this->amount,$this->donorId,$this->isdeleted, $this->donationTypeId)";

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

    function getStat()
    {
        $conn = db::getInstance();
        $sql= "SELECT EXTRACT(YEAR FROM `created_At`) as year,EXTRACT(MONTH FROM `created_At`) as month,
        EXTRACT(DAY FROM `created_At`) as day, DATE(`created_At`) AS date, COUNT(*) as cc FROM receipt group by date";
        $result= mysqli_query($conn,$sql);
        //echo $sql;
        $conn->close();
        return $result;
        

    }
function InsertChildDonation()
{
    $conn = db::getInstance();
    $sql="INSERT INTO `child_donation`(`receipt_id`, `child_id`) values($this->id,$this->childId)";   
    echo $sql;
    $result = mysqli_query($conn,$sql);
}
//     function Update(child $child) 
//     {
//         $conn = db::create_connection();
//         $child->updatedAt= date('Y-d-m H:i:s',time());
//         $sql="update into".$TableName."(updated_at)
//         values ('$child->updatedAt') WHERE " .$TableId. " = ".$child->id;
//         $result = mysqli_query($conn,$sql);
//     }

//     function Delete($id) 
//     {
//         $conn = db::create_connection();
//         $sql="Update ".$TableName." SET isdeleted=1 where id =" .$id;
//         $result = mysqli_query($conn,$sql);
//     }


    function GetRecipt()
    {
        $conn = db::getInstance();
      $sql="SELECT receipt.created_At, donor.name as donorName, receipt.amount ,donation_types.name FROM receipt INNER JOIN donor on receipt.donor_id=donor.id INNER JOIN donation_types ON receipt.donation_type_id=donation_types.id";
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

    function getLastID()
    {
        $conn = db::getInstance();
      $sql="SELECT MAX(id) as id FROM receipt";
      $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
      
      
            return $row;
       
        
    }
    
}

?>