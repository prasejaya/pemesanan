		<div class="navbar navbar-fixed-top">
            <div class="navbar-inner2">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="?menu=home">Restoran Rumput Hijau</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_SESSION['nama'];?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Keluar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
							<li class="dropdown">
                                <a href="?menu=home" role="button" >Beranda 

                                </a>
                            </li>
							<li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Data Operasional <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
									<li class="dropdown">
										<a href="?menu=pesanan" role="button" >Pesanan Dapur</a>
									</li>
									<li class="dropdown">
										<a href="?menu=transaksi" role="button" >Data Belum Dibayar </a>
									</li>
									<li class="dropdown">
										<a href="?menu=sudahdibayar" role="button" >Data Sudah Dibayar </a>
									</li>
								</ul>
							</li>
							<?php
								if ($_SESSION['level']=="Admin"){
							?>
							 <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Data Master <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
									 <li class="dropdown">
										<a href="?menu=makanan" role="button" >Daftar Menu </a>
									</li>
									<li class="dropdown">
										<a href="?menu=kategori" role="button" >Kategori </a>
									</li>
									<li class="dropdown">
										<a href="?menu=jenis" role="button" >Jenis </a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Setting <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
									 <li class="dropdown">
										<a href="?menu=pengguna" role="button" >Pengguna </a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
                                <a href="?menu=laporan" role="button" >Laporan </a>
							</li>
							<?php
								}
								else{}
							?>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>