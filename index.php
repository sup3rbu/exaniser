<?php
    include "config.php";
    session_start();

?>

<!DOCTYPE html>

<head>
  <title>Exaniser</title>
  <meta charset="utf 8" />
  <meta name="viewport" content="width=device-width initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="mystyle.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>


  <link rel="icon" href="./assets/1-logo.png" type="image/x-icon">
  <style>
    #logo {
      width: 170px;
      margin-top: 4px;
    }

    .right {

      float: right;
    }


    ul {
      list-style-type: none;
      overflow: hidden;
    }


    li {
      float: left;
    }

    li a {
      font-size: 20px;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      display: inline-block;
      color: black;
      padding: 14px 20px;
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
      margin-left: 15px;

    }

    #lo {
      border-right: 1px dotted rgb(196, 192, 192);

    }

    #si {
      border-right: 1px dotted rgb(196, 192, 192);

    }

    #img {
      border-right: 1px dotted rgb(196, 192, 192);

    }
    #btn1:hover {
      /* background-color: darkgreen; */
      background-color: darkgreen;
    }

    #btn2:hover {
      /* background-color: darkgreen; */
      background-color: darkgreen;

    }

    .btn3 {
      /* background-color: darkgreen; */
      background-color: #7af1a4;
      font-size: 18px;
      cursor: pointer;
    }

    .btn4 {
      /* background-color: darkgreen; */
      background-color: #009ee7;
      font-size: 18px;
      cursor: pointer;
    }

    .btn3:hover {
      /* background-color: darkgreen; */
      transform: scale(1.02);
      background-color: #6ed693;
    }

    .btn4:hover {
      /* background-color: darkgreen; */
      transform: scale(1.02);
      background-color: #008cce;

    }

    .svg-container {
      display: inline-block;
      position: relative;
      width: 100%;
      padding-bottom: 50%;
      vertical-align: baseline;
      overflow: hidden;
    }

    .svg-content {
      display: inline-block;
      position: absolute;
      top: 10%;
      left: 0;
    }

    .thecards {
      float: left;
      transition: 0.5s ease;
      cursor: pointer;
      box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.6)
    }

    .thecards:hover {
      transform: scale(1.05);
      box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.6)
    }
    #thenavbar{
    	padding-top: 0px;
    }
    #select{
    	background-color: rgb(219,226,226);
        font-size:19px;
    }
    
    li a:hover{
    font-color:white;
    }
    
    .bc{
    	font-size: 20px;
    }
    
    @media (min-width: 992px)
	.navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 0.9rem;
    padding-left: 0.5rem;
}
    
    
    
  </style>
</head>

