<?php
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());


	/*
	$username = $_POST['inputUsername'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPass1'];
    $query1="SELECT * FROM Utente where email='$email'";
    $result = mysqli_query($conn,$query1);
    $line = mysqli_fetch_array($result);
    if($line){
        $error="you already registred";
        echo $error;
    }
    else{
        $query2="INSERT INTO Utente (username, email, password) VALUES ('$username', '$email', '$password')";
   	    $result = mysqli_query($conn,$query2);
        if ($result)
			echo "Inserimento corretto";
		else
			echo "Errore durante l'inserimento";
    }
    */
    $email = $_POST['input_email'];
    $query1="SELECT * FROM Utente where email='$email'";
    $result = mysqli_query($conn,$query1);
    $line = mysqli_fetch_array($result);
    echo mysqli_num_rows($result);
    

?>