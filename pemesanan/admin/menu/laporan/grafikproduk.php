<html>
<head>
<script src="vendors/js/jquery.min.js" type="text/javascript"></script>
<script src="vendors/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Penjualan'
         },
         xAxis: {
            categories: ['Nama Produk']
         },
         yAxis: {
            title: {
               text: 'Jumlah Terjual (Porsi)'
            }
         },
              series:             
            [
            <?php 
           $sql   = "SELECT * FROM produk";
            $query = mysql_query( $sql )  or die(mysql_error());
            while( $ret = mysql_fetch_array( $query ) ){
            	$id=$ret['id_produk'];
				$produk=$ret['nama_produk'];
                 $sql_jumlah   = "SELECT sum(jumlah) as jml FROM detail_beli full join pembelian using (id_beli) WHERE id_produk='$id' AND ket='Lunas'";        
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jml'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $produk; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>