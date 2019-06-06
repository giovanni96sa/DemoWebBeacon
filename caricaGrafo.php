<?php
include("accesso_db.php");

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
		echo "{messaggio:\"Connessione fallita riprova più tardi\"}";
        die("Connection failed: " . $conn->connect_error);
    }
	$piano = $_GET['piano'];
    $sql = "SELECT * FROM arco WHERE Piano1 = $piano";
	
    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		
		$userData = array(
		"x1" => $row["X1"],
		"y1"	=> $row["Y1"],
		"x2"	=> $row["X2"],
		"y2" => $row["Y2"],
		"ce" => "SI"
		);
		
	} 
	else {
		$userData = array(
		"ce" => "NO"
		);
	}
	echo json_encode($userData);
    $conn->close();
?>
