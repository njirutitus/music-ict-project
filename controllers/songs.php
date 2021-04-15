<?php 

require_once './controllers/conn.php';

//  If user is not logged in redirect to login page
if (!isset($_SESSION['user'])){
    header("location:../login.php");
    exit();
}
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Song Title</th>
        <th scope="col">Artist</th>
        <th scope="col">Audio File</th>
        <th scope="col">Album</th>
        <th scope="col">Favorite</th>

    </tr>
    </thead>
    <tbody>

<?php

try {
    $STH = $DBH->prepare("SELECT album.album_logo as album_logo, album.id as album_id,album.album_name as album_name, album.artist as artist,song.audio_file as audio_file,song.song_title as song_title, song.is_favorite as is_favorite FROM album,song WHERE album.id = song.album and album.user=?");
    $STH->execute([$_SESSION['user']]);
    while($songs = $STH->fetch()){
        ?>
        <tr>
            <td><?php echo $songs['song_title']; ?></td>
            <td><?php echo $songs['artist']; ?></td>
            <td><audio controls><source src="./media/<?php echo $songs['audio_file'] ?>"></audio></td>
            <td><img class="img-thumbnail" style="width: 30px; float: left; margin-right: 10px;" src="./media/<?php echo $songs['album_logo']; ?>" alt="<?php echo $songs['album_name'].'-'.$songs['album_id']; ?>" /><?php echo $songs['album_name']; ?></td>
            <td>
                <?php
                if ($songs['is_favorite'] == 0) {
                    ?>
                    <i class="far fa-star ms-2"></i>
                    <?php
                }
                else {
                    ?>
                    <i class="fas fa-star ms-2"></i>
                <?php }?>

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
    </tbody>
</table>
