<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        if ((isset($_POST['boton'])) && (isset($_POST['pass']))) {
            require_once './connection.php';
            $connect = new connection();
            $sql = "INSERT INTO usuarios (user,name,passwd,mail) VALUES ('".$_POST['user']."','".$_POST['name']."','".$_POST['pass']."','".$_POST['mail']."')";
            $connect->execSQL($sql);
        }
        ?>
        <h1>Usuario Registrado!</h1>
        <p>
            Usuario <?php session_start(); $SESSION['usuario']=$_POST['user']; echo $SESSION['usuario'];?> registrado!
        </p>
        
    </body>
</html>
