<?php
    
 
class femaleStrat implements StrategyInterface 
{
    public function getStat() 
    {
        $conn = db::getInstance();
        $sql="SELECT person.name,person.id, person.birth_date, person.national_id,person.gender,person.branch_id, document.relative,document.gov_id,document.city_id,document.station_id,document.report_number,document.report_date,document.shoe_size,document.clothes_size, document.decision_number,document.decision_date, `case`.supervisor_id FROM person INNER JOIN `case` ON person.id = `case`.child_id INNER JOIN `case_details` ON `case`.id=`case_details`.`case_id` INNER JOIN document on `case_details`.document_id=document.id where person.isdeleted=0 AND person.gender=1"; //girls
        $result = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_assoc($result)){
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