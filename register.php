<?php
require_once './includes/header.php';
require_once './controllers/conn.php';
?>

<div class="row">
        <div class="col-sm-6 m-auto p-3 border mt-2 shadow">
            <h3 class="text-center">Create an Account</h3>
            <?php require_once "./Controllers/register.php" ?>

            <div id="alert">
                <?php require_once "./feedback.php"; ?>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col">
                        <div class="from-group mb-3">
                            <label for="firstname">First Name</label>
                            <input name="firstname" id="firstname" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="from-group mb-3">
                            <label for="lastname">Last Name</label>
                            <input name="lastname" id="lastname" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="from-group mb-3">
                    <label for="email">Email</label>
                    <input type="email"  id="email" name="email" class="form-control" required>
                </div>
                <div class="from-group mb-3">
                    <label for="password">Password</label>
                    <input type="password"  id="password" name="password" class="form-control" required>
                </div>
                <div class="from-group mb-3">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password"  id="confirmpassword" name="confirmpassword" class="form-control" required>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            </form>
        </div>
    </div>


<?php
 require_once './includes/footer.php';

 ?>