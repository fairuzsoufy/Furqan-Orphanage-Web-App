<?php
set_include_path('../');
include_once './helpers/db.php';
class role {

public $TableName = "role";
private $TableId = "id";
public $id;
public $name;
public $parentId;
public $isdeleted=0;


function GetAll()

{
    $conn = db::getInstance();
    $sql = "SELECT * FROM " .$this->TableName ." where isdeleted=0 AND parent_id !=0";
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
    } $conn->close();
}

    function GetById($parentId) 
 {
    $conn = db::getInstance();
    $sql = "SELECT id,name FROM " .$this->TableName. " WHERE parent_id = ".$parentId." AND isdeleted=0";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)){
        $return[] = $row;
    }

    // $conn->close();

    return $return;
  }



  function delete()
  {     
      $conn = db::getInstance();
      $sql="update " .$this->TableName." SET isdeleted=1 WHERE ". $this->TableId ." = ".$this->id; 
    //  echo $sql;
      $result = mysqli_query($conn,$sql);
  }

  function insert()
  {
      $conn = db::getInstance();
      $sql="INSERT INTO " .$this->TableName."( `name`,`parent_id`,`isdeleted`) VALUES('$this->name','$this->parentId',$this->isdeleted)";
      echo $sql;
      
      $result = mysqli_query($conn,$sql);
  }



}
?>
