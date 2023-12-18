<?php
require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/diskusi.php';
require_once 'model/fakultas.php';

class DiskusiController {
    public function index() {
        $result = ModelDiskusi::getAllFakultas();
        $diskusi = ModelDiskusi::getAllDiskusi();
        include ('view/home/homepage.php');
    }
    public function diskusiku() {
        session_diskusi();
        $result = ModelDiskusi::getAllFakultas();
        $diskusi = ModelDiskusi::getAllDiskusiku();
        include ('view/home/homepage.php');
    }
    
    public function add() {
        session_diskusi();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $err = '';
            $result = ModelDiskusi::addDiskusi($judul, $isi);
            if ($result) {
                header("Location: ?action=homepage");
                exit();
            } else {
                $err = "Gagal menambahkan diskusi. Silakan coba lagi.";
            }
        }
        include 'view/home/subview/add.php';
    }
    public function filterDiskusi() { 
        $fakultasID = $_POST['fakultas'];
        if(empty($fakultasID)){
            header('location:?action=index');
        }
        $result = ModelDiskusi::getAllFakultas();
        $fakultas= ModelDiskusi::selectedFakultas($fakultasID);
        $diskusi = ModelDiskusi::filterFakultas($fakultasID);
        include ('view/home/homepage.php');
    }

    public static function showDiskusi($id) {
        session_diskusi();
        $result = ModelDiskusi::showDiskusi($id);
        $komentar = ModelDiskusi::getAllComment($id);
        include ('view/home/subview/show.php');
    }
    public static function showCommentRealTime($id){
        $komentar = ModelDiskusi::getAllComment($id);
        include ('view/home/subview/show-ajax.php');
    }
    public static function addKomentar($id){
        session_diskusi();
        $isi = $_POST['isi_komentar'];
        $result = ModelDiskusi::addComment($id,$isi);
        header("Location: ?action=showdiskusi&id=$id");
    }
    public static function deleteDiskusi($id){
        session_diskusi();
        ModelDiskusi::deleteDiskusi($id);
        header("Location: ?action=homepage");
    }

    public static function addlaporan($id){
        session_diskusi();
        $keterangan = $_POST['isi_laporan'];
        ModelDiskusi::addLaporan($id,$keterangan);
        header("Location: ?action=showdiskusi&id=$id");
    }
    public static function showlaporan($id){
        session_diskusi();
        include ('view/home/subview/laporkan.php');;
    }
    
} 
?>