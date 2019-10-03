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
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
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
        <form id="regForm" action="">
            <!-- Werkplek -->
            <h3>Werkplek</h3>
                <div class="tab">Vind u uw huidige werkplek prettig?
                    <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
                </div>
                <div class="tab">Hoe vind u uw werkdruk?
                <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
                </div>
                <div class="tab">Datum
                    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Drinken -->
                <h3>Drinken</h3>
                <div class="tab">Wat is de naam van de drank?
                    <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
                </div>
                <div class="tab">Wat is de kilocalorie?
                <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
                </div>
                <div class="tab">Datum
                    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                </div>

                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>

            <!-- <h3>Drinken</h3>
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
                <input type="text" id="vr16" name="vraag16" placeholder="vul hier uw antwoord in..">
        
            <input type="submit" value="Submit"> -->
        </form>

        <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
      
        function showTab(n) {
          // This function will display the specified tab of the form...
          var x = document.getElementsByClassName("tab");
          x[n].style.display = "block";
          //... and fix the Previous/Next buttons:
          if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
          } else {
            document.getElementById("prevBtn").style.display = "inline";
          }
          if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
          } else {
            document.getElementById("nextBtn").innerHTML = "Next";
          }
          //... and run a function that will display the correct step indicator:
          fixStepIndicator(n)
        }
      
        function nextPrev(n) {
          // This function will figure out which tab to display
          var x = document.getElementsByClassName("tab");
          // Exit the function if any field in the current tab is invalid:
          if (n == 1 && !validateForm()) return false;
          // Hide the current tab:
          x[currentTab].style.display = "none";
          // Increase or decrease the current tab by 1:
          currentTab = currentTab + n;
          // if you have reached the end of the form...
          if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
          }
          // Otherwise, display the correct tab:
          showTab(currentTab);
        }
      
        function validateForm() {
          // This function deals with validation of the form fields
          var x, y, i, valid = true;
          x = document.getElementsByClassName("tab");
          y = x[currentTab].getElementsByTagName("input");
          // A loop that checks every input field in the current tab:
          for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;
            }
          }
          // If the valid status is true, mark the step as finished and valid:
          if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
          }
          return valid; // return the valid status
        }
      
        function fixStepIndicator(n) {
          // This function removes the "active" class of all steps...
          var i, x = document.getElementsByClassName("step");
          for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
          }
          //... and adds the "active" class on the current step:
          x[n].className += " active";
        }
        </script>
        
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