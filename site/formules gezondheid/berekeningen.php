<?php
/*
$werkplek;
$werkdruk;
$gewicht;
$lengte;
$leeftijd;
$verbranding;
$slaapkwaliteit;
$sportDuur;
$hoeveel;

*/

//arbeid
//------------------------------------------------
//


function arbeid($werkplek, $werkdruk){


    $arbeid = $werkplek + $werkdruk / 2;

    return $arbeid;
}


//------------------------------------------------


//slaap
//-------------------------------------------------
//

function slaap($slaapuren, $slaapkwaliteit){
    switch ($slaapuren) {
        case 0:
        case 1:
        case 2:
            $slaaptijd = 0;
            break;
        case 3:
            $slaaptijd = 2;
            break;
        case 4:
            $slaaptijd = 4;
            break;
        case 5:
            $slaaptijd = 6;
            break;
        case 6:
            $slaaptijd = 8;
            break;
        case 7:
        case 8:
            $slaaptijd = 10;
            break;
        case 9:
        case 10:
            $slaaptijd = 8;
            break;
        case 11:
        case 12:
            $slaaptijd = 7;
            break;
        case 13:
            $slaaptijd = 5;
            break;
        case 14:
            $slaaptijd = 3;
            break;
        case 15:
            $slaaptijd = 2;
        case 16:
            $slaaptijd = 1;
            break;
        case 17:
        case 18:
        case 19:
        case 20:
            $slaaptijd = 0;
            break;
    }

    $slaap = $slaaptijd + $slaapkwaliteit / 2;
    return $slaap;
}





//-------------------------------------------------


//drinken
//-------------------------------------------------
//

function drinken($calorien, $alcohol, $suiker){
    if($alcohol == 0){
        $alcohol_punten = 10;
    }elseif($alcohol <= 6){
        $alcohol_punten = 8;
    }elseif($alcohol <= 20){
        $alcohol_punten = 6;
    }elseif($alcohol <= 40){
        $alcohol_punten = 3;
    }else{
        $alcohol_punten = 0;
    }

    if($calorien == 0){
        $calorie_punten = 10;
    }elseif($calorien <= 30){
        $calorie_punten = 8;
    }elseif($calorien <= 70){
        $calorie_punten = 6;
    }elseif($calorien <= 100){
        $calorie_punten = 4;
    }elseif($calorien <= 150) {
        $calorie_punten = 2;
    }else{
        $calorie_punten = 0;
    }

    if($suiker == 0){
        $suiker_punten = 10;
    }elseif($suiker <= 5){
        $suiker_punten = 8;
    }elseif($suiker <= 10){
        $suiker_punten = 6;
    }elseif($suiker <= 15){
        $suiker_punten = 4;
    }elseif($suiker <= 20){
        $suiker_punten = 2;
    }else{
        $suiker_punten = 0;
    }



    $punten_drinken = $alcohol_punten + $calorie_punten + $suiker_punten / 3;
    return $punten_drinken;
}


//-------------------------------------------------






//Eten
//-------------------------------------------------
//

function eten($calorien, $suiker){
    if($calorien <= 1000){
        $calorie_punten = 0;
    }elseif($calorien <= 1300){
        $calorie_punten = 3;
    }elseif($calorien <= 1500){
        $calorie_punten = 6;
    }elseif($calorien <= 1800) {
        $calorie_punten = 8;
    }elseif($calorien <= 2100 && $calorien >= 1801){
        $calorie_punten = 10;
    }elseif($calorien <= 2200){
        $calorie_punten = 7;
    }elseif($calorien <= 2400){
        $calorie_punten = 5;
    }elseif($calorien <= 2600){
        $calorie_punten = 2;
    }else{
        $calorie_punten = 0;
    }


    if($suiker == 0){
        $suiker_punten = 0;
    }elseif($suiker <= 10){
        $suiker_punten = 2;
    }elseif($suiker <= 20){
        $suiker_punten = 4;
    }elseif($suiker <= 30){
        $suiker_punten = 6;
    }elseif($suiker <= 40){
        $suiker_punten = 8;
    }elseif($suiker >= 50 && $suiker <= 60){
        $suiker_punten = 10;
    }elseif($suiker <= 70){
        $suiker_punten = 8;
    }elseif($suiker <= 80){
        $suiker_punten = 6;
    }elseif($suiker <= 90){
        $suiker_punten = 4;
    }elseif($suiker <= 100){
        $suiker_punten = 2;
    }else{
        $suiker_punten = 0;
    }

    $eten_punten = $suiker_punten + $calorie_punten / 2;
    return $eten_punten;

}

