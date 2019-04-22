<?php

  if(array_key_exists("logout", $_GET)) {
    unset($_SESSION['user_id']);
    setcookie("user_id", "", time()- 60*60);
    $_COOKIE["user_id"] = "";
  } else if ((array_key_exists("user_id", $_SESSION) AND $_SESSION['user_id']) OR (array_key_exists("user_id", $_COOKIE) AND $_COOKIE['user_id'])){

    header("Location: app.php");

  }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tempo</title>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="shortcut icon" href="https://codysimmons.tech/tempo/img/favicon.ico" type="image/png">   
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="register.js"></script>
        <script src="login.js"></script>
    </head>
    <body>
      <div id="header">
      <div id ="first">
                <img src="/img/tempologo.png" alt="logo"> TEMPO 
            </div> 
      </div>
        <div class="form">
            <ul class="tab-group">
              <li class="tab active"><a href="#signup">Sign Up</a></li>
              <li class="tab"><a href="#login">Log In</a></li>
            </ul>
            
            <div class="tab-content">
              <div id="signup">   
                <h1>Sign Up for Free</h1>
              
                <div class="top-row">
                  <div class="field-wrap">
                    <label>
                      First Name<span class="req">*</span>
                    </label>
                    <input type="text"  id="firstName" name="firstName"/>
                  </div>
              
                  <div class="field-wrap">
                    <label>
                      Last Name<span class="req">*</span>
                    </label>
                    <input type="text"required autocomplete="off" id="lastName" name="lastName"/>
                  </div>
                </div>
      
                <div class="field-wrap">
                  <label>
                    Email Address<span class="req">*</span>
                  </label>
                  <input type="email"required autocomplete="off" id="email" name="email"/>
                </div>
                
                <div class="field-wrap">
                  <label>
                    Set A Password<span class="req">*</span>
                  </label>
                  <input type="password"required autocomplete="off" id="passwordReg" name="passwordReg"/>
                </div>
                
                <button class="button button-block" id="register" type="submit"/>Get Started</button>
                
                <div id="register_output"></div>
              </div>
              
              <div id="login">   
                <h1>Welcome Back!</h1>
                
                
                  <div class="field-wrap">
                  <label>
                    Email Address<span class="req" >*</span>
                  </label>
                  <input type="email"required autocomplete="off" id="emailLog"/>
                </div>
                
                <div class="field-wrap">
                  <label>
                    Password<span class="req" >*</span>
                  </label>
                  <input type="password"required autocomplete="off" id="passwordLog"/>
                </div>
                
                <p class="forgot"><a href="#">Forgot Password?</a></p>
                
                <button class="button button-block" id="loginB"/>Log In</button>
                <div id="login_output"></div>

    
              </div>
              
            </div><!-- tab-content -->
            
      </div> <!-- /form -->

      <footer>
      <div class="copyright">
        <p>&copy 2017 - Cody Simmons, Brian Henrick, Chase Fenske</p>
      </div>
      <div class="social">
        <a href="#" class="support">Contact Us</a>
        <a href="#" class="face">f</a>
        <a href="#" class="tweet">t</a>
        <a href="#" class="linked">git</a>
      </div>
      </footer>
    
    </body>
    <script src="main.js"></script> 
</html>