<?php

class ProfileUser {
    public static function getUserById($id) {
        global $conn;
        $sql = "SELECT 
                    user.*,
                    prodi.nama AS nama_prodi,
                    fakultas.nama AS nama_fakultas
                FROM user
                JOIN prodi ON user.prodi_fk = prodi.id
                JOIN fakultas ON prodi.fakultas_fk = fakultas.id
                WHERE user.id = ?;
                ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();;
    }

    public static function updateUserProfile($id, $nama, $email, $password) {
        global $conn;
        $hashedPassword = md5($password);
        $sql = "UPDATE user SET  nama = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi',$nama, $email, $hashedPassword, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    
    public static function updatePassword($id, $newPassword) {
        global $conn;
        $hashedPassword = md5($newPassword);
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $hashedPassword, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
    
    public static function getUserByEmail($Email) {
        global $conn;
        $sql = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $Email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public static function deleteAccount($id) {
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
        
        $sqlDeleteDiskusi = "DELETE FROM diskusi WHERE user_fk = ?";
        $stmtDeleteDiskusi = $conn->prepare($sqlDeleteDiskusi);
        $stmtDeleteDiskusi->bind_param("i", $id);
        $stmtDeleteDiskusi->execute();
        $stmtDeleteDiskusi->close();

        $sqlUser = "DELETE FROM user WHERE id = ?";
        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bind_param('i', $id);
        $resultUser = $stmtUser->execute();
        $resultUser = $stmtUser->execute();

        if ($resultUser) {
            $stmtUser->close();
            return true; // Return true if successful
        } else {
            // Provide more information about the error
            echo "Error: " . $stmtUser->error;
            $stmtUser->close();
            return false; // Return false if unsuccessful
        }
    }
    
}
