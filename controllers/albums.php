<?php 
    require_once './controllers/conn.php';
    
    try {
        $STH = $DBH->query("SELECT * FROM album");
        # setting the fetch mode PDO::FETCH_ASSOC –which also is the default fetch mode if notset
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        # showing theresults
        while($row = $STH->fetch()){
                $avatar = $row['album_logo'];
            ?>

            <div class="col-12 col-md-3 mb-2">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="img-fluid" src="./images/<?php echo $avatar; ?>" alt="<?php echo htmlentities($row['album_name']); ?>">

                        <h3><?php echo htmlentities($row['album_name']); ?></h3>

                        <p><?php echo htmlentities($row['artist']); ?></p>

                        <p><a class="btn btn-primary" href="songs.php?id=<?php echo $row['id']; ?>">View Details </a>
                        
                        <a href="./controllers/deletealbum.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt ms-2"></i></a>

                        <?php
                            if ($row['is_favorite'] == 0) {
                        
                        ?>

                        <a href="./controllers/editalbum.php?id=<?php echo $row['id']; ?>"><i class="far fa-star ms-2"></i></a>

                        <?php 
                            }
                            else {
                        ?>

                    <a href="./controllers/editalbum.php?id=<?php echo $row['id']; ?>"><i class="fas fa-star"></i>
                        </a>

                        <?php }?>

                                </p>
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