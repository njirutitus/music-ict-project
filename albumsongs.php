<?php
require_once './includes/authheader.php';
require_once './controllers/conn.php';
//  If user is not logged in redirect to login page
if (!isset($_SESSION['user'])){
    header("location:../login.php");
    exit();
}

$id = $_GET['id'];
?>
<div class="container">
<div class="row">
        <div class="col-sm-3 p-3 mt-2">
            <?php require_once "./controllers/album.php"; ?>
            
        </div>
        <div class="col-sm-8 me-1 p-3 mt-2">
            <div class="card shadow">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-allsongs" type="button" role="tab" aria-controls="pills-allsongs" aria-selected="true">View All songs</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-addnew" type="button" role="tab" aria-controls="pills-addnew" aria-selected="false">Add New Song</button>
                        </li>
                    </ul>
                    <div id="alert">
                        <?php require_once "./feedback.php"; ?>
                    </div>
                    <div class="tab-content p-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-allsongs" role="tabpanel" aria-labelledby="pills-allsongs-tab">
                            <h3>All Songs</h3>
                            <div class="table-responsive">
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
                                    <?php require_once "./controllers/albumsongs.php"; ?>
                                </tbody>
                            </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-addnew" role="tabpanel" aria-labelledby="pills-addnew-tab">
                            <h3>Add a new Song</h3>
                            <form action="./controllers/addsong.php" method="post" enctype="multipart/form-data">
                                <div class="from-group mb-3">
                                    <label for="song_title">Song Title </label>
                                    <input type="text"  id="song_title" name="song_title" class="form-control" required>
                                </div>
                                <div class="from-group mb-3">
                                    <label for="audio_file">Audio File: </label>
                                    <input type="file"  id="audio_file" name="audio_file" class="form-control" required>
                                </div>
                                <input type="hidden" name="album_id" value="<?php echo $id ?>">
                                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<?php
 require_once './includes/footer.php';

 ?>

