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
    $query = "SELECT hoeveelheid, DATE_FORMAT(datum, '%d') FROM koppel_user_drugs WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum";
}
if($soort === 'slaap'){
    $query = "SELECT uren, beoordeling, DATE_FORMAT(datum, '%d') FROM slaap WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum";
}
if($soort === 'drinken'){
    $query = "SELECT kcal, alcohol, suiker, DATE_FORMAT(koppel_user_drinks.datum, '%d') FROM koppel_user_drinks WHERE datum BETWEEN '$firstDay' AND '$lastDay' INNER JOIN drinken ON drinks_ID = drinken_ID ORDER BY datum";
}
if($soort === 'arbeid'){
    $query = "SELECT werkplek, werkdruk , DATE_FORMAT(datum, '%d') FROM arbeid WHERE datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum";
}
if($soort === 'eten'){
    $query = "SELECT kcal, sugar, DATE_FORMAT(koppel_user_eten.datum, '%d') FROM eten WHERE datum BETWEEN '$firstDay' AND '$lastDay' INNER JOIN koppel_user_eten ON eten.eten_ID = koppel_user_eten.eten_ID ORDER BY datum";
}
if($soort === 'sport'){
    $query = "SELECT verbranding, DATE_FORMAT(koppel_user_sport.datum, '%d') FROM sport WHERE datum BETWEEN '$firstDay' AND '$lastDay' INNER JOIN koppel_user_sport ON sport.sport_ID = koppel_user_sport.sport_ID ORDER BY datum";
}

$result = mysqli_query($conn,$query);

$rows = array();
while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
}

echo json_encode($rows);

mysqli_close($conn);

?>