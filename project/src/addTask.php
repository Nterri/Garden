<?php

function addTask($name, $surname, $phone, $email)
{
    try {
        $name = mysqli_real_escape_string(dbConnection(), $name);
        $surname = mysqli_real_escape_string(dbConnection(), $surname);
        $phone = mysqli_real_escape_string(dbConnection(), $phone);
        $email = mysqli_real_escape_string(dbConnection(), $email);
        $sql = "INSERT INTO client (name, lastName, phone, email) VALUES (\"{$name}\", \"{$surname}\", \"{$phone}\", \"{$email}\")";
        $result = mysqli_query(dbConnection(), $sql);
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}