<?php
include("accesso_db.php");

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
		echo "{messaggio:\"Connessione fallita riprova più tardi\"}";
        die("Connection failed: " . $conn->connect_error);
    }
	$condizione = $_GET['codice'];
    $sql = "SELECT * FROM utente WHERE Codice = $condizione";
	
    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		$row = $result->fetch_assoc();
		$nome = $row['Nome'];
		$cognome = $row['Cognome'];
		$codice = $row['Codice'];
		$gruppo = $row['Gruppo'];
		$cabina = $row['Cabina'];
		
		echo "{nome:$nome, cognome:$cognome,  codice:$codice, gruppo:$gruppo, cabina:$cabina}";
		
	} else {
		echo "{messaggio:\"Nessun risultato per questa ricerca\"}";
	}

    $conn->close();

?>
