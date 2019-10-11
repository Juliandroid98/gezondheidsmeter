<?php include 'assets/php/connection.php';?>
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
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script
    <script type="application/javascript" src="assets/javascript/index.js"></script>
    <title>Gezondheidsmeter - Dashboard</title>
</head>
<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Dashboard</h1>
            <a class="settingsmenu" href="settings.php">
                <image class="settingsimg" src="assets/images/settings.png" alt="settings">
            </a>
        </div>
        <!-- content -->
        <div class="metercontainer">
            <div class="meter arbeid">Arbeid<br>-</div>
            <div class="meter voeding">Voeding<br>-</div>
            <div class="meter drugs">Drugs<br>-</div>
            <div class="meter slaap">Slaap<br>-</div>
            <div class="meter sport">Sport<br>-</div>
            <div class="bigmeter algemeen">Gemiddelde cijfer<br>-</div>
        </div>
        <div class="chart-btnGroup" id="accordion" style="position: relative;">
            <button type="button" class="collapsible">Slaap</button>
            <div class="content" style="margin-bottom: 100px;">
                <canvas id="myChart"></canvas>
            </div>

            <button type="button" class="collapsible">Voeding</button>
            <div class="content" style="margin-bottom: 100px;">
                <canvas id="myCharts"></canvas>
            </div>

            <button type="button" class="collapsible">Slaap</button>
            <div class="content" style="margin-bottom: 100px;">
                <canvas id="myCharts"></canvas>
            </div>

            <button type="button" class="collapsible">Slaap</button>
            <div class="content" style="margin-bottom: 100px;">
                <canvas id="myChart"></canvas>
            </div>

            <button type="button" class="collapsible">Slaap</button>
            <div class="content" style="margin-bottom: 100px;">
                <canvas id="myCharts"></canvas>
            </div>
        </div>
        <!-- bottom buttons-->
        <div class="bottomcontainer">
            <div class="bottombuttongroup">
                <a class="bottombutton_active" href="#"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
                <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
                <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
            </div>
        </div>
    </div>
    <script src="assets/javascript/dashboard.js"></script>
    <script src="assets/javascript/chartjs.js"></script>
</body>
</html>