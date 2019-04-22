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
    $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 0, 1";
    $result = mysqli_query($conn, $query);
    $topSong = mysqli_fetch_assoc($result);
    $topSongArtist = $topSong['song_artist'];
    $topSongTitle = $topSong['song_title'];
    $topSongPlayCount = $topSong['playCount'];

    $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 1, 1";
    $result = mysqli_query($conn, $query);
    $topSong2 = mysqli_fetch_assoc($result);
    $topSong2Artist = $topSong2['song_artist'];
    $topSong2Title = $topSong2['song_title'];
    $topSong2PlayCount = $topSong2['playCount'];

    $query = "SELECT * FROM songs ORDER BY playCount DESC LIMIT 2, 1";
    $result = mysqli_query($conn, $query);
    $topSong3 = mysqli_fetch_assoc($result);
    $topSong3Artist = $topSong3['song_artist'];
    $topSong3Title = $topSong3['song_title'];
    $topSong3PlayCount = $topSong3['playCount'];

    $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 0, 1";
    $result = mysqli_query($conn, $query);
    $topArtist = mysqli_fetch_assoc($result);
    $topArtistName = $topArtist['song_artist'];
    $topArtistCount = $topArtist['SUM(playCount)'];

    $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 1, 1";
    $result = mysqli_query($conn, $query);
    $topArtist2 = mysqli_fetch_assoc($result);
    $topArtist2Name = $topArtist2['song_artist'];
    $topArtist2Count = $topArtist2['SUM(playCount)'];

    $query = "SELECT SUM(playCount), song_artist FROM songs GROUP BY song_artist ORDER BY SUM(playcount) DESC LIMIT 2, 1";
    $result = mysqli_query($conn, $query);
    $topArtist3 = mysqli_fetch_assoc($result);
    $topArtist3Name = $topArtist3['song_artist'];
    $topArtist3Count = $topArtist3['SUM(playCount)'];

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
        <div id="chartsSong">
            Most Played Songs
            <div class="tableRow">
                <div id="firstC">1</div>
                <div id="secondC"><?php echo $topSongArtist." - ".$topSongTitle ?></div>
                <div id="thirdC"><?php echo $topSongPlayCount ?></div>
            </div>
            <div class="tableRow">
            <div id="firstC">2</div>
                <div id="secondC"><?php echo $topSong2Artist." - ".$topSong2Title ?></div>
                <div id="thirdC"><?php echo $topSong2PlayCount ?></div>
            </div>
            <div class="tableRow">
            <div id="firstC">3</div>
                <div id="secondC"><?php echo $topSong3Artist." - ".$topSong3Title ?></div>
                <div id="thirdC"><?php echo $topSong3PlayCount ?></div>
            </div>
        </div>
        <div id="chartsSong">
            Most Popular Artists
            <div class="tableRow">
            <div id="firstC">1</div>
                <div id="secondC"><?php echo $topArtistName ?></div>
                <div id="thirdC"><?php echo $topArtistCount ?></div>
            </div>
            <div class="tableRow">
            <div id="firstC">2</div>
                <div id="secondC"><?php echo $topArtist2Name ?></div>
                <div id="thirdC"><?php echo $topArtist2Count ?></div>
            </div>
            <div class="tableRow">
            <div id="firstC">3</div>
                <div id="secondC"><?php echo $topArtist3Name ?></div>
                <div id="thirdC"><?php echo $topArtist3Count ?></div>
            </div>
        </div>

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

</html>