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
				echo "<td><img onclick='addRowForEditDrugs(" . $row['drugs_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDdrugs' value='" . $row['drugs_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditDrugs".$row['drugs_ID']."' style='display: none;'>";
				echo "<form action='' method='post'>";
				echo "<td><input id='editRecordDrugs' type='text' name='drugs_ID' value='" . $row['drugs_ID'] . "'></td>";
                echo "<td><input id='editRecordDrugs' type='text' name='naam' value='" . $row['naam'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='soort' value='" . $row['soort'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
			
        }
		echo "<form action='' method='post'>
		<tr id='addRowDrugs' style='display: none;'><td>
		<input type='text' placeholder='drugsnaam' name='drugsnaam'></td>
		<td><input type='text' placeholder='soort' name='soort'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputDrugs();'></td></tr>";
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
				echo "<td><img onclick='addRowForEditSport(" . $row['sport_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDsport' value='" . $row['sport_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditSport".$row['sport_ID']."' style='display: none;'>";
				echo "<form action='' method='post'>";
				echo "<td><input id='' type='text' name='sport_ID' value='" . $row['sport_ID'] . "'></td>";
                echo "<td><input id='' type='text' name='naam' value='" . $row['naam'] . "'></td>";
				echo "<td><input id='' type='text' name='verbranding' value='" . $row['verbranding'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
			
        }
		echo "<form action='' method='post'>
		<tr id='addRowSport' style='display: none;'><td>
		<input type='text' placeholder='naam' name='naam'></td>
		<td><input type='text' placeholder='verbranding' name='verbranding'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputSport();'></td></tr>";
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
                echo "<th>kcal</th>";
				echo "<th>schijf_id</th>";
                echo "<th>suiker_gram</th>";
				echo "<th>wijzigen</th>";
				echo "<th>verwijderen</th>";
            echo "</tr>";
        while($row = $result->fetch()){
            echo "<tr>";
                echo "<td>" . $row['eten_ID'] . "</td>";
                echo "<td>" . $row['naam'] . "</td>";
                echo "<td>" . $row['kcal'] . "</td>";
				echo "<td>" . $row['schijf_ID'] . "</td>";
                echo "<td>" . $row['sugar'] . "</td>";
				echo "<td><img onclick='addRowForEditEten(" . $row['eten_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDeten' value='" . $row['eten_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditEten".$row['eten_ID']."' style='display: none;'>";
				echo "<form action='' method='post'>";
				echo "<td><input id='editRecordDrugs' type='text' name='eten_ID' value='" . $row['eten_ID'] . "'></td>";
                echo "<td><input id='editRecordDrugs' type='text' name='naam' value='" . $row['naam'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='kcal' value='" . $row['kcal'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='schijf_ID' value='" . $row['schijf_ID'] . "'></td>";
				echo "<td><input id='editRecordDrugs' type='text' name='sugar' value='" . $row['sugar'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
        }
		echo "<form action='' method='post'>
		<tr id='addRowEten' style='display: none;'><td>
		<input type='text' placeholder='naam' name='naam'></td>
		<td><input type='text' placeholder='kcal' name='kcal'></td>
		<td><input type='text' placeholder='schijf' name='schijf_ID'></td>
		<td><input type='text' placeholder='suiker' name='sugar'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputEten();'></td></tr>";
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
                echo "<th>kcal</th>";
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
                echo "<td>" . $row['kcal'] . "</td>";
				echo "<td>" . $row['suiker'] . "</td>";
                echo "<td>" . $row['alcohol'] . "</td>";
                echo "<td>" . $row['schijf_ID'] . "</td>";
				echo "<td><img onclick='addRowForEditDrinken(" . $row['drinken_ID'] . ");' class='bottomimg' src='assets/images/pencil-edit-button.png'></td>";
				echo "<form action='' method='post' onsubmit='return confirm(`wilt u verwijderen?`);'><td><input type='hidden' name='verwijderIDdrinken' value='" . $row['drinken_ID'] . "'><input type='image' name='submit' class='bottomimg' src='assets/images/rubbish-bin.png'></td></form>";
            echo "</tr>";
			echo "<tr id='addRowEditDrinken".$row['drinken_ID']."' style='display: none;'>";
				echo "<form action='' method='post'>";
				echo "<td><input id='' type='text' name='drinken_ID' value='" . $row['drinken_ID'] . "'></td>";
                echo "<td><input id='' type='text' name='naam' value='" . $row['naam'] . "'></td>";
                echo "<td><input id='' type='text' name='kcal' value='" . $row['kcal'] . "'></td>";
				echo "<td><input id='' type='text' name='suiker' value='" . $row['suiker'] . "'></td>";
				echo "<td><input id='' type='text' name='alcohol' value='" . $row['alcohol'] . "'></td>";
				echo "<td><input id='' type='text' name='schijf_ID' value='" . $row['schijf_ID'] . "'></td>";
				echo "<td><input type='submit'></td><td></td>";
				echo "</form>";				
			echo "</tr>";
        }
		echo "<form action='' method='post'>
		<tr id='addRowDrinken' style='display: none;'><td>
		<input type='text' placeholder='naam' name='naam'></td>
		<td><input type='text' placeholder='kcal' name='kcal'></td>
		<td><input type='text' placeholder='schijf' name='schijf_ID'></td>
		<td><input type='text' placeholder='suiker' name='sugar'></td>
		<td><input type='text' placeholder='alcohol' name='alcohol'></td>
		<td><input type='submit' value='toevoegen'></td></tr></form>";
		echo "<tr><td>toevoegen</td><td><img class='bottomimg' src='assets/images/plus.png' onclick='addRowForInputDrinken();'></td></tr>";
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
    $sql = "DELETE FROM drinken WHERE drinken_ID = (:verwijderDrinkenID)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderDrinkenID', $_POST['verwijderIDdrinken'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    echo "Record deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM eten WHERE eten_ID = (:verwijderEtenID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderEtenID', $_POST['verwijderIDeten'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    echo "Record deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM sport WHERE sport_ID = (:verwijderSportID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderSportID', $_POST['verwijderIDsport'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    echo "Record deleted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM drugs WHERE drugs_ID = (:verwijderDrugsID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderDrugsID', $_POST['verwijderIDdrugs'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    echo "Record deleted successfully.";
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
    $sql = "UPDATE drinken SET drinken_ID = :drinken_ID, naam = :naam, kcal = :kcal, suiker =:suiker, schijf_ID = :schijf_ID, alcohol = :alcohol WHERE drinken_ID = :drinken_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':drinken_ID', $_POST['drinken_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':kcal', $_POST['kcal']);
    $stmt->bindParam(':suiker', $_POST['suiker']);
    $stmt->bindParam(':schijf_ID', $_POST['schijf_ID']);
    $stmt->bindParam(':alcohol', $_POST['alcohol']);
    $stmt->execute();
    echo "Record updated successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "UPDATE eten SET eten_ID = :eten_ID, naam = :naam, kcal = :kcal, sugar =:sugar, schijf_ID = :schijf_ID WHERE eten_ID = :eten_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':eten_ID', $_POST['eten_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':kcal', $_POST['kcal']);
    $stmt->bindParam(':sugar', $_POST['sugar']);
    $stmt->bindParam(':schijf_ID', $_POST['schijf_ID']);
    $stmt->execute();
    echo "Record updated successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "UPDATE sport SET sport_ID = :sport_ID, naam = :naam, verbranding = :verbranding WHERE sport_ID = :sport_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':sport_ID', $_POST['sport_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':verbranding', $_POST['verbranding']);
    $stmt->execute();
    echo "Record updated successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "UPDATE drugs SET drugs_ID = :drugs_ID, naam = :naam, soort = :soort WHERE drugs_ID = :drugs_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':drugs_ID', $_POST['drugs_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':soort', $_POST['soort']);
    $stmt->execute();
    echo "Record updated successfully.";
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

try{
    // Create prepared statement
    $sql = "INSERT INTO drinken (naam, kcal, suiker, schijf_ID, alcohol)
	VALUES (:naam, :kcal, :sugar, :schijf_ID, :alcohol)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':kcal', $_POST['kcal']);
    $stmt->bindParam(':sugar', $_POST['sugar']);
    $stmt->bindParam(':schijf_ID', $_POST['schijf_ID']);
    $stmt->bindParam(':alcohol', $_POST['alcohol']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "INSERT INTO eten (naam, kcal, sugar, schijf_ID)
	VALUES (:naam, :kcal, :sugar, :schijf_ID)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':kcal', $_POST['kcal']);
    $stmt->bindParam(':sugar', $_POST['sugar']);
    $stmt->bindParam(':schijf_ID', $_POST['schijf_ID']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "INSERT INTO sport (naam, verbranding)
	VALUES (:naam, :verbranding)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':verbranding', $_POST['verbranding']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "INSERT INTO drugs (naam, soort)
	VALUES (:naam, :soort)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':naam', $_POST['drugsnaam']);
    $stmt->bindParam(':soort', $_POST['soort']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
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