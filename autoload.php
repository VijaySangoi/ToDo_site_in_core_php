<?php


spl_autoload_register(function ($class)
{
    $s=explode('\\',$class) ;
    #echo 'database/'.$s[1].'.php';
    require_once 'database/'.$s[1].'.php';
    #echo ' successfull ';
});
?>