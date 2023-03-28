      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                <title>Admin | Detail UMKM/Toko</title>
                  <h3 class='box-title'>Detail Data Pelaku UMKM</h3>
                </div>
                <div class='box-body'>

                  <div class='panel-body'>
                    <ul id='myTabs' class='nav nav-tabs' role='tablist'>
                      <li role='presentation' class='active'><a href='#profile' id='profile-tab' role='tab' data-toggle='tab' aria-controls='profile' aria-expanded='true'>Data Pelaku UMKM/Toko </a></li>
                      <!-- <li role='presentation' class=''><a href='#pembelian' role='tab' id='pembelian-tab' data-toggle='tab' aria-controls='pembelian' aria-expanded='false'>History Pembelian</a></li>
                      <li role='presentation' class=''><a href='#penjualan' role='tab' id='penjualan-tab' data-toggle='tab' aria-controls='penjualan' aria-expanded='false'>History Penjualan</a></li> -->

                      <li role='presentation' class=''><a href='#keuangan1' role='tab' id='keuangan1-tab' data-toggle='tab' aria-controls='keuangan1' aria-expanded='false'>Laporan Penjualan</a></li>
                    </ul><br>

                    <div id='myTabContent' class='tab-content'>
                      <div role='tabpanel' class='tab-pane fade active in' id='profile' aria-labelledby='profile-tab'>
                          <div class='col-md-12'>
                            <table class='table table-condensed table-bordered'>
                            <tbody>
                              
                             
                              <tr><th width='130px' scope='row'>Username</th> <td><?php echo $rows['username']?></td></tr>
                              <tr><th scope='row'>Password</th> <td>xxxxxxxxxxxxxxx</td></tr>
                              <tr><th scope='row'>NIK</th> <td><?php echo $rows['nik']?></td></tr>
                              <tr><th scope='row'>Nama Pelaku UMKM/Toko</th> <td><?php echo $rows['nama_reseller']?></td></tr>
                              <tr><th scope='row'>Nama Pemilik</th> <td><?php echo $rows['nama_pemilik']?></td></tr>
                              <tr><th scope='row'>Jenis Kelamin</th> <td><?php echo $rows['jenis_kelamin']?></td></tr>
                             
                              <tr><th scope='row'>Alamat Lengkap</th> <td><?php echo $rows['alamat_lengkap']?>, Kel.<?php echo $rows['kelurahan']?>, Kec. <?php echo $rows['kecamatan']?>, Kab/Kota <?php echo $ko['nama_kota']?>, Prov. <?php echo $pro['nama_provinsi']?></td></tr>
                              <tr><th scope='row'>No Hp</th> <td><?php echo $rows['no_telpon']?></td></tr>
                              <tr><th scope='row'>Alamat Email</th> <td><?php echo $rows['email']?></td></tr>              
                              <tr><th scope='row'>Keterangan</th> <td><?php echo $rows['keterangan']?></td></tr>
                             
                            </tbody>
                            </table>
                          </div>
                          <div style='clear:both'></div>
                      </div>
                      
                      <div role='tabpanel' class='tab-pane fade' id='keuangan1' aria-labelledby='keuangan1-tab'>
                          <div class='col-md-12'>
                            <?php 
                            $id_reseller = $this->uri->segment(3);
                            $res = $this->db->query("SELECT * FROM rb_reseller where id_reseller='$id_reseller'")->row_array();
                            // $pembelian = $this->db->query("SELECT sum((b.jumlah*b.harga_jual)-b.diskon) as total FROM rb_penjualan a JOIN rb_penjualan_detail b ON a.id_penjualan=b.id_penjualan where a.status_penjual='admin' AND a.id_pembeli='".$id_reseller."' AND a.proses='1'")->row_array();
                            // $penjualan_perusahaan = $this->db->query("SELECT sum((a.jumlah*a.harga_jual)-a.diskon) as total, sum(a.jumlah) as produk FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk
                            //                                             JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_penjual='reseller' AND b.id_produk_perusahaan!='0' AND id_penjual='".$id_reseller."' AND c.proses='2'")->row_array();
                            $penjualan = $this->db->query("SELECT sum((a.jumlah*a.harga_jual)+c.ongkir-a.diskon) as total, sum(a.jumlah) as produk FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk
                                                                        JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_penjual='reseller' AND id_penjual='".$id_reseller."' AND c.proses='2'")->row_array();
                            // $modal_perusahaan = $this->db->query("SELECT sum(a.jumlah*b.harga_reseller) as total FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_pembeli='konsumen' AND c.proses='1' AND c.id_penjual='".$id_reseller."'")->row_array();
                            // $modal_pribadi = $this->db->query("SELECT sum(a.jumlah*b.harga_beli) as total FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_pembeli='konsumen' AND c.proses='1' AND c.id_penjual='".$id_reseller."'")->row_array();
                            // $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
                              if ($_GET['tahun']==''){
                                $tahun = date('Y');
                              }else{
                                $tahun = $_GET['tahun'];
                              }
                              echo "<div class='alert alert-success'><b>Total Penjualan anda Pada Tahun $tahun :</b> </div>
                                    <table class='table table-striped table-condensed'>
                                      <tr><td width='190px'>Total Penjualan</td>    <td style='color:red'> : Rp ".rupiah($penjualan['total'])."</td></tr>
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
                                          // $ppb = $this->db->query("SELECT sum((a.jumlah*a.harga_jual)+c.ongkir-a.diskon) as total, sum(a.jumlah) as produk FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk
                                          // JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_penjual='reseller' AND b.id_produk_perusahaan!='0' AND id_penjual='".$id_reseller."' AND c.proses='2' AND substr(c.waktu_transaksi,1,7)='$bulan'")->row_array();
                                          $ppb = $this->db->query("SELECT sum((a.jumlah*a.harga_jual)+c.ongkir-a.diskon) as total, sum(a.jumlah) as produk FROM `rb_penjualan_detail` a JOIN rb_produk b ON a.id_produk=b.id_produk
                                          JOIN rb_penjualan c ON a.id_penjualan=c.id_penjualan where c.status_penjual='reseller' AND id_penjual='".$id_reseller."' AND c.proses='2' AND substr(c.waktu_transaksi,1,7)='$bulan'")->row_array();
                                          echo "<tr bgcolor='#f5f5f5'>
                                                  <td>$i</td>
                                                  <td><b>".bulan($i)."</b></td>
                                                  <td>Rp ".rupiah($ppb['total'])."</td>
                                                  
                                                </tr>";
                                        }
                                  echo "</tbody></table>";
                              ?>
                              <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Detail Transaksi Penjualan</h3>
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
                    <td>$row[kode_transaksi]</td>
                    
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
                          </div>
                      </div>
                      

                    </div>
                  </div>
                </div>
            </div>
        </div>
        