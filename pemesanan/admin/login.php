<!DOCTYPE html>
<html>
  <head>
    <title>Masuk Halaman Admin</title>
	 <link href="../css/main.css" rel="stylesheet" media="screen">
	 <link href="../css/weather-icons.min.css" rel="stylesheet" media="screen">
	<style>
		body{
			background-image:url(../gambar/bg.jpg);
			background-repeat:no-repeat;
			background-attachment:fixed;
			background-position:center;
		}
	</style>
  </head>
  <body>
    <div class="form-container">
                <h2 align="center" style="color:#000000;margin-top:10%"><b>Restoran Rumput Hijau</b><br>Silahkan Login Dahulu</h2><br>
				
                <form class="form-horizontal ng-pristine ng-valid" method="POST" action="cek.php" style="width:45%;margin:auto">
                    <fieldset>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" name="user" placeholder="Nama Pengguna" autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                <input type="password" class="form-control" name="pass" placeholder="Kata Sandi" required>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="MASUK">
                        </div>
                    </fieldset>
                </form>
                
            </div>
  </body>
</html>