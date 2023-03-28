<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Data Pelanggan</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/edit_konsumen',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    
                    <tr><th width='130px' scope='row'>Username</th>                     <td><input class='form-control' type='text' name='bb' value='$rows[username]' disabled></td></tr>
                    <tr><th scope='row'>Ganti Password</th>                     <td><input class='form-control' type='password' name='a'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>                 <td><input class='form-control' type='text' name='b' value='$rows[nama_lengkap]'></td></tr>
                    <tr><th scope='row'>Email</th>                 <td><input class='form-control' type='email' name='c' value='$rows[email]'></td></tr>
                    <tr><th scope='row'>No Hp</th>                        <td><input class='form-control' type='number' name='k' value='$rows[no_hp]'></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>                <td>"; if ($rows['jenis_kelamin']=='Laki-laki'){ echo "<input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan "; }else{ echo "<input type='radio' value='Laki-laki' name='d'> Laki-laki <input type='radio' value='Perempuan' name='d' checked> Perempuan "; } echo "</td></tr>
                  
                    <tr><th scope='row'>Alamat</th>               <td><input class='form-control' type='text' name='g' value='$rows[alamat_lengkap]'></td></tr>
                    <tr><td><b>Propinsi</b></td>         <td><select class='form-control' name='ewrwe' id='state_reseller' required>
                                                                      <option value=''>- Pilih -</option>";
                                                                      foreach ($provinsi as $row){
                                                                        if ($row['provinsi_id']==$rowse['provinsi_id']){
                                                                          echo "<option value='$row[provinsi_id]' selected>$row[nama_provinsi]</option>";
                                                                        }else{
                                                                          echo "<option value='$row[provinsi_id]'>$row[nama_provinsi]</option>";
                                                                        }
                                                                      }
                                                                   echo "</select>
                          </td></tr>
                          <tr><td><b>Kota</b></td>             <td><select class='form-control' name='ga' id='city_reseller' required>
                                                                      <option value=''>- Pilih -</option>";
                                                                      foreach ($kota as $row){
                                                                        if ($row['kota_id']==$rows['kota_id']){
                                                                          echo "<option value='$row[kota_id]' selected>$row[nama_kota]</option>";
                                                                        }
                                                                      }
                                                                   echo "</select>
                          </td></tr>
                    <tr><td><b>Kelurahan/b></td>  <td><input type='text' class='required form-control' name='i' value='$rows[kelurahan]'></td></tr>
                    <tr><td><b>Kecamatan</b></td>  <td><input type='text' class='required form-control' name='ia' value='$rows[kecamatan]'></td></tr>
                    <tr><th scope='row'>Tanggal Daftar</th>               <td><input class='form-control' type='text' name='r' value='$rows[tanggal_daftar]' disabled></td></tr>
              
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Update</button>
                   
                    
                  </div>
            </div>";
