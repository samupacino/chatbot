<?php
    if(isset($_GET['chatgpt'])){
        include_once'../backend/main.php';
    }else{
        include_once'../frontend/vista.php';
    }
?>