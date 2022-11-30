<?php
    include "../config.php";
    session_start();
    if ($_SESSION['email'] != ""){
    	header("Location: ../home/index.php");
		exit();
        }
?>
<!DOCTYPE html>
<head>
    <title>Exaniser</title>
        <meta charset="utf 8"/>
        <meta name="viewport" content="width=device-width initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="../theaboutstyles.css"/>
        <link rel="stylesheet" type="text/css" href="../mystyle.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <link rel = "icon" href = "../assets/1-logo.png" 
        type = "image/x-icon">
        <script src="./scriptForm.js"></script>
        <script></script>
        <style>
            .row{
                background: white;
                border-radius: 30px;
                box-shadow: 12px 12px 22px grey;
            }
            #logo{
              width: 170px;
              margin-top: 4px;
            }
          .right{
              float:right;
            }
            
            ul {
                list-style-type:  none;
                overflow: hidden;
                }
        
        
            li {
                float: left;
            }
        
            li a {
            font-size: 20px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: inline-block;
            color: black;
            padding: 14px 16px;
            text-decoration: none;
        
            }
            #last{
                margin-right:60px;
            }

            li a:hover{
                color: white;
            }

            #au{
                border-right: 1px dotted rgb(196, 192, 192);
            }
        
            #bd{
                border-right: 1px dotted rgb(196, 192, 192);
            }

            #home{
                border-right: 1px dotted rgb(196, 192, 192);
                border-left: 1px dotted rgb(196, 192, 192);
                margin-left: 15px;
                
            }
            #lo{
                border-right: 1px dotted rgb(196, 192, 192);
                
            }
            #si{
                border-right: 1px dotted rgb(196, 192, 192);
                
            }
            #img{
                border-right: 1px dotted rgb(196, 192, 192);
        
            }
            
          #select{
              background-color: rgb(219,226,226);
              font-size:19px;
          }
          #thenavbar{
    	padding-top: 0px;
    }
        </style>

</head>
<body style="background: rgb(219,226,226);">
    

    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light " id="thenavbar">
        <div class="container-fluid ">
            <a href="./index.php"><img src="logo.png" alt="logo" id="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item" id="sel">
                      <select name="language" class= "form-select" id="select" onChange="window.location.href=this.value">
                          <option value="" selected><?php  echo $lang['language'] ?></option>
                          <option value="index.php?lang=en">English</option>
                          <option value="index.php?lang=it">Italiano</option>
                      </select>
                    </li>
                    <li class="nav-item bc ">
                      <a class="nav-link active" aria-current="page" href="../index.php" id="home">Home</a>
                    </li>
                    <li class="nav-item bc ">
                      <a class="nav-link active" href="../about/index.php" id="au"><?php  echo $lang['aboutus'] ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../login/index.php" id="lo"><button id="btn1" type="button" class="btn btn-success"><?php  echo $lang['signin'] ?></button></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../register/index.php" id="si"><button id="btn2" type="button" class="btn btn-outline-success "><?php  echo $lang['register'] ?></button></a>
                    </li>
                </ul>
            </form>
          </div>
        </div>
      </nav>
  </div>

  <section class="login py-5 ">
    <div class="container">
        <div class ="row g-0">
            <div class="col-lg-5">
                <img src="../assets/3-libri.jpg" class="img-fluid"  alt="" >
            </div>
            <div class="col-lg-7 text-center py-5">
                <h1> <?php  echo $lang['login'] ?> </h1>
                <form  name="myForm"   method="post">
                    <div class="form-row py-3 pt-5">
                        <div class=" offset-1  col-lg-10">
                            <input type="email" maxlength="100" id="inputEmail" required name="inputEmail" placeholder="email" class="inp  px-3">
                        </div>
                    </div>
                    <span id="email-error"></span>
                    <div class="form-row py-3 ">
                        <div class="offset-1 col-lg-10 ">
                            <input type="password" maxlength="20" required id="inputPass" name="inputPass" placeholder="password" class="inp  px-3 ">
                        </div>
                    </div>
                    <span id="message"></span>
                   
                    <div class="form-row py-3">
                        <div class="offset-1 col-lg-10 ">
                            <button type="button" id="button" class="btn1 mt-4 mb-5" ><?php  echo $lang['login'] ?></button>
                        
                        </div>
                    </div>
                </form>
                <?php  echo $lang['noaccount'] ?>
                <a href="../register/index.php"> <?php  echo $lang['register'] ?> </a>
            </div>
    </div>
  </section>
<script>  
    $(document).ready(function()
    {	
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        $('#inputPass').keyup(function()
        {
        	var inputPass = $("#inputPass").val();
            if (inputPass=="")
            {
            	 $("#inputPass").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                 $("#inputPass").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
            }
            else
            {
           		 $("#inputPass").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                 $("#inputPass").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
            }
        });
    	$('#inputEmail').keyup(function()
        {
        	var inputEmail = $("#inputEmail").val();
         	if (!pattern.test(inputEmail))
         	{
            	 $('#email-error').html('<span class="text-danger">inserire un\'email valida</span>');
                 $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                 $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
         	}
            else 
            {
                $('#email-error').html('<span class="text-danger"></span>');
            	$("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
            }
        });
        
    	$("#button").click(function(){
        	var inputEmail = $("#inputEmail").val();
            var inputPass = $("#inputPass").val();
            if (inputEmail == inputPass && inputPass == "")
            {
            	 $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                 $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                 $("#inputPass").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                 $("#inputPass").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
            	return;
            }
            $.ajax({
                url:'check.php',
                method:"POST",
                data:{input_email:inputEmail,
                	  input_pass:inputPass},
                success:function(response)
                {
              
                	if(response == '0'){
                    	$('#message').html('<span class="text-danger">email o password errati</span>');
                    }
                    else{
                    	$('#message').html('<span class="text-danger"></span>');
                        $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                	    $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                        $("#inputPass").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                        $("#inputPass").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                        window.location = "../home/index.php";
                        }
                }
                })
        });
        
    });
</script>  
<script src = "../js/bootstrap.bundle.min.js"></script>
</body>
</html>



