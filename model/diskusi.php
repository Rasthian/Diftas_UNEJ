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
