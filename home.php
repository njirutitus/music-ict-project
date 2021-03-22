<?php

require_once './includes/authheader.php';

?>

<div class="container">
        <br/>
        <div id="alert">
            <?php require_once "./feedback.php"; ?>
        </div>
        <h2>Your Albums</h2>
        <div class="row">
            <?php require_once "./controllers/albums.php";?>
        </div>
        <hr />
    </div>
<?php require_once "./includes/footer.php"; ?>