<?php

class Paginas extends Controller {

    public function __construct() {
        
    }

    public function index() {

        $this->view('page/home');
    }

}