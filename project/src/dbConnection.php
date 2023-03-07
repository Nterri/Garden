<?php

function dbConnection()
{
    static $db = null;
    if (!$db) {
        $host = "localhost";
        $server = 'users_project';
        $user = 'root';
        $pass = '';
        $db = mysqli_connect($host, $user, $pass, $server);
        if (!$db) {
            die('Ошибка соединения: ' . mysqli_error($db));
        }
    }
    return $db;
}