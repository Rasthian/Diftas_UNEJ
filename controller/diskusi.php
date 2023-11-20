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
    
    public function add () {
        view('home/subview/add');
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
        global $conn;

        // Waktu Pembuatan (otomatis mengambil yyyy, mm, dd)
        $waktu_pembuatan = date('Y-m-d H:i:s');

        // Insert data ke dalam tabel diskusi
        $sql = "INSERT INTO diskusi (judul, isi, waktu_pembuatan, user_fk) 
                VALUES ('$judul', '$isi', '$waktu_pembuatan', '$user_fk')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
