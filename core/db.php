<?php
    $db = new mysqli("localhost","root","root","php-crud");

    if($db->error){
        die("error");
    }
?>