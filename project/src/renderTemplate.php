<?php

function renderTemplate($template, array $vars = [])
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/templates/' . $template)) {
        ob_start();
        extract($vars);
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/' . $template;
        return ob_get_clean();
    } else {
        echo error;
    }
}
