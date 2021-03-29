<?php

// class Database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=live-41_tomtim_projet-pp;charset=utf8',
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

} catch(PDOException $e) {
    echo $e->getMessage();
}