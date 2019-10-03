<?php
include 'assets/php/Connection.php';
session_start();

if(isset($_SESSION['username'])){
    echo "<script> alert('U bent al ingelogt.'); window.location.href='dashboard.php';</script>";
}


if(!$_GET){

}

if($_POST){
    $email = $_GET['email'];
    $vergeet_id = $_GET['uniekid'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['repeatpassword'];
    if($password == $passwordrepeat){
        $user_check_query = "SELECT email, ww_vergeet_id, gebruiker, gebruiker_ID FROM gebruiker WHERE email='$email' AND ww_vergeet_id= '$vergeet_id'";
        $result = mysqli_query($conn, $user_check_query);
        $gebruiker = mysqli_fetch_assoc($result);\

        if($email == $gebruiker['email'] && $vergeet_id == $gebruiker['ww_vergeet_id']){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE gebruiker SET wachtwoord = '$password', ww_vergeet_id = '' WHERE email = '$email'";

            mysqli_query($conn, $sql);
            $_SESSION['username'] = $gebruiker['gebruiker'];
            $_SESSION['id'] = $gebruiker['gebruiker_ID'];
            header( 'Location: dashboard.php');
        }
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
    <link rel="stylesheet" href="assets/css/ww_nieuw.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - wachtwoord vergeten</title>
</head>
<body>
<div class="sitecontainer">
    <!-- header -->
    <div class="headercontainer">
        <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h2>Wachtwoord reset</h2>
            <a style="visibility:hidden;" href="settings.php">
                <image class="settingsmenu" src="assets/images/settings.png" alt="settings">
            </a>
    </div>
    <!-- content -->
    <div class="center">
        Voer hier uw nieuwe wachtwoord in.<br>
        <form class="form" action="" method="POST">
            <input class="inputfield" type="password" name="password" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>" placeholder="Wachtwoord">
            <input class="inputfield" type="password" name="repeatpassword" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>" placeholder="Herhaal wachtwoord">
            <input class="button" type="submit" name="request" value="Wachtwoord resetten">
        </form>
    </div>
</div>
</body>
</html>
