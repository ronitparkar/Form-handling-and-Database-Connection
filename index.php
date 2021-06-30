<?php

//Connection applied
include("connection.php");
error_reporting(0);

// define variables and set to empty values
$idErr = $nameErr = $emailErr = $countryErr = "";
$id = $name = $email = $country = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["number"])){
    $idErr = "ID is required";
  } else{
    $id = test_input($_POST["number"]);
  }

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["country"])){
    $countryErr = "Country is required";
  } else{
    $country = test_input($_POST["country"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="POST" action="">

  Id: <input type="text" name="number" value="<?php echo $id;?>">
  <span class="error">* <?php echo $idErr;?></span>
  <br><br>
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Country: <input type="text" name="country" value="<?php echo $country;?>">
  <span class="error">* <?php echo $countryErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
  
$num = $_POST["number"];
$name = $_POST["name"];
$email = $_POST["email"];
$country = $_POST["country"];

      if($num!="" && $name!="" && $email!="" && $country!="")
      {
        $query = "INSERT INTO employ VALUES ('$num', '$name', '$email', '$country')";
        $data = mysqli_query($conn, $query);
      }

if($data == true){
  echo "Data inserted into database";
}
else{
  echo "ID has been Used, Use another ID";
}


}

?>