<?php
include("accesso_db.php");

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	$condizione = $_GET['codice'];
    $sql = "SELECT * FROM utente WHERE Codice = $condizione";
	echo $sql;
    $result = $conn->query($sql);

	//echo $result;
	if ($result->num_rows > 0) {
		
		$row = $result->fetch_assoc();
		//Acquisisco i parametri da modificare
		$nome = $row['Nome'];
		$cognome = $row['Cognome'];
		$codice = $row['Codice'];
		$gruppo = $row['Gruppo'];
		$cabina = $row['Cabina'];
		
		echo "Nome:$nome Cognome:$cognome  Codice:$codice Gruppo:$gruppo Cabina:$cabina";
		
	} else {
		echo "Nessun risultato per questa ricerca";
	}

    $conn->close();

?>
