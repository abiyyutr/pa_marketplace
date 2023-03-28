<title>Pelaku UMKM | Pesanan Diterima</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pesanan Diterima</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class='table-responsive'>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>No Pesanan</th>
                        <th>Total Bayar</th>
                        <th>Komentar Barang</th>
                        <th>Foto Barang</th>
                        <th>Waktu Pesanan Diterima</th>
                        <th>Status Pemesanan</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>';  }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Pembayaran sedang diverifikasi</i>';  }
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Sedang dikemas dan dikirim</i>'; }
                      else if($row['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>';  }
                      else { $proses = '<i class="text-info">Pesanan telah diterima dan dibayar</i>';  }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr>
                              <td>$no</td>
                              <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                              <td>$row[total_bayar]</td>
                              <td>$row[komentar]</td>
                              <td><a href='".base_url()."reseller/download/$row[bukti_diterima]'>Lihat Foto</a></td>
                              <td>".tgl_indo($row['waktu_pesanan_diterima'])."</td>
                              <td>$proses</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table></div>
              </div>
            </div>
          </div>