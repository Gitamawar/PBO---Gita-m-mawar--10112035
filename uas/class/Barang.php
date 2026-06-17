<?php
require_once __DIR__ . '/Database.php';

class Barang extends Database {
    public function tampil_data() {
        $data = [];
        $query = "SELECT b.*, j.jenis FROM tb_barang b LEFT JOIN tb_jenis j ON b.kode_jenis = j.kode_jenis";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_data($kd_barang, $kode_jenis, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk) {
        $kd_barang = $this->koneksi->real_escape_string($kd_barang);
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $nama_barang = $this->koneksi->real_escape_string($nama_barang);
        $stok = (int)$stok;
        $harga_beli = (int)$harga_beli;
        $harga_jual = (int)$harga_jual;
        $gambar_produk = $this->koneksi->real_escape_string($gambar_produk);
        
        $query = "INSERT INTO tb_barang (kd_barang, kode_jenis, nama_barang, stok, harga_beli, harga_jual, gambar_produk) 
                  VALUES ('$kd_barang', '$kode_jenis', '$nama_barang', $stok, $harga_beli, $harga_jual, '$gambar_produk')";
        return $this->koneksi->query($query);
    }

    public function get_data_by_id($kd_barang) {
        $kd_barang = $this->koneksi->real_escape_string($kd_barang);
        $query = "SELECT * FROM tb_barang WHERE kd_barang='$kd_barang'";
        $result = $this->koneksi->query($query);
        return $result->fetch_assoc();
    }

    public function edit_data($kd_barang_lama, $kd_barang, $kode_jenis, $nama_barang, $stok, $harga_beli, $harga_jual, $gambar_produk) {
        $kd_barang_lama = $this->koneksi->real_escape_string($kd_barang_lama);
        $kd_barang = $this->koneksi->real_escape_string($kd_barang);
        $kode_jenis = $this->koneksi->real_escape_string($kode_jenis);
        $nama_barang = $this->koneksi->real_escape_string($nama_barang);
        $stok = (int)$stok;
        $harga_beli = (int)$harga_beli;
        $harga_jual = (int)$harga_jual;
        $gambar_produk = $this->koneksi->real_escape_string($gambar_produk);
        
        $query = "UPDATE tb_barang SET kd_barang='$kd_barang', kode_jenis='$kode_jenis', nama_barang='$nama_barang', 
                  stok=$stok, harga_beli=$harga_beli, harga_jual=$harga_jual, gambar_produk='$gambar_produk' 
                  WHERE kd_barang='$kd_barang_lama'";
        return $this->koneksi->query($query);
    }

    public function hapus_data($kd_barang) {
        $kd_barang = $this->koneksi->real_escape_string($kd_barang);
        $query = "DELETE FROM tb_barang WHERE kd_barang='$kd_barang'";
        return $this->koneksi->query($query);
    }
}
?>
