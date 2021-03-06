<?php
    if(isset($_POST['submit'])) {


        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($password != $confirmpassword) {
            $_SESSION['error'] = "Passwords do not match";
        }

        else {            
            
            try{
                
                //Encrypt password
                $password = password_hash($password,PASSWORD_DEFAULT);
                
                $STH = $DBH->prepare("INSERT INTO user(first_name, last_name, email,password) values(?,?,?,?)");
                $data = array($first_name,$last_name,$email,$password);
                $STH->execute($data); 
                
                $_SESSION['success'] = "Registration Successful";
                unset($first_name);
                unset($last_name);
                unset($email);
                unset($password);
                unset($confirmpassword);
            }
            catch(PDOException $e){
                $_SESSION['error'] = "Hey, $first_name. I'm afraid I can't register you right now.";
                echo $e->getMessage();
                exit();
                file_put_contents('../PDOErrors.txt',"\n". date('Y-m-d H:i:s').'] - '.$e->getMessage(), FILE_APPEND); # log errors to afile
            }
        }
    }
        ?>