<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form method="post" action="index.php?page=buku&action=store">
        <label>Judul Buku</label><br>
        <input type="text" name="judul" required><br><br>

        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit" min="1000" max="2099" required><br><br>

        <label>Genre</label><br>
        <input type="text" name="genre" required><br><br>

        <label>Penulis</label><br>
        <input type="text" name="penulis" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php?page=buku">Kembali</a>
    </form>
</body>
</html>