<?php
require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/diskusi.php';
require_once 'model/fakultas.php';

class DiskusiController {
    public function index() {
        view('home/homepage',[
            'diskusi' => ModelDiskusi::getAllDiskusi()
        ]);
    }
    
    public function show ($id) {
        // Ambil id dari parameter URL
        echo 'masuk ga';
        $diskusi = ModelDiskusi::getDiskusiById($id);

        if (!$diskusi) {
            // Contoh: Redirect ke halaman utama jika diskusi tidak ditemukan
            header("Location: ?action=homepage");
            exit();
        }

        // Ambil komentar untuk diskusi ini
        $komentar = ModelDiskusi::getDiskusiById($id);

        // Tampilkan view dengan detail diskusi dan komentarnya
        view('home/subview/show', [
            'diskusi' => $diskusi,
            'komentar' => $komentar]);
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
        $fakultasId = $_GET['fakultas'] ?? null;
        if ($fakultasId) {
            $diskusi = ModelDiskusi::getFakultas($fakultasId);
        } else {
            $diskusi = ModelDiskusi::getAllDiskusi();
        }
        $fakultasList = ModelFakultas::getAllFakultas();;
        view('home/homepage', [
            ''=> $diskusi
        ]);
    }

    public static function createDiskusi($judul, $isi, $user_fk) {
        session_start();
        auth::sessionProgram();
    }
}
?>
