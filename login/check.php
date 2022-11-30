<?php
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
{
die ("Errore nella connessione:".mysqli_connect_error());}

$email = $_POST['input_email'];
$pass = md5($_POST['input_pass']);
$query1="SELECT * FROM Utente where email='$email' and password='$pass'";
$result = mysqli_query($conn,$query1);
$line = mysqli_fetch_array($result);
if (mysqli_num_rows($result)!=0){
	session_start();
    $_SESSION['email']=$email;
    
}
echo mysqli_num_rows($result);
    

?>