//arbeid
//------------------------------------------------
//

function arbeid(werkplek, werkdruk){


    arbeids = (parseInt(werkplek) + parseInt(werkdruk)) / 2;

    return arbeids;
}

//------------------------------------------------


//slaap
//-------------------------------------------------
//

function slaap(slaapuren, slaapkwaliteit){
    switch (slaapuren) {
        case '0':
        case '1':
        case '2':
            var slaaptijd = 0;
            break;
        case '3':
            slaaptijd = 2;
            break;
        case '4':
            slaaptijd = 4;
            break;
        case '5':
            slaaptijd = 6;
            break;
        case '6':
            slaaptijd = 8;
            break;
        case '7':
        case '8':
            slaaptijd = 10;
            break;
        case '9':
        case '10':
            slaaptijd = 8;
            break;
        case '11':
        case '12':
            slaaptijd = 7;
            break;
        case '13':
            slaaptijd = 5;
            break;
        case '14':
            slaaptijd = 3;
            break;
        case '15':
            slaaptijd = 2;
            break;
        case '16':
            slaaptijd = 1;
            break;
        case '17':
        case '18':
        case '19':
        case '20':
            slaaptijd = 0;
            break;
    }

    slapen = (parseInt(slaaptijd) + parseInt(slaapkwaliteit)) / 2;
    return slapen;
}





//-------------------------------------------------


//drinken
//-------------------------------------------------
//

function drinken(calorien, alcohol, suiker){
    if(alcohol === 0){
        alcohol_punten = 10;
    }else if(alcohol <= 6){
        alcohol_punten = 8;
    }else if(alcohol <= 20){
        alcohol_punten = 6;
    }else if(alcohol <= 40){
        alcohol_punten = 3;
    }else{
        alcohol_punten = 1;
    }

    if(calorien === 0){
        drinken_calorie_punten = 10;
    }else if(calorien <= 30){
        drinken_calorie_punten = 8;
    }else if(calorien <= 70){
        drinken_calorie_punten = 6;
    }else if(calorien <= 100){
        drinken_calorie_punten = 4;
    }else if(calorien <= 150) {
        drinken_calorie_punten = 2;
    }else{
        drinken_calorie_punten = 1;
    }

    if(suiker === 0){
        suiker_punten = 10;
    }else if(suiker <= 5){
        suiker_punten = 8;
    }else if(suiker <= 10){
        suiker_punten = 6;
    }else if(suiker <= 15){
        suiker_punten = 4;
    }else if(suiker <= 20){
        suiker_punten = 2;
    }else{
        suiker_punten = 1;
    }



    punten_drinken = (parseInt(alcohol_punten) + parseInt(drinken_calorie_punten) + parseInt(suiker_punten)) / 3;
    return punten_drinken;
}


//-------------------------------------------------






//Eten
//-------------------------------------------------
//

function eten(calorien, suiker){
    if(calorien <= 1000){
        eten_calorie_punten = 1;
    }else if(calorien <= 1300){
        eten_calorie_punten = 3;
    }else if(calorien <= 1500){
        eten_calorie_punten = 6;
    }else if(calorien <= 1800) {
        eten_calorie_punten = 8;
    }else if(calorien <= 2100 && calorien >= 1801){
        eten_calorie_punten = 10;
    }else if(calorien <= 2200){
        eten_calorie_punten = 7;
    }else if(calorien <= 2400){
        eten_calorie_punten = 5;
    }else if(calorien <= 2600){
        eten_calorie_punten = 2;
    }else{
        eten_calorie_punten = 1;
    }


    if(suiker === 0){
        suiker_punten = 1;
    }else if(suiker <= 10){
        suiker_punten = 2;
    }else if(suiker <= 20){
        suiker_punten = 4;
    }else if(suiker <= 30){
        suiker_punten = 6;
    }else if(suiker <= 40){
        suiker_punten = 8;
    }else if(suiker >= 50 && suiker <= 60){
        suiker_punten = 10;
    }else if(suiker <= 70){
        suiker_punten = 8;
    }else if(suiker <= 80){
        suiker_punten = 6;
    }else if(suiker <= 90){
        suiker_punten = 4;
    }else if(suiker <= 100){
        suiker_punten = 2;
    }else{
        suiker_punten = 1;
    }

    eten_punten = (parseInt(suiker_punten) + parseInt(eten_calorie_punten)) / 2;
    return eten_punten;

}

//-------------------------------------------------



//Sport
//-------------------------------------------------
//

function sporten(calorien_verbrand)
{
    if (calorien_verbrand <= 100) {
        calorie_punten = 1;
    } else if (calorien_verbrand <= 200) {
        calorie_punten = 2;
    } else if (calorien_verbrand <= 350) {
        calorie_punten = 4;
    } else if (calorien_verbrand <= 450) {
        calorie_punten = 7;
    } else if (calorien_verbrand <= 800 && calorien_verbrand >= 550) {
        calorie_punten = 10;
    } else if (calorien_verbrand <= 900) {
        calorie_punten = 8;
    } else if (calorien_verbrand <= 1000) {
        calorie_punten = 6;
    } else if (calorien_verbrand <= 1400) {
        calorie_punten = 3;
    } else {
        calorie_punten = 1;
    }
    return calorie_punten;
}

//------------------------------------------------


//drugs
//------------------------------------------------
//


function drugs(hoeveelheid_drugs)
{
    if(hoeveelheid_drugs === 0){
        drugs_punten = 10;
    }else if(hoeveelheid_drugs <= 0.2){
        drugs_punten = 9;
    }else if(hoeveelheid_drugs <= 0.5){
        drugs_punten = 7;
    }else if(hoeveelheid_drugs <= 0.8){
        drugs_punten = 6;
    }else if(hoeveelheid_drugs <= 1){
        drugs_punten = 5;
    }else if(hoeveelheid_drugs <= 1.2){
        drugs_punten = 4;
    }else if(hoeveelheid_drugs <= 1.5){
        drugs_punten = 3;
    }else if(hoeveelheid_drugs <= 1.8){
        drugs_punten = 2;
    }else if(hoeveelheid_drugs <= 2){
        drugs_punten = 1;
    }else{
        drugs_punten = 1;
    }
    return drugs_punten;
}


//-------------------------------------------------

