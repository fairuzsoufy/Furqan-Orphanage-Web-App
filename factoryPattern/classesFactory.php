<?php
 
class ClassFactory {
 
    public function __construct() {
   
    }
 
    public static function build ($type = '') {
             
        if($type == '') {
            throw new Exception('Invalid class Type.');
        } else {
 
            $className = $type;
            if(class_exists($className)) {
                return new $className();
            } else 
            {
                throw new Exception('class type not found.');
            }
        }
    }
}
?>