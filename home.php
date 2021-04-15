<?php

require_once './includes/authheader.php';
require_once './controllers/conn.php';

?>

<div class="container">
        <br/>
        <div id="alert">
            <?php require_once "./feedback.php"; ?>
        </div>
        <h2><?php echo $user['last_name']; ?>'s Albums</h2>
        <div class="row" style="min-height: 300px;">
            <?php require_once "./controllers/albums.php";?>
        </div>
        <div class="row mt-3">
            <h2>Songs</h2>
            <div class="card shadow">
                <div class="card-body">
                    <?php require_once "./controllers/songs.php";?>
                </div>
            </div>
        </div>
        <hr />
    </div>
<?php require_once "./includes/footer.php"; ?>