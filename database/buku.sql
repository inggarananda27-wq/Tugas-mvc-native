CREATE DATABASE IF NOT EXISTS buku
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE buku;

CREATE TABLE IF NOT EXISTS data_buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    tahun_terbit INT NOT NULL,
    genre VARCHAR(50) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO data_buku (judul, tahun_terbit, genre, penulis) VALUES
('Janji', 2022, 'Drama', 'Tere Liye'),
('Laskar Pelangi', 2005, 'Fiksi', 'Andrea Hirata'),
('Atomic Habits', 2018, 'Pengembangan Diri', 'James Clear'),
('Laut Bercerita', 2010, 'Drama', 'Laila S. Chudiro');