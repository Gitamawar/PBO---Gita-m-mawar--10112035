<?php
require_once __DIR__ . '/Database.php';

class Transaksi extends Database {
    // PEMBELIAN (Supplier -> Gudang)
    public function tampil_pembelian() {
        $data = [];
        $query = "SELECT p.*, s.nama_supplier FROM tb_pembelian p LEFT JOIN tb_supplier s ON p.id_supplier = s.id_supplier";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_pembelian($no_pembelian, $tanggal_pembelian, $id_supplier, $kd_barang, $jumlah_barang, $harga_beli) {
        // Start transaction
        $this->koneksi->begin_transaction();

        try {
            $total_harga = $jumlah_barang * $harga_beli;

            // Insert into tb_pembelian
            $query_pembelian = "INSERT INTO tb_pembelian (no_pembelian, tanggal_pembelian, id_supplier, total_barangall, total_hargaall) 
                                VALUES ('$no_pembelian', '$tanggal_pembelian', '$id_supplier', $jumlah_barang, $total_harga)";
            $this->koneksi->query($query_pembelian);

            // Get kode_jenis from barang
            $res_barang = $this->koneksi->query("SELECT kode_jenis FROM tb_barang WHERE kd_barang='$kd_barang'");
            $barang = $res_barang->fetch_assoc();
            $kode_jenis = $barang['kode_jenis'];

            // Insert into detail_pembelian
            $query_detail = "INSERT INTO detail_pembelian (no_pembelian, kd_barang, kode_jenis, jumlah_barang, harga_barang, total_harga, no_item) 
                             VALUES ('$no_pembelian', '$kd_barang', '$kode_jenis', $jumlah_barang, $harga_beli, $total_harga, 1)";
            $this->koneksi->query($query_detail);

            // Update stok barang
            $query_stok = "UPDATE tb_barang SET stok = stok + $jumlah_barang WHERE kd_barang='$kd_barang'";
            $this->koneksi->query($query_stok);

            $this->koneksi->commit();
            return true;
        } catch (Exception $e) {
            $this->koneksi->rollback();
            return false;
        }
    }

    // PENJUALAN (Gudang -> Customer)
    public function tampil_penjualan() {
        $data = [];
        $query = "SELECT p.*, c.nama_customer FROM tb_penjualan p LEFT JOIN tb_customer c ON p.id_customer = c.id_customer";
        $result = $this->koneksi->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function tambah_penjualan($no_penjualan, $tanggal_penjualan, $id_customer, $kd_barang, $jumlah_barang, $harga_jual) {
        $this->koneksi->begin_transaction();

        try {
            $total_harga = $jumlah_barang * $harga_jual;

            // Insert into tb_penjualan
            $query_penjualan = "INSERT INTO tb_penjualan (no_penjualan, tanggal_penjualan, id_customer, total_barangall, total_hargaall) 
                                VALUES ('$no_penjualan', '$tanggal_penjualan', '$id_customer', $jumlah_barang, $total_harga)";
            $this->koneksi->query($query_penjualan);

            // Get kode_jenis from barang
            $res_barang = $this->koneksi->query("SELECT kode_jenis FROM tb_barang WHERE kd_barang='$kd_barang'");
            $barang = $res_barang->fetch_assoc();
            $kode_jenis = $barang['kode_jenis'];

            // Insert into detail_penjualan
            $query_detail = "INSERT INTO detail_penjualan (no_penjualan, kd_barang, kode_jenis, jumlah_barang, harga_barang, total_harga, no_item) 
                             VALUES ('$no_penjualan', '$kd_barang', '$kode_jenis', $jumlah_barang, $harga_jual, $total_harga, 1)";
            $this->koneksi->query($query_detail);

            // Update stok barang
            $query_stok = "UPDATE tb_barang SET stok = stok - $jumlah_barang WHERE kd_barang='$kd_barang'";
            $this->koneksi->query($query_stok);

            $this->koneksi->commit();
            return true;
        } catch (Exception $e) {
            $this->koneksi->rollback();
            return false;
        }
    }
}
?>
