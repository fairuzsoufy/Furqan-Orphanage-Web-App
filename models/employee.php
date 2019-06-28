<?php
set_include_path('../');

include_once './models/person.php';

class employee 
{
    public $TableName = "employee";
    public $TableId = "id";
    public $id;
    public $personId;
    public $mobile;
    public $date_of_work;
    public $salary;
    public $number;
    public $branch;
    public $address;
    public $person_id;
    public $reason;
    public $isdeleted=0;
   
    function GetAll()
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM ".$this->TableName. " WHERE isdeleted =0";
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
        $sql="INSERT INTO ".$this->TableName." (person_id,mobile,date_of_work,salary,isdeleted)
             values ($this->personId,'$this->mobile','$this->date_of_work',$this->salary,0)";
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

     function getById($id)
     {
        $conn = db::getInstance();
       $sql="select person.name, person.birth_date,person.national_id,person.gender,person.role_id,
       person.branch_id,employee.mobile,employee.date_of_work,employee.salary,role.parent_id,role.id as role_id 
       from person inner join employee on person.id=employee.person_id INNER join role on role.id =person.role_id WHERE person.id =$id";
       $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        return $row;
     }
     function Delete() 
    {
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET isdeleted=".$this->isdeleted." WHERE ". $this->TableId ."=".$this->id;
        $result = mysqli_query($conn,$sql);
        
    }

    function addReason()
    {
        $conn = db::getInstance();
        $sql="insert into past_emp (person_id,reason) values (".$this->person_id.",'".$this->reason."')";
        $result = mysqli_query($conn,$sql);
    }
 
    function getStatistics()
    {
        $conn = db::getInstance();
        $sql = "SELECT role.name as address, count(*) as number FROM person inner join role on person.role_id=role.id where person.role_id!=6 GROUP by person.role_id";

        $result = mysqli_query($conn, $sql);
        $conn->close();
        return $result;
      
    }
    function Update() 
    {   
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET mobile=$this->mobile,date_of_work='$this->date_of_work',salary=$this->salary WHERE person_id = ".$this->personId;
        echo $sql;
        $result = mysqli_query($conn,$sql);
        
    }
 
}

?>