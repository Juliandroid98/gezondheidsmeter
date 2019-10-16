<?php
include '';
$servername = "localhost";
$username_DB = "root";
$password_DB = "";
$database = "gezondheidsmeter";

$conn=mysqli_connect($servername,$username_DB,$password_DB,$database);

$firstDay = $_POST['firstDay'];
$lastDay = $_POST['lastDay'];
$query = "SELECT hoeveelheid, DATE_FORMAT(datum, '%d') FROM koppel_user_drugs WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum";
$result = mysqli_query($conn,$query);

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
}

echo json_encode($rows);

mysqli_close($conn);

?>