<?php


function redirect($location)
{
    header("Location:$location");
}


function view(string $view, array $data= [])
{
    extract($data);

    require __DIR__ . "/App/web/views/{$view}.php";
}