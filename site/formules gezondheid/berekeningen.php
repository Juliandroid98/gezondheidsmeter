<?php
$werkplek;
$werkdruk;
$gewicht;
$lengte;
$leeftijd;
$verbranding;
$slaapkwaliteit;
$sportDuur;
$hoeveel;

$arbeid = $werkplek + $werkdruk / 2;

if($user = 'man'){
    $voeding = (88.362 + (13.397 * $gewicht) + (4.799 * $lengte) - (5.677 * $leeftijd)) * $verbranding / 1000;
}
if($user = 'vrouw'){
    $voeding = (447.593 + (9.247  * $gewicht) + (3.098 * $lengte) - (4.330  * $leeftijd)) * $verbranding / 1000;
}

$softdrugs = 5;
$harddrugs = 0.5;

$slaap = 8 + $slaapkwaliteit / 2;

$sport = 12.25 * $sportDuur * $gewicht;

if($user = 'man'){
    $alcohol = ($hoeveel / 250 * 10) / ($gewicht * 0.7) * ($gewicht * 0.002);
}

if($user = 'vrouw') {
    $alcohol = ($hoeveel / 250 * 10) / ($gewicht * 0.5) * ($gewicht * 0.002);
}
?>