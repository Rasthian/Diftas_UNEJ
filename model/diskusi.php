<?php
class ModelDiskusi {
    public static function getAllDiskusi() {
        global $conn;
        $sql = "SELECT d.id as dis_id , d.judul , d.isi , d.waktu_pembuatan , d.user_fk , u.nama , f.nama as f_nama FROM diskusi as d
                JOIN user AS u on d.user_fk = u.id 
                JOIN prodi as p ON u.prodi_fk = p.id 
                JOIN fakultas as f ON p.fakultas_fk = f.id
                ORDER BY RAND()";
        $result = $conn->query($sql);
        $diskusi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $diskusi[] = $row;
            }
        }
        return $diskusi;
    }

    public static function getAllDiskusiku() {
        global $conn;

        $userId = $_SESSION['session_id'];
        $sql = "SELECT d.*, u.nama
        FROM diskusi as d
        JOIN user as u ON d.user_fk = u.id
        WHERE u.id = '$userId';
         ";
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

        $sql = "SELECT * , u.nama ,f.nama as f_nama FROM diskusi as d
                JOIN user AS u on d.user_fk = u.id 
                JOIN prodi as p ON u.prodi_fk = p.id 
                JOIN fakultas as f ON p.fakultas_fk = f.id
                WHERE d.id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $diskusi = $result->fetch_assoc();
            $sql = "SELECT k.id , k.isi , k.waktu_komentar as waktu_komentar , k.user_fk , k.diskusi_fk , f.nama , u.nama as nama_komentar
            FROM komentar as k
            JOIN user as u ON k.user_fk = u.id 
            JOIN prodi as p ON u.prodi_fk = p.id 
            JOIN fakultas as f ON p.fakultas_fk = f.id 
            WHERE k.diskusi_fk = ?";
    
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $resultKomentar = $stmt->get_result();

            $diskusi['komentar'] = $resultKomentar->fetch_all(MYSQLI_ASSOC);

            return $diskusi;
        }

        return null;
    }

    public static function addDiskusi($judul, $isi) {
        global $conn;
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
    public static function getAllFakultas(){
        global $conn;
        $query = "SELECT id,nama FROM fakultas";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public static function selectedFakultas($fakultasID){
        global $conn;
        
        $sql = "SELECT *
        FROM fakultas
        WHERE id = $fakultasID";
        $result = $conn->query($sql);
        $fakultas = mysqli_fetch_assoc($result);
        return $fakultas;
    }
    public static function filterFakultas($fakultasId){
        global $conn;
        $sql = "SELECT d.*, u.nama as nama, f.nama as nama_fakultas
        FROM diskusi as d
        JOIN user as u ON d.user_fk = u.id
        JOIN prodi as p ON u.prodi_fk = p.id
        JOIN fakultas as f ON p.fakultas_fk = f.id
        WHERE f.id = '$fakultasId'";
        $result = $conn->query($sql);
        $diskusi = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $diskusi[] = $row;
            }
        }
        return $diskusi;
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
