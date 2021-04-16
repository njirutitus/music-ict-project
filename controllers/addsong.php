<?php
require_once 'conn.php';
//  If user is not logged in redirect to login page
if (!isset($_SESSION['user'])){
    header("location:../login.php");
    exit();
}

// Check if the user has clicked the submit button
if(isset($_POST['submit'])) {

    $song_title = $_POST['song_title'];
    $audio_file = $_FILES['audio_file'];

    require_once './uploadfile.php';
    $audio_file = upload($audio_file);

    if ($audio_file) {
        try {
            $STH = $DBH->prepare("INSERT INTO song(song_title, audio_file, album) values(?,?,?)");
            $data = array($song_title,$audio_file,$_POST['album_id']);
            $STH->execute($data);

            $_SESSION['success'] = "Song Successfully Uploaded";
        } catch (PDOException $e) {
            $_SESSION['error'] = "hey, $user[first_name]. I'm afraid I can't add the Song at the moment.";
            file_put_contents('../PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
    else {
        $_SESSION['error'] = "Couldn't move the uploaded song";
    }
}
header("location: ../albumsongs.php?id=$_POST[album_id]");
?>

