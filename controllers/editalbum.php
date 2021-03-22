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
            $STH = $DBH->prepare("UPDATE album set is_favorite=1 where id=?");
            $data = array($albumid);
            $STH->execute($data); 
            
            $_SESSION['success'] = "Album set to favorite";
            header('location: ../home.php');
        }
        catch(PDOException $e){
            $_SESSION['error'] = "hey, $_SESSION[first_name]. I'm afraid I can't delete the Album at the moment.";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
?>