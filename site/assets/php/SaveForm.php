<?php


    class SaveForm
    {
        function GetData($conn,$Werkplek, $Werkdruk, $DrinkenNaam, $DrinkenCalorie, $DrinkenSuiker, $DrinkenAlcohol, $EtenNaam, $EtenCalorie, $EtenSuiker, $DrugsNaam, $DrugsHoeveelheid, $SlaapHoeveelheid, $SlaapKwaliteit, $SportNaam, $SportVerbranding,$username){
            $id = 0;

            $sql = "SELECT `ID` FROM `user` WHERE username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->bind_result($id);
            $stmt->execute();
            $stmt->store_result();
            $stmt->fetch();

            //echo $id;

            $this->SaveArbeid($conn,$Werkplek, $Werkdruk, $id);
            $this->SaveDrinken($conn,$DrinkenNaam, $DrinkenCalorie, $DrinkenSuiker, $DrinkenAlcohol,$id);
            $this->SaveDrugs($conn,$Werkplek, $Werkdruk, $id);
            $this->SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenCalorie,$id);
        }

        function SaveDrinken($conn,$DrinkenNaam,$DrinkenSuiker,$DrinkenAlcohol,$DrinkenKcal,$id){

            $user_ID = 0;
            $DrinkenCalorie = 0;
            $datum = 0;

            $sql = "INSERT INTO `drinks`(name,kcal) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $DrinkenNaam, $DrinkenCalorie, $DrinkenSuiker, $DrinkenAlcohol );
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO koppel_user_drinks(user_ID,drinks_ID,datum) VALUES (?,?)");
            $stmt->bind_param("iiis",$user_ID, $Record_ID, $datum);
            $stmt->execute();
            $stmt->close();


        }
        function SaveEten($conn,$EtenNaam,$EtenSuiker,$EtenKcal,$id){

            $sql = "INSERT INTO `food`(name,kcal) VALUES (?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $EtenNaam,$EtenKcal);
            $stmt->execute();
            $Record_ID = $conn->insert_id;
            $stmt->close();


            $stmt = $conn->prepare("INSERT INTO koppel_user_eten(user_ID,eten_ID) VALUES (?,?)");
            $stmt->bind_param("ii",$id,$Record_ID);
            $stmt->execute();
            $stmt->close();
        }
    }