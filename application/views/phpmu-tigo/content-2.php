<div class="main-page left">
	<div class="double-block">
		<div class="content-block main right">
			<div class="block">
				<div class="featured-block">
					<?php
						$cekslide = $this->model_utama->view_single('berita',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC');
						if ($cekslide->num_rows() > 0){
						  include "slide.php";
						}
					?>	
				</div>
			</div>

			<div class="block">
				<div class="block-title">
					<a href="<?php echo base_url(); ?>produk" class="right">+ Produk Lainnya</a>
					<h2>PRODUK TERKINI</h2>
				</div>
				<div class="block-content">
				<ul class="article-block-big">
			<?php 
			  $no = 1;
			  $record = $this->db->query("SELECT * FROM rb_produk where id_reseller!='0' ORDER BY id_produk DESC LIMIT 6");
			    foreach ($record->result_array() as $row){
			    $ex = explode(';', $row['gambar']);
			    if (trim($ex[0])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $ex[0]; }
			    if (strlen($row['nama_produk']) > 43){ $judul = substr($row['nama_produk'],0,43).',..';  }else{ $judul = $row['nama_produk']; }
			    $jual = $this->model_reseller->jual_reseller($row['id_reseller'],$row['id_produk'])->row_array();
			    $beli = $this->model_reseller->beli_reseller($row['id_reseller'],$row['id_produk'])->row_array();
			    if ($beli['beli']-$jual['jual']<=0){ $stok = '<b style="color:red">Stok Habis</b>'; }else{ $stok = "".($beli['beli']-$jual['jual'])." $row[satuan]"; }

			    echo "<li style='width:180px'>
						<div class='article-photo'>
							<a class='hover-effect' href='".base_url()."produk/detail/$row[produk_seo]'><img style='height:140px; width:200px' src='".base_url()."asset/foto_produk/$foto_produk' alt='' /></a>
						</div>
						<div class='article-content'><center>
							<h4><a href='".base_url()."produk/detail/$row[produk_seo]'>$row[nama_produk]</a></h4>
							<span style='color:red;'>".rupiah($row['harga_konsumen'])."</span> - <i>$stok</i><br>
							</center>
							<span class='meta'>";
								if ($this->session->level=='konsumen'){
				                  echo "<a class='btn btn-success btn-block btn-sm' style='color:#fff' href='".base_url()."members/keranjang/$row[id_reseller]/$row[id_produk]'>Beli Sekarang</a>";
				                }else{
				                  echo "<a class='btn btn-success btn-block btn-sm' style='color:#fff' href='".base_url()."produk/keranjang/$row[id_reseller]/$row[id_produk]'>Beli Sekarang</a>";
				                }
							echo "</span>
						</div>
					   </li>";
			      $no++;
			    }
			  echo "<div style='clear:both'><br></div>";
			  ?>
			  </ul>
			  </div>
			</div>
			
						
		<div class="content-block left">
			<?php include "sidebar_kiri.php"; ?>
		</div>
	</div>
</div>
<div class="main-sidebar right">
	<?php include "sidebar_kanan.php"; ?>
</div>