<?php 
    require_once './controllers/conn.php';

    //  If user is not logged in redirect to login page
    if (!isset($_SESSION['user'])){
        header("location:../login.php");
        exit();
    }
    
    try {
        $STH = $DBH->prepare("SELECT * FROM song WHERE album=?");
        $STH->execute([$id]);
        while($songs = $STH->fetch()){
            ?>
            <tr>
                <td><?php echo $songs['song_title']; ?></td>
                <td><audio controls><source src="./media/<?php echo $songs['audio_file'] ?>"></audio>
                </td>
                <td>
                    <?php
                    if ($songs['is_favorite'] == 0) {

                        ?>
                        <a href="./controllers/editsong.php?value=1&album=<?php echo $id; ?>&id=<?php echo $songs['id']; ?>"><i class="far fa-star ms-2"></i></a>
                        <?php
                    }
                    else {
                        ?>
                        <a href="./controllers/editsong.php?value=0&album=<?php echo $id; ?>&id=<?php echo $songs['id']; ?>"><i class="fas fa-star ms-2"></i></a>
                    <?php }?>

                </td>
                <td>
                    <form action="./controllers/deletesong.php?id=<?php echo $songs['id']; ?>" method="post">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt ms-2"></i>&nbsp;Delete
                        </button>
                        <input type="hidden" name="album_id" value="<?php echo $id ?>">
                        <input type="hidden" name="audio_file" value="<?php echo $songs['audio_file'] ?>">
                    </form>
                </td>
            </tr>

                    <?php
                        }
}
catch(PDOException $e){
    $_SESSION['error'] = "Couldn't fetch the songs";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>