<title>Pelaku UMKM | Detail Pelanggan</title>
      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Pelanggan</h3>
                  <a class='pull-right btn btn-default btn-sm' href='<?php echo base_url(); ?>reseller/penjualan'>Kembali</a>
                </div>
                <div class='box-body'>
                    <table class='table table-condensed table-bordered'>
                    <tbody>
                      <!-- <?php if (trim($rows['foto'])==''){ $foto_user = 'users.gif'; }else{ $foto_user = $rows['foto']; } ?>
                      <tr bgcolor='#f5f5f5'><th rowspan='12' width='110px'><center><?php echo "<img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle img-thumbnail'>"; ?></center></th></tr> -->
                   
                      <tr><th scope='row'>Nama Lengkap</th> <td><?php echo $rows['nama_lengkap']?></td></tr>
                      <tr><th scope='row'>Alamat Pengiriman</th> <td><?php echo $rows['alamat_lengkap']?>, Kec. <?php echo $rows['kecamatan']?>, Kab/Kota. <?php echo $rows['kota']?>, Propinsi <?php echo $rows['propinsi']?></td></tr>
                      <!-- <tr><th scope='row'>Kecamatan</th> <td><?php echo $rows['kecamatan']?></td></tr>
                      <tr><th scope='row'>Kota</th> <td><?php echo $rows['kota']?></td></tr>
                      <tr><th scope='row'>Provinsi</th> <td><?php echo $rows['propinsi']?></td></tr> -->
                      <tr><th scope='row'>Email</th> <td><?php echo $rows['email']?></td></tr>
                      <tr><th scope='row'>No HP</th> <td><?php echo $rows['no_hp']?></td></tr>
                      <tr><th scope='row'>Jenis Kelamin</th> <td><?php echo $rows['jenis_kelamin']?></td></tr>
                      <!-- <tr><th scope='row'>Tanggal Lahir</th> <td><?php echo tgl_indo($rows['tanggal_lahir']); ?></td></tr> -->
                      
                      <!-- <tr><th scope='row'>Tanggal Daftar</th> <td><?php echo tgl_indo($rows['tanggal_daftar']); ?></td></tr> -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>