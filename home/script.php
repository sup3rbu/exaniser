<?php
session_start();
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());
	
	$nomeCorso = $_POST['input_nCorso'];
    $descrizione = $_POST['input_descrizione'];
    $priorita = $_POST['input_priorita'];
    $anno = $_POST['input_anno'];
    $mese = $_POST['input_mese'];
    $giorno = $_POST['input_giorno'];
    $tipo = $_POST['input_tipo'];
    $utente = $_SESSION['email'];
  
   // "INSERT INTO Attività (nome, utente, priorità, descrizione, tipo) VALUES ('$nomeCorso', '$utente', '$priorita', '$descrizione', '$tipo')";

    $query2="INSERT INTO Attività (nome, utente, priorità, descrizione, tipo) VALUES ('$nomeCorso', '$utente', '$priorita', '$descrizione', '$tipo')";
   	$result = mysqli_query($conn,$query2);
    if ($result){
		//echo "andato a buon fine";
        $query3 = "INSERT INTO Appello (data, utente, attivita) VALUES ('$anno-$mese-$giorno', '$utente', '$nomeCorso')";
        $result1 = mysqli_query($conn,$query3);
        if(!$result1)
        	echo("Error description: " . mysqli_error($conn));
            //echo "error";
    }
	else{
    	//echo "error";
		echo("Error description: " . mysqli_error($conn));
    }
    
mysqli_close($conn);
?>