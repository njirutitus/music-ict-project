<?php
require_once './includes/header.php';
require_once './controllers/conn.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 m-auto p-3 border mt-2 shadow">
            <h3 class="text-center">Log in to continue</h3>
            <?php require_once "./controllers/login.php" ?>

            <div id="alert">
                <?php require_once "./feedback.php"; ?>
            </div>
            <form action="" method="post">
                <div class="from-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="from-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            </form>
        </div>
    </div>
</div>


<?php
 require_once './includes/footer.php';

 ?>