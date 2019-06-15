<?php
set_include_path('./');
include_once './strategy/currentEmp.php';
include_once './strategy/pastEmp.php';
class StrategyContext 
{
    private $strategy = NULL; 
    public function __construct($strategy_ind_id) 
    {
        switch ($strategy_ind_id) 
        {
            case 1: 
                $this->strategy = new femaleStrat();
            break;
            case 0: 
                $this->strategy = new maleStrat();
            break;
            case 3: 
            $this->strategy = new currentEmp();
            break;
            case 4: 
            $this->strategy = new pastEmp();
            break;
           
        }
    }

    public function showStat() 
    {
        $return =$this->strategy->getStat();
        echo json_encode($return);
    }
}


?>