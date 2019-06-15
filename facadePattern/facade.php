<?php
include_once './observerPattern/abstractSubject.php';
include_once './observerPattern/SMSObserver.php';
include_once './observerPattern/subject.php';
include_once './observerPattern/abstractObserver.php';
include_once "./facadePattern/subsystem.php";

class facade 
{
    public $subsystem;
    public $msg;
    public $id;
   
    public function __construct($msg,$id) 

    {
        $this->msg=$msg;
        $this->id=$id;
        $this->subsystem = new subSystem($msg);   
    }

    public function operation()
    {
        // $result = "Facade initializes subsystems:\n";
        // $result .= $this->subsystem->operation($msg);
        // return $result;
        $this->subsystem->operation($this->msg,$this->id);
    }

public function clientCode()
{ 
    echo $this->operation();
}

// class facade
// {
//     public $sms;


//     function __construct()
//     {
//         $this->sms = new sms();
//     }
// }
}
?>