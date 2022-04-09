<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $word = $_GET['word'];
    echo $word;
}else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $word1 = $_POST['word'];
    echo $word1;
}