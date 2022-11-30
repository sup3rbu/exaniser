<?php
    include "../config.php";
    session_start();

?>

<!DOCTYPE html>
<head>
    <title>Exaniser</title>
        <meta charset="utf 8"/>
        <meta name="viewport" content="width=device-width initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
        <script src = "../js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="../mystyle.css"/>
        <link rel="stylesheet" type="text/css" href="../theaboutstyles.css"/>
        <link rel = "icon" href = "../assets/1-logo.png" 
        type = "image/x-icon">
        <script src="./checkForm.js"></script>
        
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
            <a href="../index.php"><img src="logo.png" alt="logo" id="logo"></a>
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
                          <option value="" selected><?php echo $lang['language']?></option>
                          <option value="index.php?lang=en">English</option>
                          <option value="index.php?lang=it">Italiano</option>
                      </select>
                    </li>
                    <li class="nav-item bc ">
                      <a class="nav-link active" aria-current="page" href="../index.php" id="home">Home</a>
                    </li>
                    <li class="nav-item bc ">
                      <a class="nav-link active" href="../about/index.php" id="au"><?php echo $lang['aboutus']?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../login/index.php" id="lo"><button id="btn1" type="button" class="btn btn-success"><?php echo $lang['signin']?></button></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../register/index.php" id="si"><button id="btn2" type="button" class="btn btn-outline-success "><?php echo $lang['register']?></button></a>
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
                <img src="../assets/libri__2_.jpg" class="img-fluid" height="10px"  alt="" >
            </div>
            <div class="col-lg-7 text-center py-5">
                <h1> <?php echo $lang['regto']?> </h1>
                <form name="myForm" action="register.php" onsubmit="return validaForm()" method="post">
                	 <div class="form-row py-3 pt-5">
                        <div class=" offset-1  col-lg-10">
                            <input maxlength="50" name ="inputUsername" id="inputUsername" type="text" required placeholder="<?php echo $lang['username']?>" class="inp  px-3">
                        </div>
                    </div>
                    <div class="form-row py-3 ">
                        <div class=" offset-1  col-lg-10">
                            <input maxlength="100" name ="inputEmail" id="inputEmail" type="email" required placeholder="Email" class="inp  px-3">
                        </div>
                        
                    </div>
                    <span class="py-3 "id="availability"></span>
                    <div class="form-row py-3 ">
                        <div class="offset-1 col-lg-10 ">
                            <input maxlength="20" name="inputPass1" id="inputPass1" type="password" required placeholder="Password" class="inp  px-3 ">
                        </div>
                        
                    </div>
                    <div class="form-row py-3">
                        <div class="offset-1 col-lg-10 ">
                            <input maxlength="20" name="inputPass2" id="inputPass2" type="password" required placeholder="<?php echo $lang['confirm']?> Password" class="inp px-3">
                        </div>
                        
                    </div>
                    <span id="messaggio"></span>
                    <div class="form-row py-3">
                        <div class="offset-1 col-lg-10 ">
                            <button type="submit" id="registerButton" name="registerButton" class="btn1 mt-4 mb-5" ><?php echo $lang['regto']?> </button>
                        </div>
                    </div>
                </form>
                <?php echo $lang['already']?>
                <a href="../login/index.php"> <?php echo $lang['signin']?> </a>
            </div>
            </div>
    </div>
  </section>
<script>  
    $(document).ready(function()
    {  
        $('#inputEmail').keyup(function()
        {
   
            var inputEmail = $(this).val();
            
            var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
            $.ajax({
                url:'check.php',
                method:"POST",
                data:{input_email:inputEmail},
                success:function(response)
                {
                    if(response != '0')
                    {
                        $('#availability').html('<span class="text-danger">email gia\' utilizzata</span>');
                        $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
               		    $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                        $(':input[type="submit"]').prop('disabled', true);
                    }
                    else if (inputEmail!="" && !pattern.test(inputEmail))
                    {
                    	$('#availability').html('<span class="text-danger">inserire un\' email valida</span>');
                        $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
               		    $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                        $(':input[type="submit"]').prop('disabled', true);
                    }
                    else if (pattern.test(inputEmail))
                    {
                    	$('#availability').html('<span class="text-danger"></span>');
                        $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
               		    $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                        $(':input[type="submit"]').prop('disabled', false);
                        
                    }
                    else 
                    {
                    	$('#availability').html('<span class="text-danger"></span>');
                        $("#inputEmail").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 0, 0, 0.69)"});
               		    $("#inputEmail").css({"box-shadow":"5px 5px 19px -5px rgba(0, 0, 0, 0.69)"});
                        $(':input[type="submit"]').prop('disabled', true);
                    }
                }
            })
   
     });
     	$('#inputUsername').keyup(function()
        {
        	if ( $("#inputUsername").val() != '')
            {
            $(':input[type="submit"]').prop('disabled', false);
             $("#inputUsername").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
             $("#inputUsername").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
            }
            else
            {
            $(':input[type="submit"]').prop('disabled', true);
             $("#inputUsername").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
             $("#inputUsername").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
            }
        });
        
        $('#inputPass2,#inputPass1').keyup(function()
        {
        	
            var password = $("#inputPass1").val();
        	var confirmPassword = $("#inputPass2").val();
        	if (password != confirmPassword){
            	$("#messaggio").html('<span class="text-danger">le password sono diverse</span>');
      				// -webkit-box-shadow: 5px 5px 19px -5px rgba(255, 0, 0, 0.69); 
       				//box-shadow: 5px 5px 19px -5px rgba(255, 0, 0, 0.69);
                $("#inputPass1").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                $("#inputPass1").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                
                $("#inputPass2").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                $("#inputPass2").css({"box-shadow":"5px 5px 19px -5px rgba(255, 0, 0, 0.69)"});
                $(':input[type="submit"]').prop('disabled', true);
                }
            else if ((password == confirmPassword) && password!="") {
            	$("#messaggio").html('<span></span>');
                $(':input[type="submit"]').prop('disabled', false);
                $("#inputPass1").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                $("#inputPass1").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, , 0.69)"});
                
                $("#inputPass2").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});
                $("#inputPass2").css({"box-shadow":"5px 5px 19px -5px rgba(0, 255, 0, 0.69)"});}
            else {
            	$(':input[type="submit"]').prop('disabled', true);
            	$("#messaggio").html('<span></span>');
            	$("#inputPass1").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 0, 0, 0.69)"});
                $("#inputPass1").css({"box-shadow":"5px 5px 19px -5px rgba(0, 0, , 0.69)"});
                
                $("#inputPass2").css({"-webkit-box-shadow":"5px 5px 19px -5px rgba(0, 0, 0, 0.69)"});
                $("#inputPass2").css({"box-shadow":"5px 5px 19px -5px rgba(0, 0, 0, 0.69)"});
            }
        });
        
        //$("registerButton").click(function(){
        //window.location = "../CorsoProgetto/index.php";
        //});
   
    });  
</script>    
</body>
</html>





