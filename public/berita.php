<?php require '../inc.php'; $id=(int)($_GET['id']??0);
if($id&&$_SERVER['REQUEST_METHOD']=='POST'){
 if(isset($_POST['v']))q('UPDATE news SET '.($_POST['v']=='1'?'likes=likes+1':'dislikes=dislikes+1').' WHERE id=?',[$id]);
 elseif(trim($_POST['name']??'')&&trim($_POST['body']??''))q('INSERT INTO comments(news_id,name,body) VALUES(?,?,?)',[$id,trim($_POST['name']),trim($_POST['body'])]);
 header("Location: berita.php?id=$id");exit;}
$n=$id?q('SELECT * FROM news WHERE id=?',[$id])->fetch():null;
head($n?$n['title']:'Berita','berita'); hero('Berita Terkini','Informasi dan Kegiatan Terbaru OSIS SMKN 1 Adiwerna');
if(!$n){echo '<section class="sec"><div class="wrap"><div class="grid">';foreach(q('SELECT * FROM news ORDER BY date DESC') as $r)echo newsCard($r);echo '</div></div></section>';foot();exit;}
$c=q('SELECT * FROM comments WHERE news_id=? ORDER BY id DESC',[$id])->fetchAll();?>
<section class="sec"><div style="padding-top:30px"><div class="art"><h1><?=e($n['title'])?></h1>
<div class="meta">📅 <?=date('d F Y',strtotime($n['date']))?> &nbsp; 👍 <?=$n['likes']?> Disukai &nbsp; 👎 <?=$n['dislikes']?> Tidak Disukai &nbsp; 💬 <?=count($c)?> Komentar</div>
<div class="im" style="<?=bg($n['image'],'linear-gradient(135deg,#7a5a45,#c9a27c)')?>"></div><p><?=nl2br(e($n['body']))?></p>
<form method="post" style="display:flex;gap:10px"><button class="btn" name="v" value="1">👍 Suka</button><button class="btn l" name="v" value="0">👎 Tidak Suka</button></form>
<div class="cmt"><h3>Komentar (<?=count($c)?>)</h3>
<?php if(!$c)echo '<p class="meta">Belum ada komentar. Jadilah yang pertama memberikan komentar!</p>'; foreach($c as $x)echo '<div class="box"><b>'.e($x['name']).'</b><br>'.nl2br(e($x['body'])).'</div>';?>
<form method="post" class="box"><h4 style="margin:0 0 8px">💬 Tulis Komentar</h4><label class="meta">Nama Anda</label><input name="name" required maxlength="80"><label class="meta">Komentar</label><textarea name="body" rows="3" required></textarea><button class="btn">Kirim Komentar</button></form></div></div></div></section>
<?php foot();
