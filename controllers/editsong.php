<?php

//  If user is not logged in redirect to login page
require_once 'conn.php';
if (!isset($_SESSION['user'])){
    header("location:../login.php");
    exit();
}

// Check if the user has clicked the submit button
if(isset($_GET['id'])) {

    $song_id = $_GET['id'];
    $value = $_GET['value'];

    try{
        $STH = $DBH->prepare("UPDATE song set is_favorite=? where id=?");
        $STH->execute([$value,$song_id]);

        if($value) {
            $_SESSION['success'] = "Song set to favorite";
        }
        else {
            $_SESSION['success'] = "Song not a favorite anymore";
        }

    }
    catch(PDOException $e){
        $_SESSION['error'] = "Hey, $_SESSION[first_name]. I'm afraid I can't Modify the Song at the moment.";
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
    }
    header("location: ../albumsongs.php?id=$_GET[album]");
}
?>