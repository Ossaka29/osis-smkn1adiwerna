<?php require '../inc.php'; head('Tentang Kami','tentang'); hero('Tentang Kami','Mengenal OSIS SMKN 1 Adiwerna lebih dekat'); $a=q('SELECT * FROM about WHERE id=1')->fetch();?>
<section class="sec"><div class="wrap"><div class="vm"><div><h3>Visi</h3><p><?=nl2br(e($a['visi']))?></p></div><div><h3>Misi</h3><ul><?php foreach(array_filter(array_map('trim',explode("\n",$a['misi']))) as $l)echo '<li>'.e($l).'</li>';?></ul></div></div></div></section>
<?php foot();
