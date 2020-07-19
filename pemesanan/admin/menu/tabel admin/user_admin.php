<?php
$tampil=mysql_query("select count(*) as banyak_user from user ");
$data=mysql_fetch_array($tampil);
$bnykuser=$data['banyak_user'];
?>
<?php
$di=$_GET['di'];
switch($di){
	default:
?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Daftar Pengguna</b></div>
                                <div class="pull-right">
								<span class="badge badge-warning">Ada <?php echo "$bnykuser"; ?> Pengguna</span>
                                </div>
											<div id='my_modal_user' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Tambah Pengguna</h4>
												</div>
												<div class='modal-body'>
													<form action="?menu=pengguna&di=tambah" class="form-horizontal" method="POST">
														<fieldset>
														<div class="control-group">
														  <label class="control-label" for="textarea2">ID User</label>
														  <div class="controls">
															<input type="text" name="kode" autofocus required>
														  </div>
														</div>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Nama User</label>
														  <div class="controls">
															<input type="text" name="nama_user" required>
														  </div>
														</div>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Username</label>
														  <div class="controls">
															<input type="text" name="username" required>
														  </div>
														</div>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Password</label>
														  <div class="controls">
															<input type="text" name="password" required>
														  </div>
														</div>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Level</label>
														  <div class="controls">
															<input type="radio" name="level" value="Admin">Admin
															<input type="radio" name="level" value="Kasir">Kasir
															<input type="radio" name="level" value="Pelayan">Pelayan
														  </div>
														</div>
												</div>
												<div class='modal-footer'>
													<input type="submit" class='btn btn-primary' value="Simpan">
													<input type="reset" class='btn btn-warning' value="Reset">
												</fieldset>
											</form>
													<a data-dismiss='modal' class='btn'>Batal</a>
												</div>
											</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class='row-fluid padd-bottom'>
									<div class="block-content collapse in">
									<a href="#my_modal_user" data-toggle="modal" class="btn btn-success">Tambah Pengguna</a>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>ID User</th>
													<th>Nama User</th>
													<th>Username</th>
													<th>Password</th>
													<th>Level</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												  <?php 
												  $i=0;
												  $sql = mysql_query("select * from user order by nama_user asc");
												  while($dt=mysql_fetch_array($sql)){
													  $i++;
													 echo"
														<tr>
															<td>$i</td>
															<td>$dt[kode]</td>
															<td>$dt[nama_user]</td>
															<td>$dt[username]</td>
															<td>Tersembunyi</td>
															<td>$dt[level]</td>
															<td style='text-align:right'>
																<a href='#my_$dt[kode]' data-toggle='modal' class='btn btn-success' title='Edit'><i class='icon-edit icon-white'></i></a>
																<a href='#hapus_$dt[kode]' data-toggle='modal' class='btn btn-warning' title='Hapus'><i class='icon-trash icon-white'></i></a>
															</td>
														</tr>
														<div id='my_$dt[kode]' class='modal hide'>
															<div class='modal-header'>
																<button data-dismiss='modal' class='close' type='button'>&times;</button>
																<h4>$dt[nama_user]</h4>
															</div>
															<div class='modal-body'>
															<form action='?menu=pengguna&di=ubah&kode=$dt[kode]' class='form-horizontal' method='post'>
																<fieldset>
																	<div class='control-group'>
																	  <label class='control-label'>ID User </label>
																	  <div class='controls'>
																		<input type='text' name='kode' value='$dt[kode]' autofocus required>
																		<input type='hidden' name='kode2' value='$dt[kode]'>
																	  </div>
																	</div>
																	<div class='control-group'>
																	  <label class='control-label'>Nama User</label>
																	  <div class='controls'>
																		<input type='text' name='nama_user' value='$dt[nama_user]' required>
																	  </div>
																	</div>
																	<div class='control-group'>
																	  <label class='control-label'>Username</label>
																	  <div class='controls'>
																		<input type='text' name='username' value='$dt[username]' required>
																	  </div>
																	</div>
																	<div class='control-group'>
																	  <label class='control-label'>Password</label>
																	  <div class='controls'>
																		<input type='text' name='password' value='$dt[password]' required>
																	  </div>
																	</div>
																	<div class='control-group'>
																	  <label class='control-label'>Password</label>
																	  <div class='controls'>
																		<input type='radio' name='level' value='$dt[level]'";if ($dt['level']=="Admin"){ echo "checked";}echo ">Admin
																		<input type='radio' name='level' value='$dt[level]'";if ($dt['level']=="Kasir"){ echo "checked";}echo ">Kasir
																		<input type='radio' name='level' value='$dt[level]'";if ($dt['level']=="Pelayan"){ echo "checked";}echo ">Pelayan
																	  </div>
																	</div>
															</div>
															<div class='modal-footer'>
																<input type='submit' class='btn btn-primary' value='Update'>
																<a data-dismiss='modal' class='btn'>Batal</a>
															</fieldset>
															</form>
															</div>
														</div>
														<div id='hapus_$dt[kode]' class='modal hide'>
															<div class='modal-header'>
																<button data-dismiss='modal' class='close' type='button'>&times;</button>
																<h4>Peringatan</h4>
															</div>
															<div class='modal-body'>
																<p align='justify' >Anda yakin ingin menghapus <b>$dt[nama_user]</b>?</p>
															</div>
															<div class='modal-footer'>
																<a href='?menu=pengguna&di=hapus&kode=$dt[kode]' class='btn btn-warning'>Ya</a>
																<a data-dismiss='modal' class='btn'>Tidak</a>
															</div>
														</div>";
												  }
												  ?>
											</tbody>
										</table>
									</div>
                                  </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<?php
	break;
	case 'tambah':
		$query = "INSERT INTO `toko`.`user` (`kode`, `nama_user`, `username`, `password`, `level`)
		VALUES ('$_POST[kode]', '$_POST[nama_user]', '$_POST[username]', '$_POST[password]', '$_POST[level]' )";
		mysql_query($query) or die ("Gagal menambahkan");
		echo "<meta content='0; url=?menu=pengguna' http-equiv='refresh'/>";
	break;
	case 'hapus':
		$query="DELETE FROM `user` WHERE `kode` = '$_GET[kode]'";
		mysql_query($query) or die ("Gagal menghapus");
		echo "<meta content='0; url=?menu=pengguna' http-equiv='refresh'/>";
	break;
	case 'ubah':
		$query="UPDATE `user` SET
		`kode` = '$_POST[kode]',
		`nama_user` = '$_POST[nama_user]',
		`username` = '$_POST[username]',
		`password` = '$_POST[password]',
		`level` = '$_POST[level]'
		WHERE `kode` = '$_POST[kode2]';";
		mysql_query($query) or die ("Gagal memperbarui");
		echo "<meta content='0; url=?menu=pengguna' http-equiv='refresh'/>";
	break;
}
?>