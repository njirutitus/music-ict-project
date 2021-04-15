<?php

    require_once __DIR__ . '/vendor/autoload.php';
    require_once './controllers/conn.php';
    //users table
    $sql = "DELETE FROM song";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    $sql = "DELETE FROM album";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    $sql = "ALTER TABLE user ADD email varchar(255) NOT NULL UNIQUE;";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    echo "All migrations executed";

