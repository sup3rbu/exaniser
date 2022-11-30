<?php
    include "../config.php";
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Exaniser</title>
        <meta charset="utf 8"/>
        <meta name="viewport" content="width=device-width initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
        
        <link rel="stylesheet" type="text/css" href="theaboutstyles.css"/>

        <link rel = "icon" href = "../assets/1-logo.png" 
        type = "image/x-icon">
        
</head>

<body style="background: rgb(219,226,226);">
 
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light " id="thenavbar">
          <div class="container-fluid ">
              <a href="./index.php"><img src="./logo.png" alt="logo" id="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              </ul>
              <form class="d-flex">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item " id="sel">
                        <select name="language" class= "form-select" id="select" onChange="window.location.href=this.value">
                            <option value="" selected><?php echo $lang['language'] ?></option>
                            <option value="index.php?lang=en">English</option>
                            <option value="index.php?lang=it">Italiano</option>
                        </select>
                      </li>
                      <li class="nav-item bc  ">
                        <a class="nav-link active" aria-current="page" href="http://exaniser.altervista.org/index.php" id="home">Home</a>
                      </li>
                      <li class="nav-item bc ">
                        <a class="nav-link active" href="../about/index.php" id="au"><?php echo $lang['aboutus'] ?></a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link " href="../login/index.php" id="lo"><button id="btn1" type="button" class="btn btn-success"><?php echo $lang['signin'] ?></button></a>
                      </li>
                      <li class="nav-item  " >
                          <a class="nav-link" href="../register/index.php" id="si"><button id="btn2" type="button" class="btn btn-outline-success "><?php echo $lang['register'] ?></button></a>
                      </li>
                  </ul>
              </form>
            </div>
          </div>
        </nav>

          <div class = "row">
              <div class= "col">
                <p class="fw-light text-center main-text"><?php echo $lang['intro'] ?></p>
                <p class= "fw-light  text-center subtext"> <?php echo $lang['exp'] ?></p>
                <br>
                <hr>
                <br>
                <p class="text-center fw-light int"> <?php echo $lang['thecreators'] ?></p>
                <br>

                <div class="card thecards card1" style="width: 18rem;" id="c1">
                    <img src="laert.jpg" class="card-img-top  cs" alt="Laert" width="150" height="240px">
                    <div class="card-body">
                        <h5 class="text-center">Laert Leba</h5>
                    <p class="card-text">
                    <?php echo $lang['laert'] ?>
                    </p>
                    </div>
                </div>

                <div class="card thecards card2" style="width: 18rem;">
                    <img src="./Senzanome.png" class="card-img-top" alt="Cristian" width="150" height="240px">
                    <div class="card-body">
                        <h5 class="text-center">Cristian Buciu</h5>
                    <p class="card-text"> <?php echo $lang['laert'] ?></p>
                    </div>
                </div>
          </div>
        </div>

    </div>


  <script src = "../js/bootstrap.bundle.min.js"></script>

  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <div style="margin-top:500px"></div>

</body>
<style>
    
    #lo{
    	border-right: 1px dotted rgb(196, 192, 192);
    }
    #si{
    	border-right: 1px dotted rgb(196, 192, 192);
    }
    
    #thenavbar{
    	padding-top: 0px;
    }
    #select{
    	background-color: rgb(219,226,226);
        font-size:19px;
    }
    
    
    
    .bc{
    	font-size: 20px;
    }
    #home{
    	margin-left: 15px
    }
     #au {
      border-right: 1px dotted rgb(196, 192, 192);
    }
</style>

</html>

