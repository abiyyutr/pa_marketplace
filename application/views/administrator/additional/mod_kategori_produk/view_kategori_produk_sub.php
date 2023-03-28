<title>Admin | Edit SubKategori Produk</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Sub Kategori Produk</h3>
                  <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_kategori_produk_sub'>Tambahkan Data</a> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:30px'>No</th>
                        <th>Nama Kategori</th>
                        <th>Nama Sub Kategori Produk</th>
              
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    echo "<tr><td>$no</td>
                              <td style='color:green'>$row[nama_kategori]</td>
                              <td>$row[nama_kategori_sub]</td>
                             
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>