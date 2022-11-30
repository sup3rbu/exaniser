<?php
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());
	
	$username = $_POST['inputUsername'];
    $email = $_POST['inputEmail'];
    $password = md5($_POST['inputPass1']);
    $query2="INSERT INTO Utente (username, email, password) VALUES ('$username', '$email', '$password')";
   	$result = mysqli_query($conn,$query2);
    if ($result){
		
        session_start();
        $_SESSION['email']=$email;
        $_SESSION['username']=$username;
        header("location: ../home/index.php");

    }
	else{
		
    }
    

?>