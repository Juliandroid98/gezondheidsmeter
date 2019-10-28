<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script> alert('U bent nog niet ingelogt.'); window.location.href='inloggen.php';</script>";
}

if($_SESSION['is_admin'] === '0'){
    echo "<script> alert('U bent geen admin.'); window.location.href='dashboard.php';</script>";
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
    <link rel="stylesheet" href="assets/css/admin.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="assets/javascript/index.js"></script>
	<script type="application/javascript" src="assets/javascript/admin.js"></script>
    <title>Gezondheidsmeter - Admin</title>
</head>
<body>
    <div class="sitecontainer">
        <!-- header -->
        <div class="headercontainer">
            <image class="logosmall" src="assets/images/logo.png" alt="logo">
            <h1>Admin</h1>
            <a class="settingsmenu" href="settings.php">
                <image class="settingsimg" src="assets/images/settings.png" alt="settings">
            </a>
        </div>
        <!-- content -->
		<!--welkom op de admin pagina De admin kan iemand admin maken. De admin kan iemand geen admin maken. De admin kan drugs, sport, eten en drinken wijzigen, verwijderen en toevoegen. De admin kan de gebruikers zien.-->
<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=gezondheidsmeter", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    //die("ERROR: Could not connect. " . $e->getMessage());
}
try{
    $sql = "SELECT * FROM gebruiker";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br><b class='tabelTitel'>gebruiker</b><div class='responsiveTable'><table id='gebruiker'>";
            echo "<tr>";
                echo "<th>admin</th>";
                //echo "<th>gebruikers id</th>";
				echo "<th>gebruikersnaam</th>";
                echo "<th>email</th>";
				echo "<th>geboortedatum</th>";
				echo "<th>lengte</th>";
				echo "<th>gewicht</th>";
				echo "<th>geslacht</th>";
				echo "<th>geactiveerd</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
				echo "<td>" . $row['is_admin'] . "</td>";
                //echo "<td>" . $row['gebruiker_ID'] . "</td>";
				echo "<td>" . $row['gebruikersnaam'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['geboortedatum'] . "</td>";
				echo "<td>" . $row['lengte'] . "</td>";
				echo "<td>" . $row['gewicht'] . "</td>";
				echo "<td>" . $row['geslacht'] . "</td>";
				echo "<td>" . $row['geactiveerd'] . "</td>";
				echo "<td><img id='penciltrash' onclick='addRowForEdit(" . $row['gebruiker_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='refreshAdmin.php' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderID' value='" . $row['gebruiker_ID'] . "'><input id='penciltrash' type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
			echo "</tr>";
			echo "<tr id='addRowEdit".$row['gebruiker_ID']."' style='display: none;'>";
				echo "<form action='refreshAdmin.php' method='post'>";
				echo "<td><input id='editRecord' type='text' name='isAdmin' value='" . $row['is_admin'] . "'></td>";
                echo "<input id='editRecord' type='hidden' name='gebruikerID' value='" . $row['gebruiker_ID'] . "'>";
				echo "<td><input id='editRecord' type='text' name='gebruikersnaam' value='" . $row['gebruikersnaam'] . "'></td>";
                echo "<td><input id='editRecord' type='text' name='email' value='" . $row['email'] . "'></td>";
				echo "<td><input id='editRecord' type='text' name='geboortedatum' value='" . $row['geboortedatum'] . "'></td>";
				echo "<td><input id='editRecord' type='text' name='lengte' value='" . $row['lengte'] . "'></td>";
				echo "<td><input id='editRecord' type='text' name='gewicht' value='" . $row['gewicht'] . "'></td>";
				echo "<td><input id='editRecord' type='text' name='geslacht' value='" . $row['geslacht'] . "'></td>";
				echo "<td><input id='editRecord' type='text' name='geactiveerd' value='" . $row['geactiveerd'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
        }
		echo "<form action='refreshAdmin.php' method='post'>
		<tr id='addRowGebruiker' style='display: none;'><td>
		<input type='text' placeholder='gebruikersnaam' name='gebruiker'></td>
		<td><input type='text' placeholder='wachtwoord' name='wachtwoord'></td>
		<td><input type='text' placeholder='email' name='email'></td>
		<td><input type='text' placeholder='geboortedatum' name='geboortedatum'></td>
		<td><input type='text' placeholder='lengte' name='lengte'></td>
		<td><input type='text' placeholder='gewicht' name='gewicht'></td>
		<td><input type='text' placeholder='geslacht' name='geslacht'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr class='toevoegen'><td>toevoegen</td>
		<td><img id='penciltrash' class='bottomimg' src='assets/images/plus.png' onclick='addRowForInput();'></td></tr>";
		echo "</table></div>";
        // Free result set
        unset($result);
    } else{
        //echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    $sql = "SELECT * FROM drugs";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br><b class='tabelTitel'>drugs</b><div class='responsiveTable'><table id='drugs'>";
            echo "<tr>";
                //echo "<th>drugs id</th>";
                echo "<th>drugsnaam</th>";
				echo "<th>soort</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                //echo "<td>" . $row['drugs_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
				echo "<td>" . $row['soort'] . "</td>";
				echo "<td><img id='penciltrash' onclick='addRowForEditDrugs(" . $row['drugs_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='refreshAdmin.php' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDdrugs' value='" . $row['drugs_ID'] . "'><input id='penciltrash' type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditDrugs".$row['drugs_ID']."' style='display: none;'>";
				echo "<form action='refreshAdmin.php' method='post'>";
				echo "<input id='editRecordDrugs' type='hidden' name='drugs_ID' value='" . $row['drugs_ID'] . "'>";
                echo "<td><input id='editRecordDrugs' type='text' name='naam' value='" . $row['naam'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='soort' value='" . $row['soort'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
			
        }
		echo "<form action='refreshAdmin.php' method='post'>
		<tr id='addRowDrugs' style='display: none;'><td>
		<input type='text' placeholder='drugsnaam' name='drugsnaam'></td>
		<td><input type='text' placeholder='soort' name='soort'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr class='toevoegen'><td>toevoegen</td><td><img id='penciltrash' class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputDrugs();'></td></tr>";
		echo "</table></div>";
        // Free result set
        unset($result);
    } else{
        //echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


 
try{
    $sql = "SELECT * FROM eten";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br><b class='tabelTitel'>eten</b><div class='responsiveTable'><table id='eten'>";
            echo "<tr>";
                //echo "<th>eten id</th>";
                echo "<th>etennaam</th>";
                echo "<th>kcal</th>";
				echo "<th>schijf id</th>";
                echo "<th>suiker gram</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                //echo "<td>" . $row['eten_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['kcal'] . "</td>";
				echo "<td>" . $row['schijf_ID'] . "</td>";
                echo "<td>" . $row['sugar'] . "</td>";
				echo "<td><img id='penciltrash' onclick='addRowForEditEten(" . $row['eten_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='refreshAdmin.php' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input id='penciltrash' type='hidden' name='verwijderIDeten' value='" . $row['eten_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditEten".$row['eten_ID']."' style='display: none;'>";
				echo "<form action='refreshAdmin.php' method='post'>";
				echo "<input id='editRecordDrugs' type='hidden' name='Editeten_ID' value='" . $row['eten_ID'] . "'>";
                echo "<td><input id='editRecordDrugs' type='text' name='EditEtennaam' value='" . $row['naam'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='EditEtenkcal' value='" . $row['kcal'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='EditEtenschijf_ID' value='" . $row['schijf_ID'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='EditEtensugar' value='" . $row['sugar'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
        }
		echo "<form action='refreshAdmin.php' method='post'>
		<tr id='addRowEten' style='display: none;'><td>
		<input type='text' placeholder='naam' name='AddEtennaam'></td>
		<td><input type='text' placeholder='kcal' name='AddEtenkcal'></td>
		<td><input type='text' placeholder='schijf' name='AddEtenschijf_ID'></td>
		<td><input type='text' placeholder='suiker' name='AddEtensugar'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr class='toevoegen'><td>toevoegen</td><td><img id='penciltrash' class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputEten();'></td></tr>";
		echo "</table></div>";
        // Free result set
        unset($result);
    } else{
        //echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    $sql = "SELECT * FROM drinken";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br><b class='tabelTitel'>drinken</b><div class='responsiveTable'><table id='drinken'>";
            echo "<tr>";
                //echo "<th>drank id</th>";
                echo "<th>dranknaam</th>";
                echo "<th>kcal</th>";
				echo "<th>suiker gram</th>";
                echo "<th>alcoholpercentage</th>";
                echo "<th>schijf id</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                //echo "<td>" . $row['drinken_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['kcal'] . "</td>";
				echo "<td>" . $row['suiker'] . "</td>";
                echo "<td>" . $row['alcohol'] . "</td>";
                echo "<td>" . $row['schijf_ID'] . "</td>";
				echo "<td><img id='penciltrash' onclick='addRowForEditDrinken(" . $row['drinken_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='refreshAdmin.php' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDdrinken' value='" . $row['drinken_ID'] . "'><input id='penciltrash' type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditDrinken".$row['drinken_ID']."' style='display: none;'>";
				echo "<form action='refreshAdmin.php' method='post'>";
				echo "<input id='' type='hidden' name='drinken_ID' value='" . $row['drinken_ID'] . "'>";
                echo "<td><input id='' type='text' name='naam' value='" . $row['naam'] . "'></td>";
                echo "<td><input id='' type='text' name='kcal' value='" . $row['kcal'] . "'></td>";
				echo "<td><input id='' type='text' name='suiker' value='" . $row['suiker'] . "'></td>";
				echo "<td><input id='' type='text' name='alcohol' value='" . $row['alcohol'] . "'></td>";
				echo "<td><input id='' type='text' name='schijf_ID' value='" . $row['schijf_ID'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
        }
		echo "<form action='refreshAdmin.php' method='post'>
		<tr id='addRowDrinken' style='display: none;'><td>
		<input type='text' placeholder='naam' name='naam'></td>
		<td><input type='text' placeholder='kcal' name='kcal'></td>
		<td><input type='text' placeholder='schijf' name='schijf_ID'></td>
		<td><input type='text' placeholder='suiker' name='sugar'></td>
		<td><input type='text' placeholder='alcohol' name='alcohol'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr class='toevoegen'><td>toevoegen</td><td><img id='penciltrash' class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputDrinken();'></td></tr>";
		echo "</table></div>";
        // Free result set
        unset($result);
    } else{
        //echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>

        <!-- bottom buttons-->
        <div class="bottomcontainer">
            <div class="bottombuttongroup">
                <a class="bottombutton" href="dashboard.php"><img class="bottomimg" src="assets/images/dashboard.png" alt="dashboard"></a>
                <a class="bottombutton" href="vragenformulier.php"><img class="bottomimg" src="assets/images/questions.png" alt="vragenformulier"></a>
                <a class="bottombutton" href="meldingen.php"><img class="bottomimg" src="assets/images/notifications.png" alt="meldingen"></a>
            </div>
        </div>
    </div>
</body>
</html>