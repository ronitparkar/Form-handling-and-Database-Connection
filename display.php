<html>
    <head>
        <title>Display records by employee</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
        </tr>
</body>
</html>

<?php
error_reporting(0);
include("connection.php");
$query = "select * from employ";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

echo $result['id']." ".$result['name']." ".$result['email']." ".$result['country'];

//echo $total;
echo "<br>";

if($total!=0)
{
    $result = mysqli_fetch_assoc($data);
    while(($result=mysqli_fetch_assoc($data)))
    {
        echo"
        <tr>
        <td>".$result['id']."</td>
        <td>".$result['name']."</td>
        <td>".$result['email']."</td>
        <td>".$result['country']."</td>
        </tr>
        ";
    }
    //echo "Table has records";
}
else{
    echo "No records found";
}


?>