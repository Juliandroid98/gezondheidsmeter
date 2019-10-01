<?php
include 'assets/php/Connection.php';
    if(!isset($_GET)){
        header( 'Location: index.php');
    }
    if($_GET['uniekid'] == 0){
        header('Location: index.php');
    }
    if($_POST){

        $email = $_GET['email'];
        $uniekid = $_GET['uniekid'];

        $query = "SELECT gebruikersnaam, gebruiker_id FROM gebruiker WHERE email ='$email' AND activeerid='$uniekid'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        $gebruikersnaam = $data['gebruikersnaam'];
        $id = $data['gebruiker_id'];

        if(isset($data['gebruikersnaam']) && isset($data['gebruiker_id'])){

            $sql = "UPDATE gebruiker SET geactiveerd= '1' , activeerid= '0' WHERE email = '$email'";

            mysqli_query($conn, $sql);

            session_start();
            $_SESSION['username'] = $gebruikersnaam;
            $_SESSION['id'] = $id;

            header( 'Location: index.php');
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
    <link rel="stylesheet" href="assets/css/account_activeren.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Succesvol</title>
</head>
<body>
<div class="sitecontainer">
    <!-- header -->
    <div class="headercontainer">
        <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Activatie</h1>
            <a style="visibility:hidden;" href="settings.php">
                <image class="settingsmenu" src="assets/images/settings.png" alt="settings">
            </a>
    </div>
    <!-- content -->
    <div class="center">
        Klik op deze knop om uw account te activeren.<br>
        <form class="form" action="" method="POST">
            <input class="button" type="submit" name="activate" value="Account activeren">
        </form>
    </div>
</div>
</body>
</html>