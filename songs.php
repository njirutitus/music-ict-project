<?php
require_once './includes/authheader.php';
require_once './controllers/conn.php';
?>

<div class="container">
    <div class="row mt-3">
        <h2>Songs</h2>
        <div class="card shadow">
            <div class="card-body">
                <?php require_once "./controllers/songs.php";?>
            </div>
        </div>
    </div>
</div>
<?php require_once "./includes/footer.php"; ?>