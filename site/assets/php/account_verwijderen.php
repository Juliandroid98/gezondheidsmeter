<?php
include 'Connection.php';
session_start();

$userid = (string) $_SESSION["id"];

// Set the user account to deactivated
$stmt = $conn->prepare("UPDATE `gebruiker` SET `geactiveerd` = 0 WHERE `gebruiker_ID` = ? ");
$stmt->bind_param("s", $userid);

$stmt->execute();
$stmt->close();

// When everything is done, send the user back to the dashboard
header( 'Location: ../../logout.php');
?>