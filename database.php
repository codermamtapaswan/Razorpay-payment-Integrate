<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "paymentgateway";
 
$con = new mysqli($localhost,$username,$password,$dbname);
if(!$con ){
    echo "DataBase Is Not Connected!";
}


?>
