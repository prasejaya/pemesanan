<?php
include "../config/koneksi.php";
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$user = antiinjection($_POST['user']);
$pass = antiinjection($_POST['pass']);

$masuk=mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass'");
$ketemu=mysql_num_rows($masuk);
$r=mysql_fetch_array($masuk);

// Apabila ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[kode]     = $r['kode'];
  $_SESSION[username]     = $r['username'];
  $_SESSION[password]     = $r['password'];
  $_SESSION[nama]     = $r['nama_user'];
  $_SESSION[level]     = $r['level'];
    header('location:admin.php?menu=home');
}
else{
  echo "<script>alert('Login Gagal, username atau password tidak cocok'); window.location = 'index.php'</script>";
}





?>