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
    $tipo = $_POST['input_tipo'];
    //echo $_POST['input_nCorso'] . " " .  $_POST['input_tipo'];
	// rimuovi appello
    //DELETE FROM `my_exaniser`.`Appello` WHERE `Appello`.`dataora` = \'2026-12-13 00:00:00\' AND `Appello`.`utente` = \'super@man.it\' AND `Appello`.`attivita` = \'ambra\'"?
    //DELETE FROM `my_exaniser`.`Appello` WHERE `Appello`.`dataora` = '2022-12-19 00:00:00' AND `Appello`.`utente` = 'super@man.it' AND `Appello`.`attivita` = '.';
    // rimuovi corso
    //DELETE FROM `my_exaniser`.`Attività` WHERE `Attività`.`nome` = \'ambra\' AND `Attività`.`utente` = \'super@man.it\'"?
    //DELETE FROM `my_exaniser`.`Attività` WHERE `Attività`.`nome` = '.' AND `Attività`.`utente` = 'super@man.it';
    $sql = "DELETE FROM Appello WHERE Appello.utente='$email' and Appello.attivita='$attivita'";
    echo $sql;
    $result = mysqli_query($conn, $sql); 
    
    if (!$result) die('Invalid query: ' . mysqli_error($conn));
	
    else{
    	$sql1 = "DELETE FROM Attività WHERE Attività.nome='$attivita' and Attività.utente='$email'";
   		$result1 = mysqli_query($conn, $sql1);
        if (!$result1) die('Invalid query: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
?>