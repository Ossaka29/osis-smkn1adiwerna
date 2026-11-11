<?php require '../inc.php'; head('Struktur Organisasi','struktur'); hero('Struktur Organisasi','Susunan pengurus OSIS SMKN 1 Adiwerna');
function nd($m){return '<div class="node"><div class="av">'.($m['photo']?'<img src="../uploads/'.e($m['photo']).'" style="width:100%;height:100%;border-radius:50%;object-fit:cover">':'👤').'</div><b>'.e($m['role']).'</b><span>'.e($m['name']).'</span></div>';}
$p=q("SELECT * FROM members WHERE kind='pimpinan' ORDER BY sort")->fetchAll();
$d=q("SELECT * FROM members WHERE kind='dpo' ORDER BY sort")->fetchAll();
$v=q("SELECT * FROM members WHERE kind='divisi' ORDER BY sort")->fetchAll();?>
<section class="sec"><div class="wrap"><div class="tree">
<?php foreach($p as $i=>$m){if(stripos($m['role'],'pembina')!==false){array_splice($p,$i,1);array_unshift($p,$m);break;}}
if($p){echo '<div class="row one">'.nd(array_shift($p)).'</div>';}
foreach(array_chunk($p,2) as $r){echo '<div class="row">';foreach($r as $m)echo nd($m);echo '</div>';}?></div>
<?php if($d){?><div class="art" style="margin:40px auto 0"><h1>DPO & Tim Ahli</h1><div style="border-left:4px solid var(--mr);padding-left:14px;margin-top:12px"><?php foreach($d as $m)echo '<div style="margin:6px 0;color:var(--blue);font-size:.92rem">👤 '.e($m['name']).'</div>';?></div></div><?php }
if($v){echo '<h2 class="t" style="margin-top:40px">Seksi Bidang</h2><div class="grid" style="margin-top:20px">';foreach($v as $m)echo '<div class="card"><div class="b" style="text-align:center"><h3>'.e($m['name']).'</h3><p>'.e($m['role']).'</p></div></div>';echo '</div>';}?>
</div></section>
<?php foot();
