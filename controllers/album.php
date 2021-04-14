<?php
    //  If user is not logged in redirect to login page
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    $id = $_GET['id'];
    $statement = $DBH->prepare("SELECT * FROM album WHERE id=?");
    $statement->execute([$id]);
    if($album =  $statement->fetch()) { ?>
        <div class="card shadow">
            <div class="card-body">
                <img class="img-fluid" src="./images/<?php echo $album['album_logo']; ?>" alt="<?php echo htmlentities($album['album_name']); ?>">

                <h3><?php echo htmlentities($album['album_name']); ?></h3>

                <p><?php echo htmlentities($album['artist']); ?></p>

            </div>
        </div>
    <?php } ?>
     