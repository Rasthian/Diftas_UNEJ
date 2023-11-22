<?php
class ModelDiskusi {
    public static function getAllDiskusi() {
        global $conn;
        $sql = "SELECT * , u.nama FROM diskusi as d
                JOIN user AS u on d.user_fk = u.id ";
        $result = $conn->query($sql);
        $diskusi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $diskusi[] = $row;
            }
        }
        return $diskusi;
    }

    public static function getDiskusiById ($id) {
        global $conn;

        $sql = "SELECT * FROM diskusi WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $diskusi = $result->fetch_assoc();

            $sql = "SELECT * , f.nama FROM komentar as k
                    JOIN user as u ON k.user_fk = u.id 
                    JOIN prodi as p ON  WHERE u.prodi_fk = p.id 
                    JOIN fakultas as f ON p.fakultas_fk = f.id diskusi_fk = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $resultKomentar = $stmt->get_result();
            
            // Tambahkan komentar ke dalam array diskusi
            $diskusi['komentar'] = $resultKomentar->fetch_all(MYSQLI_ASSOC);

            return $diskusi;
        }

        return null;
    }

    public static function addDiskusi($judul, $isi) {
        global $conn;
        // Sesuaikan dengan nama tabel dan kolom yang sesuai di database Anda
        $userId = $_SESSION['session_id'];
        $waktuPembuatan = date('Y-m-d H:i:s');

        $sql = "INSERT INTO diskusi (judul, isi, waktu_pembuatan, user_fk) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $judul, $isi, $waktuPembuatan, $userId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public static function getFakultas($fakultasId) {
        global $conn;
        $sql = "SELECT d.id, d.judul, d.isi, d.waktu_pembuatan, u.nama , f.nama
                FROM diskusi AS d
                JOIN user AS u ON d.user_fk = u.id
                JOIN prodi AS p ON u.prodi_fk = p.id
                JOIN fakultas AS f on p.fakultas_fk = f.id
                WHERE p.id= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $fakultasId);
        $stmt->execute();
        $result = $stmt->get_result();
        $diskusiList = [];
        while ($row = $result->fetch_assoc()) {
            $diskusiList[] = $row;
        }
        return $diskusiList;
    }
}
?>
