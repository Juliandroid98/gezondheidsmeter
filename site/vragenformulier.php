<?php include 'assets/php/connection.php' ?>
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
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Vragenformulier</title>
</head>
<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Vragenformulier</h1>
            <image class="burgermenu" src="assets/images/burgermenu.png" alt="burgermenu">
        </div>
        <!-- content -->
        <form>
            <h3>Werkplek</h3>
                <label for="fname">Vind U uw huidige werkplek prettig?</label>
                <input type="text" id="vrg1" name="vraag1" placeholder="vul hier uw antwoord in..">

                <label for="lname">Hoe vind U uw werkdruk?</label>
                <input type="text" id="vr2" name="vraag2" placeholder="vul hier uw antwoord in..">

            <h3>Drinken</h3>
                <label for="fname">Wat is de naam van de drank?</label>
                <input type="text" id="vrg3" name="vraag3" placeholder="vul hier uw antwoord in..">

                <label for="lname">Wat is de suikerwaarde ervan?</label>
                <input type="text" id="vr4" name="vraag4" placeholder="vul hier uw antwoord in..">

                <label for="lname">Wat is de alcoholpercentage ervan?</label>
                <input type="text" id="vr5" name="vraag5" placeholder="vul hier uw antwoord in..">

                <label for="lname">Hoeveel ml heeft U gedronken?</label>
                <input type="text" id="vr6" name="vraag6" placeholder="vul hier uw antwoord in..">

            <h3>Drugs</h3>
                <label for="lname">Wat is de drugsnaam?</label>
                <input type="text" id="vr7" name="vraag7" placeholder="vul hier uw antwoord in..">

                <label for="lname">Wat voor soort drugs is het?</label>
                <input type="text" id="vr8" name="vraag8" placeholder="vul hier uw antwoord in..">

                <label for="lname">Hoeveel ml heeft U genomen?</label>
                <input type="text" id="vr9" name="vraag9" placeholder="vul hier uw antwoord in..">

            <h3>Voedsel</h3>
                <label for="lname">Wat is de naam van de voedsel?</label>
                <input type="text" id="vr10" name="vraag10" placeholder="vul hier uw antwoord in..">

                <label for="lname">Wat is de suikerwaarde ervan?</label>
                <input type="text" id="vr11" name="vraag11" placeholder="vul hier uw antwoord in..">

                <label for="lname">Hoeveel calorien heeft het?</label>
                <input type="text" id="vr12" name="vraag12" placeholder="vul hier uw antwoord in..">

            <h3>Slaap</h3>
                <label for="lname">Hoeveel uur heeft u geslapen?</label>
                <input type="text" id="vr13" name="vraag13" placeholder="vul hier uw antwoord in..">

                <label for="lname">Welke beoordeling geeft U uw slaap?</label>
                <input type="text" id="vr14" name="vraag14" placeholder="vul hier uw antwoord in..">

            <h3>Sport</h3>
                <label for="lname">Wat voor sport heeft u gedaan?</label>
                <input type="text" id="vr15" name="vraag15" placeholder="vul hier uw antwoord in..">

                <label for="lname">Wat is uw verbrandingswaarde?</label>
                <input type="text" id="vr16" name="vraag16" placeholder="vul hier uw antwoord in..">=
        
            <input type="submit" value="Submit">
        </form>
        <!-- bottom buttons-->
        <div class="bottomcontainer">
        <div class="bottombuttongroup">
                <a class="bottombutton_active" href="#"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
                <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
                <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
            </div>
        </div>
    </div>
</body>
</html>