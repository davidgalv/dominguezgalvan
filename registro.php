<!DOCTYPE html>
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
        <form action="registrado.php" method="post">
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
        ?>
    </body>
</html>
