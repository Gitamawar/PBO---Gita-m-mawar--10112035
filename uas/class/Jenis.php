<?php
require_once __DIR__ . '/Database.php';

class Jenis extends Database {
    public function tampil_data() {
        $data = [];
        $query = "SELECT * FROM tb_jenis";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_data($kode_jenis, $jenis, $satuan) {
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $jenis = $this->koneksi->real_escape_string($jenis);
        $satuan = $this->koneksi->real_escape_string($satuan);
        
        $query = "INSERT INTO tb_jenis (kode_jenis, jenis, satuan) VALUES ('$kode_jenis', '$jenis', '$satuan')";
        return $this->koneksi->query($query);
    }

    public function get_data_by_id($kode_jenis) {
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $query = "SELECT * FROM tb_jenis WHERE kode_jenis='$kode_jenis'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function edit_data($kode_jenis_lama, $kode_jenis, $jenis, $satuan) {
        $kode_jenis_lama = $this->koneksi->real_escape_string($kode_jenis_lama);
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $jenis = $this->koneksi->real_escape_string($jenis);
        $satuan = $this->koneksi->real_escape_string($satuan);
        
        $query = "UPDATE tb_jenis SET kode_jenis='$kode_jenis', jenis='$jenis', satuan='$satuan' WHERE kode_jenis='$kode_jenis_lama'";
        return $this->koneksi->query($query);
    }

    public function hapus_data($kode_jenis) {
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $query = "DELETE FROM tb_jenis WHERE kode_jenis='$kode_jenis'";
        return $this->koneksi->query($query);
    }
}
?>
