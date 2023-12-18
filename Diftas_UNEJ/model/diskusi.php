<?php
class ModelDiskusi {
    public static function getAllDiskusi() {
        global $conn;
        $sql = "SELECT d.*, u.nama AS nama
        FROM diskusi AS d
        JOIN user AS u ON d.user_fk = u.id; ";
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


    public static function showDiskusi ($id) {
        
    global $conn;
    $sql = "SELECT d.*, u.nama AS nama, u.id as user_id
    FROM diskusi AS d
    JOIN user AS u ON d.user_fk = u.id
    where d.id = $id;";
    $result = $conn->query($sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
    }
    
    public static function getAllComment($id) {
        global $conn;
        $sql = "SELECT k.* ,  u.nama AS nama
        FROM komentar AS k
        JOIN diskusi as d on k.diskusi_fk =d.id
        JOIN user AS u ON k.user_fk = u.id
		where d.id = $id";
         $result = $conn->query($sql);
         $komentar = [];
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $komentar[] = $row;
             }
         }
         return $komentar;
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
    public static function addComment($id,$isi) {
        global $conn;
        
        $userId = $_SESSION['session_id'];
        $waktuKomentar = date('Y-m-d H:i:s');

        $sql = "INSERT INTO Komentar ( isi, waktu_komentar, user_fk, diskusi_fk) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssii', $isi, $waktuKomentar, $userId , $id);
        
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
    public static function deleteDiskusi($id) {
        global $conn;
    
        $sqlDeleteKomentar = "DELETE FROM komentar WHERE diskusi_fk = ?";
        $stmtDeleteKomentar = $conn->prepare($sqlDeleteKomentar);
        $stmtDeleteKomentar->bind_param("i", $id);
        $stmtDeleteKomentar->execute();
        $stmtDeleteKomentar->close();

        $sqlDeleteLaporan = "DELETE FROM laporan WHERE diskusi_fk = ?";
        $stmtDeleteLaporan = $conn->prepare($sqlDeleteLaporan);
        $stmtDeleteLaporan->bind_param("i", $id);
        $stmtDeleteLaporan->execute();
        $stmtDeleteLaporan->close();
    
        $sqlDeleteDiskusi = "DELETE FROM diskusi WHERE id = ?";
        $stmtDeleteDiskusi = $conn->prepare($sqlDeleteDiskusi);
        $stmtDeleteDiskusi->bind_param("i", $id);
        $stmtDeleteDiskusi->execute();
        $stmtDeleteDiskusi->close();
    }
    public static function addLaporan($id,$keterangan) {
        global $conn;
        $userId = $_SESSION['session_id'];
        $sql = "INSERT INTO laporan (keterangan, diskusi_fk, user_fk) VALUES (?, ? , ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sii', $keterangan, $id, $userId);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
