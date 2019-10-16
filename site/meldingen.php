<?php include 'assets/php/connection.php';
session_start();


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
    <link rel="stylesheet" href="assets/css/meldingen.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <title>Gezondheidsmeter - Meldingen</title>
</head>

<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h2>Meldingen</h2>
            <a class="settingsmenu" href="settings.php">
                <image class="settingsimg" src="assets/images/settings.png" alt="settings">
            </a>
        </div>

        <!-- content -->
        <?php
        // Query to select the notification based on the user who is logged in
        $sql = "SELECT `melding` FROM `melding` WHERE `gebruiker_ID` = " . $_SESSION["id"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="melding icon"><p>' . $row["melding"] . '</p></div>';
            }
        } else {
            echo '<div class="melding icon2"><p>U heeft op dit moment geen meldingen.</p></div>';
        }
        ?>

         <!-- bottom buttons-->
         <div class="bottomcontainer">
            <div class="bottombuttongroup">
                <a class="bottombutton" href="dashboard.php"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
                <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
                <a class="bottombutton_active" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
            </div>
        </div>
    </div>
</body>
</html>


