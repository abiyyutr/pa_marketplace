<p class='sidebar-title block-title'><?php echo $title; ?></p>
<?php 
 if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>'; $status = 'Sedang dikirim'; $icon = 'star-empty'; $ubah = 1; }
 else if($row['proses']=='1'){ $proses = '<i class="text-success">Pembayaran sedang diverifikasi</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 2; }
 else if($row['proses']=='2'){ $proses = '<i class="text-success">Sedang dikemas dan dikirim</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 3; }
 else if($row['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; }
 else { $proses = '<i class="text-info">Pesanan telah diterima</i>'; $status = 'Pesanan selesai'; $icon = 'star'; $ubah = 3; }
  echo "<div class='col-md-8' style='padding:0px'>
        <dl class='dl-horizontal'>
            <dt>Nama</dt>       <dd>$rows[nama_lengkap]</dd>
            <dt>No HP</dt>       <dd>$rows[no_hp]</dd>
            <dt>Email</dt>       <dd>$rows[email]</dd>

            <dt>Alamat Lengkap</dt>     <dd>$rows[alamat_lengkap], Kec. $rows[kecamatan], Kab/Kota $rows[nama_kota], Provinsi $rows[nama_provinsi]</dd>
        </dl>
    </div>

    <div class='col-md-4' style='padding:0px'>
        <center>
        Total Bayar
        <h4 style='margin:0px;'>Rp ".rupiah($total['total']+$total['ongkir'])."<br> <br> 
          <span style='text-transform:uppercase'>$total[kurir]</span> 
        </h4>
        Status : <i>$proses</i>   
        </center>
    </div>

      <table class='table table-striped table-condensed '>
          <thead>
            <tr bgcolor='#f5f5f5'>
              <th width='47%'>Nama Produk</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Berat</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>";

          $no = 1;
          foreach ($record->result_array() as $row){
          $sub_total = (($row['harga_jual']-$row['diskon'])*$row['jumlah']);
          echo "<tr>
                    <td class='valign'><a href='".base_url()."produk/detail/$row[produk_seo]'>$row[nama_produk]</a></td>
                    <td class='valign'>".rupiah($row['harga_jual']-$row['diskon'])."</td>
                    <td class='valign'>$row[jumlah]</td>
                    <td class='valign'>".($row['berat']*$row['jumlah'])." Gram</td>
                    <td class='valign'>Rp ".rupiah($sub_total)."</td>
                </tr>";
            $no++;
          }
          
          echo "<tr class='success'>
                  <td colspan='4'><b>Berat</b> <small><i class='pull-right'>(".terbilang($total['total_berat'])." Gram)</i></small></td>
                  <td><b>$total[total_berat] Gram</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Tarif</b> <small><i class='pull-right'>(".terbilang($total['ongkir'])." Rupiah)</i></small></td>
                  <td><b>Rp ".rupiah($total['ongkir'])."</b></td>
                </tr>

                <tr class='success'>
                  <td colspan='4'><b>Total </b> <small><i class='pull-right'>(".terbilang($total['total']-$total['diskon_total'])." Rupiah)</i></small></td>
                  <td><b>Rp ".rupiah($total['total']-$total['diskon_total'])."</b></td>
                </tr>

                <tr class='danger'>
                  <td style='color:Red' colspan='4'><b>Subtotal </b> <small><i class='pull-right'>(".terbilang($total['total']+$total['ongkir'])." Rupiah)</i></small></td>
                  <td style='color:Red'><b>Rp ".rupiah(($total['total']-$total['diskon_total'])+$total['ongkir'])."</b></td>
                </tr>
        </tbody>
      </table><br>";
