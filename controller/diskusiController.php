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
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        $result = ModelDiskusi::getAllFakultas();
        $diskusi = ModelDiskusi::getAllDiskusiku();
        include ('view/home/homepage.php');
    }
    
    public function showDiskusiId($id) {
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['komentar'])) {
            $isi = $_POST['komentar'];
            $idDiskusi = $id;

            ModelKomentar::addComment($isi,$idDiskusi);
        }
        
        $diskusi = ModelDiskusi::getDiskusiById($id);

        if (!$diskusi) {
            header("Location: ?action=homepage");
            exit();
        }
        
        include ('view/home/subview/show.php');
    }

    public function add () {
        session_start();
        auth::sessionProgram();
        auth::cookieData();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $err = '';
            $result = ModelDiskusi::addDiskusi($judul, $isi);
            if ($result) {
                header("Location: ?action=homepage");
                exit();
            } else {
                // Tampilkan pesan error
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

    public static function createDiskusi($judul, $isi, $user_fk) {
        session_start();
        auth::sessionProgram();
    }
}
?>
