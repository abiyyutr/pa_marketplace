<p class='sidebar-title text-danger produk-title'>Detail Data Produk pelaku UMKM</p>
  <table class='table table-condensed'>
  <tbody>
    <?php if (trim($rows['foto'])==''){ $foto_user = 'blank.png'; }else{ $foto_user = $rows['foto']; } ?>
    <tr class='hidden-xs' bgcolor=''><td rowspan='12' width='110px'><center><?php echo "<img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle img-thumbnail'>"; ?></center></td></tr>
    <tr><th scope='row' width='100px'>Nama UMKM</th> <td><?php echo $rows['nama_reseller']?></td></tr>
    <tr><th scope='row'>Alamat</th> <td><?php echo "Kota $rows[nama_kota], $rows[alamat_lengkap]"; ?></td></tr>
    <tr><th scope='row'>Kontak</th> <td><?php echo "Hp. <b style='color:green'>$rows[no_telpon]</b>, Email. <i style='text-decoration:underline; color:blue'>$rows[email]</i>"; ?></td></tr>
    <tr><th scope='row'>Keterangan</th> <td><?php echo $rows['keterangan']?></td></tr>
  </tbody>
  </table>
  <hr>

      <?php 
        $no = 1;
        foreach ($record->result_array() as $row){
        $jual = $this->model_reseller->jual_reseller($this->uri->segment(3),$row['id_produk'])->row_array();
        $beli = $this->model_reseller->beli_reseller($this->uri->segment(3),$row['id_produk'])->row_array();
        if ($beli['beli']-$jual['jual']<=0){ $stok = '<b style="color:red">Stok Habis</b>'; }else{ $stok = "Stok ".($beli['beli']-$jual['jual'])." $row[satuan]"; }
        $disk = $this->model_app->edit('rb_produk_diskon',array('id_produk'=>$row['id_produk'],'id_reseller'=>$this->uri->segment(3)))->row_array();
        if ($disk['diskon']==''){ $diskon = '0'; $line = ''; $harga = ''; }else{ $diskon = $disk['diskon']; $line = 'line-through'; $harga = "/ <span style='color:red'>".rupiah($row['harga_konsumen']-$disk['diskon'])."</span>";}

        if (trim($row['gambar'])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $row['gambar']; }
        if (strlen($row['nama_produk']) > 38){ $judul = substr($row['nama_produk'],0,38).',..';  }else{ $judul = $row['nama_produk']; }
        $disk = $this->db->query("SELECT * FROM rb_produk_diskon where id_produk='$row[id_produk]'")->row_array();
        $diskon = rupiah(($disk['diskon']/$row['harga_konsumen'])*100,0)."%";
        if ($diskon>0){ $diskon_persen = "<div class='top-right'>$diskon</div>"; }else{ $diskon_persen = ''; }
        if ($diskon>=1){ 
          $harga =  "<del style='color:#8a8a8a'><small>Rp ".rupiah($row['harga_konsumen'])."</small></del> Rp ".rupiah($row['harga_konsumen']-$disk['diskon']);
        }else{
          $harga =  "Rp ".rupiah($row['harga_konsumen']);
        }
        echo "<div class='col-sm-4 produk'>
                  <center>
                    <p style='line-height:20px'><a href='#'>$judul</a></p>
                    <div>
                      <a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'><img style='border:1px solid #cecece; min-height:140px; width:99%' src='".base_url()."asset/foto_produk/$foto_produk'></a>
                      $diskon_persen
                    </div>
                    <h4 class='produk-title produk-title-list'><a title='$row[nama_produk]' href='".base_url()."produk/detail/$row[produk_seo]'>$judul</a></h4>
                    <span style='color:red;'>$harga</span><br>

                    <i>$stok</i><br>";
                    if ($beli['beli']-$jual['jual']<=0){
                      echo "<a class='btn btn-default btn-block btn-sm' href='#'>Beli Sekarang</a>";
                    }else{
                      echo "<a class='btn btn-default btn-block btn-sm' href='".base_url()."members/keranjang/$rows[id_reseller]/$row[id_produk]'>Beli Sekarang</a>";
                    }

                  echo "</center>
              </div>";
              if ($no % 3 == 0){
            echo "<hr style='padding:5px'>";
          }
          $no++;
        }
      echo "<div style='clear:both'></div>
      <div class='pagination'>";
      echo $this->pagination->create_links(); 
      echo "</div>";
      ?>