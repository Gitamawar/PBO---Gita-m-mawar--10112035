<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php'; 

if (isset($_GET['id'])) {
    

    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    $query = "DELETE FROM user WHERE id='$id'";
    

    $hapus = mysqli_query($koneksi, $query);

    if ($hapus) {
        echo "<script>
                alert('Data berhasil dihapus dari database!'); 
                window.location='index.php';
              </script>";
    } else {
        echo "<div style='color: red; font-family: sans-serif; padding: 20px; border: 1px solid red; background: #fff5f5;'>";
        echo "<h3> Waduh, Gagal Menghapus Data!</h3>";
        echo "<p><strong>Pesan Error Database:</strong> " . mysqli_error($koneksi) . "</p>";
        echo "<p><strong>Query yang dieksekusi:</strong> " . $query . "</p>";
        echo "</div>";
    }

} else {
    echo "<script>
            alert('Akses ditolak! ID data tidak ditemukan.'); 
            window.location='index.php';
          </script>";
}
?>