<!DOCTYPE html>
<html>
  <head>
    <title>Silahkan Login Terlebih Dahulu</title>
     <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
	<style>
		body{
			background-image:url(gambar/bg.jpg);
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-position:center;
		}
	</style>
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin" method="POST" action="cek.php">
        <h2 class="form-signin-heading" align="center">Terang Bulan<br>Cak Wi</h2>
        <input type="text" class="input-block-level" name="user" placeholder="Username" autofocus autocomplete="off" autocorrect="off" required>
        <input type="password" class="input-block-level" name="pass" placeholder="Password" required>
        <button class="btn btn-large btn-primary" type="submit">Masuk</button>
      </form>

    </div>
  </body>
</html>