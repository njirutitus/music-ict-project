<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    
    $host = $_ENV['DB_HOST']; 
    $dbname = $_ENV['DB_NAME']; 
    $user = $_ENV['DB_USER']; 
    $pass = $_ENV['DB_PASSWORD']; 

    # connect to thedatabase
    try {
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
        $DBH->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);# set errorattribute
        session_start();
        
        # Fetch user profile details
        if(isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $STH = $DBH->prepare("SELECT * FROM user WHERE id=?");
            $data = array($id);
            $STH->execute($data);

            $rows_affected = $STH->rowCount();
            if ($rows_affected == 1){
                $user = $STH->fetch();
            }
            else{
                $_SESSION['error'] = "User does not exist";
                echo $rows_affected;
                exit();
                unset($_SESSION['user']); 
            } 
        }
    }
    catch(PDOException $e){
        echo "Error 500: Internal Server Error";
        file_put_contents('PDOErrors.txt', "\n".date('Y-m-d H:i:s').'] - '.$e->getMessage(), FILE_APPEND); # log errors to afile
        exit();
    }
?>