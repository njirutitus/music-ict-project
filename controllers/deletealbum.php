<?php
   
    //  If user is not logged in redirect to login page
    require_once 'conn.php';
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
        exit();
    }
    
      // Check if the user has clicked the submit button
    if(isset($_GET['id'])) {

        $albumid = $_GET['id'];

        try{
            $STH = $DBH->prepare("DELETE FROM album where id=?");
            $data = array($albumid);
            $STH->execute($data);

            unlink("../media/$_POST[album_logo]");
            
            $_SESSION['success'] = "Album Deleted Successfully";
        }
        catch(PDOException $e){
            $_SESSION['error'] = "hey, $user[first_name]. I'm afraid I can't delete the Album at the moment.";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
    header('location: ../home.php');

?>