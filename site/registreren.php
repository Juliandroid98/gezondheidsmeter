<?php

include 'assets/php/Connection.php';
if (isset($_POST["username"])){

    session_start();

// initializing variables
    $gebruikersnaam = "";
    $email = "";
    $wachtwoord = "";
    $length = "";
    $weight = "";
    $gender = "";
    $errors = array();


    $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['username']);
    $wachtwoord = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $datum = mysqli_real_escape_string($conn, $_POST['date']);
    $length = mysqli_real_escape_string($conn, $_POST['length']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    if (empty($gebruikersnaam)) { array_push($errors, "U moet een gebruikersnaam invullen."); }
    if (empty($email)) { array_push($errors, "Email moet worden ingevuld."); }
    if (empty($wachtwoord)) { array_push($errors, "Wachtwoord moet worden ingevuld."); }
    if (empty($datum)) { array_push($errors, "Datum moet worden ingevuld."); }
    if (empty($length)) { array_push($errors, "De lengte moet worden ingevuld."); }
    if (empty($weight)) { array_push($errors, "Het gewicht moet worden ingevuld."); }
    if (empty($gender)) { array_push($errors, "Het geslacht moet worden ingevuld."); }

    $user_check_query = "SELECT * FROM gebruiker WHERE gebruikersnaam ='$gebruikersnaam' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $gebruikersnaam) {
            array_push($errors, "Gebruikersnaam bestaat al.");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email bestaat al.");
        }
    }

    if (count($errors) == 0) {
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

        $query = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord, email, geboortedatum, lengte, gewicht, geslacht) 
  			  VALUES('$gebruikersnaam', '$wachtwoord', '$email', '$datum', '$length', '$weight', '$gender')";

        mysqli_query($conn, $query);

        $user_check_query = "SELECT * FROM gebruiker WHERE gebruikersnaam ='$gebruikersnaam' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $gebruiker = mysqli_fetch_assoc($result);



        $to = $email;
        $subject = "Account activeren";

        $message = "
        <html>
        <head>
        <title>Account activeren</title>
        </head>
        <body>
        <p>Bedankt voor het aanmaken van een account, maar voordat u kunt inloggen moet u uw account activeren u kunt dat hier doen</p>
        <br>
        <a ></a>
        </body>
        </html>
        ";


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@gmail.com>' . "\r\n";

        mail($to,$subject,$message,$headers);

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
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/registreren.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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
        <form class="form" action="" method="POST">
            <input class="inputfield" type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" placeholder="Gebruikersnaam">
            <input class="inputfield" type="password" name="password" value="<?php echo isset($_POST['username']) ? $_POST['password'] : '' ?>" placeholder="password">
            <input class="inputfield" type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
            <input class="inputfield" type="date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : '' ?>" placeholder="Geboortedatum">
            <input class="inputfield" type="number" name="length" value="<?php echo isset($_POST['length']) ? $_POST['length'] : '' ?>" placeholder="Lengte">
            <input class="inputfield" type="number" name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>" placeholder="Gewicht">
            <input type="radio" name="gender" value="male"> Man
            <input type="radio" name="gender" value="female"> Vrouw
            <input type="radio" name="gender" value="other"> Anders<br>
            <input class="submitbutton" type="submit" name="inloggen" value="Registreren"><br>
        </form>
    </div>
</body>
</html>