<title>Pelaku UMKM | Pembayaran Pelanggan</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Konfirmasi Pembayaran Transfer Pelanggan </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class='table-responsive'>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>No Pesanan</th>
                        <th>Total Bayar</th>
                        <th>Ke Rekening</th>
                        <th>Nama Pengirim</th>
                        <th>Tanggal Transfer</th>
                        <th>Bukti Transfer</th>
                        
                        <th>Status Pembayaran</th>
                        
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>'; $status = 'Pesanan sudah dibayar'; $icon = 'glyphicon glyphicon-ok'; $ubah = 1; }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Pembayaran belum diverifikasi</i>'; $status = 'Verifikasi pembayaran'; $icon = 'glyphicon glyphicon-ok'; $ubah = 2;}
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Pembayaran sudah diverifikasi</i>'; $status = 'Batalkan verifikasi'; $icon = 'glyphicon glyphicon-ok'; $ubah = 1; }
                      else if($row['proses']=='3'){ $proses = '<i class="text-success">Pembayaran sudah diverifikasi</i>'; $status = 'Batalkan verifikasi'; $icon = 'glyphicon glyphicon-ok'; $ubah = 1;}
                      else { $proses = '<i style=color:red>Pembayaran ditolak</i>'; $status = 'Pesanan selesai'; $icon = 'glyphicon glyphicon-ok'; $ubah = 3; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr>
                              <td>$no</td>
                              <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                              <td>$row[total_transfer]</td>
                             
                              <td>$row[nama_bank] ($row[pemilik_rekening])</td>
                              <td>$row[nama_pengirim]</td>
                              <td>".tgl_indo($row['tanggal_transfer'])."</td>
                              <td><a href='".base_url()."reseller/download/$row[bukti_transfer]'>Lihat Bukti</a></td>

                              <td>$proses</td>
                              <td>";
                              if ($row['proses']=='1'){
                                // echo "<a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."administrator/detail_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-search'></span> Detail</a>";
                            
                              echo "<a class='btn btn-primary btn-xs' title='$status' href='".base_url()."reseller/proses_konfirmasi_pembayaran/$row[id_penjualan]/$ubah' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi $status?')\"><span class='glyphicon glyphicon-ok'></span> Verifikasi Pembayaran</a>";
                               echo "<a class='btn btn-primary btn-xs' title='$status' href='".base_url()."reseller/proses_konfirmasi_pembayaran/$row[id_penjualan]/' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi pembayaran ditolak?')\"><span class='glyphicon glyphicon-remove'></span> Pembayaran ditolak</a><br>";
                              
                              }
                              
                              if ($row['proses']=='2'){
                              
                                
                                
                              }
                              if ($row['proses']=='3'){
                              
                            
                               
                              }
                              echo "<a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."reseller/delete_penjualan/$row[id_penjualan]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span> Hapus Data</a>
       
                              
                              </td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table></div>
              </div>
            </div>
          </div>