<?php
require_once 'config/conn.php';

class ModelFakultas{
    public static function getAllFakultas () {
        global $conn;
        $sql = "SELECT * FROM fakultas";
        $result = $conn->query($sql);
        $fakultas = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fakultas[] = $row;
            }
        }
        return $fakultas;
    }
}

?>