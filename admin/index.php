<?php require '../inc.php'; auth(); adm('Dashboard','index');
$c=['Berita'=>'news','Foto Galeri'=>'gallery','Anggota & Divisi'=>'members','Komentar'=>'comments'];?>
<h1>Dashboard Overview</h1><p class="meta">Selamat datang di Panel Admin OSIS SMKN 1 Adiwerna</p>
<div class="stat"><?php foreach($c as $l=>$t)echo '<div><b>'.$pdo->query("SELECT COUNT(*) FROM $t")->fetchColumn()."</b>$l</div>";?></div>
<h3>Manajemen Konten Halaman</h3><div class="grid">
<?php foreach([['📰','Halaman Berita','Tulis berita, unggah gambar sampul.','news'],['🖼️','Halaman Galeri','Kelola foto dan kategori dokumentasi.','gallery'],['🧑‍🤝‍🧑','Struktur Organisasi','Kelola pimpinan, DPO, dan divisi.','members']] as $x)
echo '<div class="card"><div class="b"><div style="font-size:1.8rem">'.$x[0].'</div><h3>'.$x[1].'</h3><p>'.$x[2].'</p><a class="btn" href="kelola.php?t='.$x[3].'">⚙ Kelola</a></div></div>';?></div></div></div></body></html>
