<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h2>Daftar Buku</h2>
    <a href="index.php?page=buku&action=create">Tambah Data Buku</a>
    <br><br>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tahun Terbit</th>
                <th>Genre</th>
                <th>Penulis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b): ?>
            <tr>
                <td><?= htmlspecialchars($b['judul']) ?></td>
                <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                <td><?= htmlspecialchars($b['genre']) ?></td>
                <td><?= htmlspecialchars($b['penulis']) ?></td>
                <td>
                    <a href="index.php?page=buku&action=edit&id=<?= $b['id'] ?>">Edit</a>
                    <form method="post" 
                          action="index.php?page=buku&action=delete" 
                          style="display:inline" 
                          onsubmit="return confirm('Hapus buku ini?')">
                        <input type="hidden" name="id" value="<?= $b['id'] ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>