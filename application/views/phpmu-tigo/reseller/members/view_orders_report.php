<p class='sidebar-title text-danger produk-title'> Laporan Data Pesanan Anda</p>
              <?php 
                if ($this->uri->segment(3)=='success'){
                  echo "<div class='alert alert-success'><b>SUCCESS</b> - Terima kasih telah Melakukan Konfirmasi Pembayaran!</div>";
                }elseif($this->uri->segment(3)=='orders'){
                  echo "<div class='alert alert-success'><b>SUCCESS</b> - Pesanan anda sudah dikirim, silahkan melakukan pembayaran ke rekening pelaku UMKM jika melakukan pembayaran transfer. jika barang sudah diterima harap menekan button pesanan diterima</div>";
                }
                elseif($this->uri->segment(3)=='cancel'){
                  echo "<div class='alert alert-success'><b>SUCCESS</b> - Pesanan berhasil dibatalkan</div>";
                }
              ?>
              <div class='alert alert-warning'><b>Keterangan<b>
              <br>  - Pembayaran melalui COD silahkan menunggu pesanan dikirimkan, Konfirmasi pembayaran diabaikan saja
              <br>- Pembayaran melalui transfer antar bank harap melakukan konfirmasi pembayaran setelah itu pembayaran akan diverifikasi. jika sudah diverifikasi barang akan dikirim
              <br>  - Jika barang sudah diterima harap menekan button pesanan diterima</div>
              <table id='example2' style='overflow-x:scroll; width:96%' class="table table-striped table-condensed">
                <thead>
                  <tr>
                    <th width="20px">No</th>
                    <th>No Pesanan</th>
                    <th>Nama UMKM/Toko</th>
                    <th>Subtotal</th>
                    <th>Jenis Pembayaran - Biaya</th>
                    <th>Status Pemesanan</th>
                    <th>Total + Biaya</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>'; $status = 'Sedang dikirim'; $icon = 'star-empty'; $ubah = 1; }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Pembayaran sedang diverifikasi</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 2; }
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Sedang dikemas dan dikirim</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 3; }
                      else if($row['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; }
                      else { $proses = '<i style=color:red;>Pembayaran ditolak</i>'; $status = 'Pesanan selesai'; $icon = 'star'; $ubah = 3; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td><span class='text-success'>$row[kode_transaksi]</span></td>
                              <td><a href='".base_url()."members/detail_reseller/$row[id_reseller]'>$row[nama_reseller]</a></td>
                              
                              <td><span style='color:blue;'>Rp ".rupiah($total['total'])."</span></td>
                              <td><i style='color:green;'><b style='text-transform:uppercase'>$row[kurir] - Rp ".rupiah($row['ongkir'])."</i></td>
                              <td>$proses</td>
                              <td style='color:red;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                              <td width='130px'>";
                              
                if ($row['proses']=='0'){
                  echo "<a style='margin-right:3px' class='btn btn-success btn-xs' title='Konfirmasi Pembayaran' href='".base_url()."konfirmasi?kode=$row[kode_transaksi]'>Konfirmasi Pembayaran</a><br>";
                  echo "<a style='margin-right:3px' class='btn btn-danger btn-xs' title='Batalkan pesanan' href='".base_url()."members/delete_penjualan/$row[id_penjualan]'>Batalkan pesanan</a><br>";
                 
                }
                if ($row['proses']=='1'){
                  
                  echo "<a style='margin-right:3px' class='btn btn-danger btn-xs' title='Batalkan pesanan' href='".base_url()."members/delete_penjualan/$row[id_penjualan]'>Batalkan pesanan</a><br>";
                 
                }
                if ($row['proses']=='2'){
                
                  echo "<a style='margin-right:3px' class='btn btn-success btn-xs' title='Pesanan Diterima' href='".base_url()."konfirmasi/pesanan_diterima?kode=$row[kode_transaksi]'>Pesanan diterima</a>";
                }
                
              echo "<a class='btn btn-info btn-xs' title='Detail data pesanan' href='".base_url()."members/keranjang_detail/$row[id_penjualan]'><span class='glyphicon glyphicon-search'></span></a></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
