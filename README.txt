# Website OSIS SMKN 1 Adiwerna

Website resmi OSIS SMKN 1 Adiwerna (OSSAKA). Dibuat dengan PHP dan MySQL, dilengkapi panel admin.

Website online: http://osis-smkn1adiwerna.kesug.com

## Halaman
- Beranda
- Galeri (setiap foto bisa diberi link Google Drive)
- Berita (suka dan komentar)
- Struktur Organisasi
- Tentang Kami

## Panel admin
Di /admin/login.php: kelola berita, galeri, struktur organisasi, serta visi dan misi.

## Cara menjalankan di komputer (Apache, PHP, MySQL/MariaDB)
1. Salin folder ini ke /var/www/html/osis-smkn1adiwerna (atau htdocs XAMPP).
2. Buat database baru, lalu impor file db.sql lewat phpMyAdmin.
3. Salin inc.example.php menjadi inc.php, lalu isi nama database, user, dan password milikmu.
4. Buat folder uploads dan pastikan bisa ditulis oleh server.
5. Buka localhost/osis-smkn1adiwerna/public/index.php

Catatan: ganti password admin bawaan setelah pemasangan.
