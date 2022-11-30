<?php
    include "config.php";
    session_start();
    if ($_SESSION['email'] == ""){
    	header("Location: ../login/index.php");
		exit();
    }
    $db_host = "localhost";
	$db_user = "exaniser";
	$db_name = "my_exaniser";
	$db_password = "";
	$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
	if ($conn == FALSE)
		die ("Errore nella connessione:".mysqli_connect_error());
	$email=$_SESSION['email'];
	$id=$_POST['id_obiettivo'];
    //$sql = " UPDATE Appello SET data = '$anno-$mese-$giorno' WHERE Appello.data='$annoV-$meseV-$giornoV ' AND Appello.utente = '$email' AND Appello.attivita = '$attivita';";

    $sql = " SELECT * FROM Obiettivo WHERE id='$id';";
    $result = mysqli_query($conn, $sql); 
    
    if (!$result) die('Invalid query: ' . mysqli_error($conn));
	
    else{
    /*
    	$sql1 = "UPDATE Attività SET nome='$attivita', priorità = '$priorita', descrizione = '$descrizione' WHERE Attività.nome = '$attivitaV' AND Attività.utente = '$email';";
   		$result1 = mysqli_query($conn, $sql1);
        if (!$result1) die('Invalid query: ' . mysqli_error($conn));
    */
    $row = mysqli_fetch_array($result);
	$descrizione=$row['descrizione'];
    $scadenza = $row['scadenza'];
    $raggiunto = $row['raggiunto'];
    $priorità = $row['Priorità'];
    $attivita = $row['attivita'];
	$timestamp = strtotime($scadenza);

	$giorno = date('d', $timestamp);
    $mese = date('m', $timestamp);
    $anno = date('Y', $timestamp);
    $return_arr[] = array("descrizione" => $descrizione,
                    "scadenzaG" => $giorno,
                    "scadenzaM" => $mese,
                    "scadenzaA" => $anno,
                  
                    "raggiunto" => $raggiunto,
                    "priorita" => $priorità,
                    "attivita" => $attivita);
    echo json_encode($return_arr);               
    //echo "$$$" . $row['descrizione']."$$$" .$row['scadenza']."$$$" .$row['raggiunto']."$$$" .$row['Priorità']."$$$" .$row['attivita'];
	
    }

    mysqli_close($conn);
?>