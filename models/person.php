<?php

set_include_path('../');
include_once './helpers/db.php';
include_once "./models/document.php";
/**
 * person.class.php
 * 
 **/
class person { 

    public $TableName = "person";
    private $TableId = "id";
    public $id;
    public $name;
    public $birthDate;
    public $nationalId;
    public $gender;
    public $roleId;
    public $branch_id;
    public $parentId;

    function GetAll() 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$this->TableName;
        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
    }

    function GetById($id) 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. " WHERE " .$this->TableId. " = ".$id;
        $result = mysqli_query($conn, $sql);
       if($result)
       { 
           $result = $result->fetch_assoc();
       
       

        $this->id = $result['id'];
        $this->name = $result['name'];
        $this->birthDate = $result['birth_date'];
        $this->nationalId = $result['national_id'];
        $this->gender = $result['gender'];
        $this->roleId = $result['role_id'];

        return $this;
       }
       else
       {
           return false;
       }
    }

    function GetByRoleId($id)

    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$this->TableName." where role_id= $id AND isdeleted=0";
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
       $person=$this;
       $conn = db::getInstance();
       $sql="INSERT INTO ".$this->TableName." (name,birth_date,national_id,gender,role_id,branch_id)
       values ('$person->name','$person->birthDate',$person->nationalId,$person->gender,$person->roleId,$this->branch_id)";
       //echo $sql;
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
        $sql="update " .$this->TableName." SET name='$this->name',birth_date='$this->birthDate',national_id=$this->nationalId,
        gender=$this->gender, branch_id=$this->branch_id ,role_id= $this->roleId WHERE " .$this->TableId. " = ".$this->id;
        // echo $sql;
        $result = mysqli_query($conn,$sql);
        
    }

    function Delete() 
    {
        $conn = db::getInstance();
        $sql="UPDATE
      person
        INNER JOIN
        `case`
        ON
        person.id = `case`.`child_id`
        INNER JOIN case_details ON `case`.`id`=case_details.case_id INNER JOIN document on case_details.document_id=document.id 
        SET
        person.isdeleted = 1,
        document.isdeleted=1,`case`.isdeleted=1
        WHERE
        person.ID =". $this->id;
        $result = mysqli_query($conn,$sql);
        
    }

    function UpdateChild(document $document)
    {
        $conn = db::getInstance();
        $sql= "UPDATE
        person
        INNER JOIN
        `case`
        ON
        person.id = `case`.`child_id`
        INNER JOIN case_details ON `case`.`id`=case_details.case_id INNER JOIN document on case_details.document_id=document.id 
        SET
        person.name = '$this->name', person.birth_date= '$this->birthDate', person.gender=$this->gender,person.national_id=$this->nationalId,
      
        document.relative='$document->relative',document.station='$document->station',document.district='$document->district',document.report_number=$document->reportNumber,document.report_date='$document->reportDate'
        ,document.decision_number=$document->decisionNumber,document.decision_date='$document->decisionDate', document.state='$document->state'
        WHERE
        person.ID = $this->id";
      $result = mysqli_query($conn,$sql);
    }

    function GetChildDetailsById($id)
    {
        $conn = db::getInstance();
        $sql="SELECT  document.relative,document.gov_id,document.city_id,document.station_id,document.report_number,document.report_date,
        document.decision_number,document.decision_date,document.shoe_size,document.clothes_size,
        person.name,person.birth_date,person.national_id,person.gender,person.branch_id,`case`.supervisor_id,`case`.id FROM person INNER JOIN `case`
        ON person.id = `case`.child_id
        INNER JOIN `case_details` ON `case`.id=`case_details`.`case_id` INNER JOIN document on 
        `case_details`.document_id=document.id where person.id=$id ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    function deletePerson()
    {
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET isdeleted=".$this->isdeleted." WHERE ". $this->TableId ."=".$this->id; 
        $result = mysqli_query($conn,$sql);
    }

    function getEmployees()
    {
        $conn = db::getInstance();
        $sql="select person.id,person.name,person.gender,person.national_id,role.parent_id from person INNER join role ON person.role_id=role.id WHERE person.id IN(SELECT person_id from employee) and person.isdeleted=0";
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
    

    function getSupervisorByBranch($branchId)
    {
        $conn = db::getInstance();
        $sql="SELECT * from ".$this->TableName." WHERE role_id=8 AND isdeleted=0 AND branch_id=$branchId";
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result))
        {
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
    
    function CheckNationalId()
    {
       $conn = db::getInstance();
       $sql="SELECT * FROM `person` WHERE national_id ='".$this->nationalId."'And isdeleted=0";
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

    function EditcheckNationalId()
    {
       $conn = db::getInstance();
       $sql="SELECT * FROM `person` WHERE national_id ='".$this->nationalId."' AND id !=$this->id";
      //    echo $sql;
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