<?php
set_include_path('../');
include_once './helpers/db.php';

class governorate {

    private $TableName = "`governorates`";
    private $TableId = "id";
    public $id;
    public $governorate_name;
    public $governorate_name_en;

    function getAllGov()
    {
    
        $conn = db::getInstance();
        $sql = "select id,governorate_name from ".$this->TableName;
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