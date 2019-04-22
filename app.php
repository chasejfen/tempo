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
        <script src="scan.js"></script> 
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
        <div id="songInfo">
            <div id="songArtist"></div>
            <div id="songHyphen">-</div>
            <div id="songTitle"></div>
        </div>
        <div id="vidplayer"><iframe id="vidFrame" align="middle" width="800" height="450" src="https://codysimmons.tech/tempo/img/placeholder.png" frameborder="0" allowfullscreen scrolling="no"></iframe></div>
        <div id="slidecontainer">
            <input type="range" min="70" max="190" value="130" step="1" class="slider" list="X" id="mySlider">
            <datalist id="X">
                <option>70</option>
                <option>130</option>
                <option>190</option>
            </datalist>
        </div>
        <div id="appcontents">
            <button class="sklonst" id="scan">Scan</button>
            <input type="text" autocomplete="off" id="bpmText" name="bpmText" placeholder="Enter a BPM between 70 and 190 to get started"/>
            <div id="errorScan"></div>
        </div>

    </body>

</html>