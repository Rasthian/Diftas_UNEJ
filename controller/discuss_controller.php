<?php
require_once 'controller/controllers.php';

class DiscussController extends Controller {
    static function index() {
        view('home/homepage');
    }
}
?>