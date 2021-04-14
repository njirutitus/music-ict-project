<?php
require_once './includes/authheader.php';
require_once './controllers/conn.php';
?>
<div class="container">
<div class="row">
        <div class="col-sm-3 p-3 mt-2">
            <div id="alert">
                <?php require_once "./feedback.php"; ?>
            </div>

            <?php require_once "./controllers/album.php"; ?>
            
        </div>
        <div class="col-sm-8 me-1 p-3 mt-2">
        <h3>All Songs</h3>
        <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Audio File</th>
                            <th scope="col">Favorite</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php require_once "./controllers/songs.php"; ?>
                        </tbody>
                    </table>
                </div>
        </div>
        
        </div>
    </div>
</div>


<?php
 require_once './includes/footer.php';

 ?>

