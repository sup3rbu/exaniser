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
    $attivita = $_POST['input_nCorso'];
    $descrizione= $_POST['input_descrizione'];
    $priorita= $_POST['input_priorita'];
    $giorno= $_POST['input_days'];
    $mese= $_POST['input_moths'];
    $anno= $_POST['input_years'];
    $attivitaV = $_POST['input_nomeV'];
    $giornoV= $_POST['input_daysV'];
    $meseV= $_POST['input_mothsV'];
    $annoV= $_POST['input_yearsV'];
    //echo $email . $attivita . $descrizione . $priorita . $giorno . $mese . $anno;
    //exit;
   
	// modifica appello
    // UPDATE `my_exaniser`.`Appello` SET `dataora` = '2025-11-19 00:00:00' WHERE `Appello`.`dataora` = '2021-11-19 00:00:00' AND `Appello`.`utente` = 'super@man.it' AND `Appello`.`attivita` = 'ddd';
    // modifica corso
    //UPDATE `my_exaniser`.`Attività` SET `priorità` = '3', `descrizione` = 'corso inserito a caso' WHERE `Attività`.`nome` = 'ddd' AND `Attività`.`utente` = 'super@man.it';
    //UPDATE `my_exaniser`.`Attività` SET `nome` = 'corso random' WHERE `Attività`.`nome` = 'corso a caso' AND `Attività`.`utente` = 'super@man.it';
    $sql = " UPDATE Appello SET data = '$anno-$mese-$giorno' WHERE Appello.data='$annoV-$meseV-$giornoV ' AND Appello.utente = '$email' AND Appello.attivita = '$attivita';";
    $result = mysqli_query($conn, $sql); 
    
    if (!$result) die('Invalid query: ' . mysqli_error($conn));
	
    else{
    	$sql1 = "UPDATE Attività SET nome='$attivita', priorità = '$priorita', descrizione = '$descrizione' WHERE Attività.nome = '$attivitaV' AND Attività.utente = '$email';";
   		$result1 = mysqli_query($conn, $sql1);
        if (!$result1) die('Invalid query: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
?>