<?php


class SaveForm
{
    function GetData($conn,$Werkplek, $Werkdruk, $Werkdatum, $Slapendatum, $Etendatum, $Drinkendatum, $Drugsdatum, $Sportdatum, $DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol, $EtenNaam, $EtenKcalorie, $EtenSuiker, $DrugsNaam, $DrugsSoort, $SlaapHoeveelheid, $SlaapKwaliteit,$Slaapdatum, $SportNaam, $SportVerbranding,$gebruikersnaam){
        $gebruiker_ID = 0;

        $sql = "SELECT `gebruiker_ID` FROM `gebruiker` WHERE gebruikersnaam=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $gebruikersnaam);
        $stmt->bind_result($gebruiker_ID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();

        //echo $id;

        $this->SaveArbeid($conn,$Werkplek, $Werkdruk,$Werkdatum, $gebruiker_ID);
        $this->SaveDrinken($conn,$DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol, $Drinkendatum,$gebruiker_ID);
        $this->SaveDrugs($conn, $DrugsNaam, $DrugsSoort, $Drugsdatum, $gebruiker_ID);
        $this->SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenKcalorie, $Etendatum, $gebruiker_ID);
        $this->SaveSlaap($conn,$SlaapHoeveelheid, $SlaapKwaliteit, $Slapendatum, $gebruiker_ID);
        $this->SaveSport($conn,$SportNaam, $SportVerbranding, $Sportdatum, $gebruiker_ID);

    }

    function SaveArbeid($conn,$Werkplek, $Werkdruk,$Werkdatum, $gebruiker_ID){
        $arbeid_ID = 0;

        $sql = "INSERT INTO `arbeid`(arbeid_ID, gebruiker_ID, werkplek, werkdruk, datum) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiis", $arbeid_ID, $gebruiker_ID, $Werkplek, $Werkdruk, $Werkdatum);
        $stmt->execute();
        $stmt->close();

    }

    function SaveDrinken($conn,$DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker,$DrinkenAlcohol, $Drinkendatum, $gebruiker_ID){

        $drinken_ID = 0;

        $sql = "INSERT INTO `drinken`(drinken_ID, naam, kcal, suiker, alcohol) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiii", $drinken_ID, $DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol );
        $stmt->execute();
        $Record_ID = $conn->insert_id;
        $stmt->close();


        $stmt = $conn->prepare("INSERT INTO koppel_user_drinks(gebruiker_ID, drinks_ID, datum) VALUES (?,?,?)");
        $stmt->bind_param("iis",$gebruiker_ID, $Record_ID, $Drinkendatum);
        $stmt->execute();
        $stmt->close();
    }

    function SaveDrugs($conn, $DrugsNaam, $DrugsSoort, $Drugsdatum, $gebruiker_ID){

        $drugs_ID = 0;

        $sql = "INSERT INTO `drugs`(drugs_ID, naam, soort) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $drugs_ID,$DrugsNaam, $DrugsSoort);
        $stmt->execute();
        $Record_ID = $conn->insert_id;
        $stmt->close();


        $stmt = $conn->prepare("INSERT INTO koppel_user_drugs(gebruiker_ID, drug_ID, hoeveelheid, datum) VALUES (?,?,?,?)");
        $stmt->bind_param("iiis",$gebruiker_ID, $Record_ID, $DrugsSoort, $Drugsdatum);
        $stmt->execute();
        $stmt->close();
    }

    function SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenKcalorie, $Etendatum, $gebruiker_ID){

        $eten_ID = 0;

        $sql = "INSERT INTO `eten`(eten_ID,naam,kcal,sugar) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isii", $eten_ID, $EtenNaam, $EtenKcalorie, $EtenSuiker);
        $stmt->execute();
        $Record_ID = $conn->insert_id;
        $stmt->close();


        $stmt = $conn->prepare("INSERT INTO koppel_user_eten(gebruiker_ID, eten_ID, datum) VALUES (?,?,?)");
        $stmt->bind_param("iis",$gebruiker_ID,$Record_ID, $Etendatum);
        $stmt->execute();
        $stmt->close();
    }

    function SaveSlaap($conn,$SlaapHoeveelheid, $SlaapKwaliteit, $Slaapdatum, $gebruiker_ID){

        $slaap_ID = 0;

        $sql = "INSERT INTO `slaap`(slaap_ID, gebruiker_ID, uren, beoordeling, datum) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiis", $slaap_ID, $gebruiker_ID, $SlaapHoeveelheid, $SlaapKwaliteit, $Slaapdatum);
        $stmt->execute();
        $stmt->close();

    }

    function SaveSport($conn, $SportNaam, $SportVerbranding, $Sportdatum, $gebruiker_ID){

        $sport_ID = 0;

        $sql = "INSERT INTO `sport`(sport_ID, naam, verbranding) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isi", $sport_ID, $SportNaam, $SportVerbranding);
        $stmt->execute();
        $Record_ID = $conn->insert_id;
        $stmt->close();


        $stmt = $conn->prepare("INSERT INTO koppel_user_sport(gebruiker_ID, sport_ID, datum) VALUES (?,?,?)");
        $stmt->bind_param("iis",$gebruiker_ID,$Record_ID, $Sportdatum);
        $stmt->execute();
        $stmt->close();

    }
}