<?php
    class Connection{
        public $conn; 
        function __construct(){
            $this->conn = mysqli_connect('localhost','root','root','28AUGEMP');
            echo "Connection created";
            echo '<br>';
        }
    }
    
?>
