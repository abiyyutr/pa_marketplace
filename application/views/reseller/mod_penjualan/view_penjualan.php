<title>Pelaku UMKM | Orderan Pelanggan</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Transaksi Penjualan / Orderan Pelanggan</h3>
                  <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>reseller/tambah_penjualan'>Tambah Penjualan</a> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class='table-responsive'>
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Pembayaran (Biaya)</th>
                        <th>Status Pemesanan</th>
                        <th>Total + Biaya</th>
                        <th>Waktu Transaksi</th>
                        
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>'; $status = 'Pesanan sudah dibayar'; $icon = 'star-empty'; $ubah = 1; }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Pesanan sudah dibayar & belum diverifikasi</i>'; $status = 'Sedang dikemas & dikirim'; $icon = 'star text-yellow'; $ubah = 2; }
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Sedang dikemas dan dikirim</i>'; $status = 'Pesanan sudah diterima'; $icon = 'star text-yellow'; $ubah = 3; }
                      else if($row['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; }
                      else { $proses = '<i style=color:red>Pembayaran ditolak</i>';   }
                    
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                    <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                    
                              <td><a href='".base_url()."reseller/detail_konsumen/$row[id_konsumen]'>$row[nama_lengkap]</a></td>
                              <td><span style='text-transform:uppercase'>$row[kurir]</span> - (Rp $row[ongkir])</td>
                            
                              <td>$proses</td>
                              <td style='color:blue;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                              <td>$row[waktu_transaksi]</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."reseller/detail_penjualan/$row[id_penjualan]'><span class='glyphicon glyphicon-search'></span> Detail Pesanan</a>
                                <a class='btn btn-primary btn-xs' title='$status' href='".base_url()."reseller/proses_penjualan/$row[id_penjualan]/$ubah' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi $status?')\"><span class='glyphicon glyphicon-$icon'></span></a>
                                
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."reseller/delete_penjualan/$row[id_penjualan]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
                </div>
              </div>
              </div>
              </div>
              