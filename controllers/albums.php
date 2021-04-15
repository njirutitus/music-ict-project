<?php 
    require_once './controllers/conn.php';

    //  If user is not logged in redirect to login page
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
        exit();
    }
    
    try {
        $STH = $DBH->prepare("SELECT * FROM album where user=?");
        $STH->execute([$_SESSION['user']]);
        # setting the fetch mode PDO::FETCH_ASSOC –which also is the default fetch mode if notset
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        # showing theresults
        while($row = $STH->fetch()){
                $avatar = $row['album_logo'];
            ?>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./media/<?php echo $avatar; ?>" alt="<?php echo htmlentities($row['album_name']); ?>">

                        <h3><?php echo htmlentities($row['album_name']); ?></h3>

                        <p><?php echo htmlentities($row['artist']); ?></p>

                       <a class="btn btn-primary btn-sm" href="albumsongs.php?id=<?php echo $row['id']; ?>">View Details </a>
                        
                        <form style="display: inline;" action="./controllers/deletealbum.php?id=<?php echo $row['id']; ?>" method="post">
                            <button  type="submit" class="btn btn-outline-danger btn-sm align-items-center"><i class="fas fa-trash-alt ms-2"></i></button>
                            <input type="hidden" name="album_logo" value="<?php echo $avatar ?>">
                        </form>

                        <?php
                            if ($row['is_favorite'] == 0) {
                        
                        ?>

                        <a href="./controllers/editalbum.php?value=1&id=<?php echo $row['id']; ?>"><i class="far fa-star ms-2"></i></a>

                        <?php 
                            }
                            else {
                        ?>

                    <a href="./controllers/editalbum.php?value=0&id=<?php echo $row['id']; ?>"><i class="fas fa-star"></i>
                        </a>

                        <?php }?>
                            </div>
                        </div>
                    </div>

                    <?php
                        }
}
catch(PDOException $e){
    $_SESSION['error'] = "Couldn't fetch the products";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>