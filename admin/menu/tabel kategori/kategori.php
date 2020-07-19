<?php
$tampil=mysql_query("select count(*) as banyak_kategori from kategori ");
$data=mysql_fetch_array($tampil);
$bnykkategori=$data['banyak_kategori'];
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
										<div class="muted pull-left"><b class="a">Tabel Kategori</b></div>
										<div class="pull-right">
											<span class="badge badge-warning">Ada <?php echo "$bnykkategori"; ?> Kategori</span>
										</div>
									</div>
									<div class="block-content collapse in">
									<a href="#my_modal_kategori" data-toggle="modal" class="btn btn-primary">Tambah Kategori</a>
											<div id='my_modal_kategori' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Tambah Kategori</h4>
												</div>
												<div class='modal-body'>
													<form action="?menu=kategori&di=tambahkategori" class="form-horizontal" method="POST">
														<fieldset>
														<div class="control-group">
														  <label class="control-label" for="textarea2">Nama Kategori</label>
														  <div class="controls">
															<input type="text" name="kategori" autofocus required>
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
													<th>Nama Kategori</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php 
												$i=0;
											  $sql = mysql_query("select * from kategori order by id_kategori asc");
											  while($dt=mysql_fetch_array($sql)){
												 $i++;
												 echo "
												<tr>
													<td>$i</td>
													<td style='width:80%'>$dt[kategori]</td>
													<td style='text-align:right'>
														<a href='#edit_$dt[id_kategori]' data-toggle='modal' class='btn btn-success' title='Edit'><i class='icon-pencil icon-white'></i></a>
														<a href='#hapus_$dt[id_kategori]' data-toggle='modal' class='btn btn-warning' title='Hapus'><i class='icon-trash icon-white'></i></a>
													</td>
												</tr>
												
												<div id='edit_$dt[id_kategori]' class='modal hide'>
													<div class='modal-header'>
														<button data-dismiss='modal' class='close' type='button'>&times;</button>
														<h4>Edit Kategori</h4>
													</div>
													<div class='modal-body'>
														<form action='?menu=kategori&di=editkategori&id_kategori=$dt[id_kategori]' class='form-horizontal' method='POST'>
															<fieldset>
															<div class='control-group'>
															  <label class='control-label'>Nama Kategori</label>
															  <div class='controls'>
																<input type='text' name='kategori' value='$dt[kategori]' required>
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
												
												<div id='hapus_$dt[id_kategori]' class='modal hide'>
													<div class='modal-header'>
														<button data-dismiss='modal' class='close' type='button'>&times;</button>
														<h4>Peringatan</h4>
													</div>
													<div class='modal-body'>
														<p align='justify' >Anda yakin ingin menghapus kategori $dt[kategori]?<br>
														Menghapus kategori akan menyebabkan sebagian data makanan/minuman menjadi error. 
														Pastikan setelah ini Anda mengedit kategori makanan/minuman yang berkaitan.</p>
													</div>
													<div class='modal-footer'>
														<a href='?menu=kategori&di=hapuskategori&id_kategori=$dt[id_kategori]' class='btn btn-warning'>Lanjutkan</a>
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
	case 'hapuskategori':
		$query="DELETE FROM `kategori` WHERE `id_kategori` = '$_GET[id_kategori]'";
		mysql_query($query) or die ("Gagal menghapus");
		echo "<meta content='0; url=?menu=kategori' http-equiv='refresh'/>";
	break;
	case 'tambahkategori':
		$query = "INSERT INTO `kategori` (`id_kategori`, `kategori`)
		VALUES ('', '$_POST[kategori]')";
		mysql_query($query) or die ("Gagal menambahkan");
		echo "<meta content='0; url=?menu=kategori' http-equiv='refresh'/>";
	break;
	case 'editkategori':
		$query = "UPDATE `kategori` SET `kategori` = '$_POST[kategori]' WHERE `id_kategori` = '$_GET[id_kategori]'";
		mysql_query($query) or die ("Gagal mengubah");
		echo "<meta content='0; url=?menu=kategori' http-equiv='refresh'/>";
	break;
}
?>