-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS sensor_data;

-- Gunakan database yang dibuat
USE sensor_data;

-- Hapus tabel jika sudah ada sebelumnya
DROP TABLE IF EXISTS sensor_data;
DROP TABLE IF EXISTS users;

-- Buat tabel sensor_data untuk menyimpan data pH, suhu, dan TDS
CREATE TABLE sensor_data (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- ID unik untuk setiap data
    ph FLOAT NOT NULL,                      -- Kolom untuk nilai pH
    temperature FLOAT NOT NULL,             -- Kolom untuk nilai suhu (Celsius)
    tds FLOAT NOT NULL,                     -- Kolom untuk nilai TDS (ppm)
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP -- Waktu data direkam
);

 

-- Tambahkan data awal ke tabel sensor_data
INSERT INTO sensor_data (ph, temperature, tds, timestamp) VALUES
(7.2, 25.3, 300, '2024-11-12 08:00:00'),
(6.8, 26.1, 320, '2024-11-12 09:00:00'),
(7.0, 25.8, 310, '2024-11-12 10:00:00'),
(7.5, 26.5, 330, '2024-11-12 11:00:00'),
(7.1, 27.0, 295, '2024-11-12 12:00:00');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Gunakan hashing untuk keamanan
    nama VARCHAR(100),
    prodi VARCHAR(100)
);

-- Tambahkan user untuk testing
INSERT INTO users (username, password, nama, prodi) 
VALUES 
('admin', MD5('admin123'), 'Admin Utama', 'Teknik Informatika'),
('user1', MD5('password123'), 'User Satu', 'Sistem Informasi');
