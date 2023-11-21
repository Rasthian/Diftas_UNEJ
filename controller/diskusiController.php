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
        session_start();
        auth::sessionProgram();
        auth::cookieData();
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
        session_start();
        auth::sessionProgram();
    }
}
?>
