            
            <a style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/reseller'>
  <div class="col-md-4 col-sm-8 col-xs-14">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Produk yang dijual</span>
        <?php $jmla = $this->model_app->view('rb_produk')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla; ?> Produk</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

 
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Produk</h3>
                  <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_produk'>Tambahkan Data</a> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Produk</th>
              
                     
                        <th>Harga Jual</th>
                
                        
   
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                      $res = $this->db->query("SELECT * FROM rb_reseller a JOIN rb_kota b ON a.kota_id=b.kota_id where a.id_reseller='$row[id_reseller]'")->row_array();
                      if ($row['id_reseller']=='0'){
                        $jual = $this->model_reseller->jual($row['id_produk'])->row_array();
                        $beli = $this->model_reseller->beli($row['id_produk'])->row_array();
                        $produk = "<i style='color:blue'>(Perusahaan)</i>"; 
                      }else{ 
                        $jual = $this->model_reseller->jual_reseller($row['id_reseller'],$row['id_produk'])->row_array();
                        $beli = $this->model_reseller->beli_reseller($row['id_reseller'],$row['id_produk'])->row_array();
                        $produk = "<i style='color:green'><a title='$res[nama_reseller] ($res[nama_kota], $res[alamat_lengkap])' style='color:green' href='".base_url()."/administrator/detail_reseller/$row[id_reseller]'>(Toko / Pelaku UMKM)</a></i>"; 
                      }
                    echo "<tr><td>$no</td>
                              <td>$row[nama_produk] 
                                  <small>$produk</small></td>
                       
                         
                              <td>".rupiah($row['harga_konsumen'])."</td>
                           
                             
                              
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>