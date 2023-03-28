<?php 
echo "<div class='paragraph-row'>
	<div class='column6'>"; 
		include "slide.php";
	echo "</div>
	<div class='column4 hidden-xs'>
		<div class='paragraph-row'>
			<div class='column12'>
				<a target='_BLANK' href='$ik1[url]'><img src='".base_url()."asset/foto_iklanatas/$ik1[gambar]' style='width:100%; height: 190px;'></a>
			</div>
		</div>
		<div class='paragraph-row'>
			<div class='column6' style='margin-top:10px'>
				<a target='_BLANK' href='$ik2[url]'><img src='".base_url()."asset/foto_iklanatas/$ik2[gambar]' style='width:100%; height: 180px;'></a>
			</div>
			<div class='column6' style='margin-top:10px'>
				<a target='_BLANK' href='$ik3[url]'><img src='".base_url()."asset/foto_iklanatas/$ik3[gambar]' style='width:100%; height: 180px;'></a>
			</div>
		</div>
	</div>
	<div class='column2 hidden-xs'>
		<a target='_BLANK' href='$ik4[url]'><img src='".base_url()."asset/foto_iklanatas/$ik4[gambar]' style='width:100%; min-height: 380px;'></a>
	</div>
</div>
<br>

<div class='row hidden-xs'>";
$kategori_button = $this->db->query("SELECT * FROM rb_kategori_produk ORDER BY RAND() DESC LIMIT 20");
foreach ($kategori_button->result_array() as $rows) {
	
	echo "<div class='col-md-3 col-xs-6' style='margin-bottom:5px'>
	
		<a style='border-radius:0px; text-align:left' class='btn btn-block btn-default' href='".base_url()."produk/kategori/$rows[kategori_seo]'> 
		<span class='glyphicon glyphicon-th-large'></span> $rows[nama_kategori]
		</a>
	</div>";
}
echo "</div><hr>";


$no = 1;
echo "<h3>DAFTAR UMKM</h3>
			<div class='container'>";
    foreach ($reseller->result_array() as $row){
      if (!file_exists("asset/foto_user/$row[foto]") OR $row['foto']==''){
        $foto_user = "toko.png";
      }else{
        $foto_user = $row['foto'];
      }
      if (trim($row['nama_kota'])==''){ $kota = '<i style="color:red">Kota Tidak Ada..</i>'; }else{ $kota = "<i style='color:blue'>Kota $row[nama_kota]</i>"; }
    echo "<div class='col-md-2 col-xs-6' style='margin-bottom:20px'>
              <center><img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle img-thumbnail'><br>
              <center><h4><small style='color:green'><i><span class='fa fa-check-square-o'></span> Verified </i></small></center>
              <b>$row[nama_reseller]</b> <br>
              <span class='glyphicon glyphicon-map-marker'><b>$row[nama_kota]<b></span><br>";
              if($this->session->level=='konsumen'){ $akses = 'members'; }else{ $akses = 'produk'; }
                if ($this->session->produk == ''){
                  echo "<a class='btn btn-info btn-xs' title='Detail Data' href='".base_url()."$akses/detail_reseller/$row[id_reseller]'></span>Lihat Toko</a>
                        <a class='btn btn-success btn-xs' title='Lihat Produk' href='".base_url()."$akses/produk_reseller/$row[id_reseller]'></span>Lihat Produk</a>";
                }else{
                  echo "<a style='width:60px' class='btn btn-info btn-xs' title='Detail Data' href='".base_url()."$akses/detail_reseller/$row[id_reseller]'>Lihat Toko</a>
                        <a style='width:60px' class='btn btn-primary btn-xs' title='Detail Data' href='".base_url()."$akses/keranjang/$row[id_reseller]/".$this->session->produk."'>Produk</a>";
                }
              
              echo "</center>
          </div>";
      $no++;
    }

    echo "<div style='clear:both'><br></div>";
    echo $this->pagination->create_links();


$no = 1;
foreach ($kategori->result_array() as $kat) {
	$produk = $this->model_reseller->produk_perkategori(0,0,$kat['id_kategori_produk'],10);
		// if ($no==2){
		// 	echo "<div class='paragraph-row'>";
		// 	$iklan = $this->db->query("SELECT * FROM iklantengah where judul like '%home%' ORDER BY id_iklantengah ASC LIMIT 3");
		// 	foreach ($iklan->result_array() as $ia) {
		// 		echo "<div class='column4'><a href='$ia[url]' target='_blank'>";
		// 			$string = $ia['gambar'];
		// 			if ($ia['gambar'] != ''){
		// 				if(preg_match("/swf\z/i", $string)) {
		// 					echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
		// 				} else {
		// 					echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' />";
		// 				}
		// 			}
		// 		echo "</a></div>";
		// 	}
		// 	echo "</div><br>";
		// }

		echo "<p class='sidebar-title text-danger produk-title'><a href='".base_url()."produk/kategori/$kat[kategori_seo]'>$kat[nama_kategori]</a></p>
			<div class='container'>";
	    foreach ($produk->result_array() as $row){
	    $ex = explode(';', $row['gambar']);
	    if (trim($ex[0])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $ex[0]; }
	    if (strlen($row['nama_
		']) > 50){ $judul = substr($row['nama_produk'],0,50).',..';  }else{ $judul = $row['nama_produk']; }
	    $jual = $this->model_reseller->jual_reseller($row['id_reseller'],$row['id_produk'])->row_array();
	    $beli = $this->model_reseller->beli_reseller($row['id_reseller'],$row['id_produk'])->row_array();
	    if ($beli['beli']-$jual['jual']<=0){ $stok = '<b style="color:#000">Stok Habis</b>'; }else{ $stok = "<span style='color:green'>Stok ".($beli['beli']-$jual['jual'])." $row[satuan]</span>"; }
		if ($jual['jual']<=0){ $terjual = '<b style="color:000">Belum Terjual</b>'; }else{ $terjual = "<span style='color:green'>Terjual ".($jual['jual'])." $row[satuan]</span>"; }

	    $disk = $this->model_app->view_where("rb_produk_diskon",array('id_produk'=>$row['id_produk']))->row_array();
	    $diskon = rupiah(($disk['diskon']/$row['harga_konsumen'])*100,0)."%<br>OFF</br>";
	    if ($diskon>0){ $diskon_persen = "<div class='top-right'>$diskon</div>"; }else{ $diskon_persen = ''; }
	    if ($diskon>=1){ 
	    	$harga =  "<del style='color:#8a8a8a'><small>Rp ".rupiah($row['harga_konsumen'])."</small></del> Rp ".rupiah($row['harga_konsumen']-$disk['diskon']);
	    }else{
	    	$harga =  "Rp ".rupiah($row['harga_konsumen']);
	    }
	    echo "<div class='produk col-md-2 col-xs-6'>
	              <center>
	                
	                <div style='height:140px; overflow:hidden'>
	                  <a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'><img style=' min-height:140px; width:100%' src='".base_url()."asset/foto_produk/$foto_produk'></a>
	                  		$diskon_persen 
	                </div>
	                <h4 class='produk-title'><a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'>$judul</a></h4>
	                <span class='harga'>$harga</span><br>
	                <h>$stok</h>
					<br><span class='glyphicon glyphicon-map-marker'>$row[nama_kota]</span></br>
					<h5>$terjual</h5>";
	               
	                
	                echo "</center>
	          </div>";

	      
	    }
	    echo "</div>";

	  echo "<div style='clear:both'><br></div>";

	$no++;
	  
}


?>
<br><br>
<div class="block">
<div class="block-content">
    
	
</div>
</div>

