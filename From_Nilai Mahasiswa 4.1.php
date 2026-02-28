<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Mahasiswa</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>
    <form action="proses_mahasiswa.php" method="post">
        Nama : <input type="text" name="nama" required><br><br>
        Kelas : <input type="text" name="kelas" required><br><br>
        Mata Kuliah : <input type="text" name="matkul" value="Pemrograman Berorientasi Objek" required><br><br>
        Nilai : <input type="number" name="nilai" required><br><br>
        <button type="submit">Proses</button>
    </form>
</body>
</html>
