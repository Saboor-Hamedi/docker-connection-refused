<?php 

namespace App\controllers;
use App\core\Controller;

class _404 extends Controller{
    public function index(){
        
        $this->view('404');
    }
}
