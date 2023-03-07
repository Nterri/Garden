<?php

function isAuth()
{
    return isset($_SESSION['isAuth']) ? true : false;
}