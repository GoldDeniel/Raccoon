<?php

class Controller
{
    public function view($view, $data = [])
    {
        $filename = '../app/views/'.ucfirst($view).'.php';
        if(file_exists($filename)){
            require $filename;
        }
        else{
            require '../app/views/404.php';
        }
    }
}