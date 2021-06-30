<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_form_validate";

$conn = mysqli_connect($servername,$username,$password,$dbname);


if($conn){
    //echo "Connected";
}
else{
    echo "Connection Failed".mysqli_connect_error();
}


?>