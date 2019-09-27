<?php
    include 'assets/php/Connection.php';
if (isset($_POST["username"])) {

    if (isset($_POST["username"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {

        $wachtwoord = $_POST["password"];
        $gebruikersnaam = $_POST["username"];


        $error = "";
        $sql = "SELECT wachtwoord, gebruiker_id FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if (password_verify($wachtwoord, $row['wachtwoord'])){
            session_start();
            $_SESSION['username'] = $gebruikersnaam;
            $_SESSION['id'] = $row['gebruiker_id'];
            header( 'Location: index.php');

        }
    } else {
        $error = '<h3 style="color: darkred">niet alles is ingevult</h3>';
    }



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
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/inloggen.css">
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Inloggen</title>
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
        <form class="form" action="" method="POST">
            <input class="inputfield" type="text" name="username" placeholder="Gebruikersnaam">
            <input class="inputfield" type="password" name="password" placeholder="Wachtwoord"><br>
            <input class="submitbutton" type="submit" name="inloggen" value="Inloggen">
        </form>
    </div>
</body>
</html>