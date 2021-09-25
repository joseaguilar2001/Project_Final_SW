<?php
    class ControlAbastecimientos
    {
        public function Home()
        {
            include_once("./Views/Abastecimientos/home.php");
        }
        
        // This is a function for create an register.
        public function Create()
        {
            include_once("./Views/Abastecimientos/create.php");
        }

        public function Edit()
        {
            include_once("./Views/Abastecimientos/edit.php");
        }
    }
?>