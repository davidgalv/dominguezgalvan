<?php

class connection {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','','dominguezgalvan');
        $result = $connect->query($sql);
        return $result;
    }
}
