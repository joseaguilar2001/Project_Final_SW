<?php
    class DB{
        private static $instant=null;

        public static function createInstant()
        {
            if(!isset(self::$instant))
            {
                $optionPDO[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instant = new PDO('mysql:host=localhost;dbname=ing proyecto sw','root','',$optionPDO);
            }
            return self::$instant;
        }
    }
?>