<?php
 include_once "./helpers/db.php";
class cities 
{

    private $TableName = "`cities`";
    private $TableId = "id";
    public $id;
    public $gov_id;
    public $city_name;
    public $city_name_en;

    
    function GetCityById($govId) 
    {
     
        $conn = db::getInstance();
        $sql = "SELECT * FROM " .$this->TableName. "WHERE gov_id = ".$govId;
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