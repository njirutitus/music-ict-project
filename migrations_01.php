<?php

    require_once __DIR__ . '/vendor/autoload.php';
    require_once './controllers/conn.php';

    $sql = "DELETE FROM user";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    $sql = "ALTER TABLE user ADD email VARCHAR(150) NOT NULL UNIQUE";
    $STH = $DBH->prepare($sql);
    $STH->execute();

    echo "All migrations executed";

