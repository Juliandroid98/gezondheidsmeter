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
    <link rel="stylesheet" href="assets/css/registreren.css">
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Registreren</title>
</head>
<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
        <a href="index.php">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
        </a>
        </div>
        <!-- content -->
        <form class="form" action="assets/php/registratie.php" method="POST">
            <input class="inputfield" type="text" name="username" placeholder="Gebruikersnaam">
            <input class="inputfield" type="password" name="password" placeholder="Wachtwoord">
            <input class="inputfield" type="email" name="email" placeholder="Email">
            <input class="inputfield" type="date" name="date" placeholder="Geboortedatum">
            <input class="inputfield" type="number" name="length" placeholder="Lengte">
            <input class="inputfield" type="number" name="weight" placeholder="Gewicht"><br>
            <input class="submitbutton" type="submit" name="inloggen" value="Registreren"><br>
        </form>
    </div>
</body>
</html>