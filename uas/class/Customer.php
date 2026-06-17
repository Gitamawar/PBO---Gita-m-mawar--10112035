<?php
require_once __DIR__ . '/Database.php';

class Customer extends Database {
    public function tampil_data() {
        $data = [];
        $query = "SELECT * FROM tb_customer";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_data($id_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer) {
        $id_customer = $this->koneksi->real_escape_string($id_customer);
        $nama_customer = $this->koneksi->real_escape_string($nama_customer);
        $jenis_kelamin = $this->koneksi->real_escape_string($jenis_kelamin);
        $alamat_customer = $this->koneksi->real_escape_string($alamat_customer);
        $telepon_customer = $this->koneksi->real_escape_string($telepon_customer);
        $email_customer = $this->koneksi->real_escape_string($email_customer);
        $pass_customer = $this->koneksi->real_escape_string($pass_customer);
        
        $query = "INSERT INTO tb_customer (id_customer, nama_customer, jenis_kelamin, alamat_customer, telepon_customer, email_customer, pass_customer) 
                  VALUES ('$id_customer', '$nama_customer', '$jenis_kelamin', '$alamat_customer', '$telepon_customer', '$email_customer', '$pass_customer')";
        return $this->koneksi->query($query);
    }

    public function get_data_by_id($id_customer) {
        $id_customer = $this->koneksi->real_escape_string($id_customer);
        $query = "SELECT * FROM tb_customer WHERE id_customer='$id_customer'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function edit_data($id_customer_lama, $id_customer, $nama_customer, $jenis_kelamin, $alamat_customer, $telepon_customer, $email_customer, $pass_customer) {
        $id_customer_lama = $this->koneksi->real_escape_string($id_customer_lama);
        $id_customer = $this->koneksi->real_escape_string($id_customer);
        $nama_customer = $this->koneksi->real_escape_string($nama_customer);
        $jenis_kelamin = $this->koneksi->real_escape_string($jenis_kelamin);
        $alamat_customer = $this->koneksi->real_escape_string($alamat_customer);
        $telepon_customer = $this->koneksi->real_escape_string($telepon_customer);
        $email_customer = $this->koneksi->real_escape_string($email_customer);
        $pass_customer = $this->koneksi->real_escape_string($pass_customer);
        
        $query = "UPDATE tb_customer SET id_customer='$id_customer', nama_customer='$nama_customer', jenis_kelamin='$jenis_kelamin', 
                  alamat_customer='$alamat_customer', telepon_customer='$telepon_customer', email_customer='$email_customer', pass_customer='$pass_customer' 
                  WHERE id_customer='$id_customer_lama'";
        return $this->koneksi->query($query);
    }

    public function hapus_data($id_customer) {
        $id_customer = $this->koneksi->real_escape_string($id_customer);
        $query = "DELETE FROM tb_customer WHERE id_customer='$id_customer'";
        return $this->koneksi->query($query);
    }
}
?>
