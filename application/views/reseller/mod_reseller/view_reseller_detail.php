<title>Pelaku UMKM | Detail Profile</title>
      <div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Detail Data Profile</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url().$this->uri->segment(1); ?>/edit_reseller/<?php echo $this->session->id_reseller; ?>'>Edit Profile</a>
                </div>
                <div class='box-body'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <?php 
                      if (trim($rows['foto'])==''){ $foto_user = 'users.gif'; }else{ $foto_user = $rows['foto']; } 
                      $ko = $this->db->query("SELECT * FROM rb_kota a JOIN rb_provinsi b ON a.provinsi_id=b.provinsi_id where kota_id='$rows[kota_id]'")->row_array();
                    ?>
                    <tr bgcolor='#f5f5f5'><th rowspan='14' width='110px'><center><?php echo "<img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle img-thumbnail'>"; ?></center></th></tr>
                    <tr><th width='130px' scope='row'>Username</th> <td><?php echo $rows['username']?></td></tr>
                    <tr><th scope='row'>Password</th> <td>xxxxxxxxxxxxxxx</td></tr>
                    <tr><th scope='row'>Nama Toko</th> <td><?php echo $rows['nama_reseller']?></td></tr>
                    <tr><th scope='row'>Nama Pemilik</th> <td><?php echo $rows['nama_pemilik']?></td></tr>
                    <tr><th scope='row'>NIK</th> <td><?php echo $rows['nik']?></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th> <td><?php echo $rows['jenis_kelamin']?></td></tr>
             
                    <tr><th scope='row'>Alamat Lengkap</th> <td><?php echo $rows['alamat_lengkap']?>, Kel. <?php echo $rows['kelurahan']?>, Kec. <?php echo $rows['kecamatan']?>, Kab/Kota <?php echo $ko['nama_kota']?>, Propinsi <?php echo $ko['nama_provinsi']?></td></tr>
                    <tr><th scope='row'>No HP</th> <td><?php echo $rows['no_telpon']?></td></tr>
                    <tr><th scope='row'>Email</th> <td><?php echo $rows['email']?></td></tr>
                    
                    <tr><th scope='row'>Keterangan</th> <td><?php echo $rows['keterangan']?></td></tr>
                    <tr><th scope='row'>Tanggal Daftar</th> <td><?php echo tgl_indo($rows['tanggal_daftar']); ?></td></tr>
                  </tbody>
                  </table>
                </div>
            </div>
        </div>