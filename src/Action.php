<?php
include "core/db.php";

$currentPost = (object) ["id" => "", "userName" => "", "message" => ""];

if(isset($_POST["add"])){
    $name = $_POST["userName"];
    $message = $_POST["message"];
    if($name!= "" & $message!="") {
        $query = "insert into post values(default,'{$name}','{$message}','".date('Y-m-d H:i:s')."')";
        $db->query($query);
        $_SESSION['response']="POST ADDED";
        $_SESSION['responseStatusColor']= "green";
    };
    header("location:index.php");
}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $query = "delete from post where id={$id}";
    $db->query($query);
    $_SESSION['response']="POST DELETED";
    $_SESSION['responseStatusColor']= "red";
    header("location:index.php");
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
    $name = $_POST["userName"];
    $message = $_POST["message"];
    if($name!= "" & $message!="") {
        $query = "update post set user_name='{$name}',message='{$message}' where id={$_POST["id"]}";
        $db->query($query);
        $_SESSION['response']="POST UPDATED";
        $_SESSION['responseStatusColor']= "yellow darken-2";
    };
    $currentPost->id = "";
    $currentPost->userName= "";
    $currentPost->message = "";
    header("location:index.php");
}