<body style="background: rgb(219,226,226);">
   <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light " id="thenavbar">
          <div class="container-fluid ">
              <a href="./index.php"><img src="./assets/logo.png" alt="logo" id="logo"></a>
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
                      <li class="nav-item bc ">
                        <a class="nav-link active" aria-current="page" href="./index.php" id="home">Home</a>
                      </li>
                      <li class="nav-item bc ">
                        <a class="nav-link active" href="../about/index.php" id="au"><?php echo $lang['aboutus'] ?></a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link " href="../login/index.php" id="lo"><button id="btn1" type="button" class="btn btn-success"><?php echo $lang['signin'] ?></button></a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="../register/index.php" id="si"><button id="btn2" type="button" class="btn btn-outline-success "><?php echo $lang['register'] ?></button></a>
                      </li>
                  </ul>
              </form>
            </div>
          </div>
        </nav>
  </div>


  <div class="container">
    <div class="text-center ">
      <h1> <b> <?php echo $lang['note3'] ?></b>
      </h1>
      <h2>
      <?php echo $lang['note4'] ?>
      </h2>
    </div>
    <div class="row mt-5">
      <div class="col">

      </div>
      <div class="col">


        <div class="text-center">
          <button id="btd1" class="btn btn4 rounded-pill " onclick="scroll_to('sec2')"><?php echo $lang['discover'] ?></button>
        </div>
      </div>
      <div class="col">
        <div class="text-center">
          <a id="btd2" class="btn btn3  rounded-pill" href="./register/index.php"> <?php echo $lang['start'] ?> </a>
        </div>
      </div>
      <div class="col">

      </div>
    </div>



  </div>

  <div class="svg-container">
  <object type="image/svg+xml" data="./assets/disegno13.svg" width="100%" height="55%" class="svg-content" id="svg-img1">
    </object>
    <object type="image/svg+xml" data="./assets/disegno12.svg" width="100%" height="55%" class="svg-content" id="svg-img">
    </object>
    
  </div>




  <div id="sec2" class="section" style="margin-bottom: 10%;">

    <div class="container  " style="margin-top:0;">
      <div class="row  ">
        <div class="col mt-3">
          <div class="card thecards" style="width: 18rem;">
            <img src="./assets/cardEsami.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note5'] ?></p>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card thecards " style="width: 18rem;">
            <img src="./assets/cardProgetti.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note6'] ?></p>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card thecards" style="width: 18rem;">
            <img src="./assets/cardObiettivi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note7'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 ">
        <div class="col mt-3">
          <div class="card thecards" style="width: 18rem;">
            <img src="./assets/cardSpunta.png" class="card-img-top" alt="..." >
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note8'] ?></p>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card thecards" style="width: 18rem;">
            <img src="./assets/cardProgressi.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note9'] ?></p>
            </div>
          </div>
        </div>
        <div class="col mt-3">
          <div class="card thecards" style="width: 18rem;">
            <img src="./assets/cardDeadline.png" class="  card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><?php echo $lang['note10'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>





  <script src="https://unpkg.com/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>

  <script>

    function scroll_to(id) {
      $('html,body').animate({
        scrollTop: $('#' + id).offset().top
      }, 'slow');
    }
/*
          new fullpage('#fullpage',{
            autoScrolling : true,
            navigation:true
          })
          */
  </script>

  <script type="text/javascript">

    var imgObj = null;
    var imgObj1 = null;
    var animate;
    let timePassed;
    var elementi = [];
    var inizio;
    var size = 4;
    var b = 1;

    function init() {
	$( "#svg-img1" ).hide();

      elementi.push('g6452');
      elementi.push('g4875-7');
      elementi.push('g6427');
      elementi.push('g6458');
      elementi.push('g3818');
      //g6452   g4875-7 g6427 g6458 g3818
      funAnim();
    }
    function move(id) {
      var svgObject = document.getElementById('svg-img').contentDocument;
      //g6452   g4875-7 g6427 g6458 g3818
      var svgElement = svgObject.getElementById(id);
      //var a= svgElement.getCTM();

      var matriceO = svgElement.getAttribute("transform")
      var matriceS = matriceO.split(',');
      var matriceR = "";
      var modifica = 10;
      var editedText = matriceS[5].slice(0, -1)
      //console.log(parseFloat(editedText)+modifica);
      editedText = parseFloat(editedText) + modifica;
      for (i = 0; i < 5; i++) {
        matriceR = matriceR + matriceS[i] + ",";
      }
      matriceR = matriceR + editedText + ")";
      // console.log(matriceR);

      svgElement.setAttribute("transform", matriceR);

    }
    function funAnim() {
      if (size >= 0) {
        //document.getElementById("btd").disabled = true;
        let start = Date.now();

        let timer = setInterval(function () {
          let timePassed = Date.now() - start;

          //elementi[0].style.top = parseInt(elementi[0].style.top) + 10 + 'px';
          move(elementi[size]);

          if (timePassed > 500) {
            size--;
            clearInterval(timer);

            //document.getElementById("btd").disabled = false;
            funAnim();
          }

        }, 20);

      }
      else {

        //document.getElementById("svg-img").data = "./assets/disegno13.svg";
  		$( "#svg-img" ).hide();
        $( "#svg-img1" ).show();
      }

    }



    window.onload = init;

  </script>

</body>

</html>