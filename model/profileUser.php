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
}
