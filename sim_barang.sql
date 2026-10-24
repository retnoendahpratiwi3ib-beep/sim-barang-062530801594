CREATE DATABASE IF NOT EXISTS sim_barang;
USE sim_barang;

DROP TABLE IF EXISTS barang;
DROP TABLE IF EXISTS kategori;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nama VARCHAR(100) NOT NULL
);

CREATE TABLE kategori (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20) NOT NULL UNIQUE,
  nama VARCHAR(100) NOT NULL,
  kategori_id INT NOT NULL,
  jumlah INT NOT NULL,
  kondisi VARCHAR(20) NOT NULL,
  harga INT NOT NULL DEFAULT 0,
  FOREIGN KEY (kategori_id) REFERENCES kategori(id)
);

INSERT INTO users (username, password, nama) VALUES
('admin', SHA2('password123', 256), 'Administrator'),
('retno', SHA2('retno123', 256), 'Retno Endah Pratiwi');

INSERT INTO kategori (nama_kategori) VALUES
('Analog'), ('Digital'), ('Smartwatch');

INSERT INTO barang (kode, nama, kategori_id, jumlah, kondisi, harga) VALUES
('BRG-001', 'Casio G-Shock',     2, 20, 'Baik',         1500000),
('BRG-002', 'Seiko 5 Sports',    1, 12, 'Baik',         4000000),
('BRG-003', 'Fossil Gen 6',      3,  8, 'Rusak Ringan', 3500000),
('BRG-004', 'Citizen Eco-Drive', 1, 10, 'Baik',         3000000),
('BRG-005', 'Garmin Forerunner', 3,  6, 'Baik',         5000000);