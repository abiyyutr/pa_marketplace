<div class='panel-body'>
    <ul class='myTabs nav nav-tabs' role='tablist'>
      <li role='presentation' class='active'><a href='#konsumen' id='konsumen-tab' role='tab' data-toggle='tab' aria-controls='konsumen' aria-expanded='true'>Pendaftaran Pelanggan </a></li>
      <li role='presentation' class=''><a href='#reseller' role='tab' id='reseller-tab' data-toggle='tab' aria-controls='reseller' aria-expanded='false'>Pendaftaran Penjual</a></li>
    </ul><br>
    <div id='myTabContent' class='tab-content'>
        <div role='tabpanel' class='tab-pane fade active in' id='konsumen' aria-labelledby='konsumen-tab'>

            <div class='alert alert-info'><b>PENTING!</b> Lengkapi Form dibawah ini untuk mendaftarkan diri Sebagai <b>Pelanggan</b>, harap di isi dengan data yang sebenar-benarnya sesuai dengan KTP, Terima kasih...</div>
            <div class="block-content">
            <div class='table-responsive'>
                <div id="writecomment">
                    <form action="<?php echo base_url(); ?>auth/register" method="POST" id="form_komentar">
                        <p class="contact-form-user">
                            <label for="c_name">Username<span class="required"></label>
                            <input type="text" name='a' class="required" style="display:inline-block; width:60%; border-radius: 25px;" onkeyup="nospaces(this)" required oninvalid="this.setCustomValidity('Masukkan Username')" oninput="setCustomValidity('')"/>
                        </p>

                        <p class="contact-form-user">
                            <label for="c_name">Password<span class="required"></label>
                            <input type="password" name='b' class="required" style="display:inline-block; width:60%; border-radius: 25px;" onkeyup="nospaces(this)" required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="setCustomValidity('')"/>
                        </p>

                        <p class="contact-form-user">
                            <label for="c_name">Nama Lengkap<span class="required"></label>
                            <input type="text" name='c'  class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap')" oninput="setCustomValidity('')"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Jenis Kelamin</label>
                            <input type='radio' name='f' value='Laki-laki'> Laki-laki &nbsp;
                            <input type='radio' name='f' value='Perempuan'> Perempuan
                        </p>

                        <p class="contact-form-email">
                            <label for="c_email">E-mail<span class="required"></span></label>
                            <input type="email" name='d'  style="display:inline-block; width:60%; border-radius: 25px;" onkeyup="nospaces(this)" class="required" required oninvalid="this.setCustomValidity('Masukkan Email')" oninput="setCustomValidity('')"/>
                        </p>

                        <p class="contact-form-message">
                            <label for="c_message">Provinsi<span class="required" ></span></label>
                            <?php echo "<select style='margin-left:5px; border-radius: 25px;' class='form-control' name='g' id='state' required>
                                            <option value=''>- Pilih -</option> ";
                                            foreach ($provinsi as $rows) {
                                                echo "<option value='$rows[provinsi_id]'>$rows[nama_provinsi]</option>";
                                            }
                                        echo "</select>"; ?>
                        </p>

                        <p class="contact-form-message">
                            <label for="c_message">Kota<span class="required"></span></label>
                                        <select style='margin-left:5px; border-radius: 25px' class='form-control' name='h' id='city' required>
                                                <option value=''>- Pilih -</option>
                                        </select>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Kelurahan<span class="required"></label>
                            <input type="text" name='k'  class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Kelurahan')" oninput="setCustomValidity('')"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Kecamatan<span class="required"></label>
                            <input type="text" name='i'  class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Kecamatan')" oninput="setCustomValidity('')"/>
                        </p>

                        <p class="contact-form-message">
                            <label for="c_message">Alamat<span class="required"></span></label>
                            <textarea name='e' class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Alamat Lengkap')" oninput="setCustomValidity('')"></textarea>
                        </p>

                        <p class="contact-form-user">
                            <label for="c_name">No Handphone<span class="required"></label>
                            <input type="number" name='j' class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan No HP')" oninput="setCustomValidity('')"/>
                        </p>
                        <p><input type="submit" name="submit1" class="styled-button" style="display:inline-block; width:60%; border-radius: 25px;" value="Daftar Sebagai Pelanggan"/></p>
                    </form>
                </div>
            </div>
            <div style='clear:both'><br></div>
        </div>
                                        </div>
    
                                       

        <div role='tabpanel' class='tab-pane fade' id='reseller' aria-labelledby='reseller-tab'>
        <div class='alert alert-warning'><b>PENTING!</b> - Lengkapi Form dibawah ini untuk mendaftarkan diri sebagai <b>Pelaku UMKM/Penjual</b>, kemudian harap menunggu data akan divalidasi oleh admin, Terima kasih<br></div>
            <div class="block-content">
            <div class='table-responsive'>
                <div id="writecomment">
                    <form action="<?php echo base_url(); ?>auth/register" method="POST" id="form_komentar">
                        <p class="contact-form-user">
                            <label for="c_name">Username<span class="required"></label>
                            <input type="text" name='a' class="required" onkeyup="nospaces(this)" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Username')" oninput="setCustomValidity('')"/>
                        </p>

                        <p class="contact-form-user">
                            <label for="c_name">Password<span class="required"></label>
                            <input type="password" name='b' class="required" onkeyup="nospaces(this)" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Password')" oninput="setCustomValidity('')"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">NIK</label>
                            <input type="text" name='h' onkeyup="nospaces(this)"  style="display:inline-block; width:60%; border-radius: 25px;" />
                        </p>                    
                        <p class="contact-form-user">
                            <label for="c_name">Nama Toko Anda<span class="required"></label>
                            <input type="text" name='c' class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Nama Toko Anda')" oninput="setCustomValidity('')"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Nama Pemilik</label>
                            <input type="text" name='i'  style="display:inline-block; width:60%; border-radius: 25px;"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Jenis Kelamin</label>
                            <input type='radio' name='d' value='Laki-laki'> Laki-laki &nbsp;
                            <input type='radio' name='d' value='Perempuan'> Perempuan
                        </p>

                        <p class="contact-form-user">
                            <label for="c_name">No HP<span class="required"></label>
                            <input type="number" name='f' class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan No HP')" oninput="setCustomValidity('')"/>
                        </p>


                        <p class="contact-form-email">
                            <label for="c_email">E-mail<span class="required"></span></label>
                            <input type="email" name='g'  onkeyup="nospaces(this)" class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Email')" oninput="setCustomValidity('')"/>
                        </p>
                        
                        <p class="contact-form-message">
                            <label for="c_message">Provinsi<span class="required"></span></label>
                            <?php echo "<select style='margin-left:5px; border-radius: 25px' class='form-control' name='state' id='state_reseller' required>
                                            <option value=''>- Pilih -</option>";
                                            foreach ($provinsi as $rows) {
                                                echo "<option value='$rows[provinsi_id]'>$rows[nama_provinsi]</option>";
                                            }
                                        echo "</select>"; ?>
                        </p>

                        <p class="contact-form-message">
                            <label for="c_message">Kota<span class="required"></span></label>
                                        <select style='margin-left:5px; border-radius: 25px' class='form-control' name='kota' id='city_reseller' required>
                                                <option value=''>- Pilih -</option>
                                        </select>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Kelurahan<span class="required"></label>
                            <input type="text" name='k'  class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Kelurahan')" oninput="setCustomValidity('')"/>
                        </p>
                        <p class="contact-form-user">
                            <label for="c_name">Kecamatan<span class="required"></label>
                            <input type="text" name='j'  class="required" style="display:inline-block; width:60%; border-radius: 25px;" required oninvalid="this.setCustomValidity('Masukkan Kecamatan')" oninput="setCustomValidity('')"/>
                        </p>
                        
                        <p class="contact-form-message">
                            <label for="c_message">Alamat<span class="required"></span></label>
                            <textarea name='e' class="required" style="display:inline-block; width:60%; border-radius: 25px;" required></textarea>
                        </p>
                        
                        

                        
                        <p><input type="submit" name="submit2" class="styled-button" style="display:inline-block; width:60%; border-radius: 25px;" value="Daftar Sebagai Penjual/Pelaku UMKM"/></p>
                    </form>
                </div>
            </div>
            <div style='clear:both'><br></div>
        </div>
    </div>
</div>
                                        </div>