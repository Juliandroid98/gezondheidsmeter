
<?php
session_start();
$servername = "localhost";
$username_DB = "root";
$password_DB = "";
$database = "gezondheidsmeter";

$conn = mysqli_connect($servername,$username_DB,$password_DB,$database);

$firstDay = $_POST['firstDay'];
$lastDay = $_POST['lastDay'];
$today = $_POST['today'];
$soort = $_POST['soort'];
$id = $_SESSION['id'];

if($soort === 'drugs'){
    $query = mysqli_query($conn, "SELECT hoeveelheid, DATE_FORMAT(koppel_user_drugs.datum, '%d') AS datum FROM koppel_user_drugs WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'slaap'){
    $query = mysqli_query($conn, "SELECT uren, beoordeling, DATE_FORMAT(datum, '%d') AS datum FROM slaap WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'drinken'){
    $query = mysqli_query($conn, "SELECT kcal, suiker, alcohol, DATE_FORMAT(datum, '%d') AS datum FROM drinken INNER JOIN koppel_user_drinks ON drinken.drinken_ID = koppel_user_drinks.drinks_ID WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'arbeid'){
    $query = mysqli_query($conn, "SELECT werkplek, werkdruk , DATE_FORMAT(datum, '%d') AS datum FROM arbeid WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'eten'){
    $query = mysqli_query($conn, "SELECT kcal, sugar, DATE_FORMAT(datum, '%d') AS datum FROM eten INNER JOIN koppel_user_eten ON eten.eten_ID = koppel_user_eten.eten_ID WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}
if($soort === 'sport'){
    $query = mysqli_query($conn, "SELECT verbranding, DATE_FORMAT(datum, '%d') AS datum FROM sport INNER JOIN koppel_user_sport ON sport.sport_ID = koppel_user_sport.sport_ID WHERE gebruiker_ID = '$id' AND datum BETWEEN '$firstDay' AND '$lastDay' ORDER BY datum");
}

if($soort === 'alles'){
    $query = mysqli_query($conn, "SELECT arbeid.werkplek, arbeid.werkdruk, koppel_user_drugs.hoeveelheid, slaap.uren, slaap.beoordeling, drinken.kcal, drinken.alcohol, drinken.suiker, eten.kcal, eten.sugar, sport.verbranding
                                        FROM gebruiker 
                                        INNER JOIN slaap ON gebruiker.gebruiker_ID = slaap.gebruiker_ID
                                        INNER JOIN arbeid ON gebruiker.gebruiker_ID = arbeid.gebruiker_ID
                                        INNER JOIN koppel_user_sport ON gebruiker.gebruiker_ID = koppel_user_sport.gebruiker_ID 
                                        INNER JOIN sport ON koppel_user_sport.sport_ID = sport.sport_ID 
                                        INNER JOIN koppel_user_eten ON gebruiker.gebruiker_ID = koppel_user_eten.gebruiker_ID 
                                        INNER JOIN eten ON koppel_user_eten.eten_ID = eten.eten_ID 
                                        INNER JOIN koppel_user_drugs ON gebruiker.gebruiker_ID = koppel_user_drugs.gebruiker_ID 
                                        INNER JOIN drugs ON koppel_user_drugs.drug_ID = drugs.drugs_ID 
                                        INNER JOIN koppel_user_drinks ON gebruiker.gebruiker_ID = koppel_user_drinks.gebruiker_ID 
                                        INNER JOIN drinken ON koppel_user_drinks.drinks_ID = drinken.drinken_ID 
                                        WHERE koppel_user_sport.datum = '$today' AND koppel_user_drinks.datum = '$today' AND koppel_user_eten.datum = '$today' AND koppel_user_drugs.datum = '$today' AND arbeid.datum = '$today' AND slaap.datum = '$today' AND arbeid.gebruiker_ID = '$id' AND koppel_user_drinks.gebruiker_ID = '$id' AND koppel_user_drugs.gebruiker_ID = '$id' AND koppel_user_eten.gebruiker_ID = '$id' AND koppel_user_sport.gebruiker_ID = '$id' AND slaap.gebruiker_ID = '$id'");

}

while($r = mysqli_fetch_array($query)) {
    $rows[] = $r;
}
echo json_encode($rows);
mysqli_close($conn);

?>
