<?php

$arbeidsomstandigheden = "";
$sport = "";
$eten = "";
$drinken = "";
$slapen = "";
$drugs = "";

$arbeidsomstandigheden = $werkplek + $werkdruk / 2;
$sport = $verbrandingswaarde * $uren;
$eten = $soorteten + $calorie;
$drinken = $drinkensoort + $calorie;
$slapen = $kwaliteit;
$drugs = $soortdrugs;
?>