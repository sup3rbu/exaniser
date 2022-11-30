<?php
include "../config.php";
session_start();
if ($_SESSION['email'] == "") {
    header("Location: ../login/index.php");
    exit();
}
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if ($conn == FALSE)
    die("Errore nella connessione:" . mysqli_connect_error());
$email = $_SESSION['email'];
$sql = "SELECT username   FROM Utente WHERE Utente.email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}
$username = mysqli_fetch_row($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exaniser</title>
    <link rel="icon" href="../assets/1-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="../mystyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        #select {
            font-size: 19px;
            color:black;
            margin-top: 0px;
        }

        #logo {
            width: 165px;
            margin-top: 0px;
        }

        ul {
            list-style-type: none;
            overflow: hidden;
        }

        li a {
            font-size: 21px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: inline-block;
            color: black;
            padding: 14px 16px;
            text-decoration: none;

        }

        #last {
            margin-right: 60px;
        }

        li a:hover {
            color: white;
        }

        #au {
            border-right: 1px dotted rgb(196, 192, 192);
        }

        #bd {
            border-right: 1px dotted rgb(196, 192, 192);
        }

        #home {
            border-right: 1px dotted rgb(196, 192, 192);
            border-left: 1px dotted rgb(196, 192, 192);

        }

        #lo {
            border-right: 1px dotted rgb(196, 192, 192);

        }



        #img {
            border-right: 1px dotted rgb(196, 192, 192);

        }

        #thenavbar {
            padding-left: 0px;
            padding-right: 0px;
        }
    </style>
</head>

