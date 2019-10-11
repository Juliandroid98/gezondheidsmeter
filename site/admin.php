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
            <image class="settingsmenu" src="assets/images/settings.png" alt="settings">
        </div>
        <!-- content -->
		welkom op de admin pagina De admin kan iemand admin maken. De admin kan iemand geen admin maken. De admin kan drugs, sport, eten en drinken wijzigen, verwijderen en toevoegen. De admin kan de gebruikers zien.
<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=gezondheidsmeter", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
try{
    $sql = "SELECT * FROM gebruiker";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br>gebruiker<div class='responsiveTable'><table id='gebruiker'>";
            echo "<tr>";
                echo "<th>is_admin</th>";
                echo "<th>gebruiker_id</th>";
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
                echo "<td>" . $row['gebruiker_ID'] . "</td>";
				echo "<td>" . $row['gebruikersnaam'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['geboortedatum'] . "</td>";
				echo "<td>" . $row['lengte'] . "</td>";
				echo "<td>" . $row['gewicht'] . "</td>";
				echo "<td>" . $row['geslacht'] . "</td>";
				echo "<td>" . $row['geactiveerd'] . "</td>";
				echo "<td><img onclick='addRowForEdit(" . $row['gebruiker_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderID' value='" . $row['gebruiker_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
			echo "</tr>";
			echo "<tr id='addRowEdit".$row['gebruiker_ID']."' style='display: none;'>";
				echo "<form action='' method='post'>";
				echo "<td><input id='editRecord' type='text' name='isAdmin' value='" . $row['is_admin'] . "'></td>";
                echo "<td><input id='editRecord' type='text' name='gebruikerID' value='" . $row['gebruiker_ID'] . "'></td>";
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
		echo "<form action='' method='post'>
		<tr id='addRowGebruiker' style='display: none;'><td>
		<input type='text' placeholder='gebruikersnaam' name='gebruiker'></td>
		<td><input type='text' placeholder='wachtwoord' name='wachtwoord'></td>
		<td><input type='text' placeholder='email' name='email'></td>
		<td><input type='text' placeholder='geboortedatum' name='geboortedatum'></td>
		<td><input type='text' placeholder='lengte' name='lengte'></td>
		<td><input type='text' placeholder='gewicht' name='gewicht'></td>
		<td><input type='text' placeholder='geslacht' name='geslacht'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr><td>toevoegen</td>
		<td><img class='bottomimg' src='assets/images/plus.png' onclick='addRowForInput();'></td></tr>";
		echo "</table></div>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    $sql = "SELECT * FROM drugs";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br>drugs<table>";
            echo "<tr>";
                echo "<th>drugs_id</th>";
                echo "<th>drugs_naam</th>";
				echo "<th>soort_drugs</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['drugs_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
				echo "<td>" . $row['soort'] . "</td>";
				echo "<td><img class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<td><img class='bottomimg' src='assets/images/rubbish-bin.png'></td>";
            echo "</tr>";
        }
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png'></td></tr>";
		echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    $sql = "SELECT * FROM sport";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br>sport<table>";
            echo "<tr>";
                echo "<th>sport_id</th>";
                echo "<th>sportnaam</th>";
				echo "<th>verbrandingswaarde</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['sport_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
				echo "<td>" . $row['verbranding'] . "</td>";
				echo "<td><img class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<td><img class='bottomimg' src='assets/images/rubbish-bin.png'></td>";
            echo "</tr>";
        }
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png'></td></tr>";
		echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 
try{
    $sql = "SELECT * FROM eten";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br>eten<table>";
            echo "<tr>";
                echo "<th>eten_id</th>";
                echo "<th>etennaam</th>";
				echo "<th>schijf_id</th>";
                echo "<th>suiker_gram</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['eten_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
				echo "<td>" . $row['schijf_ID'] . "</td>";
                echo "<td>" . $row['sugar'] . "</td>";
				echo "<td><img class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<td><img class='bottomimg' src='assets/images/rubbish-bin.png'></td>";
            echo "</tr>";
        }
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png'></td></tr>";
		echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    $sql = "SELECT * FROM drinken";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<br>drinken<table>";
            echo "<tr>";
                echo "<th>drank_id</th>";
                echo "<th>dranknaam</th>";
				echo "<th>suiker_gram</th>";
                echo "<th>alcoholpercentage</th>";
                echo "<th>schijf_id</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['drinken_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
				echo "<td>" . $row['sugar'] . "</td>";
                echo "<td>" . $row['alcohol'] . "</td>";
                echo "<td>" . $row['schijf_ID'] . "</td>";
				echo "<td><img class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<td><img class='bottomimg' src='assets/images/rubbish-bin.png'></td>";
            echo "</tr>";
        }
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png'></td></tr>";
		echo "</table>";
        // Free result set
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM gebruiker WHERE gebruiker_ID = (:verwijderGebruikerID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderGebruikerID', $_POST['verwijderID'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    echo "Record deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
		
try{
    // Create prepared statement
    $sql = "UPDATE gebruiker SET gebruikersnaam = :gebruiker, geboortedatum = :geboortedatum, email = :email WHERE gebruiker_ID = :gebruikerID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':gebruiker', $_POST['gebruikersnaam']);
    $stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':gebruikerID', $_POST['gebruikerID']);
	//$stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
    //$stmt->bindParam(':lengte', $_POST['lengte']);
    //$stmt->bindParam(':gewicht', $_POST['gewicht']);
	//$stmt->bindParam(':geslacht', $_POST['geslacht']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Record updated successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord, email)
	VALUES (:gebruiker, :wachtwoord, :email)";
	//, :geboortedatum, :lengte, :gewicht, :geslacht)"; , geboortedatum, lengte, gewicht, geslacht)
	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':gebruiker', $_POST['gebruiker']);
    $stmt->bindParam(':wachtwoord', $_POST['wachtwoord']);
    $stmt->bindParam(':email', $_POST['email']);
	//$stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
    //$stmt->bindParam(':lengte', $_POST['lengte']);
    //$stmt->bindParam(':gewicht', $_POST['gewicht']);
	//$stmt->bindParam(':geslacht', $_POST['geslacht']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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