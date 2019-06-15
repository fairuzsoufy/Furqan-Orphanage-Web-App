<?php
    
 
class femaleStrat implements StrategyInterface 
{
    public function getStat() 
    {
        $conn = db::getInstance();
        $sql="select * from person where role_id=6 AND gender=1  AND isdeleted=0"; //girls
        $result = mysqli_query($conn, $sql);
        //echo $sql;
        //print_r($result);
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