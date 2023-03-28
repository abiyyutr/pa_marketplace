<?php
$rows = $this->db->query("SELECT a.*, b.nama_kota, c.nama_provinsi FROM `rb_reseller` a JOIN rb_kota b ON a.kota_id=b.kota_id
JOIN rb_provinsi c ON b.provinsi_id=c.provinsi_id where a.id_reseller='$record[id_reseller]'")->row_array();
echo "<div class='col-md-12'>
    <div class='col-md-9' style='padding:0px'>
        <div class='col-md-3' style='padding:0px'>";
        if ($record['gambar'] != ''){ 
            $ex = explode(';',$record['gambar']);
            $hitungex = count($ex);
            for($i=0; $i<1; $i++){
                if (file_exists("asset/foto_produk/".$ex[$i])) { 
                    if ($ex[$i]==''){
                        echo "<img style='height:120px; width:100%;  border:1px solid #cecece' src='".base_url()."asset/foto_produk/no-image.jpg'>";
                    }else{
                        echo "<a target='_BLANK'  href='".base_url()."asset/foto_produk/".$ex[$i]."'><img class='' style='width:100%; border:1px solid #cecece' src='".base_url()."asset/foto_produk/".$ex[$i]."'></a>";
                    }
                }else{
                    echo "<img style='height:120px; width:100%;  border:1px solid #cecece' src='".base_url()."asset/foto_produk/no-image.jpg'>";
                }
            }

            echo "<center style='margin-top:5px'>";
            for($i=1; $i<$hitungex; $i++){
                if (file_exists("asset/foto_produk/".$ex[$i])) { 
                    if ($ex[$i]==''){
                        echo "<img style='width:24%; border:1px solid #fff' src='".base_url()."asset/foto_produk/no-image.jpg'>";
                    }else{
                        echo "<a target='_BLANK'  href='".base_url()."asset/foto_produk/".$ex[$i]."'><img class='' style='width:24%; border:1px solid #fff' src='".base_url()."asset/foto_produk/".$ex[$i]."'></a>";
                    }
                }else{
                    echo "<img style='width:24%;  border:2px solid #fff' src='".base_url()."asset/foto_produk/no-image.jpg'>";
                }
            }
            echo "</center>";
        }else{
            echo "<i style='color:red'>Gambar / Foto untuk Produk ini tidak tersedia!</i>";
        }
        
        $kat = $this->model_app->view_where('rb_kategori_produk',array('id_kategori_produk'=>$record['id_kategori_produk']))->row_array();
      
        $jual = $this->model_reseller->jual_reseller($record['id_reseller'],$record['id_produk'])->row_array();
        $beli = $this->model_reseller->beli_reseller($record['id_reseller'],$record['id_produk'])->row_array();
        $disk = $this->db->query("SELECT * FROM rb_produk_diskon where id_produk='$record[id_produk]'")->row_array();
        $komentar = $this->db->query("SELECT * FROM rb_pesanan_diterima where id_penjualan='$record[id_penjualan]'")->row_array();
        $diskon = rupiah(($disk['diskon']/$record['harga_konsumen'])*100,0)."%";
        if ($disk['diskon']>0){ $diskon_persen = "<div class='top-right'>$diskon</div>"; }else{ $diskon_persen = ''; }
        if ($disk['diskon']>=1){ 
          $harga_konsumen =  "Rp ".rupiah($record['harga_konsumen']-$disk['diskon']);
          $harga_asli = "Rp ".rupiah($record['harga_konsumen']);
        }else{
          $harga_konsumen =  "Rp ".rupiah($record['harga_konsumen']);
          $harga_asli = "";
        }

        echo "<div style='clear:both'></div><center style='color:green;'><i>Klik untuk lihat ukuran besar.</i></center>
        </div>

        <div class='col-md-9' style='padding:0px'>
            <div style='margin-left:10px'>
            <h1>$record[nama_produk]</h1>"; ?>

            <!-- <div class='addthis_toolbox addthis_default_style'>
              <a class='addthis_button_preferred_1'></a>
              <a class='addthis_button_preferred_2'></a>
              <a class='addthis_button_preferred_3'></a>
              <a class='addthis_button_preferred_4'></a>
              <a class='addthis_button_compact'></a>
              <a class='addthis_counter addthis_bubble_style'></a>
            </div> -->
              <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>

            <?php 
            if ($this->session->level=='konsumen'){
                echo "<form action='".base_url()."members/keranjang/$record[id_reseller]/$record[id_produk]' method='POST'>";
            }else{
                echo "<form action='".base_url()."produk/keranjang/$record[id_reseller]/$record[id_produk]' method='POST'>";
            }
            echo "<table class='table table-condensed' style='margin-bottom:0px'>
                <tr><td colspan='2' style='color:red;'><del style='color:#8a8a8a'>$harga_asli</del><br>
                <h1 style='display:inline-block'>$harga_konsumen</h1> / $record[satuan] 
                
                <a target='_BLANK' style='border-radius:15px 0px 0px 15px' class='btn btn-default btn-sm pull-right' href='https://api.whatsapp.com/send?phone=$rows[no_telpon]&amp;text=Assalam,%20Haloo!%20$rows[nama_reseller],%20Saya%20Mau%20Order%20Produknya...'><span style='color:green' class='glyphicon glyphicon-phone-alt'></span>Coba Chat Pelaku UMKM</a>
                </td></tr>
                <tr><td style='font-weight:bold; width:90px'>Berat</td> <td>:   $record[berat]</td></tr>
                <tr><td style='font-weight:bold'>Kategori</td> <td>:   <a href='".base_url()."produk/kategori/$kat[kategori_seo]'>$kat[nama_kategori]</a></td></tr>";
                if (($beli['beli']-$jual['jual'])>=1){
                    echo "<tr><td style='font-weight:bold'>Stok</td> <td class='text-success'>:   ".($beli['beli']-$jual['jual'])." stok barang</td></tr>";
                }else{
                    echo "<tr><td style='font-weight:bold'>Stok</td> <td>Tidak Tersedia</td></tr>";
                }

            echo "<tr><td style='font-weight:bold'>Jumlah Beli</td> <td><input type='number' value='1' name='qty'></td></tr>
            
            </table>


            <div class='alert alert-warning' style='border-radius:0px'>
              <span style='color:orange' class='glyphicon glyphicon-ok'></span>
              <b>Jaminan 100% Barang bagus</b><br>
              
            </div>

        <center><button type='submit' class='btn btn-success btn-block btn-lg'>Beli Sekarang</a>
        <button type='submit' class='btn btn-warning btn-block btn-lg'><span class='glyphicon glyphicon glyphicon-shopping-cart' style='font-size:19px'></span> Masukkan keranjang</a></center>";
       
        

        echo "</form>
        </div>
        </div>
        <div class='col-md-12' style='padding:0px'>
            <div class='panel-body'>
                <ul class='myTabs nav nav-tabs' role='tablist'>
                  <li role='presentation' class='active'><a href='#deskripsi' id='deskripsi-tab' role='tab' data-toggle='tab' aria-controls='deskripsi' aria-expanded='true'>DESKRIPSI PRODUK</a></li>
             
                </ul><br>
                <div id='myTabContent' class='tab-content'>
                    <div role='tabpanel' class='tab-pane fade active in' id='deskripsi' aria-labelledby='deskripsi-tab'>
                        $record[keterangan]
                    </div>
                    <div role='tabpanel' class='tab-pane fade' id='komentar' aria-labelledby='komentar-tab'>
                  
                    
                    </div>
                </div>
            </div>
            
        </div>

    </div>

    <div class='col-md-3' style='padding:0px'>";
        include "sidebar_pelapak.php";
    echo "</div>

</div>
<div style='clear:both'><br></div>";
?>
