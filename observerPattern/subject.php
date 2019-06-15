<?php
set_include_path('./');
include_once './observerPattern/abstractSubject.php';

    class Subject extends AbstractSubject 
    {
        private $favoritePatterns = NULL;
        private $observers = array();
        function attach(AbstractObserver $observer_in) 
        {
        //could also use array_push($this->observers, $observer_in);
        $this->observers[] = $observer_in;
        }

        function detach(AbstractObserver $observer_in) 
        {
        //$key = array_search($observer_in, $this->observers);
        foreach($this->observers as $okey => $oval) {
            if ($oval == $observer_in)
             { 
            unset($this->observers[$okey]);
            }
        }
        }

        function notify($msg,$id) 
        {
            foreach($this->observers as $obs) {
                $obs->update($msg,$id);
            }
        }
        
    }
    
?>