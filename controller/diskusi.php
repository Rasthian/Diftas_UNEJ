<?php
require_once 'config/conn.php';
require_once 'function.php';

class DiskusiController {
    public function index() {
        view('home/homepage');
    }
    
}
?>