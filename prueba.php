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
        require_once './connection.php';
        $user = $_POST['user'];
        $passwd = $_POST['pass'];
        $connect = new connection();
        $sql = "SELECT * FROM usuarios WHERE user like '".$user."' AND passwd=MD5('".$passwd."')";
        $result = $connect->execSQL($sql);
        $record = $result->fetch_assoc();
        $return = $record['user'];
        echo $return;
        ?>
    </body>
</html>
