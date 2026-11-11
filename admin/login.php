<?php require '../inc.php'; $err='';
if($_SERVER['REQUEST_METHOD']=='POST'){$u=q('SELECT * FROM admin WHERE username=?',[$_POST['u']??''])->fetch();
 if($u&&password_verify($_POST['p']??'',$u['password'])){session_regenerate_id(true);$_SESSION['a']=$u['id'];header('Location: index.php');exit;}$err='Username atau password salah.';}?>
<!DOCTYPE html><html lang="id"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login Admin - OSIS SMKN 1 Adiwerna</title><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"><link rel="stylesheet" href="../assets/style.css"></head><body>
<form method="post" class="login"><h2 style="margin-top:0;color:var(--mr)">Login Admin</h2><?php if($err)echo '<p style="color:#c0392b">'.$err.'</p>';?>
<label class="meta">Username</label><input name="u" required autofocus><label class="meta">Password</label><input name="p" type="password" required><button class="btn" style="width:100%;margin:0">Masuk</button></form></body></html>
