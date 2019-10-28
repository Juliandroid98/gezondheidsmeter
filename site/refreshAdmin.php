<?php
include 'assets/php/Connection.php';
session_start();
if($_SESSION['is_admin'] === '0'){
    echo "<script> alert('U bent geen admin.'); window.location.href='dashboard.php';</script>";
}


//refresh html and execute sql


try{
    $pdo = new PDO("mysql:host=localhost;dbname=gezondheidsmeter", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    //die("ERROR: Could not connect. " . $e->getMessage());
}	
	
	try{
    // Create prepared statement
    $sql = "DELETE FROM drinken WHERE drinken_ID = (:verwijderDrinkenID)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderDrinkenID', $_POST['verwijderIDdrinken'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record deleted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM eten WHERE eten_ID = (:verwijderEtenID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderEtenID', $_POST['verwijderIDeten'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record deleted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM sport WHERE sport_ID = (:verwijderSportID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderSportID', $_POST['verwijderIDsport'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record deleted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM drugs WHERE drugs_ID = (:verwijderDrugsID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderDrugsID', $_POST['verwijderIDdrugs'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record deleted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "DELETE FROM gebruiker WHERE gebruiker_ID = (:verwijderGebruikerID)";	
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':verwijderGebruikerID', $_POST['verwijderID'], PDO::PARAM_INT);
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record deleted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "UPDATE drinken SET naam = :naam, kcal = :kcal, suiker =:suiker, schijf_ID = :schijf_ID, alcohol = :alcohol WHERE drinken_ID = :drinken_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':drinken_ID', $_POST['drinken_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':kcal', $_POST['kcal']);
    $stmt->bindParam(':suiker', $_POST['suiker']);
    $stmt->bindParam(':schijf_ID', $_POST['schijf_ID']);
    $stmt->bindParam(':alcohol', $_POST['alcohol']);
    $stmt->execute();
    //echo "Record updated successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

try{
    // Create prepared statement
    $sql = "UPDATE eten SET naam = :naam, kcal = :kcal, sugar =:sugar, schijf_ID = :schijf_ID WHERE eten_ID = :eten_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':eten_ID', $_POST['Editeten_ID']);
    $stmt->bindParam(':naam', $_POST['EditEtennaam']);
    $stmt->bindParam(':kcal', $_POST['EditEtenkcal']);
    $stmt->bindParam(':sugar', $_POST['EditEtensugar']);
    $stmt->bindParam(':schijf_ID', $_POST['EditEtenschijf_ID']);
    $stmt->execute();
    //echo "Record updated successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "UPDATE sport SET naam = :naam, verbranding = :verbranding WHERE sport_ID = :sport_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':sport_ID', $_POST['sport_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':verbranding', $_POST['verbranding']);
    $stmt->execute();
    //echo "Record updated successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "UPDATE drugs SET naam = :naam, soort = :soort WHERE drugs_ID = :drugs_ID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':drugs_ID', $_POST['drugs_ID']);
    $stmt->bindParam(':naam', $_POST['naam']);
    $stmt->bindParam(':soort', $_POST['soort']);
    $stmt->execute();
    //echo "Record updated successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "UPDATE gebruiker SET is_admin = :is_admin, gebruikersnaam = :gebruiker, email = :email, gewicht = :gewicht, lengte = :lengte, geboortedatum = :geboortedatum, geslacht = :geslacht, geactiveerd = :geactiveerd WHERE gebruiker_ID = :gebruikerID";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':is_admin', $_POST['isAdmin']);
    $stmt->bindParam(':gebruikerID', $_POST['gebruikerID']);
    $stmt->bindParam(':gebruiker', $_POST['gebruikersnaam']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':geboortedatum', $_POST['geboortedatum']);
    $stmt->bindParam(':lengte', $_POST['lengte']);
    $stmt->bindParam(':gewicht', $_POST['gewicht']);
	$stmt->bindParam(':geslacht', $_POST['geslacht']);
    $stmt->bindParam(':geactiveerd', $_POST['geactiveerd']);
    
    // Execute the prepared statement
    $stmt->execute();
    //echo "Record updated successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
    //echo "Records inserted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


try{
    // Create prepared statement
    $sql = "INSERT INTO eten (naam, kcal, sugar, schijf_ID)
	VALUES (:naam, :kcal, :sugar, :schijf_ID)";
	
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':naam', $_POST['AddEtennaam']);
    $stmt->bindParam(':kcal', $_POST['AddEtenkcal']);
    $stmt->bindParam(':sugar', $_POST['AddEtensugar']);
    $stmt->bindParam(':schijf_ID', $_POST['AddEtenschijf_ID']);
    
    // Execute the prepared statement
    $stmt->execute();
    //echo "Records inserted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
    //echo "Records inserted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
    //echo "Records inserted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
    //echo "Records inserted successfully.";
} catch(PDOException $e){
    //die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
// Close connection
unset($pdo);
?>
<?php echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =admin.php'>"; ?>