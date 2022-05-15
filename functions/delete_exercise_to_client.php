<?php 
ob_start();
session_start();
   require('../functions/db_link.php');    
   require('../functions/functions.php');
    $pdo;
    $func = new allFunctions();
    
    $func->deleteExerciseToClient($id);