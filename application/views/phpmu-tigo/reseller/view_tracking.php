<p class='sidebar-title block-title'>LACAK PEMESANAN</p>
<?php 
    $attributes = array('class'=>'form-horizontal','role'=>'form');
    echo form_open_multipart('konfirmasi/tracking',$attributes); 
    echo "<div class='alert alert-info'>Masukkan Nomor Pemesanan Terlebih dahulu!</div>
      <table class='table table-condensed'>
        <tbody>
          <tr><th scope='row' width='120px'>No Pesanan</th>       <td><input type='text' name='a' class='form-control' style='width:100%' placeholder='TRX-0000000000' required>
        </tbody>
      </table>

      <div class='box-footer'>
        <button type='submit' name='submit1' class='btn btn-info'>Cek Pemesanan</button>
      </div>";
    echo form_close();
