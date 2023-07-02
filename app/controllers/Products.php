<?php
namespace App\controllers;
use App\core\Controller;

class Products extends Controller{
    public function index(){
       
        $this->view('product');
    }
}