<?php 
session_start();
    require_once 'consts/Regex.php';
    require_once 'include/database.php';
    $d = new database;
    // require_once "consts/general.php";
    require_once 'content/content.php';
    $c = new content;
    require_once 'function/autorize.php'; 
    require_once 'consts/user.php';
    $v = new validate;  
?>