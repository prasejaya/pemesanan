<?php
	$ke = $_GET['ke'];
	switch($ke){
		default:
?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Manajemen Makanan dan Minuman</b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" action="?menu=makanan&ke=newproduk" method="POST" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Tambah Makanan dan Minuman</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Makanan/Minuman</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" name="nama_produk" type="text" required autofocus>
                                          </div>
                                        </div>
										<div class="control-group">
											<label class="control-label">Pilih Kategori</label>
											  <div class="controls">
												<select name="id_kategori">
												  <option>Kategori</option>
												  <?php
													$kategori = mysql_query("select * from kategori");
													while($kat=mysql_fetch_array($kategori)){
													echo "
														<option value='$kat[id_kategori]'>$kat[id_kategori] - $kat[kategori]</option>
													";
													}
												  ?>
												</select>
												<a href="#tambahkategori" data-toggle="modal" class="btn btn-primary"><span class="icon-plus icon-white"></span></a>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Pilih Jenis</label>
											  <div class="controls">
												<select name="id_jenis">
												  <option>Jenis</option>
												  <?php
													$jenis = mysql_query("select * from jenis");
													while($jns=mysql_fetch_array($jenis)){
													echo "
														<option value='$jns[id_jenis]'>$jns[id_jenis] - $jns[jenis]</option>
													";
													}
												  ?>
												</select>
												<a href="#tambahjenis" data-toggle="modal" class="btn btn-primary"><span class="icon-plus icon-white"></span></a>
											</div>
										</div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Harga</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" name="harga" type="text" required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Pilih Gambar</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="gambar" type="file">
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label" for="textarea2">Deskripsi</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea" name="deskripsi"placeholder="Masukkan Penjelasan"></textarea>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                          <button type="reset" class="btn">Batal</button>
                                        </div>
                                      </fieldset>
                                    </form>
											<div id='tambahjenis' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Tambah Jenis</h4>
												</div>
												<div class='modal-body'>
													<form action="?menu=makanan&ke=tambahjenis" class="form-horizontal" method="POST">
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
											<div id='tambahkategori' class='modal hide'>
												<div class='modal-header'>
													<button data-dismiss='modal' class='close' type='button'>&times;</button>
													<h4>Tambah Kategori</h4>
												</div>
												<div class='modal-body'>
													<form action="?menu=makanan&ke=tambahkategori" class="form-horizontal" method="POST">
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
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
		<!--daftar makanan dan minuman-->
		<hr>
			<h3 align="center">Daftar Makanan dan Minuman</h3>
        <div class="col-lg-6" style="text-align:center">
		<?php
			$r=mysql_query("SELECT * FROM produk order by nama_produk");
			while($d=mysql_fetch_array($r)){
			$harga = format_rupiah($d[harga]);
			echo"
                <div class='thumbnail'>
					<table width='100%'>
					<tr>
					<td width='25%'>";
					if (empty($d[gambar])){
					echo "
						<img src='../gambar/img.png' width='200' alt=''>";
					}
					else{
						echo "
						<img src='../gambar/$d[gambar]' width='200' alt=''>";
					}
					echo "
					</td>
					<td>
                        <h3>$d[nama_produk]</h3>
                        <p><b>$harga</b></p>
                        <p>
                            <a href='?menu=makanan&ke=ubah&id_produk=$d[id_produk]' class='btn btn-success'>Edit</a>
							<a href='?menu=makanan&&ke=hapusproduk&id_produk=$d[id_produk]' class='btn '>Hapus</a>
                        </p>
					</td>
					</tr>
					</table>
                </div>";
			}
		?>
        </div>
		<hr>
<?php
	break;
	case 'ubah':
?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b class="a">Form Edit</b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
								<?php
									include "../config/koneksi.php";
									$sq = mysql_query("select * from produk where id_produk='$_GET[id_produk]'");
									$ts = mysql_fetch_array($sq);
								?>
                                    <form class="form-horizontal" method="POST" action="?menu=makanan&ke=editproduk" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Edit Makanan dan Minuman</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Makanan/Minuman</label>
                                          <div class="controls">
										    <input class="input-xlarge focused" name="id_produk" type="hidden" value="<?php echo $ts['id_produk'];?>">
                                            <input class="input-xlarge focused" name="nama_produk" type="text" value="<?php echo $ts['nama_produk'];?>" required >
                                          </div>
                                        </div>
										<div class="control-group">
											<label class="control-label">Kategori</label>
											  <div class="controls">
												<select name="id_kategori">
												  <option value="<?php echo $ts['id_kategori'];?>"><?php echo $ts['id_kategori'];?></option>
												  <?php
													$kategori2 = mysql_query("select * from kategori");
													while($kat2=mysql_fetch_array($kategori2)){
													echo "
														<option value='$kat2[id_kategori]'>$kat2[id_kategori] - $kat2[kategori]</option>
													";
													}
												  ?>
												</select>
											 </div>
										</div>
										<div class="control-group">
											<label class="control-label">Jenis</label>
											  <div class="controls">
												<select name="id_jenis">
												  <option value="<?php echo $ts['id_jenis'];?>"><?php echo $ts['id_jenis'];?></option>
												  <?php
													$jenis2 = mysql_query("select * from jenis");
													while($jns2=mysql_fetch_array($jenis2)){
													echo "
														<option value='$jns2[id_jenis]'>$jns2[id_jenis] - $jns2[jenis]</option>
													";
													}
												  ?>
												</select>
											 </div>
										</div>
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Harga</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="harga" type="text" value="<?php echo $ts['harga'];?>"  required>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Ganti Gambar</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="gambar" type="file">
                                          </div>
                                        </div>
										 <div class="control-group">
                                          <label class="control-label" for="textarea2">Deskripsi</label>
                                          <div class="controls">
                                            <textarea class="input-xlarge textarea" name="deskripsi" ><?php echo $ts['deskripsi'];?></textarea>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                          <a href="?menu=makanan" class="btn">Batal</a>
                                        </div>
                                      </fieldset>

                                </div>
								<div class="span6">
								<?php
									if (empty($ts['gambar'])){
										echo "<img src='../gambar/img.png'>";
									}
									else{
										echo "<img src='../gambar/$ts[gambar]'>";
									}
								?>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<?php
	break;
	
	case'newproduk':
		$lokasi_file = $_FILES['gambar']['tmp_name'];
			  $tipe_file   = $_FILES['gambar']['type'];
			  $nama_file   = $_FILES['gambar']['name'];
			  $direktori   = "../gambar/$nama_file";
			  
			  if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$direktori); 
					$query = "INSERT INTO `produk` 
					(`id_produk`, `nama_produk`, `id_jenis`, `id_kategori`, `harga`, `gambar`, `deskripsi`) 
					VALUES ('', '$_POST[nama_produk]', '$_POST[id_jenis]', '$_POST[id_kategori]', '$_POST[harga]', '$nama_file', '$_POST[deskripsi]')";
					mysql_query($query);
				echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
			} else {
				move_uploaded_file($lokasi_file,$direktori); 
					$query = "INSERT INTO `produk` 
					(`id_produk`, `nama_produk`, `id_jenis`, `id_kategori`, `harga`, `gambar`, `deskripsi`) 
					VALUES ('', '$_POST[nama_produk]', '$_POST[id_jenis]', '$_POST[id_kategori]', '$_POST[harga]', '$nama_file', '$_POST[deskripsi]')";
					mysql_query($query);
				echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
			}
			
	case 'editproduk':			
			$lokasi_file = $_FILES['gambar']['tmp_name'];
			  $tipe_file   = $_FILES['gambar']['type'];
			  $nama_file   = $_FILES['gambar']['name'];
			  $direktori   = "../gambar/$nama_file";
			  
			  if (!empty($lokasi_file)) {
				move_uploaded_file($lokasi_file,$direktori); 
					$query="UPDATE `produk` SET  
					`nama_produk` = '$_POST[nama_produk]',
					`id_jenis` = '$_POST[id_jenis]',
					`id_kategori` = '$_POST[id_kategori]',
					`harga` = '$_POST[harga]',
					`gambar` = '$nama_file',
					`deskripsi` = '$_POST[deskripsi]' WHERE `id_produk` = $_POST[id_produk];";
					mysql_query($query);
					
				echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
			} else {
				move_uploaded_file($lokasi_file,$direktori); 
					$query="UPDATE `produk` SET  
					`nama_produk` = '$_POST[nama_produk]',
					`id_jenis` = '$_POST[id_jenis]',
					`id_kategori` = '$_POST[id_kategori]',
					`harga` = '$_POST[harga]',
					`gambar` = '$nama_file',
					`deskripsi` = '$_POST[deskripsi]' WHERE `id_produk` = $_POST[id_produk];";
					mysql_query($query);
					
				echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
			}
	break;
	
	case 'hapusproduk':
		$sql="select * from produk where id_produk='$_GET[id_produk]'";
			$tampil=mysql_query($sql);
			$data=mysql_fetch_array($tampil);
			$foto="../gambar/$data[gambar]";
			unlink($foto); 
			
			$query="DELETE FROM produk WHERE id_produk = '$_GET[id_produk]'";
			mysql_query($query) or die ("Gagal menghapus");
			echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
	
	break;
	
	case 'tambahkategori':
		$query = "INSERT INTO `kategori` (`id_kategori`, `kategori`)
		VALUES ('', '$_POST[kategori]')";
		mysql_query($query) or die ("Gagal menambahkan");
		echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
	break;
	
	case 'tambahjenis':
		$query = "INSERT INTO `jenis` (`id_jenis`, `jenis`)
		VALUES ('', '$_POST[jenis]')";
		mysql_query($query) or die ("Gagal menambahkan");
		echo "<meta content='0; url=?menu=makanan' http-equiv='refresh'/>";
	break;
}
?>