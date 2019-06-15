<?php
set_include_path('./');
include_once './decorative/MsgBodyDecorator.php';
class VacationMsgBody extends msgBodyDecorator {
     
    private $TableName="msgs";

    public function loadBody($id) 
     {
          
        $conn = db::getInstance();
        $sql = "SELECT * from ".$this->TableName." WHERE id=$id";
        
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $result =$row['content'];
        
	    return $result . $this->msgBody->loadBody($id);  
          
     }
      
 }
 ?>