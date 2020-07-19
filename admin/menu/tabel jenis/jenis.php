<?php
$tampil=mysql_query("select count(*) as banyak_jenis from jenis ");
$data=mysql_fetch_array($tampil);
$bnykjenis=$data['banyak_jenis'];
?>
<?php
$di=$_GET['di'];
switch($di){
	default:
?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                                <div class='row-fluid padd-bottom'>
									<div class="navbar navbar-inner block-header">
										<div class="muted pull-left"><b class="a">Tabel Jenis-jenis Makanan dan Minuman</b></div>
										<div class="pull-right">
											<span class="badge badge-warning">Ada <?php echo "$bnykjenis"; ?> jenis</span>
										</div>
									</div>
									<div class="block-content collapse in">
									<a href="#my_modal_jenis" data-toggle="modal" class="btn btn-primary">Tambah Jenis Baru</a>
											<div id='my_modal_jenis' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Tambah Jenis Baru</h4>
												</div>
												<div class='modal-body'>
													<form action="?menu=jenis&di=tambahjenis" class="form-horizontal" method="POST">
														<fieldset>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Nama Jenis</label>
														  <div class="controls">
															<input type="text" name="jenis" autofocus required>
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
										<table class="table table-striped">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Jenis</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php 
												$i=0;
											  $sql = mysql_query("select * from jenis order by id_jenis asc");
											  while($dt=mysql_fetch_array($sql)){
												 $i++;
												 echo "
												<tr>
													<td>$i</td>
													<td>$dt[jenis]</td>
													<td style='text-align:right'>
														<a href='#edit_$dt[id_jenis]' data-toggle='modal' class='btn btn-success' title='Edit'><i class='icon-pencil icon-white'></i></a>
														<a href='#hapus_$dt[id_jenis]' data-toggle='modal' class='btn btn-warning' title='Hapus'><i class='icon-trash icon-white'></i></a>
													</td>
												</tr>
												
												<div id='edit_$dt[id_jenis]' class='modal hide'>
													<div class='modal-header'>
														<button data-dismiss='modal' class='close' type='button'>&times;</button>
														<h4>Edit Jenis</h4>
													</div>
													<div class='modal-body'>
														<form action='?menu=jenis&di=editjenis&id_jenis=$dt[id_jenis]' class='form-horizontal' method='POST'>
															<fieldset>
															<div class='control-group'>
															  <label class='control-label'>Nama Jenis</label>
															  <div class='controls'>
																<input type='text' name='jenis' value='$dt[jenis]' required>
															  </div>
															</div>
													</div>
													<div class='modal-footer'>
														<input type='submit' class='btn btn-primary' value='Simpan'>
													</fieldset>
												</form>
														<a data-dismiss='modal' class='btn'>Batal</a>
													</div>
												</div>
												
												<div id='hapus_$dt[id_jenis]' class='modal hide'>
													<div class='modal-header'>
														<button data-dismiss='modal' class='close' type='button'>&times;</button>
														<h4>Peringatan</h4>
													</div>
													<div class='modal-body'>
														<p align='justify' >Anda yakin ingin menghapus jenis $dt[jenis]?<br>
														Menghapus jenis akan menyebabkan sebagian data makanan/minuman menjadi error. 
														Pastikan setelah ini Anda mengedit jenis makanan/minuman yang berkaitan.</p>
													</div>
													<div class='modal-footer'>
														<a href='?menu=jenis&di=hapusjenis&id_jenis=$dt[id_jenis]' class='btn btn-warning'>Lanjutkan</a>
														<a data-dismiss='modal' class='btn'>Batal</a>
													</div>
												</div>";
											  }
											  ?>
											</tbody>
										</table>
									</div>
                                  </div>
                            </div>
                        <!-- /block -->
                    </div>
<?php
	break;
	case 'hapusjenis':
		$query="DELETE FROM `jenis` WHERE `id_jenis` = '$_GET[id_jenis]'";
		mysql_query($query) or die ("Gagal menghapus");
		echo "<meta content='0; url=?menu=jenis' http-equiv='refresh'/>";
	break;
	case 'tambahjenis':
		$query = "INSERT INTO `toko`.`jenis` (`id_jenis`, `jenis`)
		VALUES ('', '$_POST[jenis]')";
		mysql_query($query) or die ("Gagal menambahkan");
		echo "<meta content='0; url=?menu=jenis' http-equiv='refresh'/>";
	break;
	case 'editjenis':
		$query = "UPDATE `jenis` SET `jenis` = '$_POST[jenis]' WHERE `id_jenis` = '$_GET[id_jenis]'";
		mysql_query($query) or die ("Gagal mengubah");
		echo "<meta content='0; url=?menu=jenis' http-equiv='refresh'/>";
	break;
}
?>