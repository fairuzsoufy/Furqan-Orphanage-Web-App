<?php

class maleStrat implements StrategyInterface 
{
    public function getStat() 
    {
        $conn = db::getInstance();
        $sql="select * from person where role_id=6 AND gender=0 AND isdeleted=0"; 
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
}

?>