<?php

spl_autoload_register(function ($class){
    $class = strtolower($class);
    $path = "includes/" . $class . ".php";
    if(file_exists($path)){
        include_once $path;
    }else{
        die("This file named" . $class . ".php was not found.");
    }
});

function redirect($location)
{
    header("Location: {$location}");
}
?>