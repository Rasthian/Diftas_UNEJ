<?php

//controllernya gadipakai disini tapi di diskusicontroller
require_once 'config/conn.php';
require_once 'function.php';
require_once 'model/komentarModels.php';

class diskusiKomentar {
    public static function add ($idDiskusi) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $isi = $_POST ['isi_komentar'];
            $err = '' ;
            $result = ModelKomentar::addComment($isi,$idDiskusi);
            if ($result) {
                header("Location: ?action=diskusi&id=$idDiskusi");
                exit();
            } else {
                // Tampilkan pesan error
                $err = "Gagal menambahkan diskusi. Silakan coba lagi.";
            }
        }
        include 'view/home/subview/show.php';
    }
}
?>