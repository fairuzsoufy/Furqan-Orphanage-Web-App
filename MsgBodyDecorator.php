<?php
set_include_path('./');
include_once './decorative/msgBody.php';
abstract class MsgBodyDecorator implements msgBody {
     
     protected $msgBody;
      
     public function __construct(msgBody $msgBody) {
         $this->msgBody = $msgBody;
     }
      
     abstract public function loadBody($id);
   }
?>