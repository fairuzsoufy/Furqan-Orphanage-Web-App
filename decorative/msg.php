<?php
set_include_path('./');
include_once './decorative/msgBody.php';
class msg implements msgBody
{
    private $TableName="msgs";
    private $TableId = "id";
    public $isdeleted=0;
    public $content;
    public function loadBody($id) 
    {
        $id=1;
        $conn = db::getInstance();
        $sql = "SELECT * from ".$this->TableName." WHERE id=1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $result =$row['content'];
	    return $result;  
    }
    function getAllExtraMsgs()
    {
        $conn = db::getInstance();
        $sql = "SELECT * from ".$this->TableName." WHERE id!=1 and isdeleted=0";
        $result = mysqli_query($conn, $sql);
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
        
        
    } 

    function Insert()
    {
        $conn = db::getInstance();
        $sql="INSERT INTO ".$this->TableName." (`name`, `content`,
        `isdeleted`) values ('$this->name','$this->content',$this->isdeleted)";
        $result = mysqli_query($conn, $sql);
    }
    function delete()
    {
        
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET isdeleted=1 WHERE ". $this->TableId ."=".$this->id; 
        echo $sql;
        $result = mysqli_query($conn,$sql);
       
    }
    function GetById()
    {
        $conn = db::getInstance();
        $sql = "SELECT * from ".$this->TableName." WHERE id=$this->id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }
   
    function Update()
    {
        $conn = db::getInstance();
        $sql = "Update ".$this->TableName." SET name='$this->name', content='$this->content' where id=$this->id";
        $result = mysqli_query($conn, $sql);
        echo $sql;
    }
}
?>