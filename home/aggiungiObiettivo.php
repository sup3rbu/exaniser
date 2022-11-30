<?php
session_start();
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());
	
	$nomeCorso = $_POST['input_nObiettivo'];
    $descrizione = $_POST['input_descrizione'];
    $priorita = $_POST['input_priorita'];
    $anno = $_POST['input_anno'];
    $mese = $_POST['input_mese'];
    $giorno = $_POST['input_giorno'];
    $tipo = $_POST['input_tipo'];
    $utente = $_SESSION['email'];
   // "INSERT INTO Attività (nome, utente, priorità, descrizione, tipo) VALUES ('$nomeCorso', '$utente', '$priorita', '$descrizione', '$tipo')";
    //INSERT INTO `my_exaniser`.`Obiettivo` (`descrizione`, `scadenza`, `raggiunto`, `Priorità`, `utente`, `attivita`, `id`) VALUES ('<aaaaaaaaaa', '2021-05-12', '1', '1', 'super@man.it', 'corsoG', NULL);
    $query2="INSERT INTO Obiettivo (descrizione, scadenza, raggiunto, Priorità, utente,attivita,id) VALUES ('$descrizione', '$anno-$mese-$giorno','0', '$priorita', '$utente','$nomeCorso',NULL)";
   	$result = mysqli_query($conn,$query2);
    if (!$result){
		//errore
        echo("Error description: " . mysqli_error($conn));
    }
	else{
    	//andato a buon fine
    }
    
mysqli_close($conn);
?>
