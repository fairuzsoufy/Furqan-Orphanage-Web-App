<?php

class talent 
{

    private $TableName = "`talent`";
    private $TableId = "id";
    public $id;
    public $talent_name;
    public $isdeleted=0;
    public $childId;

    function getAll() 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName." where isdeleted=0";
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
        $conn->close();
    }
 
    function InsertChildTalents()
    {
        $conn = db::getInstance();
        $sql = "INSERT INTO `child_talents`(`child_id`, `talent_id`,isdeleted) VALUES ($this->childId,$this->id,0)";
        $result = mysqli_query($conn, $sql);
        echo $sql;
        
    }

    function getTalentByChildId($child_id)
    {
        $conn = db::getInstance();
        $sql="SELECT talent_id from child_talents WHERE child_id=$child_id and isdeleted=0 ";
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

    
    function delete()
    {
        
        $conn = db::getInstance();
        $sql="update " .$this->TableName." SET isdeleted=1 WHERE ". $this->TableId ."=".$this->id; 
        $result = mysqli_query($conn,$sql);
       
    }
    function insert()
    {
        $conn = db::getInstance();
        $sql="INSERT INTO " .$this->TableName."(`talent_name`, `isdeleted`) VALUES('$this->talent_name',$this->isdeleted)";
        
        $result = mysqli_query($conn,$sql);
    }

    function deleteRelations()
    {
        
    $conn = db::getInstance();
    $sql="UPDATE `child_talents` SET isdeleted=1 where child_id = $this->childId";
    $result = mysqli_query($conn,$sql);
    echo $sql;
  
    }




}
?>