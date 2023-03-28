<title>Pelaku UMKM | Laporan Penjualan</title>      
      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Laporan Penjualan</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                    
                      <li role='presentation' class='active'><a href='#pembelian' role='tab' id='pembelian-tab' data-toggle='tab' aria-controls='pembelian' aria-expanded='false'>Rekap Data Penjualan</a></li>
                    </ul><br>

                
                      <div role='tabpanel' class='tab-pane fade active in' id='pembelian' aria-labelledby='pembelian-tab'>
                          <div class='col-md-12'>
                            <?php 
                            // $pembelian = $this->model_reseller->pembelian($this->session->id_reseller)->row_array();
                            // $penjualan_perusahaan = $this->model_reseller->penjualan_perusahaan($this->session->id_reseller)->row_array();
                            $penjualan = $this->model_reseller->penjualan($this->session->id_reseller)->row_array();
                            // $modal_perusahaan = $this->model_reseller->modal_perusahaan($this->session->id_reseller)->row_array();
                              if ($_GET['tahun']==''){
                                $tahun = date('Y');
                              }else{
                                $tahun = $_GET['tahun'];
                              }
                              echo "<div class='alert alert-success'><b>Total Penjualan anda Pada Tahun $tahun :</b> </div>
                                    <table class='table table-striped table-condensed'>
                                      <tr><td width='190px'>Total Penjualan Produk </td>    <td style='color:red'> : Rp ".rupiah($penjualan['total'])."</td></tr>
                                      <tr><td>Jumlah Produk Terjual</td>                        <td style='color:red'> : ".rupiah($penjualan['produk'])." Produk</td></tr>
                                    </table>
                               

                                  <table class='table table-bordered table-striped table-condensed'>
                                        <thead>
                                          <tr bgcolor='#f5f5f5'>
                                            <th style='width:20px'>No</th>
                                            <th>Bulan (Tahun $tahun)</th>
                                            <th>Total Penjualan</th>
                                          
                                          </tr>
                                        </thead>
                                        <tbody>";
                                        for ($i=1; $i <=12 ; $i++) { 
                                          $bulan = $tahun."-".sprintf("%02d", $i);
                                          $ppb = $this->db->query("SELECT sum((a.jumlah*a.harga_jual)+c.ongkir-a.diskon) as total, sum(a.jumlah) as produk FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk
                                                                          JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_penjual='reseller' AND id_penjual='".$this->session->id_reseller."' AND c.proses='3' AND substr(c.waktu_transaksi,1,7)='$bulan'")->row_array();
                                          echo "<tr bgcolor='#f5f5f5'>
                                                  <td>$i</td>
                                                  <td><b>".bulan($i)."</b></td>
                                                  <td>Rp ".rupiah($ppb['total'])."</td>
                                                  
                                                </tr>";
                                        }
                                  echo "</tbody></table>";
                              ?>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
         
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Data Penjualan</h3>
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
                        <th>Nama Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Jenis Pembayaran (Biaya)</th>
                        <th>Status Pemesanan</th>
                        <th>Total + Biaya</th>
                        <th>Waktu Transaksi</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses</i>'; $status = 'Sedang dikirim'; $icon = 'star-empty'; $ubah = 1; }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Sedang dikemas & dikirim</i>'; $status = 'Pesanan dibayar dan diterima'; $icon = 'star text-yellow'; $ubah = 2; }
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Pesanan sudah dibayar dan diterima</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; }
                      else { $proses = '<i class="text-info">Pesanan Selesai</i>'; $status = 'Pesanan selesai'; $icon = 'star'; $ubah = 0; }
                     
                      $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                    <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                    
                              <td>$row[nama_lengkap]</a></td>
                              <td>$row[nama_produk]</a></td>
                              <td>$row[jumlah] $row[satuan]</a></td>
                              <td><span style='text-transform:uppercase'>$row[kurir]</span> - (Rp $row[ongkir])</td>
                            
                              <td>$proses</td>
                              <td style='color:red;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                              <td>$row[waktu_transaksi]</td>
                            
                          </tr>";
                      $no++;
                    }
                   
                    // echo "
                    //       <tr class='success'>
                    //         <td colspan='8'><b>Total</b></td>
                    //         <td><b>Rp ".rupiah($row['total'])."</b></td>
                    //       </tr>";
                  ?>
                  </tbody>
                </table>
                </div>
              </div>
              </div>
              </div>