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
        $value = $_GET['value'];

        try{
            $STH = $DBH->prepare("UPDATE album set is_favorite=? where id=?");
            $STH->execute([$value,$albumid]);

            if($value) {
                $_SESSION['success'] = "Album set to favorite";
            }
            else {
                $_SESSION['success'] = "Album not a favorite anymore";
            }

            header('location: ../home.php');
        }
        catch(PDOException $e){
            $_SESSION['error'] = "hey, $_SESSION[first_name]. I'm afraid I can't delete the Album at the moment.";
            file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
        }
    }
?>