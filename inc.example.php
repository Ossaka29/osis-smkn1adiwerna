<?php
session_start();
$pdo=new PDO('mysql:host=localhost;dbname=NAMA_DATABASE;charset=utf8mb4','USER_DATABASE','PASSWORD_DATABASE',[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
function e($s){return htmlspecialchars((string)$s,ENT_QUOTES);}
function q($sql,$p=[]){global $pdo;$s=$pdo->prepare($sql);$s->execute($p);return $s;}
function bg($f,$d='linear-gradient(135deg,#9aa5b4,#566070)'){return $f?"background:url('../uploads/".e($f)."') center/cover":"background:$d";}
function head($t,$a=''){
 $n=['index'=>'🏠 Beranda','galeri'=>'🖼️ Galeri','berita'=>'📰 Berita','struktur'=>'🧑‍🤝‍🧑 Struktur Organisasi','tentang'=>'ℹ️ Tentang Kami'];
 echo '<!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.e($t).' - OSIS SMKN 1 Adiwerna</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"><link rel="stylesheet" href="../assets/style.css"></head><body><header><div class="bar"><a class="brand" href="index.php"><img src="../assets/logo.png" class="logo-img" alt="OSIS SMKN 1 Adiwerna">OSIS SMKN 1 Adiwerna</a><input type="checkbox" id="mt" class="mtc"><label for="mt" class="mt" aria-label="Menu">⋮</label><nav>';
 foreach($n as $f=>$l)echo '<a href="'.$f.'.php"'.($f==$a?' class="on"':'').'>'.$l.'</a>';
 echo '</nav></div></header><main>';
}
function hero($t,$s){echo '<section class="hero sm"><h1>'.e($t).'</h1><p>'.e($s).'</p></section>';}
function foot(){echo '</main><footer><div class="fg"><div class="fc"><div class="mini"><img src="../assets/logo.png" class="logo-img" alt="OSIS SMKN 1 Adiwerna">OSIS SMKN 1 Adiwerna</div><p style="margin:0 0 10px">Berdedikasi untuk pengembangan siswa.</p><b style="color:#f3d9b8;font-size:.8rem">#NEXT GEN</b></div><div class="fc"><h4>📍 Alamat</h4><div>📍 SMKN 1 Adiwerna</div></div><div class="fc"><h4>🔗 Ikuti Kami</h4><div class="soc"><a href="https://instagram.com/ossaka_osis.adb" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:10px;color:#fff;font-weight:500"><span>ig</span>@ossaka_osis.adb</a></div></div></div><p class="cp">© '.date('Y').' OSIS SMKN 1 Adiwerna. All rights reserved.</p></footer></body></html>';}
function newsCard($n){return '<div class="card"><div class="im" style="'.bg($n['image'],'linear-gradient(135deg,#7a5a45,#c9a27c)').'"></div><div class="b"><h3>'.e($n['title']).'</h3><div class="meta">📅 '.date('d F Y',strtotime($n['date'])).'</div><p>'.e(mb_strimwidth($n['body'],0,110,'…')).'</p><a class="btn" href="berita.php?id='.$n['id'].'">Baca Selengkapnya</a></div></div>';}
function auth(){if(empty($_SESSION['a'])){header('Location: login.php');exit;}}
function adm($t,$a){
 $m=['index'=>['Dashboard','🏠'],'kelola.php?t=news'=>['Berita','📰'],'kelola.php?t=gallery'=>['Galeri','🖼️'],'kelola.php?t=members'=>['Struktur Organisasi','🧑‍🤝‍🧑'],'tentang'=>['Tentang Kami','ℹ️']];
 echo '<!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>'.e($t).' - Admin OSIS SMKN 1 Adiwerna</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"><link rel="stylesheet" href="../assets/style.css"></head><body><div class="adm"><aside class="side"><div class="ttl">Admin Panel<br><small style="font-weight:400">OSIS SMKN 1 Adiwerna Management</small></div>';
 foreach($m as $f=>$v)echo '<a href="'.(strpos($f,'.')?$f:$f.'.php').'"'.(($f==$a)?' class="on"':'').'>'.$v[1].' '.$v[0].'</a>';
 echo '<a href="../public/index.php" target="_blank">🌐 Lihat Website</a><a href="logout.php">🚪 Keluar</a></aside><div class="main">';
}
