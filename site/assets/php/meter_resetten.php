<?php
include 'Connection.php';
session_start();

$userid = (string) $_SESSION["id"];
//echo $userid;

// Delete drinks data
$stmt = $conn->prepare("DELETE FROM `koppel_user_drinks` WHERE `gebruiker_ID` = ?; ");
$stmt->bind_param("s", $userid);

$stmt->execute();
$stmt->close();

// Delete drugs data
$stmt = $conn->prepare("DELETE FROM `koppel_user_drugs` WHERE `gebruiker_ID` = ?;");
$stmt->bind_param("s", $userid);

$stmt->execute();
$stmt->close();

// Delete eten data
$stmt = $conn->prepare("DELETE FROM `koppel_user_eten` WHERE `gebruiker_ID` = ?;");
$stmt->bind_param("s", $userid);

$stmt->execute();
$stmt->close();

// Delete sport data
$stmt = $conn->prepare("DELETE FROM `koppel_user_sport` WHERE `gebruiker_ID` = ?;");
$stmt->bind_param("s", $userid);

$stmt->execute();
$stmt->close();

// When everything is done, send the user back to the dashboard
header( 'Location: ../../dashboard.php');
?>