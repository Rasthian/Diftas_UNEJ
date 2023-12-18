<?php
class adminModel
{
    public static function getAllLaporan()
    {

        global $conn;
        $sql = "SELECT l.*,d.isi,d.judul,d.waktu_pembuatan,d.id as disId , u.nama , f.nama as nama_fakultas FROM laporan AS l 
        JOIN user AS u ON l.user_fk = u.id
        JOIN diskusi AS d on l.diskusi_fk = d.id
        JOIN prodi as p on u.prodi_fk = p.id
        JOIN fakultas as f on p.fakultas_fk = f.id";
        $result = $conn->query($sql);
        $laporan = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $laporan[] = $row;
            }
        }
        return $laporan;
    }

    public static function deleteDiskusiAdmin($id) {
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
    public static function getByLaporan($id)
    {
            global $conn;
            $sql = "SELECT d.*, u.nama AS nama, u.id as user_id
            FROM diskusi AS d
            JOIN user AS u ON d.user_fk = u.id
            where d.id = $id;";
            $result = $conn->query($sql);
            $result = mysqli_fetch_assoc($result);
           
            
        return $result;
    }
    
    public static function ListLaporan($id){
        global $conn;
        $sql = "SELECT l.*, u.nama FROM laporan as l JOIN user as u ON l.user_fk = u.id WHERE diskusi_fk = $id";
        $result = $conn->query($sql);
        $laporan = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $laporan[] = $row;
            }
        }

        return $laporan; 
    }
}
