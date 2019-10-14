<?php
$servername = "localhost";
$username_DB = "root";
$password_DB = "";
$database = "gezondheidsmeter";

$conn=mysqli_connect($servername,$username_DB,$password_DB,$database);

$query = 'SELECT ID, hoeveelheid, datum FROM koppel_user_drugs';

$result = mysqli_query($conn,$query);

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
}
echo json_encode($rows);

mysqli_close($conn);
?>
