<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connection
 *
 * @author usuario
 */
class connection {
    //put your code here
    public function execSQL ($sql) {
        $connect = new mysqli('localhost','root','','dominguezgalvan');
        $result = $connect->query($sql);
        return $result;
    }
}
