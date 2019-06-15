<?php

    class branch
    {
        private $TableName = "`branch`";
        private $TableId = "id";
        public $id;
        public $address;
        public $isdeleted=0;

        function getAllBranches()
        {
            $conn = db::getInstance();
            $sql = "SELECT * FROM " .$this->TableName ."where isdeleted=0";
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
            } $conn->close();
     }
        

     function delete()
     {
         
         $conn = db::getInstance();
         $sql="update " .$this->TableName." SET isdeleted=1 WHERE ". $this->TableId ."=".$this->id; 
         $result = mysqli_query($conn,$sql);
        
     }

     function insert()
     {
         $conn = db::getInstance();
         $sql="INSERT INTO " .$this->TableName."(`address`, `isdeleted`) VALUES('$this->address',$this->isdeleted)";
         echo $sql;
         $result = mysqli_query($conn,$sql);
     }

    }

?>