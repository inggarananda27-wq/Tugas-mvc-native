<?php
class BukuModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, judul, tahun_terbit, genre, penulis FROM buku ORDER BY judul ASC'
        );
        return $stmt->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT id, judul, tahun_terbit, genre, penulis FROM buku WHERE id = :id'
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO buku (judul, tahun_terbit, genre, penulis) 
                VALUES (:judul, :tahun_terbit, :genre, :penulis)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul'        => $data['judul'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':genre'        => $data['genre'],
            ':penulis'      => $data['penulis']
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE buku 
                SET judul = :judul, 
                    tahun_terbit = :tahun_terbit, 
                    genre = :genre, 
                    penulis = :penulis 
                WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'           => $id,
            ':judul'        => $data['judul'],
            ':tahun_terbit' => $data['tahun_terbit'],
            ':genre'        => $data['genre'],
            ':penulis'      => $data['penulis']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM buku WHERE id = :id'
        );
        return $stmt->execute([':id' => $id]);
    }
}
?>