<?php
session_start();

if(!isset($_SESSION['username'])){
    echo "<script> alert('U bent nog niet ingelogt.'); window.location.href='inloggen.php';</script>";
}

require 'assets/php/Connection.php';
require 'assets/php/SaveForm.php';

$Class = new SaveForm();
//$Class = new getDrinksFoodData();

if (isset($_POST['submit'])){
    $Werkplek = $conn->real_escape_string(htmlspecialchars($_POST['werkplek']));
    $Werkdruk = $conn->real_escape_string(htmlspecialchars($_POST['werkdruk']));
    $Werkdatum = $conn->real_escape_string(htmlspecialchars($_POST['datum']));
    $DrinkenNaam = $conn->real_escape_string(htmlspecialchars($_POST['drankNaam']));
    $DrinkenKcalorie = $conn->real_escape_string(htmlspecialchars($_POST['drankCalorie']));
    $DrinkenSuiker = $conn->real_escape_string(htmlspecialchars($_POST['drankSuiker']));
    $DrinkenAlcohol = $conn->real_escape_string(htmlspecialchars($_POST['drankAlcohol']));
    $EtenNaam = $conn->real_escape_string(htmlspecialchars($_POST['etenNaam']));
    $EtenKcalorie = $conn->real_escape_string(htmlspecialchars($_POST['etenCalorie']));
    $EtenSuiker = $conn->real_escape_string(htmlspecialchars($_POST['etenSuiker']));
    $DrugsNaam = $conn->real_escape_string(htmlspecialchars($_POST['drugsNaam']));
    $DrugsSoort = $conn->real_escape_string(htmlspecialchars($_POST['drugsSoort']));
    $SlaapHoeveelheid = $conn->real_escape_string(htmlspecialchars($_POST['slaapHoeveelheid']));
    $SlaapKwaliteit = $conn->real_escape_string(htmlspecialchars($_POST['slaapKwaliteit']));
    $Slaapdatum = $conn->real_escape_string(htmlspecialchars($_POST['datum']));
    $SportNaam = $conn->real_escape_string(htmlspecialchars($_POST['sportNaam']));
    $SportVerbranding = $conn->real_escape_string(htmlspecialchars($_POST['sportVerbranding']));

    $Class->GetData($conn,$Werkplek, $Werkdruk,$Werkdatum, $DrinkenNaam, $DrinkenKcalorie, $DrinkenSuiker, $DrinkenAlcohol, $EtenNaam, $EtenKcalorie, $EtenSuiker, $DrugsNaam, $DrugsSoort, $SlaapHoeveelheid, $SlaapKwaliteit,$Slaapdatum, $SportNaam, $SportVerbranding, $_SESSION['username']);
    header( "Location: dashboard.php" );
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="gezondheidsmeter">
    <meta name="authors" content="Joel, Julian, Jeremy, Miquel, Tiffany & Rens">
    <meta name="keywords" content="gezondheid, meter, gezondheidsmeter, gezond leven, eten, slaap, drugs, drinken">
    <link rel="icon" href="assets/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/form.js"></script>
    <title>Gezondheidsmeter - Vragenformulier</title>
</head>
    <body>
        <div class="sitecontainer">
            <!-- header -->
            <div class="headercontainer">
                <image class="logosmall" src="assets/images/logo.png" alt="logo">
                <h2>Vragenformulier</h2>
                <a class="settingsmenu" href="settings.php">
                    <image class="settingsimg" src="assets/images/settings.png" alt="settings">
                </a>
            </div>
            <!-- content -->
            <form id="regForm" action="vragenformulier.php" method="post">
              <!-- Werkplek -->
              <div id="werkVragen" class="">
                  <h3>Werkplek</h3>
                  Beoordeel uw werkplek:
                  <p>
                      <input placeholder="vul hier uw beoordeling van 1 tot 10.." required size="3" minlength="0" maxlength="2" name="werkplek">
                  </p>

                  Beoordeel uw werkdruk:
                  <p>
                      <input placeholder="vul hier uw beoordeling van 1 tot 10.." required size="3" minlength="0" maxlength="2" name="werkdruk">
                  </p>

                  Datum:
                  <p>
                      <input placeholder="vul hier de huidige datum in.." type="date" name="datum">
                  </p>
                  <div style="text-align:center;margin-top:40px;">
                      <span class="step">1/6</span>
                  </div>
            </div>

            <!-- Drinken -->
            <div id="drinkenVragen" class="hidden">
            <h3>Drinken</h3>

            <div id="dynamic_field">Welke drank(en)heeft u gehad?
                <p><input placeholder="vul hier uw antwoord in.." name="drankNaam"></p>
            </div>

            Hoeveel kilocalorieën zit er erin?
            <p><input placeholder="vul hier uw antwoord in.." name="drankCalorie"></p>

            Hoeveel gram suiker zit erin?
            <p><input placeholder="vul hier uw antwoord in.." name="drankSuiker"></p>

            Hoeveel % alcohol zit erin?
            <p><input placeholder="vul hier uw antwoord in.." name="drankAlcohol"></p>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">2/6</span>
            </div>
          </div>

            <!-- Eten -->
            <div id="etenVragen" class="hidden">
                <h3>Eten</h3>
                Welk eten heeft u gehad?
                <div id="dynamic_field">
                    <p><input placeholder="vul hier uw antwoord in.." name="etenNaam"></p>
                </div>

                Hoeveel kilocalorieën zit er in?
                  <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="etenCalorie"></p>

                Hoeveel gram suiker zit erin?
                  <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="etenSuiker"></p>

                <div style="text-align:center;margin-top:40px;">
                  <span class="step">3/6</span>
                </div>
            </div>

            <!-- Drugs -->
            <div id="drugsVragen" class="hidden">
                <h3>Drugs</h3>
                Welke drugs heeft u gehad?
                <p><select name="drugsNaam">
                    <option value=""></option>
                    <option value="softdrugs">Softdrugs</option>
                    <option value="harddrugs">Harddrugs</option>
                </select><br>
                </p>
                Hoeveel mg heeft u in totaal gebruikt?
                  <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="drugsSoort"></p>

                <div style="text-align:center;margin-top:40px;">
                  <span class="step">4/6</span>
                </div>
            </div>

            <!-- Slaap -->
            <div id="slaapVragen" class="hidden">
                <h3>Slaap</h3>
                Hoeveel uren heeft u geslapen?
                  <p><input placeholder="vul hier uw antwoord in.." required size="3" minlength="0" maxlength="2" name="slaapHoeveelheid"></p>

                Beoordeel uw slaap.
                  <p><input placeholder="vul hier uw beoordeling van 1 tot 10.."  required size="3" minlength="0" maxlength="2" name="slaapKwaliteit"></p>
                Datum:
                <p>
                    <input placeholder="vul hier de huidige datum in.." type="date" name="datum">
                </p>
                <div style="text-align:center;margin-top:40px;">
                    <span class="step">5/6</span>
                </div>
            </div>

            <!-- Sport -->
            <div id="sportVragen" class="hidden">
                <h3>Sport</h3>
                Welke sport heeft u gedaan?
                <p><input placeholder="vul hier uw antwoord in.." name="sportNaam"></p>

                Hoeveel colorieën heb je daarmee verbrandt?
                <p><input placeholder="vul hier uw antwoord in.." name="sportVerbranding"></p>

                <div style="text-align:center;margin-top:30px;">
                  <span class="step">6/6</span>
                </div>
            </div>

            <input type="submit" name="submit" value="Versturen" class="hidden" id="submitButton">
                <div id="prevnext" style="overflow:auto;">
                    <button type="button" id="prevBtn" class="hidden" onclick="PaginaCheck('terug');">Terug</button>
                    <button type="button" id="nextBtn" onclick="PaginaCheck('verder');">Volgende</button>
                </div>
            </form>

            <script src="assets/javascript/form.js"></script>

            <!-- bottom buttons-->
            <div class="bottomcontainer">
                <div class="bottombuttongroup">
                    <a class="bottombutton" href="dashboard.php"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
                    <a class="bottombutton_active" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
                    <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
                </div>
            </div>
        </div>
    </body>
</html>