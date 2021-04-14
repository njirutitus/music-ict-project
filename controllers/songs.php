<?php 
    require_once './controllers/conn.php';
    
    try {
        $STH = $DBH->prepare("SELECT * FROM song WHERE album=?");
        $STH->execute([$id]);
        while($songs = $STH->fetch()){
            ?>
            <tr>
                <td><?php echo $songs['song_title']; ?></td>
                <td><a target="_blank" href="">
                        <button type="button" class="btn btn-success btn-xs">
                        <i class="fas fa-play"></i>&nbsp; Play
                        </button>
                    </a><?php echo $songs['song_title']; ?>
                </td>
                <td></td>
                <td></td>
            </tr>

                    <?php
                        }
}
catch(PDOException $e){
    $_SESSION['error'] = "Couldn't fetch the songs";
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND); # log errors to afile
}
?>