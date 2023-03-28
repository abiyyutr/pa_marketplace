<?php 
  $no = 1;
  if (($this->input->post('kata'))){
    echo "<p class='sidebar-title text-danger produk-title'>$title</p>";
  }
    echo "<div class='container'>";
    foreach ($record->result_array() as $row){
    $ex = explode(';', $row['gambar']);
    if (trim($ex[0])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $ex[0]; }
    if (strlen($row['nama_produk']) > 100){ $judul = substr($row['nama_produk'],0,100).',..';  }else{ $judul = $row['nama_produk']; }
    $jual = $this->model_reseller->jual_reseller($row['id_reseller'],$row['id_produk'])->row_array();
    $beli = $this->model_reseller->beli_reseller($row['id_reseller'],$row['id_produk'])->row_array();
    if ($beli['beli']-$jual['jual']<=0){ $stok = '<b style="color:000">Stok Habis</b>'; }else{ $stok = "<span style='color:green'>Stok ".($beli['beli']-$jual['jual'])." $row[satuan]</span>"; }
    if ($jual['jual']<=0){ $terjual = '<b style="color:000">Belum Terjual</b>'; }else{ $terjual = "<span style='color:green'>Terjual ".($jual['jual'])." $row[satuan]</span>"; }
    
    $disk = $this->db->query("SELECT * FROM rb_produk_diskon where id_produk='$row[id_produk]'")->row_array();
    $diskon = rupiah(($disk['diskon']/$row['harga_konsumen'])*100,0)."%";
    if ($diskon>0){ $diskon_persen = "<div class='top-right'>$diskon</div>"; }else{ $diskon_persen = ''; }
    if ($diskon>=1){ 
      $harga =  "<del style='color:#8a8a8a'><small>Rp ".rupiah($row['harga_konsumen'])."</small></del> Rp ".rupiah($row['harga_konsumen']-$disk['diskon']);
    }else{
      $harga =  "Rp".rupiah($row['harga_konsumen']);
    }
    echo "<div class='produk col-md-2 col-xs-6'>
              <center>
                <div style='height:140px; overflow:hidden'>
                  <a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'><img style='min-height:140px; width:99%' src='".base_url()."asset/foto_produk/$foto_produk'></a>
                $diskon_persen
              </div>
              <h4 class='produk-title produk-title-list'><a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'>$judul</a></h4>
                <span style='color:red;'>$harga</span><br>
                <h>$stok</h>
                <br><span class='glyphicon glyphicon-map-marker'>$row[nama_kota]</span></br>
                <h5>$terjual</h5><br>
                
              </center><br>
          </div>";

      $no++;
    }
    echo "</div>
    <div class='pagination'>";
         echo $this->pagination->create_links();
    echo "</div>
  <div style='clear:both'><br></div>";