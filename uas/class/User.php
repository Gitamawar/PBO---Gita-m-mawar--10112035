<?php
require_once __DIR__ . '/Database.php';

class User extends Database {
    public function tampil_data() {
        $data = [];
        $query = "SELECT * FROM user";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_data($username, $password, $tipe_user) {
        $username = $this->koneksi->real_escape_string($username);
        $password = $this->koneksi->real_escape_string($password);
        $tipe_user = $this->koneksi->real_escape_string($tipe_user);
        
        $query = "INSERT INTO user (username, password, tipe_user) 
                  VALUES ('$username', '$password', '$tipe_user')";
        return $this->koneksi->query($query);
    }

    public function get_data_by_id($id_user) {
        $id_user = (int)$id_user;
        $query = "SELECT * FROM user WHERE id_user=$id_user";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function edit_data($id_user, $username, $password, $tipe_user) {
        $id_user = (int)$id_user;
        $username = $this->koneksi->real_escape_string($username);
        $password = $this->koneksi->real_escape_string($password);
        $tipe_user = $this->koneksi->real_escape_string($tipe_user);
        
        $query = "UPDATE user SET username='$username', password='$password', tipe_user='$tipe_user' 
                  WHERE id_user=$id_user";
        return $this->koneksi->query($query);
    }

    public function hapus_data($id_user) {
        $id_user = (int)$id_user;
        $query = "DELETE FROM user WHERE id_user=$id_user";
        return $this->koneksi->query($query);
    }
}
?>
