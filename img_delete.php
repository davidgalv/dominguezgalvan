<?php session_start(); ?>
<?php
    $id = $_POST['del_img'];
            require_once './connection.php';
            $connect = new connection();
            $sql = "DELETE FROM imagenes WHERE id = '$id'";

            $connect->execSQL($sql);     
            header('location: index.php');     
?>