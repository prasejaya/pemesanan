<!DOCTYPE html>
<?php
	session_start();
	include "../config/koneksi.php";
	include "../config/library.php";
	
	if (empty($_SESSION['username']) || empty($_SESSION['password'])){
		header('location:../admin/');
	}
	else if ($_SESSION['level'] == "Pelayan"){
		header('location:../');
	}
	else{
?>
<html>
    
    <head>
        <title>Restoran Rumput Hijau</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
		<script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script>
        $(function() {
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>
        <script>
        $(function() {
            
        });
        </script>
    </head>
    
    <body>
        <?php include "menu.php";?>
        <div class="row-fluid">
            <div id="content" style="width:75%;margin:auto">
				<?php include "link.php";?>
            </div>
        </div>
    </body>
</html>
	<?php } ?>