<?php
include "core/db.php";

session_start();

$currentPost = (object) ["id" => "", "userName" => "", "message" => ""];

if(isset($_POST["add"])){
    $name = $_POST["name"];
    $message = $_POST["message"];
    if($name!= "" & $message!="") {
        $query = "insert into post values(default,'{$name}','{$message}','".date('Y-m-d H:i:s')."')";
        $db->query($query);
    };
    $_SESSION['response']="POST ADDED";
    $_SESSION['responseStatusColor']= "green";
    header("location:Index.php");
}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $query = "delete from post where id={$id}";
    $db->query($query);
    $_SESSION['response']="POST DELETED";
    $_SESSION['responseStatusColor']= "red";
    header("location:Index.php");
}

if(isset($_GET["edit"])){
    $id = $_GET["edit"];
    $query = "select *  from post where id={$id}";
    $post = $db->query($query)->fetch_assoc();
    $currentPost->id = $post["id"];
    $currentPost->userName= $post["user_name"];
    $currentPost->message = $post["message"];
}

if(isset($_POST["update"])){
    if($name!= "" & $message!="") {
        $query = "update post set user_name='{$_POST["name"]}',message='{$_POST["message"]}' where id={$_POST["id"]}";
        $db->query($query);
    };
    $currentPost->id = "";
    $currentPost->userName= "";
    $currentPost->message = "";
    $_SESSION['response']="POST UPDATED";
    $_SESSION['responseStatusColor']= "yellow darken-2";
    header("location:Index.php");
}



?>