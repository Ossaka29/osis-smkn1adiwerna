CREATE DATABASE IF NOT EXISTS msc CHARACTER SET utf8mb4;
USE msc;
CREATE TABLE admin(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) UNIQUE,password VARCHAR(255));
CREATE TABLE news(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(200),date DATE,body TEXT,image VARCHAR(200),likes INT DEFAULT 0,dislikes INT DEFAULT 0);
CREATE TABLE comments(id INT AUTO_INCREMENT PRIMARY KEY,news_id INT,name VARCHAR(80),body TEXT,created TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE gallery(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(200),category VARCHAR(50),image VARCHAR(200));
CREATE TABLE members(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(200),role VARCHAR(100),email VARCHAR(100),photo VARCHAR(200),kind ENUM('pimpinan','dpo','divisi') DEFAULT 'pimpinan',sort INT DEFAULT 0);
CREATE TABLE about(id INT PRIMARY KEY,visi TEXT,misi TEXT);
INSERT INTO admin(username,password) VALUES('admin','$2y$12$Yfu2O9xRze/fEyoK5NXKN.4VEt.tujp9nWzVuuNArN6gHDY39RY0i');
INSERT INTO news(title,date,body) VALUES
('Seminar Nasional Teknologi','2024-12-15','Seminar nasional tentang perkembangan teknologi terkini dan dampaknya terhadap industri'),
('Workshop Pemrograman','2024-12-10','Workshop intensif pemrograman untuk meningkatkan kemampuan coding mahasiswa'),
('Kunjungan Industri','2024-12-05','Kunjungan ke perusahaan teknologi untuk melihat implementasi teknologi di dunia industri');
INSERT INTO gallery(title,category) VALUES('Sosialisasi Sekolah','Sosialisasi'),('Workshop Komputer','Workshop'),('Kunjungan Sosialisasi','Sosialisasi');
INSERT INTO members(name,role,email,kind,sort) VALUES
('Qammaddin, S.Kom., M.Kom., CITSM., ECIH','Pembina I','Qammaddin@gmail.com','pimpinan',1),
('Johar Nur Iin, S.Kom., M.T','Pembina II','jaharnuriin86@gmail.com','pimpinan',2),
('Muh Salman Ramadhan','Ketua Umum','salman@msc.ac.id','pimpinan',3),
('Muzarrafah','Sekretaris Umum','muzarrafah@gmail.com','pimpinan',4),
('Michael Yusuf Sampe (221230722 - Sistem Informasi - FTI)','Tim Ahli','','dpo',1),
('Musmaulana (231220699 - Sistem Informasi - FTI)','Tim Ahli','','dpo',2),
('Wa Mawar (221220655 - Sistem Informasi - FTI)','Tim Ahli','','dpo',3),
('Divisi Keilmuan','Pengembangan ilmu dan kegiatan edukatif yang interaktif.','','divisi',1);
INSERT INTO about VALUES(1,'Membentuk kader yang berilmu pengetahuan khusus di bidang teknologi informasi serta bertaqwa kepada Tuhan Yang Maha Esa.','Mengembangkan potensi sumber daya manusia di bidang Teknologi Multimedia dan sosial terkhusus anggota Multimedia Study Club.
Menyalurkan kreatifitas khususnya pemberdayaan Teknologi Multimedia yang dapat diandalkan dan diamalkan di masa sekarang dan yang akan datang.
Mengembangkan soft skills dan hard skills mahasiswa.');
