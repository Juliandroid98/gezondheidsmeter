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
            <div class="tab">Beoordeel uw werkplek?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
            </div>

            <div class="tab">Beoordeel uw werkdruk?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Datum
              <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
              <p><input placeholder="mm" oninput="this.className = ''" name="mm"></p>
              <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">1</span>
              <span class="step">2</span>
              <span class="step">3</span>
            </div>

            <div style="overflow:auto;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>

          <!-- Drinken -->
          <h3>Drinken</h3>
            <div class="tab">Wat is de naam van de drank?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
            </div>

            <div class="tab">Wat is de kilocalorie?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Hoeveel gram suiker zit erin?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Hoeveel % alcohol zit erin?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Datum
              <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
              <p><input placeholder="mm" oninput="this.className = ''" name="mm"></p>
              <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">1</span>
              <span class="step">2</span>
              <span class="step">3</span>
              <span class="step">4</span>
              <span class="step">5</span>
            </div>

            <div style="overflow:auto;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>

          <!-- Eten -->
          <h3>Eten</h3>
            <div class="tab">Wat is de naam van het voedsel?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
            </div>

            <div class="tab">Wat is de kilocalorie?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Hoeveel gram suiker zit erin?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Datum
              <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
              <p><input placeholder="mm" oninput="this.className = ''" name="mm"></p>
              <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">1</span>
              <span class="step">2</span>
              <span class="step">3</span>
              <span class="step">4</span>
            </div>

            <div style="overflow:auto;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>

          <!-- Drugs -->
          <h3>Drugs</h3>
            <div class="tab">Wat is de naam van de drugs?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
            </div>

            <div class="tab">Hoeveel mg heeft u gebruikt?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Datum
              <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
              <p><input placeholder="mm" oninput="this.className = ''" name="mm"></p>
              <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">1</span>
              <span class="step">2</span>
              <span class="step">3</span>
            </div>

            <div style="overflow:auto;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>

          <!-- Slaap -->
          <h3>Slaap</h3>
            <div class="tab">Hoeveek uren heeft u geslapen?
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkplek"></p>
            </div>

            <div class="tab">Beoordeel uw slaap.
              <p><input placeholder="vul hier uw antwoord in.." oninput="this.className = ''" name="werkdruk"></p>
            </div>

            <div class="tab">Datum
              <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
              <p><input placeholder="mm" oninput="this.className = ''" name="mm"></p>
              <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
            </div>

            <div style="text-align:center;margin-top:40px;">
              <span class="step">1</span>
              <span class="step">2</span>
              <span class="step">3</span>
            </div>

            <div style="overflow:auto;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>

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