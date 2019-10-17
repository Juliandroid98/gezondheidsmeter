<?php
    include 'assets/php/Connection.php';
    //start session
session_start();
//als er al iemand is ingelogt wordt hij geredirect
if(isset($_SESSION['username'])){
    echo "<script> alert('U bent al ingelogt.'); window.location.href='dashboard.php';</script>";
}

if (isset($_POST["username"])) {
    //kijkt of er iets leeg is
    if (isset($_POST["username"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        //zet de post data in variabelen
        $wachtwoord = $_POST["password"];
        $gebruikersnaam = $_POST["username"];

        //haalt met de gegevens data op uit de database
        $error = "";
        $sql = "SELECT wachtwoord, geactiveerd, gebruiker_ID, is_admin FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        if($row['geactiveerd'] === "1") {
            //checkt of de wachtwoorden hetzelfde zijn
            if (password_verify($wachtwoord, $row['wachtwoord'])) {
                //maakt een session aan met gebruikers data
                session_start();
                $_SESSION['username'] = $gebruikersnaam;
                $_SESSION['id'] = $row['gebruiker_ID'];
                $_SESSION['is_admin'] = $row['is_admin'];
                header('Location: dashboard.php');
            }
        }else{
            echo "<script> alert('U moet uw account nog activeren voor dat u kunt inloggen.')</script>";
        }
    } else {
        echo "<script> alert('Nog niet alle velden zijn ingevuld!!!')</script>";
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
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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
            <input class="inputfield" required type="text" name="username" placeholder="Gebruikersnaam">
            <input class="inputfield" required type="password" name="password" placeholder="Wachtwoord"><br>
            <input class="submitbutton" type="submit" name="inloggen" value="Inloggen">
        </form>
        <a href="ww_vergeten.php">
            <div class="forgotpasswordbutton">Wachtwoord vergeten</div>
        </a>
    </div>
</body>
</html>