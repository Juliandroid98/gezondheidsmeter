<?php
$servername = "localhost";
$username_DB = "root";
$password_DB = "";
$database = "gezondheidsmeter";

$conn=mysqli_connect($servername,$username_DB,$password_DB,$database);

$firstDay = $_POST['firstDay'];
$lastDay = $_POST['lastDay'];
$soort = $_POST['soort'];

if($soort === 'drugs'){
    $query = mysqli_query($conn, "SELECT hoeveelheid, DATE_FORMAT(datum, '%d') FROM koppel_user_drugs WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'slaap'){
    $query = mysqli_query($conn, "SELECT uren, beoordeling, DATE_FORMAT(datum, '%d') FROM slaap  ORDER BY datum");
}
if($soort === 'drinken'){
    $query = mysqli_query($conn, "SELECT kcal, suiker, alcohol, DATE_FORMAT(datum, '%d') FROM drinken INNER JOIN koppel_user_drinks ON drinken.drinken_ID = koppel_user_drinks.drinks_ID WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'arbeid'){
    $query = mysqli_query($conn, "SELECT werkplek, werkdruk , DATE_FORMAT(datum, '%d') FROM arbeid WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'eten'){
    $query = mysqli_query($conn, "SELECT kcal, sugar, DATE_FORMAT(datum, '%d') FROM eten INNER JOIN koppel_user_eten ON eten.eten_ID = koppel_user_eten.eten_ID WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'sport'){
    $query = mysqli_query($conn, "SELECT verbranding, DATE_FORMAT(datum, '%d') FROM sport INNER JOIN koppel_user_sport ON sport.sport_ID = koppel_user_sport.sport_ID WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}

$rows = array();
while($r = mysqli_fetch_array($query)) {
    $rows[] = $r;
}

echo json_encode($rows);

mysqli_close($conn);

?>