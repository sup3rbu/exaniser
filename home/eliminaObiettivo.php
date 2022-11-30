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
    $idObiettivo = $_GET['id'];
    $sql = "DELETE FROM Obiettivo WHERE Obiettivo.id = '$idObiettivo'";
    $result = mysqli_query($conn, $sql); 
    
    if (!$result) die('Invalid query: ' . mysqli_error($conn));
    
    mysqli_close($conn);
?>