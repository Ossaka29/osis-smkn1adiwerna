<?php require '../inc.php'; auth();
$T=['news'=>['Berita',['title'=>['Judul','text'],'date'=>['Tanggal','date'],'body'=>['Isi','textarea'],'image'=>['Gambar','file']]],
'gallery'=>['Galeri',['title'=>['Judul','text'],'category'=>['Kategori','text'],'link'=>['Link Google Drive','text'],'image'=>['Foto','file']]],
'members'=>['Struktur Organisasi',['name'=>['Nama','text'],'role'=>['Jabatan / Deskripsi','text'],'email'=>['Email','text'],'kind'=>['Tipe','kind'],'sort'=>['Urutan','number'],'photo'=>['Foto','file']]]];
$t=$_GET['t']??'news'; if(!isset($T[$t]))$t='news'; [$label,$F]=$T[$t];
if($_SERVER['REQUEST_METHOD']=='POST'){
 if(isset($_POST['del'])){q("DELETE FROM $t WHERE id=?",[(int)$_POST['del']]);}
 else{$id=(int)($_POST['id']??0);$cols=[];$vals=[];
  foreach($F as $k=>$d){
   if($d[1]=='file'){ if(!empty($_FILES[$k]['name'])&&$_FILES[$k]['error']==0){$x=strtolower(pathinfo($_FILES[$k]['name'],PATHINFO_EXTENSION));
     if(in_array($x,['jpg','jpeg','png','webp','gif'])){$nm=uniqid().'.'.$x;move_uploaded_file($_FILES[$k]['tmp_name'],'../uploads/'.$nm);$cols[]=$k;$vals[]=$nm;}}}
   else{$cols[]=$k;$vals[]=$_POST[$k]??'';}}
  if($id)q("UPDATE $t SET ".implode(',',array_map(fn($c)=>"$c=?",$cols))." WHERE id=?",array_merge($vals,[$id]));
  else q("INSERT INTO $t(".implode(',',$cols).") VALUES(".implode(',',array_fill(0,count($cols),'?')).")",$vals);}
 header("Location: kelola.php?t=$t");exit;}
$ed=isset($_GET['e'])?q("SELECT * FROM $t WHERE id=?",[(int)$_GET['e']])->fetch():null;
adm($label,"kelola.php?t=$t");?>
<h1>Kelola <?=e($label)?></h1>
<form method="post" enctype="multipart/form-data" class="frm"><h3 style="margin-top:0"><?=$ed?'Edit':'Tambah'?> Data</h3><input type="hidden" name="id" value="<?=$ed['id']??0?>">
<?php foreach($F as $k=>$d){$v=e($ed[$k]??'');echo '<label class="meta">'.$d[0].'</label>';
 if($d[1]=='textarea')echo "<textarea name=\"$k\" rows=\"4\">$v</textarea>";
 elseif($d[1]=='file')echo "<input type=\"file\" name=\"$k\" accept=\"image/*\">";
 elseif($d[1]=='kind'){echo '<select name="kind" style="width:100%;padding:10px;margin:6px 0 12px">';foreach(['pimpinan','dpo','divisi'] as $o)echo "<option".(($ed['kind']??'')==$o?' selected':'').">$o</option>";echo '</select>';}
 else echo "<input type=\"$d[1]\" name=\"$k\" value=\"$v\"".($d[1]=='number'?' value="0"':'').">";}?>
<button class="btn g" style="margin:0">💾 Simpan</button> <?php if($ed)echo '<a class="btn l" href="kelola.php?t='.$t.'">Batal</a>';?></form>
<table class="tb"><tr><th>Data</th><th>Aksi</th></tr>
<?php foreach(q("SELECT * FROM $t ORDER BY id DESC") as $r){$im=$r['image']??$r['photo']??'';
 echo '<tr><td>'.($im?'<img class="thumb" src="../uploads/'.e($im).'"> ':'').'<b>'.e($r['title']??$r['name']).'</b> <span class="meta">'.e($r['category']??$r['role']??$r['date']??'').'</span></td><td style="white-space:nowrap"><a class="bs" href="?t='.$t.'&e='.$r['id'].'">Edit</a> <form method="post" style="display:inline" onsubmit="return confirm(\'Hapus data ini?\')"><button class="bs d" name="del" value="'.$r['id'].'">Hapus</button></form></td></tr>';}?></table></div></div></body></html>
