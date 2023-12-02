<?php

class ModelKomentar {
        public static function addComment($isi, $idDiskusi) {
            global $conn;
            $userId = $_SESSION['session_id'];
            $waktuKomentar = date('Y-m-d H:i:s');
            $sql = "INSERT INTO komentar (isi, waktu_komentar, user_fk, diskusi_fk) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssii', $isi, $waktuKomentar, $userId, $idDiskusi);
    
            return $stmt->execute();
        }
}
?>