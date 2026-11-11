<?php require '../inc.php'; auth();
if($_SERVER['REQUEST_METHOD']=='POST'){q('UPDATE about SET visi=?,misi=? WHERE id=1',[$_POST['visi'],$_POST['misi']]);header('Location: tentang.php?ok=1');exit;}
$a=q('SELECT * FROM about WHERE id=1')->fetch(); adm('Tentang Kami','tentang');?>
<h1>Tentang Kami</h1><p class="meta">Kelola Visi & Misi Organisasi<?=isset($_GET['ok'])?' — tersimpan ✔':''?></p>
<form method="post" class="frm"><label class="meta">Visi</label><textarea name="visi" rows="4"><?=e($a['visi'])?></textarea><label class="meta">Misi (satu baris = satu poin)</label><textarea name="misi" rows="7"><?=e($a['misi'])?></textarea><button class="btn g" style="margin:0">💾 Simpan</button></form></div></div></body></html>