//-------------------------------------------------



//Sport
//-------------------------------------------------
//

function sporten($calorien_verbrand)
{
    if ($calorien_verbrand <= 100) {
        $calorie_punten = 0;
    } elseif ($calorien_verbrand <= 200) {
        $calorie_punten = 2;
    } elseif ($calorien_verbrand <= 350) {
        $calorie_punten = 4;
    } elseif ($calorien_verbrand <= 450) {
        $calorie_punten = 7;
    } elseif ($calorien_verbrand <= 800 && $calorien_verbrand >= 550) {
        $calorie_punten = 10;
    } elseif ($calorien_verbrand <= 900) {
        $calorie_punten = 8;
    } elseif ($calorien_verbrand <= 1000) {
        $calorie_punten = 6;
    } elseif ($calorien_verbrand <= 1400) {
        $calorie_punten = 3;
    } else {
        $calorie_punten = 0;
    }


    return $calorie_punten;
}

//------------------------------------------------


//drugs
//------------------------------------------------
//


function drugs($hoeveelheid_drugs){


    if($hoeveelheid_drugs == 0){
        $drugs_punten = 10;
    }elseif($hoeveelheid_drugs <= 0.2){
        $drugs_punten = 9;
    }elseif($hoeveelheid_drugs <= 0.5){
        $drugs_punten = 7;
    }elseif($hoeveelheid_drugs <= 0.8){
        $drugs_punten = 6;
    }elseif($hoeveelheid_drugs <= 1){
        $drugs_punten = 5;
    }elseif($hoeveelheid_drugs <= 1.2){
        $drugs_punten = 4;
    }elseif($hoeveelheid_drugs <= 1.5){
        $drugs_punten = 3;
    }elseif($hoeveelheid_drugs <= 1.8){
        $drugs_punten = 2;
    }elseif($hoeveelheid_drugs <= 2){
        $drugs_punten = 1;
    }else{
        $drugs_punten = 0;
    }
    return $drugs_punten;
}


//-------------------------------------------------

/*
if($user = 'man'){
    $voeding = (88.362 + (13.397 * $gewicht) + (4.799 * $lengte) - (5.677 * $leeftijd)) * $verbranding / 1000;
}
if($user = 'vrouw'){
    $voeding = (447.593 + (9.247  * $gewicht) + (3.098 * $lengte) - (4.330  * $leeftijd)) * $verbranding / 1000;
}

$softdrugs = 5;
$harddrugs = 0.5;


$sport = 12.25 * $sportDuur * $gewicht;

if($user = 'man'){
    $alcohol = ($hoeveel / 250 * 10) / ($gewicht * 0.7) * ($gewicht * 0.002);
}

if($user = 'vrouw') {
    $alcohol = ($hoeveel / 250 * 10) / ($gewicht * 0.5) * ($gewicht * 0.002);
}



$totale_suiker; // == alle suiker van een persoon van een specifieke dag

//aantal mogen drinken / eten
if($sportDuur >= 0.5 && $sportDuur <= 2){
    if ($user == 'man' OR 'anders' && $totale_suiker >= 61){

    }elseif ($user == 'man' OR 'anders' && $totale_suiker <= 60){

    }elseif ($user == 'vrouw' && $totale_suiker >=51){

    }elseif ($user == 'vrouw' && $totale_suiker <= 50) {

    }
}elseif ($sportDuur >= 2.1){
    if ($user == 'man' OR 'anders' && $totale_suiker >= 61){

    }elseif ($user == 'man' OR 'anders' && $totale_suiker <= 60){

    }elseif ($user == 'vrouw' && $totale_suiker >=51){

    }elseif ($user == 'vrouw' && $totale_suiker <= 50) {

    }
}


*/
