<?php
    session_start();
    $error = 0;

    $conn = mysqli_connect("shareddb-g.hosting.stackcp.net", "tempodb-3235e640", "YFFtGhhfi.IW42T", "tempodb-3235e640");
    
    if(mysqli_connect_error()) {
        die ("Database Connection Error");
    } else {
        
    

    $bpm = $_POST['bpm'];
    $bpm1 = mysqli_real_escape_string($conn, $bpm);
    $query = "SELECT * FROM `songs` WHERE `song_bpm` = $bpm1 ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($conn, $query);
    $song = mysqli_fetch_assoc($result);
    $outputurl = $song['song_url'];
    $outputartist = $song['song_artist'];
    $outputtitle = $song['song_title'];
    $playCount = $song['playCount'];

    $songID = $song['song_id'];
    $playCountNew = 0;
    $playCountNew = $playCount + 1;
    $playCountNew1 = mysqli_real_escape_string($conn, $playCountNew);

    $query2 = "UPDATE `songs` SET playCount = $playCountNew1 WHERE song_id = $songID";
    $result = mysqli_query($conn, $query2);    

    echo json_encode(array("song_url" => $outputurl, "song_artist" => $outputartist, "song_title" => $outputtitle));

    }
?>