<?php
session_start();
if ($_SESSION['email'] == "") {
    header("Location: ../login/index.php");
    exit();
}
include "../config.php";
$db_host = "localhost";
$db_user = "exaniser";
$db_name = "my_exaniser";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if ($conn == FALSE)
    die("Errore nella connessione:" . mysqli_connect_error());
$email = $_SESSION['email'];
$sql = "SELECT nome,priorità,descrizione,data  FROM Attività,Appello WHERE Attività.utente='$email' and Attività.tipo='corso' and Attività.nome=Appello.attivita";
$result = mysqli_query($conn, $sql);
$corsi = [];
if (!$result) {
    die('Invalid query: ' . mysqli_error($conn));
}
while ($row = $result->fetch_assoc()) {
    array_push($corsi, $row);
}
$sql = "SELECT nome,priorità,descrizione,data FROM Attività,Appello WHERE Attività.utente='$email' and Attività.tipo='progetto' and Attività.nome=Appello.attivita";
$result = mysqli_query($conn, $sql);
$progetti = [];
//print_r($corsi);
while ($row = $result->fetch_assoc()) {
    array_push($progetti, $row);
}

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
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body style="background: rgb(219,226,226);">

    <div class="container">
        <nav style="background: rgb(219,226,226);" class="navbar navbar-expand-lg navbar-light ">
           
                <a  href="#">
                	<img  src="./logo.png" alt="logo" id="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <form class="d-flex">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item" id="sel">
                                <select style="background: rgb(219,226,226);color: black;" name="language" class="form-select" id="select" onChange="window.location.href=this.value">
                                    <option value="" selected><?php echo $lang['language'] ?></option>
                                    <option value="index.php?lang=en">English</option>
                                    <option value="index.php?lang=it">Italiano</option>
                                </select>
                            </li>
                            <li class="nav-item bc ">
                           <!--
                                <img src="../assets/home-icon.png" style="margin-bottom:6px;" width="30px" height="30px">
                                -->
                                <a class="nav-link active" aria-current="page" href="#" id="home"><?php echo $lang['home'] ?></a>
                            </li>
                            <li class="nav-item bc ">
                                <a class="nav-link active" href="#" onclick='scroll_to("coursesID")' id="au"><?php echo $lang['mycourses'] ?></a>
                            </li>
                            <li class="nav-item ">
                            	<!--
                                <img src="../assets/logout-icon.png" style="margin-bottom:6px;" width="30px" height="30px">
								-->
                                <a class="nav-link active" href="./logout.php" id="lo"><?php echo $lang['logout'] ?></a>
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
    <div class="container">


        <div class="row">
            <div class="col-md-12">
                <!-- 
        <input class="btn btn-primary" type="button" id="btn1" value="<?php echo $lang['newcourse'] ?>">
        Button trigger modal
        -->
                <button type="button" class="btn btn-primary mt-1" data-toggle="modal" data-target="#exampleModalCenter">
                    <?php echo $lang['newcourse'] ?>
                </button>
                <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#goal-form">
                    <?php echo $lang['newgoal'] ?>
                </button>
                <div class="dropdown" id="droppy">
                    <button class="btn btn-success dropdown-toggle mt-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $lang['sortby'] ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item active" href="?order=scadenza"><?php echo $lang['deadline2'] ?></a></li>
                        <li><a class="dropdown-item" href="?order=Priorità"><?php echo $lang['goalpriority'] ?></a></li>
                        <li><a class="dropdown-item" href="?order=priorità"><?php echo $lang['coursepriority'] ?></a></li>
                    </ul>
                </div>
                <?php
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
                $email = $_SESSION['email'];
                if ($conn == FALSE) {
                    die("Errore nella connessione:" . mysqli_connect_error());
                }
                $sql = "SELECT * FROM Appello  WHERE Appello.utente = '$email' ORDER BY Appello.data LIMIT 1";

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $date = $row['data'];
                            $name = $row['attivita'];

                            $start_date = date('Y-m-d');
                            $diff = strtotime($date) - strtotime($start_date);
                            $dateDiff = ceil($diff / 86400);
                            echo "<div class='badge bg-warning info text-wrap text-center' style='width: 30rem; height:2.5rem; font-size:15px;'>"
                            ."<div  style='vertical-align: middle; margin-top:6px;'>".$lang['note11'] ." ".$name." ". $lang['thein'] ." ". $dateDiff ." ". $lang['thedays'] ." </div>"." </div>";
                        }
                    }
                }

                mysqli_close($conn);

                ?>

                <!-- Modal -->
                <div class="modal fade " id="goal-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-scrollable  modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['newgoal'] ?></h5>
                                <button id="closeBtn1" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><?php echo $lang['close'] ?></button>
                            </div>
                            <div class="modal-body">
                                <form style="width:100%;">
                                    <?php

                                    $db_host = "localhost";
                                    $db_user = "exaniser";
                                    $db_name = "my_exaniser";
                                    $db_password = "";
                                    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                                    $email = $_SESSION['email'];
                                    if ($conn == FALSE) {
                                        die("Errore nella connessione:" . mysqli_connect_error());
                                    }

                                    $sql = "SELECT nome FROM Attività,Appello WHERE Attività.utente = '$email' and Attività.nome=Appello.attivita";
                                    // nome 	utente 	priorità 	descrizione 
                                    $thecourses = array();

                                    if ($result = mysqli_query($conn, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                array_push($thecourses, $row['nome']);
                                            }
                                        }
                                    }
                                    echo '<select id="oCourse" class="form-select aria-label="Default select example">';
                                    echo "<option selected value=''>";
                                    echo $lang['selectcourse'];
                                    echo "</option>";
                                    foreach ($thecourses as $course) {
                                        echo "<option value='$course'>  $course </option>";
                                    }
                                    echo "<select>";


                                    mysqli_close($conn);



                                    ?>

                                    <br>
                                    <div class="input-group">
                                        <textarea id="Odescription" class="form-control" aria-label="With textarea" placeholder="<?php echo $lang['goaldescription'] ?>"></textarea>
                                    </div>
                                    <br>
                                    <select id="opriority" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $lang['priority'] ?></option>
                                        <option value="1"><?php echo $lang['low'] ?></option>
                                        <option value="2"><?php echo $lang['medium'] ?></option>
                                        <option value="3"><?php echo $lang['high'] ?></option>
                                        <option value="4"><?php echo $lang['veryhigh'] ?></option>
                                    </select>
                                </form>
                                <br>
                                <label id="nx" style="padding-bottom:10px; color:grey;"> <?php echo $lang['deadline'] ?></label>
                                <br>
                                <div class="row">
                                    <div class="col-md-1" style="margin-right:30px;">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="days1" style="width: 89px;">
                                            <option selected><?php echo $lang['day'] ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-1" style="margin-right:30px;">
                                        <select class="form-select form-select-sm " aria-label=".form-select-sm example" id="months1" style="width: 90px;">
                                            <option selected><?php echo $lang['month'] ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="years1" style="width: 90px;">
                                            <option selected><?php echo $lang['year'] ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <span id="msgErrorO"> </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="closeBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo $lang['close'] ?></button>
                                <button id="salva" type="button" class="btn btn-primary"><?php echo $lang['savegoal'] ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="text-center"><?php echo $lang['goals'] ?></h1>
        <div class="row">
            <div class="col-md-12">
                <?php
                session_start();
                if ($_SESSION['email'] == "") {
                    header("Location: ../login/index.php");
                    exit();
                }
                $db_host = "localhost";
                $db_user = "exaniser";
                $db_name = "my_exaniser";
                $db_password = "";
                $email = $_SESSION['email'];
                $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                if ($conn == FALSE) {
                    die("Errore nella connessione:" . mysqli_connect_error());
                }

                if (isset($_GET['order'])) {
                    $order = $_GET['order'];
                } else {
                    $order = 'scadenza';
                }

                if ($order == 'priorità') {
                    $sql = "SELECT o.* from Obiettivo o, Attività a where a.nome=o.attivita and o.utente='$email' order by(a.priorità)";
                } else {
                    $sql = "SELECT * FROM Obiettivo WHERE Obiettivo.utente = '$email' ORDER BY $order";
                }

                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<br>";
                        echo "<ol class='list-group list-group-numbered'>";

                        while ($row = mysqli_fetch_array($result)) {
                            $description = $row['descrizione'];
                            $corso = $row['attivita'];
                            $scad = $row['scadenza'];
                            $priorità = $row['Priorità'];
                            $theid = $row['id'];
                            $raggiunto = $row['raggiunto'];
                            if ($row['raggiunto'] == 1) {
                                $check = 'checked';
                            } else {
                                $check = '';
                            }

                            $start_date = date('Y-m-d');
                            $end_date = $scad;
                            $diff = strtotime($end_date) - strtotime($start_date);
                            $dateDiff = ceil($diff / 86400);

                            if ($check == 'checked') {
                                $color = 'list-group-item-success';
                            } else {
                                if ($dateDiff < 0) {
                                    $color = 'list-group-item-danger';
                                } else {
                                    $color = 'list-group-item-primary';
                                }
                            }

                            echo "<li class='list-group-item d-flex justify-content-between align-items-start $color'>
                          <div class='ms-2 me-auto'>
                            <div class='fw-bold'> $description &emsp;
                              <input class='form-check-input sep' type='checkbox' value=''  id='$theid' $check >
                              <span id='state_span'></span>
                              <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill right ' viewBox='0 0 16 16' id='$theid'>
                                <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                              </svg>
                              <svg   xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash right' viewBox='0 0 16 16' id='$theid'>
                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                              </svg>
                              
                            </div>".
                              $lang['thecourse'] . $corso . " |  &emsp; " . $lang['priority2'] . $priorità . " &emsp; | &emsp; " . $lang['man'] . $dateDiff . $lang['daysleft'] . "&emsp; | &emsp; " . $lang['deadline'] ." " .$scad;
                             
                         "</div>
                        </li>";
                        }
                        echo "</ol>";
                    }
                }
                mysqli_close($conn);

                ?>
            </div>
        </div>
        <!-- SEZIONE CORSI / PROGETTI -->

        <div class="container mt-3">

            <!-- Bottone per aggiungere un corso/progetto 
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Aggiungi
      </button>
      -->

            <!-- Modal per aggiungere un corso/progetto  -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $lang['newcourse']?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload(); ">
                                <span aria-hidden="true">&times;</span>

                            </button>
                        </div>
                        <div class="modal-body">

                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active mod" data-bs-toggle="tab" data-bs-target="#nav-course" type="button" role="tab" aria-selected="true" style="font-size:20px; color:grey;" onmouseover="this.style.color='black';" onmouseout="this.style.color='grey';">
                                        <?php echo $lang['course'] ?>
                                    </button>
                                    <button class="nav-link mod" data-bs-toggle="tab" data-bs-target="#nav-project" type="button" role="tab" aria-selected="false" style="font-size:20px; color:grey; " onmouseover="this.style.color='black';" onmouseout="this.style.color='grey';">
                                        <?php echo $lang['project'] ?>
                                    </button>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-course" role="tabpanel">

                                    <div class="row">
                                        <div class="col">
                                            <br>
                                            <div class="input-group mb-3" id="pcont">

                                                <input type="text" id="nomeCorso" class="form-control" placeholder="<?php echo $lang['cn'] ?>" style="width: 300px">
                                            </div>

                                            <div class="input-group">
                                                <textarea class="form-control" id="descrizione" aria-label="With textarea" placeholder="<?php echo $lang['cd'] ?>"></textarea>
                                            </div>
                                            <br>
                                            <select class="form-select" id="priorita" aria-label="Default select example">
                                                <option selected>
                                                    <?php echo $lang['priority'] ?>
                                                </option>
                                                <option value="1">
                                                    <?php echo $lang['low'] ?>
                                                </option>
                                                <option value="2">
                                                    <?php echo $lang['medium'] ?>
                                                </option>
                                                <option value="3">
                                                    <?php echo $lang['high'] ?>
                                                </option>
                                                <option value="4">
                                                    <?php echo $lang['veryhigh'] ?>
                                                </option>
                                            </select>
                                            <!-- qui -->
                                            <div class="col">
                                                <form class="form-inline" style=" margin-top:15px; color:grey; ">
                                                    <label id="nx" style="padding-bottom:10px;">
                                                        <?php echo $lang['nextexam'] ?>
                                                    </label>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-right:10px;">
                                                            <select class="form-select form-select-sm days" aria-label=".form-select-sm example" id="days" style="width: 95px;">
                                                                <option selected>
                                                                    <?php echo $lang['day'] ?>
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3" style="margin-right:10px;">
                                                            <select class="form-select form-select-sm months" aria-label=".form-select-sm example" id="months" style="width: 90px;">
                                                                <option selected>
                                                                    <?php echo $lang['month'] ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-select form-select-sm years" aria-label=".form-select-sm example" id="years" style="width: 90px;">
                                                                <option selected>
                                                                    <?php echo $lang['year'] ?>
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <br>

                                                </form>
                                            </div>
                                            <br>
                                            <input class="btn btn-primary" id="button1" type="button" value="<?php echo $lang['createcourse'] ?>">

                                            <nav id="messageError1"> </nav>
                                            <br>
                                            <p class="fw-light ">
                                                <?php echo $lang['note1'] ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-project" role="tabpanel">
                                    <br>
                                    <form style="width:100%;">
                                        <div class="input-group mb-3" id="pcont">
                                            <input type="text" id="nomeProgetto" required class="form-control pcont" placeholder="<?php echo $lang['pn'] ?>" style="width: 300px">
                                        </div>
                                        <div class="input-group">
                                            <textarea class="form-control" id="descrizione2" aria-label="With textarea" placeholder="<?php echo $lang['pd'] ?>"></textarea>
                                        </div>
                                        <br>
                                        <select class="form-select" id="priorita2" required aria-label="Default select example">
                                            <option selected>
                                                <?php echo $lang['priority'] ?>
                                            </option>
                                            <option value="1">
                                                <?php echo $lang['low'] ?>
                                            </option>
                                            <option value="2">
                                                <?php echo $lang['medium'] ?>
                                            </option>
                                            <option value="3">
                                                <?php echo $lang['high'] ?>
                                            </option>
                                            <option value="4">
                                                <?php echo $lang['veryhigh'] ?>
                                            </option>
                                        </select>
                                    </form>
                                    <br>

                                    <div class="row">
                                        <label id="nx" style="padding-bottom:10px; color:grey;">
                                            <?php echo $lang['deadline'] ?>
                                        </label>
                                        <div class="col-md-2" style="margin-right:10px;">
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="days2" style="width: 95px;">
                                                <option selected>
                                                    <?php echo $lang['day'] ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-2" style="margin-right:10px;">
                                            <select class="form-select form-select-sm " aria-label=".form-select-sm example" id="months2" style="width: 90px;">
                                                <option selected>
                                                    <?php echo $lang['month'] ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="years2" style="width: 90px;">
                                                <option selected>
                                                    <?php echo $lang['year'] ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" id="button2" type="button" value="<?php echo $lang['createproject'] ?>">
                                    <nav id="messageError2"> </nav>
                                    <br>
                                    <br>
                                    <p class="fw-light ">
                                        <?php echo $lang['note2'] ?>
                                    </p>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <br><br>
            <h1 id='coursesID' class="text-center"><?php echo $lang['mycourses'] ?></h1>
            <?php
            $i = 0;

            echo "<br>";
            echo "<table class='table table-dark table-striped table-hover' border='3'>";
            echo "<tr class='table-dark'>";
            echo "<td>", $lang['name'] . ":", "</td>";
            echo "<td>", $lang['priority'] . ":", "</td>";
            echo "<td>", $lang['description'] . ":", "</td>";
            echo "<td>", $lang['deadline'] , "</td>";
            echo "<td>", "</td>";
            echo "<td>",  "</td>";
            echo "</tr>";
            $i = 0;
            foreach ($corsi as $corso) {
                echo "<tr class='table-secondary' style='border: 2px solid black;' >";
                echo "<td>" . $corso['nome'] . "</td>";
                echo "<td>" . $corso['priorità'] . "</td>";
                echo "<td>" . $corso['descrizione'] . "</td>";
                echo "<td>" . $corso['data'] . "</td>";

                $nnome = $corso['nome'];
                $ndescrizione = $corso['descrizione'];
                $npriorita = $corso['priorità'];
                $giorno = date('d', strtotime($corso['data']));
                $mese = date("m", strtotime($corso['data']));
                $anno = date("Y", strtotime($corso['data']));

            ?>
                <td> <a href="#" onclick='modificaC(<?php echo json_encode($nnome) . "," . json_encode($ndescrizione) . "," . $npriorita . "," . $giorno . "," . $mese . "," . $anno ?>)'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill right ' viewBox='0 0 16 16' id='id'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z' />
                        </svg>
                    </a>
                </td>
                <?php



                ?>
                <td> <a href="#" onclick='elimina(<?php echo json_encode($corso['nome']) ?>)'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash right' viewBox='0 0 16 16' id='id'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                        </svg>
                    </a>
                </td>
            <?php

                //echo '<td> <a href="#" onclick='.'modificaC(' . htmlentities($nnome) .','  . $ndescrizione .',' .  $npriorita .',' . $giorno . ',' .$mese.','. $anno .')> modifica </a> </td>';

                //echo "<td> <a href='#' onclick=eliminaC(" . $i++ .")> elimina </a> " . "</td>";
                echo "</tr>";
            }
            $i = 0;
            echo "</table>";
            mysqli_close($conn);
            ?>
            <br><br>
            <h1 class="text-center"><?php echo $lang['projects'] ?></h1>
            <?php
            echo "<br>";
            echo "<table class='table table-dark table-striped table-hover' border='3'>";
            echo "<tr class='table-dark' border='3'>";
            echo "<td>", $lang['name'] . ":", "</td>";
            echo "<td>", $lang['priority'] . ":", "</td>";
            echo "<td>", $lang['description'] . ":", "</td>";
            echo "<td>", $lang['deadline'] , "</td>";
            echo "<td>", "</td>";
            echo "<td>",  "</td>";
            echo "</tr>";
            foreach ($progetti as $progetto) {
                echo "<tr class='table-secondary' style='border: 2px solid black;'>";
                echo "<td>" . $progetto['nome'] . "</td>";
                echo "<td>" . $progetto['priorità'] . "</td>";
                echo "<td>" . $progetto['descrizione'] . "</td>";
                echo "<td>" . $progetto['data'] . "</td>";
                $nnome = $progetto['nome'];
                $ndescrizione = $progetto['descrizione'];
                $npriorita = $progetto['priorità'];
                $giorno = date('d', strtotime($progetto['data']));
                $mese = date("m", strtotime($progetto['data']));
                $anno = date("Y", strtotime($progetto['data']));
            ?>
                <td>
                    <a href="#" onclick='modificaC(<?php echo json_encode($nnome) . "," . json_encode($ndescrizione) . "," . $npriorita . "," . $giorno . "," . $mese . "," . $anno ?>)'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill right ' viewBox='0 0 16 16' id='id'>
                            <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z' />
                        </svg>
                    </a>
                </td>
                <?php


                ?>
                <td>
                    <a href="#" onclick='elimina(<?php echo json_encode($progetto['nome']) ?>)'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash right' viewBox='0 0 16 16' id='id'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' />
                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' />
                        </svg>
                    </a>
                </td>
            <?php

                //echo "<td> <a href='#' onclick=modificaP(" . $i .")> modifica </a> " . "</td>";
                //echo "<td> <a href='#' onclick=eliminaP(" . $i++ .")> elimina </a> " . "</td>";
                echo "</tr>";
            }
            $i = 0;
            echo "</table>";
            echo "<br>";
            echo "<br>";
            ?>
            <!------------------------------------------------------------------------------------------------>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $lang['edit'] ?></h5>
                            <button id="close1" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-----------form modifica corso ------------------------->
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <br>
                                        <div class="row">
                                            <div class="col-3">
                                            <?php echo $lang['name'] . ":" ?>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="input-group mb-3" id="pcont">
                                                <input type="text" id="nomeCorso3" class="form-control" placeholder="nome" style="width: 300px">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                            <?php echo $lang['description'] . ":" ?>
                                            </div>
                                            <div class="col-6">
                                            </div>
                                            <div class="input-group">
                                                <textarea class="form-control" id="descrizione3" aria-label="With textarea" placeholder="descrizione"></textarea>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-2 t-1">
                                            <?php echo $lang['priority'] . ":" ?>
                                            </div>
                                            <div class="col-3">
                                                <select class="form-select" id="priorita3" aria-label="Default select example">
                                                    <option selected>
                                                        <?php echo $lang['priority'] ?>
                                                    </option>
                                                    <option value="1">
                                                        <?php echo $lang['low'] ?>
                                                    </option>
                                                    <option value="2">
                                                        <?php echo $lang['medium'] ?>
                                                    </option>
                                                    <option value="3">
                                                        <?php echo $lang['high'] ?>
                                                    </option>
                                                    <option value="4">
                                                        <?php echo $lang['veryhigh'] ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <span id="raggin" visibile='0' idOb=''>
                                                    <div class="row">
                                                        <div class="col-6 mt-1">
                                                            <?php echo $lang['achieved'] ?>
                                                        </div>
                                                        <div class="col-2 mt-1 ">
                                                        	
                                                            <input id="checkmo" class="form-check-input sep" type="checkbox" value="" checked="">
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                        </div>


                                        <!-- qui -->
                                        <div class="row">
                                            <form class="form-inline" style=" margin-top:15px; color:grey; ">
                                                <label id="nx" style="padding-bottom:10px;">
                                                    <?php echo $lang['note12'] ?>
                                                </label>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-3" style="margin-right:10px;">
                                                        <select class="form-select form-select-sm days" aria-label=".form-select-sm example" id="days3" style="width: 95px;">
                                                            <option selected>
                                                                <?php echo $lang['day'] ?>
                                                            </option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3" style="margin-right:10px;">
                                                        <select class="form-select form-select-sm months" aria-label=".form-select-sm example" id="months3" style="width: 90px;">
                                                            <option selected>
                                                                <?php echo $lang['month'] ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-select form-select-sm years" aria-label=".form-select-sm example" id="years3" style="width: 90px;">
                                                            <option selected>
                                                                <?php echo $lang['year'] ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>

                                            </form>
                                        </div>
                                        <br>
                                        <input class="btn btn-primary" id="button3" type="button" value="<?php echo $lang['edit'] ?>">

                                        <nav id="messageError3"> </nav>
                                        <br>
                                    </div>

                                </div>
                            </div>
                            <!--------------------------------------------------->
                        </div>
                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------------------------->
        </div>
    </div> <!-- CONTAINER PRINCIPALE-->




    <script src="./main.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <div style="margin-top:100px"></div>
    <!-- script aggiunti -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        function scroll_to(id) {

            $('html,body').animate({

                scrollTop: $('#' + id).offset().top
            }, 'slow');
        }
        $(document).ready(function() {
            $(".form-check-input").click(function() {
                var id = this.id;
                if (id!='checkmo'){
                  var state = this.checked ? 1 : 0;
                  $("#state_span").load("spuntaObiettivo.php?id=" + id + "&state=" + state, function() {
                      location.reload(true);
                  });
                }

            })
            $(".bi-trash").click(function() {
                var id = this.id;
                if (id != 'id') {
                    if (window.confirm("<?php echo ($lang['note14']) ?>")) {
                        //$("#state_span").load("eliminaObiettivo.php?id="+id);
                        //location.reload(true);
                        $.get("eliminaObiettivo.php", {
                                id: id
                            })
                            .done(function(data) {
                                location.reload(true);
                            });
                    }
                }



            })
            $(".bi-pencil-fill").click(function() {
                var id = this.id;
                if (id != 'id') {
                    //console.log("modifica questo chicco: " + id);
                    $.ajax({
                        url: './getObiettivo.php',
                        method: "POST",
                        data: {
                            id_obiettivo: id
                        },

                        type: 'get',
                        dataType: 'JSON',
                        success: function(response) {

                            if (!response) {


                            } else {
                                var descrizione = response[0].descrizione;
                                var scadenzaG = response[0].scadenzaG;
                                var scadenzaM = response[0].scadenzaM;
                                var scadenzaA = response[0].scadenzaA;
                                var attivita = response[0].attivita;
                                var priorita = response[0].priorita;
                                var raggiunto = response[0].raggiunto;


                                $('#descrizione3').val(descrizione);
                                $('#nomeCorso3').val(attivita);
                                $("#nomeCorso3").prop("disabled", true);
                                $('#priorita3').val(priorita);
                                $('#years3').val(parseInt(scadenzaA));
                                $('#days3').val(parseInt(scadenzaG));
                                $('#months3').val(parseInt(scadenzaM));
                                //$("#raggin").hide();
                                var raggin = document.getElementById('raggin');
                                var ragginVisi = raggin.getAttribute('visibile');
                                raggin.setAttribute('visibile', '1');
                                raggin.setAttribute('idOb', id);

                                $("#raggin").show();
                                $("#checkmo").prop("checked", (parseInt(raggiunto) == 1) ? true : false);
                                $('#exampleModalCenter1').modal('show');
                                console.log(raggin.getAttribute('visibile') == '1');

                            }
                        }
                    })
                }



            })

        })
    </script>
    <script>
        var nomeV;
        var descrizioneV;
        var prioritàV;
        var annoV;
        var meseV;
        var giornoV;

        function checkname(elementName) {
            var value = $(elementName).val();
            if (value == "" || value == "Priority" || value == "Priorità" || value == "Year" || value == "Anno" || value == "Month" ||
                value == "Mese" || value == "Giorno" || value == "Day") {
                $(elementName).css("border", "1px solid red");
                $(elementName).css("box-shadow", "0 0 10px red");
                return true;
            } else {
                $(elementName).css("border", "");
                $(elementName).css("box-shadow", "");
                return false;
            }
        }
        $(document).ready(function() {

            $("#button1").click(function() {
                var nome = $("#nomeCorso").val();
                var descrizione = $("#descrizione").val();
                var priorita = $("#priorita").val();

                var years = $("#years").val();
                var giorno = $("#days").val();
                var mese = $("#months").val();
                var tipo = 'corso';

                if (checkname("#nomeCorso") || checkname("#descrizione") || checkname("#priorita") || checkname("#years") ||
                    checkname("#days") || checkname("#months")) {
                    $('#messageError1').html('<span class="text-danger"><br> compliare il form correttamente</span>');
                } else {
                    $('#messageError1').html('<span class="text-danger"></span>');
                    $.ajax({
                        url: './script.php',
                        method: "POST",
                        data: {
                            input_nCorso: nome,
                            input_descrizione: descrizione,
                            input_priorita: priorita,
                            input_anno: years,
                            input_giorno: giorno,
                            input_mese: mese,
                            input_tipo: tipo
                        },
                        success: function(response) {
                            if (!response) {
                                $('#messageError1').html('<span class="text-success">Inserimento effettuato correttamente</span>');
                            } else {
                                console.log(response);
                                $('#messageError1').html('<span class="text-danger">Errore nell\'inserimento</span>');
                            }
                        }
                    })
                }
            });
            $("#button2").click(function() {
                var nome = $("#nomeProgetto").val();
                var descrizione = $("#descrizione2").val();
                var priorita = $("#priorita2").val();

                var years = $("#years2").val();
                var giorno = $("#days2").val();
                var mese = $("#months2").val();
                var tipo = 'progetto';

                if (checkname("#nomeProgetto") || checkname("#descrizione2") || checkname("#priorita2") || checkname("#years2") ||
                    checkname("#days2") || checkname("#months2")) {
                    $('#messageError2').html('<span class="text-danger"><br> compliare il form correttamente</span>');
                } else {
                    $('#messageError2').html('<span class="text-danger"></span>');
                    $.ajax({
                        url: './script.php',
                        method: "POST",
                        data: {
                            input_nCorso: nome,
                            input_descrizione: descrizione,
                            input_priorita: priorita,
                            input_anno: years,
                            input_giorno: giorno,
                            input_mese: mese,
                            input_tipo: tipo
                        },
                        success: function(response) {
                            if (!response)
                                $('#messageError2').html('<span class="text-success">Inserimento effettuato correttamente</span>');
                            else {
                                console.log(response);
                                $('#messageError2').html('<span class="text-danger">Errore nell\'inserimento</span>');
                            }
                        }
                    })
                }
            });
            $("#salva").click(function() {
                /*
                console.log($("#oCourse").val());
                console.log($("#Odescription").val());
                console.log($("#opriority").val());
                console.log($("#days1").val());
                console.log($("#months1").val());
                console.log($("#years1").val());
                */
                if (checkname("#oCourse") || checkname("#Odescription") || checkname("#opriority") || checkname("#years1") ||
                    checkname("#days1") || checkname("#months1")) {
                    $('#msgErrorO').html('<span class="text-danger"><br> compliare il form correttamente</span>');
                } else {
                    {
                        $('#msgErrorO').html('<span class="text-danger"><br> </span>');

                        $.ajax({
                            url: './aggiungiObiettivo.php',
                            method: "POST",
                            data: {
                                input_nObiettivo: $("#oCourse").val(),
                                input_descrizione: $("#Odescription").val(),
                                input_priorita: $("#opriority").val(),
                                input_giorno: $("#days1").val(),
                                input_mese: $("#months1").val(),
                                input_anno: $("#years1").val()
                            },
                            success: function(response) {
                                if (!response) {
                                    $('#msgErrorO').html('<span class="text-success">Inserimento effettuato correttamente</span>');
                                } else {
                                    console.log(response);
                                    $('#msgErrorO').html('<span class="text-danger">Errore nell\'inserimento</span>');
                                }
                            }
                        })
                    }
                }


            });
            $('#close1').on('click', function() {
                $('#exampleModalCenter1').modal('hide');
            });
            $('#close2').on('click', function() {
                $('#exampleModalCenter1').modal('hide');
            });
            $('#closeBtn').on('click', function() {
                location.reload(true);
            });
            $('#closeBtn1').on('click', function() {
                location.reload(true);
            });
            closeBtn1
            $('#save').on('click', function() {
                $('#exampleModalCenter1').modal('hide');

            });
            $("#nomeCorso3").click(function() {
                //ciao = $('#nomeCorso3').val();
            });
            $("#descrizione3").keyup(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#priorita3").change(function() {
                $('#button3').val("Salva le modifiche")
            });

            $("#nomeCorso3").keyup(function() {

                $('#button3').val("Salva le modifiche")
            });
            $("#descrizione3").keyup(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#priorita3").change(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#years3").change(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#days3").change(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#months3").change(function() {
                $('#button3').val("Salva le modifiche")
            });
            $("#button3").click(function() {
                var raggin = document.getElementById('raggin');
                var ragginVisi = raggin.getAttribute('visibile');
                var idObi = raggin.getAttribute('idOb');
                if (ragginVisi == 0) { // la check box raggiunto è invisibile quindi la form è modifica corso
                    $.ajax({
                        url: './modifica.php',
                        method: "POST",
                        data: {
                            input_nCorso: $('#nomeCorso3').val(),
                            input_descrizione: $('#descrizione3').val(),
                            input_priorita: $('#priorita3').val(),
                            input_years: $('#years3').val(),
                            input_days: $('#days3').val(),
                            input_moths: $('#months3').val(),
                            input_nomeV: nomeV,
                            input_daysV: giornoV,
                            input_mothsV: meseV,
                            input_yearsV: annoV
                        },
                        success: function(response) {

                            if (!response) {
                                console.log("(nessuna risposta)operazione andata a buon fine!");
                            } else {
                                console.log(response);
                            }
                            location.reload();

                        }
                    })
                } else {

                    $.ajax({
                        url: './modificaObiettivo.php',
                        method: "POST",
                        data: {
                            input_descrizione: $('#descrizione3').val(),
                            input_priorita: $('#priorita3').val(),
                            input_years: $('#years3').val(),
                            input_days: $('#days3').val(),
                            input_moths: $('#months3').val(),
                            input_raggiunto: ($('#checkmo').is(":checked")) ? 1 : 0,
                            input_idOb: idObi

                        },
                        success: function(response) {

                            if (!response) {
                                console.log("(nessuna risposta)operazione andata a buon fine!");
                            } else {
                                console.log(response);
                            }
                            location.reload();

                        }
                    })
                }

            });
        });

        function elimina(nome) {

            if (window.confirm("<?php echo $lang['note13']?>" + nome + " ?")) {
                $.ajax({
                    url: './elimina.php',
                    method: "POST",
                    data: {
                        input_nCorso: nome,
                        input_tipo: 'corso'
                    },
                    success: function(response) {

                        if (!response) {
                            console.log("(nessuna risposta)operazione andata a buon fine!");
                        } else {
                            console.log(response);
                        }
                        document.location.reload(true)

                    }
                })
            }
        }
        /*
        $(window).scroll(function() {
          sessionStorage.scrollTop = $(this).scrollTop();
        });

        $(document).ready(function() {
          if (sessionStorage.scrollTop != "undefined") {
            $(window).scrollTop(sessionStorage.scrollTop);
          }
        });
        */
        function modificaC(nomeCorso, descrizione, priorita, days, months, years) {
            nomeV = nomeCorso;
            descrizioneV = descrizione;
            prioritàV = priorita;
            annoV = years;
            meseV = months;
            giornoV = days;
            $("#nomeCorso3").prop("disabled", false);
            $('#nomeCorso3').val(nomeCorso);
            $('#descrizione3').val(descrizione);
            $('#priorita3').val(priorita);
            $('#years3').val(years);
            $('#days3').val(days);
            $('#months3').val(months);
            $("#raggin").hide();
            var raggin = document.getElementById('raggin');
            var ragginVisi = raggin.getAttribute('visibile');
            raggin.setAttribute('visibile', '0');
            $('#exampleModalCenter1').modal('show');
        }

        function modificaP(nome) {
            alert("modifica progetto " + nome);
        }
    </script>
</body>

<style>
    #droppy {
        float: right;

    }

    #pencil {
        margin-right: 30px;
    }

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