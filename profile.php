<?php

    session_start();

    if(array_key_exists("user_id", $_COOKIE)) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
    } else {
        header("Location: index.php");
    }

    $conn = mysqli_connect("shareddb-g.hosting.stackcp.net", "tempodb-3235e640", "YFFtGhhfi.IW42T", "tempodb-3235e640");
    $sessid = $_SESSION['user_id']; 
    $query = "SELECT * FROM users WHERE user_id = '".mysqli_real_escape_string($conn, $sessid)."' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $genre = $_POST['genre'];

    $query = "UPDATE `users` SET firstname = '$firstName', lastname = '$lastName', email = '$email', genre = '$genre' WHERE member_id = '$sessid'"
    $result = mysqli_query($con, $query);
    
    // $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 0, 1";
    // $result = mysqli_query($conn, $query);
    // $topSong = mysqli_fetch_assoc($result);
    // $topSongArtist = $topSong['song_artist'];
    // $topSongTitle = $topSong['song_title'];
    // $topSongPlayCount = $topSong['playCount'];

    // $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 1, 1";
    // $result = mysqli_query($conn, $query);
    // $topSong2 = mysqli_fetch_assoc($result);
    // $topSong2Artist = $topSong2['song_artist'];
    // $topSong2Title = $topSong2['song_title'];
    // $topSong2PlayCount = $topSong2['playCount'];

    // $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 2, 1";
    // $result = mysqli_query($conn, $query);
    // $topSong3 = mysqli_fetch_assoc($result);
    // $topSong3Artist = $topSong3['song_artist'];
    // $topSong3Title = $topSong3['song_title'];
    // $topSong3PlayCount = $topSong3['playCount'];

    // $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 0, 1";
    // $result = mysqli_query($conn, $query);
    // $topArtist = mysqli_fetch_assoc($result);
    // $topArtistName = $topArtist['song_artist'];
    // $topArtistCount = $topArtist['SUM(playCount)'];

    // $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 1, 1";
    // $result = mysqli_query($conn, $query);
    // $topArtist2 = mysqli_fetch_assoc($result);
    // $topArtist2Name = $topArtist2['song_artist'];
    // $topArtist2Count = $topArtist2['SUM(playCount)'];

    // $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 2, 1";
    // $result = mysqli_query($conn, $query);
    // $topArtist3 = mysqli_fetch_assoc($result);
    // $topArtist3Name = $topArtist3['song_artist'];
    // $topArtist3Count = $topArtist3['SUM(playCount)'];

?>

<html>
    <head>
        <title>Tempo</title>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="stylesheets/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheets/viewer.css">
        <link rel="shortcut icon" href="https://codysimmons.tech/tempo/img/favicon.ico" type="image/png">  
    </head>
    <body>
        <div id="header">
            <div id ="first">
                <a href='app.php' id="white"><img src="/img/tempologo.png" alt="logo"> TEMPO </a>
            </div>
            <div id="second">
                <?php echo "Hello, ".$user['firstName']." ".$user['lastName']; ?>
            </div>
            <div id="third">
                <a href='profile.php' id="white">Profile</a>
                <a href='charts.php' id="white">Charts</a>
                <a href='index.php?logout=1'>Logout</a>
            </div>  
        </div>
        <div class="form">
            <ul class="tab-groupProf tab-group">

              
            </ul>
            
            <div class="tab-content">
              <div id="signup">   
              <!-- Changed from "Sign Up for Free"  -->
                <h1>Update your Information</h1>
              
                <div class="top-row">
                  <div class="field-wrap">
                    <label>
                      First Name<span class="req">*</span>
                    </label>
                    <input type="text"  id="firstNameProf" name="firstName"/>
                  </div>
              
                  <div class="field-wrap">
                    <label>
                      Last Name<span class="req">*</span>
                    </label>
                    <input type="text"required autocomplete="off" id="lastNameProf" name="lastName"/>
                  </div>
                </div>
      
                <div class="field-wrap">
                  <label>
                    Email Address<span class="req">*</span>
                  </label>
                  <input type="email"required autocomplete="off" id="emailProf" name="email"/>
                </div>
                
                <div class="field-wrap">
                  
                  <select id="selectProf" name="selectProf">
                        <option value="Rock">Rock</option>
                        <option value="Country">Country</option>
                        <option value="Pop">Pop</option>
                        <option value="Electronic">Electronic</option>
                </select>
                </div>
                
                <button class="button button-block" id="register" type="submit"/>Update</button>
                
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