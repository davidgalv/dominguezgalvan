<?php

class connection {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','1234','dominguezgalvan');
        $result = $connect->query($sql);
        return $result;
    }
}
