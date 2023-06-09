<p class='sidebar-title text-danger produk-title'>Detail Data UMKM</p>
    <div class='panel-body'>
      <ul id='myTabs' class='nav nav-tabs' role='tablist'>
        <li role='presentation' class='active'><a href='#profile' id='profile-tab' role='tab' data-toggle='tab' aria-controls='profile' aria-expanded='true'>Data UMKM </a></li>
     
         <li role='presentation' class=''><a href='#rekening' role='tab' id='rekening-tab' data-toggle='tab' aria-controls='rekening' aria-expanded='false'>No Rekening</a></li>
        <!-- <li role='presentation' class=''><a href='#pembelian' role='tab' id='pembelian-tab' data-toggle='tab' aria-controls='pembelian' aria-expanded='false'>History Penjualan</a></li> -->
      </ul><br>

      <div id='myTabContent' class='tab-content'>
        <div role='tabpanel' class='tab-pane fade active in' id='profile' aria-labelledby='profile-tab'>
            <div class='col-md-12'>
              <table class='table table-condensed'>
              <tbody>
                <?php 
                  if (!file_exists("asset/foto_user/$rows[foto]") OR $rows['foto']==''){
                    $foto_user = "blank.png";
                  }else{
                    $foto_user = $rows['foto'];
                  }
                ?>
                <tr class='hidden-xs' bgcolor='#f5f5f5'><td rowspan='12' width='110px'><?php echo "<img style='border:1px solid #cecece; height:85px; width:85px' src='".base_url()."asset/foto_user/$foto_user' class='img-circle img-thumbnail'>"; ?></td></tr>
                <tr><th scope='row' width='140px'>Nama UMKM/Toko</th> <td>:  <?php echo $rows['nama_reseller']?></td></tr>
                <!-- <tr><th scope='row'>Jenis Kelamin</th> <td>:  <?php echo $rows['jenis_kelamin']?></td></tr> -->
                <?php if ($this->sesion->id_konsumen!=''){ ?>
                <tr><th scope='row'>Alamat</th> <td>:  <?php echo $rows['alamat_lengkap']?></td></tr>
                <tr><th scope='row'>No Hp</th> <td>:  <?php echo $rows['no_telpon']?></td></tr>
                <?php } ?>
                <tr><th scope='row'>Email</th> <td>:  <?php echo $rows['email']?></td></tr>
                <!-- <tr><th scope='row'>Kode Pos</th> <td><?php echo $rows['kode_pos']?></td></tr> -->
                <tr><th scope='row'>Keterangan Toko</th> <td>:  <?php echo $rows['keterangan']?></td></tr>
                <tr><th scope='row'>Tanggal Daftar</th> <td>:  <?php echo tgl_indo($rows['tanggal_daftar']); ?></td></tr>
              </tbody>
              </table>
            </div>
            <div style='clear:both'></div>
        </div>

        <div role='tabpanel' class='tab-pane fade' id='rekening' aria-labelledby='rekening-tab'>
            <div class='col-md-12'>
            <div class='alert alert-warning'><b>PENTING!</b> - Silahkan transfer pembayaran anda hanya ke rekening dibawah ini saja.</div>
              <table class='table table-hover table-condensed'>
                <thead>
                  <tr>
                    <th width="20px">No</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Atas Nama</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($rekening->result_array() as $row){
                    if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; $status = 'Proses'; $icon = 'star-empty'; $ubah = 1; }else{ $proses = '<i class="text-success">Proses</i>'; $status = 'Pending'; $icon = 'star text-yellow'; $ubah = 0; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td>$row[nama_bank]</td>
                              <td>$row[no_rekening]</td>
                              <td>$row[pemilik_rekening]</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </div>

        <div role='tabpanel' class='tab-pane fade' id='pembelian' aria-labelledby='pembelian-tab'>
            <div class='col-md-12'>
              <table class='table table-hover table-condensed'>
                <thead>
                  <tr>
                    <th width="20px">No</th>
                    <th>Nama Pembeli</th>
                    <th>Total Belanja</th>
                    <th>Status</th>
                    <th>Waktu Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; $status = 'Proses'; $icon = 'star-empty'; $ubah = 1; }else{ $proses = '<i class="text-success">Proses</i>'; $status = 'Pending'; $icon = 'star text-yellow'; $ubah = 0; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td><b>$row[nama_lengkap]</b></td>
                              <td style='color:red;'>Rp ".rupiah($total['total'])."</td>
                              <td>$proses</td>
                              <td>$row[waktu_transaksi]</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </div>

      </div>
    </div>
