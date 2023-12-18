<?php
require_once 'config/conn.php';
require_once 'function.php';
require_once('model/adminModel.php'); 

class adminController {
    public function index(){
        session_start();
        auth::sessionAdmin();
        $laporan = adminModel::getAllLaporan();
        include('view/admin/homeAdmin.php');
    }
    public static function showlaporan($id){
        $result = adminModel::getByLaporan($id);
        $laporan = adminModel::ListLaporan($id);
        include ('view/admin/detailLaporan.php');
    }
    public static function deletelaporan($id){
        session_diskusi();
        adminModel::deleteDiskusiAdmin($id);
        header("Location: ?action=adminPage");
    }
}