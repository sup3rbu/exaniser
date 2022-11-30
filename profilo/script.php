<?php
session_start();
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());
	
	$username = $_POST['input_username'];
    $password = md5($_POST['input_pass']);
    $email = $_SESSION['email'];
	//$sql = " UPDATE Appello SET dataora = '$anno-$mese-$giorno 00:00:00' WHERE Appello.dataora='$annoV-$meseV-$giornoV 00:00:00' AND Appello.utente = '$email' AND Appello.attivita = '$attivita';";
	if ($password=="")
    $query2="UPDATE Utente SET  username= '$username' WHERE Utente.email='$email'";
    else
    $query2="UPDATE Utente SET password = '$password' , username= '$username' WHERE Utente.email='$email'";
   	$result = mysqli_query($conn,$query2);
    if (!$result) echo("Error description: " . mysqli_error($conn));
   
    
mysqli_close($conn);
?>