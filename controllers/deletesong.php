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

    try{
        $STH = $DBH->prepare("DELETE FROM song where id=?");
        $data = array($song_id);
        $STH->execute($data);
        unlink("../media/$_POST[audio_file]");
        $_SESSION['success'] = "Song Deleted Successfully";

    }
    catch(PDOException $e){
        $_SESSION['error'] = "hey, $user[first_name]. I'm afraid I can't delete the Album at the moment.";
        file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
    }
}
header("location: ../albumsongs.php?id=$_POST[album_id]");

?>