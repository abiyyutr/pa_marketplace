<title>Admin | Kategori Produk</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Kategori Produk</h3>
                  <!-- <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_kategori_produk'>Tambahkan Data</a> -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Nama Kategori Produk</th>
              
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record as $row){
                    echo "<tr><td>$no</td>
                              <td>$row[nama_kategori]</td>
                             
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>