<?php
   
    //  If user is not logged in redirect to login page
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
        exit();
    }
    
      // Check if the user has clicked the submit button
    if(isset($_POST['submit'])) {

        $title = $_POST['albumtitle'];
        $artist = $_POST['artist'];
        $genre = $_POST['genre'];
        $user = $_SESSION['user'];
        $albumlogo = $_FILES['albumlogo']["name"];

        try{
            $STH = $DBH->prepare("INSERT INTO album(album_name, artist, genre,album_logo,user) values(?,?,?,?,?)");
            $data = array($title,$artist,$genre,$albumlogo,$user);
            $STH->execute($data); 
            
            $_SESSION['success'] = "Album Successfully Added";
        }
        catch(PDOException $e){
            $_SESSION['error'] = "hey, $_SESSION[first_name]. I'm afraid I can't add the Album.";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
?>