<?php


function getCookie()
{
    $data = unserialize($_COOKIE['dataUser']);
    $id = $data['id'];
    $user = $data['user'];



    return array(
        'id' => $id, 'user' => $user);
    ;

}








?>