<body style="background-color: rgb(219,226,226);">
    <!--NavBar-->
	<div class="container " >
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: rgb(219,226,226);">
            <a href="#">
                <img src="./logo.png" alt="logo" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div  class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 " >
                        <li class="nav-item" id="sel">
                            <select style="background-color: rgb(219,226,226);" name="language" class="form-select" id="select" onChange="window.location.href=this.value">
                                <option value="" disabled selected><?php echo $lang['language'] ?></option>
                                <option value="index.php?lang=en">English</option>
                                <option value="index.php?lang=it">Italiano</option>
                            </select>
                        </li>
                        <li class="nav-item bc ">
                            <!--
                                <img src="../assets/home-icon.png" style="margin-bottom:6px;" width="30px" height="30px">
                                -->
                            <a class="nav-link active" aria-current="page" href="../home/index.php" id="home"><?php echo $lang['home'] ?></a>
                        </li>
                        <li class="nav-item bc ">
                            <a class="nav-link active" href="../home/index.php#coursesID"  id="au">My Courses</a>
                        </li>
                        <li class="nav-item ">
                            <!--
                                <img src="../assets/logout-icon.png" style="margin-bottom:6px;" width="30px" height="30px">
								-->
                            <a class="nav-link active" href="../home/logout.php" id="lo">Log out</a>
                        </li>
                        <li class="nav-item ">
                            <!--
                                <img src="../assets/user-icon1.png" style="margin-bottom:6px;" width="30px" height="30px">
                               -->
                            <a class="nav-link active" href="../profilo/index.php" id="si">
                            <img src="../assets/user-icon1.png" style="margin-bottom:6px;" width="30px" height="30px">

                                <?php
                                session_start();
                                $db_host = "localhost";
                                $db_user = "exaniser";
                                $db_name = "my_exaniser";
                                $db_password = "";
                                $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                                $email = $_SESSION['email'];
                                if ($conn == FALSE) {
                                    die("Errore nella connessione:" . mysqli_connect_error());
                                }
                                $sql = "SELECT * FROM Utente  WHERE Utente.email = '$email'";

                                if ($result = mysqli_query($conn, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $name = $row['username'];
                                            echo $name;
                                        }
                                    }
                                }

                                mysqli_close($conn);


                                ?>
                            </a>
                        </li>
                    </ul>
                </form>
            </div>

        </nav>
    </div>
    <br>
    <div class="container mb-5 mt-3  " >
        <div class="main-body">
            <div class="row" >
                <div class="col">
                    <div class="card" style=" background-color: rgb(226,221,219);background-size: cover; background-image: url('https://i.imgur.com/OvZvQrQ.png');">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="./user-icon.png" alt="Admin" width="110">
                                <div class="mt-3">
                                    <h4><?php echo $username[0] ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3" >
                <div class="col" >
                    <div class="card" style=" background-color: rgb(226,221,219); ">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo $lang['username'] ?></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="userName" type="text" class="form-control" value="<?php echo $username[0]; ?>" maxlength="100">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3" >
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo $lang['new'] ?> Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="pass1" type="password" class="form-control" value="" maxlength="50">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"><?php echo $lang['confirm'] ?> password</h6>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <input id="pass2" type="password" class="form-control" value="" maxlength="50">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"></h6>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <span id="msgError"> </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="button" id="btnChgPass" class="btn btn-primary px-4" value="<?php echo $lang['savechanges'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--
    <div class="row mt-3 ">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="d-flex align-items-center mb-3">Project Status</h5>
            <p>Web Design</p>
            <div class="progress mb-3" style="height: 5px">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Website Markup</p>
            <div class="progress mb-3" style="height: 5px">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>One Page</p>
            <div class="progress mb-3" style="height: 5px">
              <div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Mobile Template</p>
            <div class="progress mb-3" style="height: 5px">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p>Backend API</p>
            <div class="progress" style="height: 5px">
              <div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    -->
        </div>
    </div>
   
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        var passOk = 0;
        var userOk = 0;
        $(document).ready(function() {
            var passOk = 0;
            var userOk = 0;
            $("#btnChgPass").click(function() {
                if (passOk || userOk) {
                    $.ajax({
                        url: 'script.php',
                        method: "POST",
                        data: {
                            input_pass: $("#pass1").val(),
                            input_username: $("#userName").val()
                        },
                        success: function(response) {
                            if (!response) {
                                // andato a buon fine
                                location.reload(true);
                                $('#msgError').html('<span class="text-success">modifica andata a buon fine</span>');
                            } else {
                                $('#msgError').html('<span class="text-danger">errore nella modifica</span>');
                                $("#pass1").css({
                                    "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                                });
                                $("#pass1").css({
                                    "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                                });
                                $("#pass2").css({
                                    "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                                });
                                $("#pass2").css({
                                    "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                                });
                            }
                        }
                    })
                } else {

                    $('#msgError').html('<span class="text-danger"></span>');

                }

            });
            $("#pass1").keyup(function() {
                if ($("#pass1").val() != $("#pass2").val()) {
                    $('#msgError').html('<span class="text-danger"> le password non coincidono</span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    passOk = 0;
                } else if ($("#pass1").val() == "" && $("#pass2").val() == "") {
                    $('#msgError').html('<span class="text-danger"></span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    passOk = 0;
                } else {
                    $('#msgError').html('<span class="text-danger"></span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    passOk = 1;
                }

            });
            $("#pass2").keyup(function() {
                if ($("#pass2").val() != $("#pass1").val()) {
                    $('#msgError').html('<span class="text-danger"> le password non coincidono</span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    passOk = 0;
                } else if ($("#pass1").val() == "" && $("#pass2").val() == "") {
                    $('#msgError').html('<span class="text-danger"></span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 0, 0, 0.69)"
                    });
                    passOk = 0;
                } else {
                    $('#msgError').html('<span class="text-danger"> </span>');
                    $("#pass1").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass1").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#pass2").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    passOk = 1;
                }

            });
            $("#userName").keyup(function() {
                if ($("#userName").val() == "") {
                    $("#userName").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    $("#userName").css({
                        "box-shadow": "5px 5px 19px -5px rgba(255, 0, 0, 0.69)"
                    });
                    userOk = 0;
                } else {
                    $("#userName").css({
                        "-webkit-box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    $("#userName").css({
                        "box-shadow": "5px 5px 19px -5px rgba(0, 255, 0, 0.69)"
                    });
                    userOk = 1;
                }
            });
        });
    </script>
</body>

<style>
    .sep {
        margin-right: 30px;
    }

    .info {
        margin-left: 15px;
        font-size: 20px;
        margin-top: 5px;


    }

    #home {
        margin-left: 15px;
    }
</style>

</html>