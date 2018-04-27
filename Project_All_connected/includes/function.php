<?php

/*
 * LoadContent
 * Load the content
 * @param $default
 */

function loadContent($where, $default) {
//get the content from the URL
//sanitize it for security reasons
    $content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
    $default = filter_var($default, FILTER_SANITIZE_STRING);
    //if there wasn't anything in the URL , then use the default
    $content = (empty($content)) ? $default : $content;

//if there's content, get it and pass back
    if ($content) {
        $html = include 'content/' . $content . '.php';
        //include the chosen page
        return $html;
    }
}
