<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function hoge(){
    echo 'h';
}

?>