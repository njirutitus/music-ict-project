<?php
    //users table
    $sql = "CREATE TABLE IF NOT EXISTS `user` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `first_name` tinytext NOT NULL,
        `last_name` tinytext NOT NULL,
        `email` tinytext NOT NULL,
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
        `id` bigint(20) UNSIGNED NOT NULL,
        `album_name` tinytext NOT NULL,
        `artist` tinytext NOT NULL,
        `genre` tinytext NOT NULL,
        `album_logo` tinytext NOT NULL,
        `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
        `user` bigint(20) UNSIGNED NOT NULL,
        `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    $STH->execute();

    // songs table
    $sql = "CREATE TABLE IF NOT EXISTS`song` (
        `id` bigint(20) UNSIGNED NOT NULL,
        `song_title` tinytext NOT NULL,
        `audio_file` tinytext NOT NULL,
        `is_favorite` tinyint(1) NOT NULL,
        `album` bigint(20) UNSIGNED NOT NULL,
        `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    $STH = $DBH->prepare($sql);
    $STH->execute();

 ?>