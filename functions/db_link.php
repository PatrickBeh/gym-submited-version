<?php
    global $pdo;

    $pdo = new PDO('mysql:host=localhost;dbname=gym', 'gym', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);