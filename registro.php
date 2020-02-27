<?php session_start(); ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIGN UP</title>
    </head>
    <body>
        <h2>Registrar usuario</h2>
        <form action="registro.php" method="post">
            <label>Nickname:</label>
            <br>
            <input type="text" name="user">
            <br>
            <br>
            <label>Nombre de usuario:</label>
            <br>
            <input type="text" name="name">
            <br>
            <br>
            <label>Contraseña:</label>
            <br>
            <input type="password" name="pass">
            <br>
            <br>
            <label>Correo:</label>
            <br>
            <input type="email" name="mail">
            <br>
            <input type="submit" name="boton" value="Registrar Usuario">
        </form>
        <?php
        // put your code here
        if ((isset($_POST['boton'])) && (isset($_POST['pass']))) {
            $_SESSION['usuario']=$_POST['user'];
            require_once './connection.php';
            $connect = new connection();
            $sql = "INSERT INTO usuarios (user,name,passwd,mail) VALUES ('".$_POST['user']."','".$_POST['name']."','".$_POST['pass']."','".$_POST['mail']."')";
            $connect->execSQL($sql);
            header('Location: http://localhost/dominguezgalvan/registrado.php');
            
            printf("pollas como ollas");
            
        }
        ?>
    </body>
</html>
