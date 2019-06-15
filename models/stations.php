<?php

class stations 
{

    private $TableName = "`stations`";
    private $TableId = "id";
    public $id;
    public $city_id;
    public $station_name;
    public $station_name_en;

    function GetStationById($cityId) 
    {
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. "WHERE city_id = ".$cityId;
        $result = mysqli_query($conn, $sql);
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
        } $conn->close();
    }


}
?>