<?php session_start(); ?>
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
        <h1>Usuario Registrado!</h1>
        <p>
            Usuario <?php echo $_SESSION['usuario'];?> registrado!
        </p>
        
    </body>
</html>
