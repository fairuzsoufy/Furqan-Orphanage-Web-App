<?php

set_include_path('../');
include_once './helpers/db.php';

class document {

    private $TableName ="document";
    private $TableId = "id";
    public $id;
    public $relative;
    public $gov_id;
    public $city_id;
    public $station_id;
    public $reportNumber;
    public $reportDate;
    public $decisionNumber;
    public $decisionDate;
    public $shoeSize;
    public $clothesSize;

    

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
        $sql = "SELECT * FROM " .$TableName. " WHERE " .$TableId. " = ".$id;
        $result = mysqli_query($conn, $sql);
        $conn->close();

        return $result;
    }

    function Insert() 
    {
        
        $document = $this;
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName."(`relative`,`gov_id`,`city_id`, `station_id`, `report_number`,
        `report_date`, `decision_number`, `decision_date`,shoe_size,clothes_size)
            values ('$document->relative',$document->gov_id,$document->city_id,$document->station_id,$document->reportNumber
            ,'$document->reportDate',$document->decisionNumber,'$document->decisionDate',$document->shoeSize,$document->clothesSize)";
        
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

    function InsertCaseDetails($caseId,$document_id)
    {
        $conn = db::getInstance();
        $sql="insert into case_details(case_id,document_id) values ($caseId, $document_id)";
        $result = mysqli_query($conn,$sql);
    }
    function Update() 
    {
        $conn = db::getInstance();
        $sql="UPDATE person INNER JOIN`case`ON person.id = `case`.`child_id` INNER JOIN case_details ON `case`.`id`=case_details.case_id INNER JOIN document on case_details.document_id=document.id SET relative='$this->relative',`gov_id`=$this->gov_id,`city_id`=$this->city_id,`station_id`=
        $this->station_id,`report_number`=$this->reportNumber,`report_date`='$this->reportDate',
        `decision_number`=$this->decisionNumber,`decision_date`='$this->decisionDate'
        ,`shoe_size`=$this->shoeSize,`clothes_size`=$this->clothesSize WHERE  person.id = $this->id";
        // echo $sql;
        $result = mysqli_query($conn,$sql);
    }

    function Delete($id) 
    {
        $conn = db::getInstance();
        $sql="DELETE from".$TableName." where id = $id";
        $result = mysqli_query($conn,$sql);
    }
    function CheckReportNum()
    {
       $conn = db::getInstance();
       $sql="SELECT * FROM `document` WHERE report_number ='".$this->reportNumber."'And isdeleted=0";
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
    function CheckDecisionNum()
    {
       $conn = db::getInstance();
       $sql="SELECT * FROM `document` WHERE decision_number ='".$this->decisionNumber."'And isdeleted=0";
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
    
    function EditCheckReportNum($id)
    {
        $conn = db::getInstance();
       $sql= "SELECT document.report_number from document INNER JOIN `case_details` on `case_details`.document_id = document.id INNER JOIN `case` on `case`.id= `case_details`.case_id WHERE document.report_number =$this->reportNumber AND `case`.child_id != $id 
        and document.isdeleted=0";
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
    function EditCheckDecisionNum($id)
    {
        $conn = db::getInstance();
       $sql= "SELECT document.decision_number from document INNER JOIN `case_details` on `case_details`.document_id = document.id INNER JOIN `case` on `case`.id= `case_details`.case_id WHERE document.decision_number =$this->decisionNumber AND `case`.child_id != $id 
        and document.isdeleted=0";
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