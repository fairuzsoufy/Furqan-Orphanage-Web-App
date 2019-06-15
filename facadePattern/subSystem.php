<?php


include_once './observerPattern/abstractSubject.php';
include_once './observerPattern/SMSObserver.php';
include_once './observerPattern/subject.php';
include_once './observerPattern/abstractObserver.php';
include_once './observerPattern/WhatsAppObserver.php';


        class subSystem
    {
    public function operation($msg,$id)
    {
        $subject= new subject();
        $SMSobserver=new SMSObserver();
        $whatApp=new WhatsAppObserver();
        $subject->attach($whatApp);
        $subject->attach($SMSobserver);
        $subject->notify($msg,$id);
                
    }

    

   
}

?>