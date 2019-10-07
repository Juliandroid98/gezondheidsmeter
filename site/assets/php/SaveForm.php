<?php


    class SaveForm
    {
        function GetData($conn,$Werkplek, $Werkdruk, $DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol, $EtenNaam, $EtenCalorie, $EtenSuiker, $DrugsNaam, $DrugsHoeveelheid, $SlaapHoeveelheid, $SlaapKwaliteit, $SportNaam, $SportVerbranding,$gebruikersnaam){
            $gebruiker_ID = 0;

            $sql = "SELECT `gebruiker_ID` FROM `gebruiker` WHERE gebruikersnaam=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $gebruikersnaam);
            $stmt->bind_result($gebruiker_ID);
            $stmt->execute();
            $stmt->store_result();
            $stmt->fetch();

            //echo $id;

            $this->SaveArbeid($conn,$Werkplek, $Werkdruk, $gebruiker_ID);
            $this->SaveDrinken($conn,$DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol,$gebruiker_ID);
            $this->SaveDrugs($conn, $DrugsNaam, $DrugsHoeveelheid, $gebruiker_ID);
            $this->SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenCalorie,$gebruiker_ID);

        }

        function SaveArbeid($conn,$Werkplek, $Werkdruk, $gebruiker_ID){
            $arbeid_ID = 0;
            $datum = 0;

            $sql = "INSERT INTO `arbeid`(arbeid_ID, gebruiker_ID, werkplek, werkdruk, datum) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iiiis", $arbeid_ID, $gebruiker_ID, $Werkplek, $Werkdruk, $datum);
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();

        }

        function SaveDrinken($conn,$DrinkenNaam,$DrinkenKcalorie, $DrinkenSuiker,$DrinkenAlcohol,$gebruiker_ID){

            $DrinkenKcalorie = 0;
            $datum = 0;
            $drinken_ID = 0;
            $gebruiker_ID= 0;

            $sql = "INSERT INTO `drinken`(drinken_ID, naam, kcal, suiker, alcohol) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isiii", $drinken_ID, $DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol );
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO koppel_user_drinks(gebruiker_ID, drinks_ID, datum) VALUES (?,?,?)");
            $stmt->bind_param("iis",$gebruiker_ID, $Record_ID, $datum);
            $stmt->execute();
            $stmt->close();
        }

        function SaveDrugs($conn, $DrugsNaam, $DrugsHoeveelheid, $gebruiker_ID){

            $drugs_ID
            $soort

            $sql = "INSERT INTO `drugs`(drugs_ID, naam, soort) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $drugs_ID,$DrugsNaam, $soort);
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO koppel_user_drinks(gebruiker_ID, drinks_ID, datum) VALUES (?,?,?)");
            $stmt->bind_param("iis",$gebruiker_ID, $Record_ID, $DrugsHoeveelheid, $datum);
            $stmt->execute();
            $stmt->close();
        }

        function SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenCalorie,$id){

            $sql = "INSERT INTO `food`(name,kcal) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sii", $EtenNaam,$EtenSuiker, $EtenCalorie);
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO koppel_user_eten(user_ID,eten_ID) VALUES (?,?)");
            $stmt->bind_param("ii",$id,$Record_ID);
            $stmt->execute();
            $stmt->close();
        }
    }