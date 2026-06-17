<?php
require_once __DIR__ . '/Database.php';

class Gudang extends Database {

    // Ambil semua data gudang
    public function tampil_data() {
        $data = [];
        $query = "SELECT * FROM tb_gudang ORDER BY id_gudang ASC";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // Tambah data gudang
    public function tambah_data($kode_gudang, $nama_gudang, $lokasi) {
        $kode_gudang = $this->koneksi->real_escape_string($kode_gudang);
        $nama_gudang = $this->koneksi->real_escape_string($nama_gudang);
        $lokasi = $this->koneksi->real_escape_string($lokasi);

        $query = "INSERT INTO tb_gudang (kode_gudang, nama_gudang, lokasi) 
                  VALUES ('$kode_gudang', '$nama_gudang', '$lokasi')";
        return $this->koneksi->query($query);
    }

    // Ambil data gudang berdasarkan ID
    public function get_data_by_id($id_gudang) {
        $id_gudang = (int)$id_gudang;
        $query = "SELECT * FROM tb_gudang WHERE id_gudang=$id_gudang";
        $result = $this->koneksi->query($query);
        return $result ? $result->fetch_assoc() : null;
    }

    // Edit data gudang
    public function edit_data($id_gudang, $kode_gudang, $nama_gudang, $lokasi) {
        $id_gudang = (int)$id_gudang;
        $kode_gudang = $this->koneksi->real_escape_string($kode_gudang);
        $nama_gudang = $this->koneksi->real_escape_string($nama_gudang);
        $lokasi = $this->koneksi->real_escape_string($lokasi);

        $query = "UPDATE tb_gudang 
                  SET kode_gudang='$kode_gudang', nama_gudang='$nama_gudang', lokasi='$lokasi' 
                  WHERE id_gudang=$id_gudang";
        return $this->koneksi->query($query);
    }

    // Hapus data gudang
    public function hapus_data($id_gudang) {
        $id_gudang = (int)$id_gudang;
        $query = "DELETE FROM tb_gudang WHERE id_gudang=$id_gudang";
        return $this->koneksi->query($query);
    }
}
?>
