<?php
require_once 'config/conn.php';

class adminController {
    public static function index () {
        $diskusi = ModelDiskusi::getAllDiskusi();
        include ('view/admin/homeAdmin.php');
    }
}
?>