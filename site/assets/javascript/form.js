// define html dom elements
var divNummer = 1;
var divWerkplek = document.getElementById("werkVragen");
var divDrinken = document.getElementById("drinkenVragen");
var divEten = document.getElementById("etenVragen");
var divDrugs = document.getElementById("drugsVragen");
var divSlaap = document.getElementById("slaapVragen");
var divSport = document.getElementById("slaapVragen");
var submitButton = document.getElementById("submitButton");

// call function on button clicks
function PaginaCheck(c){

    // c = terug of verder

    //console.log(c);
    // switch system to check if divNummer must increase or go down
    switch (c) {
        case'terug':
            divNummer--;
            break;
        case'verder':
            divNummer++;
            break;
    }
    // check that divNummer cant go above and under certain values
    if(divNummer >= 4){
        divNummer = 3;
    }

    if(divNummer == 0){
        divNummer = 1;
    }

    // switch system to check which div to show and which one to hide
    switch (divNummer) {
        case 1:
            divDrinken.classList.add("hidden");
            divEten.classList.add("hidden");
            divDrugs.classList.add("hidden");
            divSlaap.classList.add("hidden");
            divSport.classList.add("hidden");
            submitButton.classList.add("hidden");
            break;
        case 2:
            divWerkplek.classList.add("hidden");
            divDrinken.classList.remove("hidden");
            divEten.classList.add("hidden");
            divDrugs.classList.add("hidden");
            divSlaap.classList.add("hidden");
            divSport.classList.add("hidden");
            submitButton.classList.add("hidden");
            break;
        case 3:
            divWerkplek.classList.add("hidden");
            divDrinken.classList.add("hidden");
            divEten.classList.remove("hidden");
            divDrugs.classList.add("hidden");
            divSlaap.classList.add("hidden");
            divSport.classList.add("hidden");
            submitButton.classList.add("hidden");
            break;
        case 4:
            divWerkplek.classList.add("hidden");
            divDrinken.classList.add("hidden");
            divEten.classList.add("hidden");
            divDrugs.classList.remove("hidden");
            divSlaap.classList.add("hidden");
            divSport.classList.add("hidden");
            submitButton.classList.add("hidden");
            break;
        case 5:
            divWerkplek.classList.add("hidden");
            divDrinken.classList.add("hidden");
            divEten.classList.add("hidden");
            divDrugs.classList.add("hidden");
            divSlaap.classList.remove("hidden");
            divSport.classList.add("hidden");
            submitButton.classList.add("hidden");
            break;
        case 6:
            divWerkplek.classList.add("hidden");
            divDrinken.classList.add("hidden");
            divEten.classList.add("hidden");
            divDrugs.classList.add("hidden");
            divSlaap.classList.add("hidden");
            divSport.classList.remove("hidden");
            submitButton.classList.remove("hidden");
            break;
        // case 3:
        //     divEten.classList.add("hidden");
        //     divDrugs.classList.remove("hidden");
        //     submitButton.classList.remove("hidden");
        //     break;
    }

}