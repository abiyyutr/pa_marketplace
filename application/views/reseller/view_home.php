<?php 
// $pembelian = $this->model_reseller->pembelian($this->session->id_reseller)->row_array();
// $penjualan_perusahaan = $this->model_reseller->penjualan_perusahaan($this->session->id_reseller)->row_array();
$penjualan = $this->model_reseller->penjualan($this->session->id_reseller)->row_array();
// $modal_perusahaan = $this->model_reseller->modal_perusahaan($this->session->id_reseller)->row_array();
// $modal_pribadi = $this->model_reseller->modal_pribadi($this->session->id_reseller)->row_array();
// $set = $this->db->query("SELECT * FROM rb_setting where aktif='Y'")->row_array();
?>

<title>Pelaku UMKM | Beranda</title>


            <section class="col-lg-5 connectedSortable">
            
              <div class="box box-info">
              <div class='box-header with-border'>
                  <h3 class='box-title'>Beranda Pelaku UMKM</h3>
                </div>
                <div class="box-header">
                <i class="fa fa-th-list"></i>
                <h3 class="box-title">Selamat datang Pelaku UMKM</h3>
                    <div class="box-tools pull-right">
                       <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                  <div class="box-body">
                  Silahkan mengelola Semua data melalui menu yang sudah kita sediakan dibelah kiri anda, berikut data profile anda : <br><br>
                      <?php 
                     
                      $iden = $this->model_app->edit('identitas',array('id_identitas'=>'1'))->row_array();
                      $rows = $this->model_app->edit('rb_reseller',array('id_reseller'=>$this->session->id_reseller))->row_array();
                      if (trim($rows['foto'])==''){ $foto_user = 'users.gif'; }else{ $foto_user = $rows['foto']; } 
                      $ko = $this->db->query("SELECT * FROM rb_kota a JOIN rb_provinsi b ON a.provinsi_id=b.provinsi_id where kota_id='$rows[kota_id]'")->row_array();?>
                      <dl class="dl-horizontal">
                          <dt>NIK</dt>   <dd><?php echo $rows['nik']; ?></dd>
                          <dt>Nama UMKM/Toko</dt>   <dd><?php echo $rows['nama_reseller']; ?></dd>
                          <dt>Nama Pemilik</dt>   <dd><?php echo $rows['nama_pemilik']; ?></dd>
                          <dt>Jenis Kelamin</dt>   <dd><?php echo $rows['jenis_kelamin']; ?></dd>
                          <dt>Alamat</dt>   <dd><?php echo $rows['alamat_lengkap'] ; ?></dd>
                          <dt>Kelurahan</dt>   <dd><?php echo $rows['kelurahan'] ; ?></dd>
                          <dt>Kecamatan</dt>   <dd><?php echo $rows['kecamatan'] ; ?></dd>
                          <dt>Kab/Kota</dt>   <dd><?php echo $ko['nama_kota'] ; ?></dd>
                          <dt>Provinsi</dt>   <dd><?php echo $ko['nama_provinsi'] ; ?></dd>
                          <dt>No HP</dt>   <dd><?php echo $rows['no_telpon']; ?></dd>
                          <dt>Alamat Email</dt>   <dd><?php echo $rows['email']; ?></dd>
                          
                     
                      </dl>
                    <hr style='margin:7px'>
                    <a class='btn btn-default btn-block' href="<?php echo base_url().$this->uri->segment(1); ?>/edit_reseller/<?php echo $this->session->id_reseller; ?>">Edit Profile</a>
                    <a target='_BLANK' class='btn btn-success btn-block' href="<?php echo base_url(); ?>produk/produk_reseller/<?php echo $this->session->id_reseller; ?>">Lihat Toko Anda</a>
                    <br><br>
                  </div>
              </div>

            </section>
            <!-- /.Left col -->
            
            <section class="col-lg-7 connectedSortable">

              <div class="box box-success">
              <div class="box-header">
              <i class="fa fa-th-list"></i>
              <h3 class="box-title">10 Transaksi Penjualan Terbaru</h3>
                  <div class="box-tools pull-right">
                     <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>No Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Pembayaran</th>
                        
                        <th>Waktu Transaksi</th>
                        <th>Status</th>
                        <th>Total + Biaya</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    $record = $this->model_reseller->penjualan_list_konsumen_top($this->session->id_reseller,'reseller');
                    foreach ($record->result_array() as $row){
                      if ($row['proses']=='0'){ $proses = '<i class="text-danger">Sedang diproses & belum bayar</i>'; $status = 'Sedang dikirim'; $icon = 'star-empty'; $ubah = 1; }
                      else if($row['proses']=='1'){ $proses = '<i class="text-success">Pembayaran sedang diverifikasi</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 2; }
                      else if($row['proses']=='2'){ $proses = '<i class="text-success">Sedang dikemas dan dikirim</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; $ubah = 3; }
                      else if($row['proses']=='3'){ $proses = '<i class="text-success">Pesanan sudah diterima</i>'; $status = 'Pesanan Selesai'; $icon = 'star text-yellow'; }
                      else { $proses = '<i style=color:red>Pembayaran ditolak</i>'; $status = 'Pesanan selesai'; $icon = 'star'; $ubah = 3; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                              <td><span>$row[nama_lengkap]</span></td>
                              <td><span style='text-transform:uppercase'>$row[kurir]</span></td>
                              
                              <td><span style='text-transform:uppercase'>$row[waktu_transaksi]</span></td>
                              <td>$proses</td>
                              <td style='color:blue;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
                <a class='btn btn-default btn-block' href='<?php echo base_url().$this->uri->segment(1); ?>/penjualan'>Lihat Semua</a>
              </div>
              </div> 
            </section><!-- right col -->
            