<?php
require_once './includes/authheader.php';
require_once './controllers/conn.php';
?>
<div class="container">
<div class="row">
        <div class="col-sm-5 m-auto p-3 border mt-2">
            <h3>Add Album</h3>
            <?php require_once "./controllers/addalbum.php"; ?>

            <div id="alert">
                <?php require_once "./feedback.php"; ?>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="from-group mb-3">
                    <label for="artist">Artist: </label>
                    <input type="text"  id="artist" name="artist" class="form-control">
                </div>
                <div class="from-group mb-3">
                    <label for="albumtitle">Album title: </label>
                    <input type="text"  id="albumtitle" name="albumtitle" class="form-control">
                </div>
                <div class="from-group mb-3">
                    <label for="artist">Genre: </label>
                    <input type="text"  id="genre" name="genre" class="form-control">
                </div>
                <div class="from-group mb-3">
                    <label for="album">Album logo: </label>
                    <input type="file"  id="albumlogo" name="albumlogo" class="form-control">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            </form>
        </div>
        <div class="col-sm-5 me-1 p-3 border mt-2">
        
        </div>
    </div>
</div>


<?php
 require_once './includes/footer.php';

 ?>