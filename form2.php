<?php
echo "<h2>Data From index</h2>";

$id = $_POST["number"];
$name = $_POST["name"];
$email = $_POST["email"];
$country = $_POST["country"];

if ($name == 'vikas'){
    echo "WELCOME Admin Vikas!";
}
else {
    echo $name;
}
echo "<br>";
echo $email;
echo "<br>";
echo $country;
echo "<br>";



?>