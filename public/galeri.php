<?php require '../inc.php'; head('Galeri','galeri'); hero('Galeri Kegiatan','Dokumentasi berbagai kegiatan OSIS SMKN 1 Adiwerna');
$k=$_GET['k']??'Semua'; $cats=$pdo->query('SELECT DISTINCT category FROM gallery')->fetchAll(PDO::FETCH_COLUMN);
$rows=$k=='Semua'?q('SELECT * FROM gallery ORDER BY id DESC')->fetchAll():q('SELECT * FROM gallery WHERE category=? ORDER BY id DESC',[$k])->fetchAll();?>
<section class="sec"><div class="wrap"><div class="chips"><?php foreach(array_merge(['Semua'],$cats) as $c)echo '<a class="chip'.($c==$k?' on':'').'" href="?k='.urlencode($c).'">'.e($c).'</a>';?></div>
<div class="gal"><?php foreach($rows as $g)echo '<a'.(preg_match('~^https?://~',$g['link']??'')?' href="'.e($g['link']).'" target="_blank" rel="noopener"':'').' style="'.bg($g['image'],'linear-gradient(135deg,#d6b44a,#4c8a4c)').'">'.e($g['title']).'</a>';?></div></div></section>
<?php foot();
