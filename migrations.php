<?php

    require_once __DIR__ . '/vendor/autoload.php';
    require_once './controllers/conn.php';
    //users table
    $sql = "CREATE TABLE IF NOT EXISTS `user` (
        `id` SERIAL,
        `first_name` tinytext NOT NULL,
        `last_name` tinytext NOT NULL,
        `email` VARCHAR(150) NOT NULL UNIQUE,
        `password` tinytext NOT NULL,
        `is_active` tinyint(1) NOT NULL DEFAULT 1,
        `is_staff` tinyint(1) NOT NULL DEFAULT 0,
        `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
        `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    //albums table

    $STH = $DBH->prepare("CREATE TABLE IF NOT EXISTS `album` (
        `id` SERIAL,
        `album_name` tinytext NOT NULL,
        `artist` tinytext NOT NULL,
        `genre` tinytext NOT NULL,
        `album_logo` tinytext NOT NULL,
        `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
        `user` bigint(20) UNSIGNED NOT NULL,
        `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        FOREIGN KEY(user) REFERENCES user(id) ON DELETE RESTRICT ON UPDATE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $STH->execute();

    // songs table
    $sql = "CREATE TABLE IF NOT EXISTS`song` (
        `id` SERIAL,
        `song_title` tinytext NOT NULL,
        `audio_file` tinytext NOT NULL,
        `is_favorite` tinyint(1) NOT NULL,
        `album` bigint(20) UNSIGNED NOT NULL,
        `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        FOREIGN KEY(album) REFERENCES album(id) ON DELETE RESTRICT ON UPDATE CASCADE
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    echo "Executed all migrations."

 ?>