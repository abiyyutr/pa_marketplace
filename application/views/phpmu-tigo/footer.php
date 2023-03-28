<?php
echo "<div class='wrapper'>
	<ul class='right'>";
		$topmenu2 = $this->model_utama->view_where('menu',array('position' => 'Top','aktif' => 'Ya'),'urutan','ASC',0,5);
			foreach ($topmenu2->result_array() as $row) {
			echo "<li><a href='$row[link]'>$row[nama_menu]</a></li>";
		}
	echo "</ul>
	<p class='footer'>Copyright &copy;".date('Y').". All Rights reserved.<br/>Powered by <b style='color:salmon'><a>U-MART</a></b></p>
	<p class='footer'><b>U-MART | Marketplace Produk Berkualitas</b></p>
	<p class='footer'>U-MART adalah marketplace yang ada di kota Pekanbaru dan sekitarnya yang menawarkan transaksi jual beli online yang menyenangkan, gratis, dan terpercaya. 
	Bergabunglah dengan pengguna lainnya dengan mulai mendaftarkan produk jualan dan berbelanja berbagai penawaran menarik kapan saja, di mana saja. Keamanan transaksi kamu terjamin.. Ayo gabung dalam U-MART dan mulai belanja sekarang!</p>

</div>";