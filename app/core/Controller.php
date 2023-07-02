<?php

namespace App\core;

class Controller
{
  public function view($name){
    $controllerName = $name;
    $filename = "../app/views/{$controllerName}.view.php";

    if (file_exists($filename)) {
        require $filename;
    } else {
        $filename = '../app/views/404.view.php';
        require $filename;
    }
  }
   
}
