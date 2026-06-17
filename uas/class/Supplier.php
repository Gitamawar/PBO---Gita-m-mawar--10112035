<?php
require_once __DIR__ . '/Database.php';

class Supplier extends Database {
    public function tampil_data() {
        $data = [];
        $query = "SELECT * FROM tb_supplier";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_data($id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier) {
        $id_supplier = $this->koneksi->real_escape_string($id_supplier);
        $nama_supplier = $this->koneksi->real_escape_string($nama_supplier);
        $alamat_supplier = $this->koneksi->real_escape_string($alamat_supplier);
        $telepon_supplier = $this->koneksi->real_escape_string($telepon_supplier);
        $email_supplier = $this->koneksi->real_escape_string($email_supplier);
        $pass_supplier = $this->koneksi->real_escape_string($pass_supplier);
        
        $query = "INSERT INTO tb_supplier (id_supplier, nama_supplier, alamat_supplier, telepon_supplier, email_supplier, pass_supplier) 
                  VALUES ('$id_supplier', '$nama_supplier', '$alamat_supplier', '$telepon_supplier', '$email_supplier', '$pass_supplier')";
        return $this->koneksi->query($query);
    }

    public function get_data_by_id($id_supplier) {
        $id_supplier = $this->koneksi->real_escape_string($id_supplier);
        $query = "SELECT * FROM tb_supplier WHERE id_supplier='$id_supplier'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function edit_data($id_supplier_lama, $id_supplier, $nama_supplier, $alamat_supplier, $telepon_supplier, $email_supplier, $pass_supplier) {
        $id_supplier_lama = $this->koneksi->real_escape_string($id_supplier_lama);
        $id_supplier = $this->koneksi->real_escape_string($id_supplier);
        $nama_supplier = $this->koneksi->real_escape_string($nama_supplier);
        $alamat_supplier = $this->koneksi->real_escape_string($alamat_supplier);
        $telepon_supplier = $this->koneksi->real_escape_string($telepon_supplier);
        $email_supplier = $this->koneksi->real_escape_string($email_supplier);
        $pass_supplier = $this->koneksi->real_escape_string($pass_supplier);
        
        $query = "UPDATE tb_supplier SET id_supplier='$id_supplier', nama_supplier='$nama_supplier', 
                  alamat_supplier='$alamat_supplier', telepon_supplier='$telepon_supplier', email_supplier='$email_supplier', pass_supplier='$pass_supplier' 
                  WHERE id_supplier='$id_supplier_lama'";
        return $this->koneksi->query($query);
    }

    public function hapus_data($id_supplier) {
        $id_supplier = $this->koneksi->real_escape_string($id_supplier);
        $query = "DELETE FROM tb_supplier WHERE id_supplier='$id_supplier'";
        return $this->koneksi->query($query);
    }
}
?>
