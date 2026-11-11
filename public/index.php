<?php require '../inc.php'; head('Beranda','index');
$n=q('SELECT * FROM news ORDER BY date DESC LIMIT 3')->fetchAll();
$c=[['👥','Kelas 10','members',36],['👥','Kelas 11','members',36],['📰','Berita','news'],['🖼️','Foto Galeri','gallery']];?>
<section class="hero big"><h1>Selamat Datang di OSIS SMKN 1 Adiwerna</h1><p>Membangun Generasi Unggul, Berkarakter, dan Berdaya Saing</p><a class="btn" href="tentang.php">Pelajari Lebih Lanjut</a><a class="btn o" href="galeri.php">Lihat Galeri</a></section>
<section class="wrap"><h2 class="t">Berita Terkini</h2><p class="sub">Kegiatan dan informasi terbaru dari OSIS SMKN 1 Adiwerna</p><div class="grid"><?php foreach($n as $r)echo newsCard($r);?></div></section>
<section class="stats"><div class="wrap"><div class="grid"><?php foreach($c as $s){$v=$pdo->query("SELECT COUNT(*) FROM $s[2]")->fetchColumn();if(isset($s[3]))$v=$s[3];echo "<div class=\"st\"><div class=\"ic\">$s[0]</div><b>$v</b><span>$s[1]</span></div>";}?></div></div></section>
<?php foot();
