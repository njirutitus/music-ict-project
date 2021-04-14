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
        <div class="col-sm-7 me-1 p-3 border mt-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>What is Viberr?</h3>
                    <p>Viberr is an app that allows you to upload and store all of your music on the cloud.</p>
                    <h3>How do I add music?</h3>
                    <p>First, create a new album by filling out the form on this page. Once an album is created you will be able to add/upload songs.</p>
                    <h3>What are some Album logo best practices?</h3>
                    <ul>
                        <li>Have a resolution of 512x512</li>
                        <li>Use common image formats such as .JPG, .GIF, or .PNG</li>
                        <li>Remain under the 2MB limit.</li>
                        <li>Square images look best</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
 require_once './includes/footer.php';

 ?>