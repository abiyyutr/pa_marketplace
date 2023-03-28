<title>Admin | Data Pelaku UMKM</title>
            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Semua Pelaku UMKM</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_reseller'>Tambahkan Data UMKM</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>NIK</th>
                        <th>Nama Pelaku UMKM/Toko</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>Alamat </th>
                        <th>No Telpon</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Daftar</th>
                        <th>Validasi</th>
                        <th style='width:120px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    
                    $ko = $this->db->query("SELECT * FROM rb_kota where kota_id='$rows[kota_id]'")->row_array();
                    $pro = $this->db->query("SELECT * FROM rb_provinsi where provinsi_id='$rows[provinsi_id]'")->row_array();
                    foreach ($record as $row){
                      if ($row['validasi']=='Belum'){ $proses = '<i class="text-danger">Belum</i>'; $status = 'Sudah Validasi'; $icon = 'glyphicon glyphicon-ok'; $ubah = Sudah; }
                      else if($row['validasi']=='Sudah'){ $proses = '<i class="text-success">Sudah</i>'; $status = 'Batalkan Validasi'; $icon = 'glyphicon glyphicon-ok'; $ubah = Belum; }
                    echo "<tr><td>$no</td>
                    <td>$row[nik]</td>
                              <td>$row[nama_reseller]</td>
                              <td>$row[nama_pemilik]</td>
                              <td>$row[email]</td>
                              <td>$row[alamat_lengkap]</td>
                              <td>$row[no_telpon]</td>
                              <td>$row[jenis_kelamin]</td>
                              <td>$row[tanggal_daftar]</td>
                              <td>";
                              if ($row['validasi']=='Belum'){
                                // echo "<a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."administrator/detail_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-search'></span> Detail</a>";
                            
                               echo "<a class='btn btn-primary btn-danger' ><span class='glyphicon glyphicon-remove'></span> Belum Validasi</a>";
                              
                              }
                              if ($row['validasi']=='Sudah'){
                              
                               
                                echo "<a class='btn btn-primary btn-success' ><span class='glyphicon glyphicon-ok'></span> Sudah Validasi</a>";
                              
                               
                              }
                              echo "
                        
                              </td>
                              <td>";
                              if ($row['validasi']=='Belum'){
                                // echo "<a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."administrator/detail_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-search'></span> Detail</a>";
                            
                               echo "<a class='btn btn-primary btn-xs' title='$status' href='".base_url()."administrator/proses_validasi/$row[id_reseller]/$ubah' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi $status?')\"><span class='glyphicon glyphicon-$icon'></span> Validasi Data</a><br>";
                               echo "</nbsp><a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."administrator/detail_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-eye-open'></span> </a>";
                               echo "<a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."administrator/edit_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-edit'></span></a>";
                               echo "<a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_reseller/$row[id_reseller]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
                              }
                              if ($row['validasi']=='Sudah'){
                              
                               
                                echo "<a class='btn btn-primary btn-xs' title='$status' href='".base_url()."administrator/proses_validasi/$row[id_reseller]/$ubah' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi $status?')\"><span class='glyphicon glyphicon-$icon'></span> Batalkan Validasi</a><br>";
                                echo "<a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."administrator/detail_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-eye-open'></span> </a>";
                                echo "<a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."administrator/edit_reseller/$row[id_reseller]'><span class='glyphicon glyphicon-edit'></span></a>";
                                echo "<a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_reseller/$row[id_reseller]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-trash'></span></a>";
                               
                              }
                              echo "
                        
                              </td>
                          </tr>";
                          
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>