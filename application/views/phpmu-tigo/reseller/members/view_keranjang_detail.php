<p class='sidebar-title text-danger produk-title'> Detail Pesanan Anda</p>

<div class="col-sm-8">
      <table class="table table-striped table-condensed">
          <tbody>
        <?php 
          $no = 1;
          foreach ($record as $row){
          $ex = explode(';', $row['gambar']);
          if (trim($ex[0])==''){ $foto_produk = 'no-image.png'; }else{ $foto_produk = $ex[0]; }
          $sub_total = ($row['harga_jual']*$row['jumlah'])-$row['diskon'];
          echo "<tr><td>$no</td>
                    <td width='70px'><img style='border:1px solid #cecece; width:60px' src='".base_url()."asset/foto_produk/$foto_produk'></td>
                    <td><a style='color:#ab0534' href='".base_url()."produk/detail/$row[produk_seo]'><b>$row[nama_produk]</b></a>
                        <br>Qty : <b>$row[jumlah]</b>, Ukuran : <b>$row[ukuran]</b>, Harga : Rp ".rupiah($row['harga_jual']-$row['diskon'])." / $row[satuan], 
                        <br>Berat : <b>".($row['berat']*$row['jumlah'])." Gram</b></td>
                    <td>Rp ".rupiah($sub_total)."</td>
                </tr>";
            $no++;
          }
          $detail = $this->db->query("SELECT * FROM rb_penjualan where id_penjualan='".$this->uri->segment(3)."'")->row_array();
          $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total, sum(b.berat*a.jumlah) as total_berat FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk where a.id_penjualan='".$this->uri->segment(3)."'")->row_array();
          if ($rows['proses']=='0'){ $proses = '<i class="text-danger">Sedang dikemas</i>';  }
          elseif($rows['proses']=='1'){ $proses = '<i class="text-success">Pembayaran sedang diverifikasi</i>';  }
          elseif($rows['proses']=='2'){ $proses = '<i class="text-success">Pesanan sedang dikemas & dikirim</i>';  }
          elseif($rows['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>';  }
          else{ $proses = '<i class="text-info">Pesanan Sedang dikemas & dikirim</i>';  } 
          echo "
                <tr class='success'>
                  <td colspan='3'><b>No Pesanan</b> <small><i class='pull-right'>$row[kode_transaksi]</i></small></td>
                  <td><b>$detail[kode_transaksi]</b></td>
                </tr>
                <tr class='success'>
                  <td colspan='3'><b>Berat</b> <small><i class='pull-right'></i></small></td>
                  <td><b>$total[total_berat] Gram</b></td>
                </tr>

                <tr class='success'>
                <td colspan='3'>Jenis Pembayaran (<b><span style='text-transform:uppercase'>$detail[kurir]</span></b>) <small><i class='pull-right'></i></small></td>
                <td><b><span style='text-transform:uppercase'>$detail[kurir]</span></b></td>
                </tr>

                <tr class='success'>
                <td colspan='3'>Biaya <b><span style='text-transform:uppercase'>$detail[kurir]</span></b> <small><i class='pull-right'></i></small></td>
                <td><b><span>Rp ".rupiah($detail['ongkir'])."</span></b></td>
                </tr>

                <tr class='success'>
                  <td colspan='3'><b>Total </b> <small><i class='pull-right'></i></small></td>
                  <td><b>Rp ".rupiah($total['total'])."</b></td>
                </tr>

                <tr class='success'>
                  <td style='color:Red' colspan='3'><b>Subtotal </b> <small><i class='pull-right'></i></small></td>
                  <td style='color:Red'><b>Rp ".rupiah($total['total']+$detail['ongkir'])."</b></td>
                </tr>

                <tr class='success'>
                <td colspan='3'><b>Status Pemesanan</b> <small><i class='pull-right'></i></small></td>
                <td><b>$proses</b></td>
                </tr>

        </tbody>
      </table>";
?>
</div>

<div class="col-sm-4 colom44">
  <?php $res = $this->db->query("SELECT a.*, b.nama_kota, c.nama_provinsi FROM rb_reseller a JOIN rb_kota b ON a.kota_id=b.kota_id 
                JOIN rb_provinsi c ON b.provinsi_id=c.provinsi_id
                  where a.id_reseller='$rows[id_reseller]'")->row_array(); ?>
  <table class='table table-condensed'>
  <tbody>
    <tr class='alert alert-info'><th scope='row' style='width:90px'>Pengirim</th> <td><?php echo $res['nama_reseller']?></td></tr>
    <tr class='alert alert-info'><th scope='row'>No Telpon</th> <td><?php echo $res['no_telpon']; ?></td></tr>
    <tr class='alert alert-info'><th scope='row'>Alamat</th> <td><?php echo $res['alamat_lengkap'].', '.$res['nama_kota'].', '.$res['nama_provinsi']; ?></td></tr>
  </tbody>
  </table>

  <?php $usr = $this->db->query("SELECT a.*, b.nama_kota, c.nama_provinsi FROM rb_konsumen a JOIN rb_kota b ON a.kota_id=b.kota_id 
                JOIN rb_provinsi c ON b.provinsi_id=c.provinsi_id
                  where a.id_konsumen='".$this->session->id_konsumen."'")->row_array(); ?>
  <table class='table table-condensed'>
  <tbody>
    <tr class='alert alert-danger'><th scope='row' style='width:90px'>Penerima</th> <td><?php echo $usr['nama_lengkap']?></td></tr>
    <tr class='alert alert-danger'><th scope='row' style='width:90px'>No HP</th> <td><?php echo $usr['no_hp']?></td></tr>
   
    <tr class='alert alert-danger'><th scope='row'>Alamat Pengiriman</th> <td><?php echo $usr['alamat_lengkap'].', '.$usr['nama_kota'].', '.$usr['nama_provinsi']; ?></td></tr>
  </tbody>
  </table>
  <hr>
</div>
  <hr>