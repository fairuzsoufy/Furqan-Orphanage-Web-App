<?php
   set_include_path('./');
   include_once './strategy/StrategyInterface.php';
 
class currentEmp implements StrategyInterface 
{
    public function getStat() 
    {
      


        $conn = db::getInstance();
        $sql="select person.id,person.name,person.gender,person.national_id,role.parent_id from person INNER join role
        ON person.role_id=role.id WHERE person.id IN(SELECT person_id from employee) and person.isdeleted=0"; 

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