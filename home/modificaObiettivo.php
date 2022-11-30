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
	$id=$_POST['input_idOb'];
    $raggiunto=$_POST['input_raggiunto'];
    $m=$_POST['input_moths'];
    $g=$_POST['input_days'];
    $a=$_POST['input_years'];
    $priorita=$_POST['input_priorita'];
    $desc=$_POST['input_descrizione'];
 
    
	//UPDATE `my_exaniser`.`Obiettivo` SET `scadenza` = '2021-05-03', `raggiunto` = '0', `Priorità` = '2' WHERE `Obiettivo`.`utente` = 'super@man.it' AND `Obiettivo`.`attivita` = 'corsoN' AND `Obiettivo`.`id` = 344;
    $sql = " UPDATE Obiettivo SET scadenza = '$a-$m-$g', raggiunto = '$raggiunto', Priorità = '$priorita' , descrizione ='$desc' WHERE Obiettivo.id = '$id';";
    $result = mysqli_query($conn, $sql); 
    if ($result) mysqli_error($conn);
	else echo mysqli_error($conn);
    mysqli_close($conn);
?>