<p class='sidebar-title block-title'>Pesanan Diterima</p>

<?php 
if ($this->uri->segment(3)=='success'){
    echo "<div class='alert alert-success' style='margin:10% 0px'><center>Success Melakukan Konfirmasi pembayaran... <br>
                                                                          akan segera kami cek dan proses!</center></div>";
}else{
    $attributes = array('class'=>'form-horizontal','role'=>'form');
    $ongk = $this->db->query("SELECT * FROM rb_penjualan where id_penjualan='$rows[id_penjualan]'")->row_array();
    echo form_open_multipart('konfirmasi/pesanan_diterima',$attributes); 
    echo "<div class='alert alert-danger'>Masukkan Komentar barang dan foto barang</div>
      <table class='table table-condensed'>
        <tbody>
          <input type='hidden' name='id' value='$rows[id_penjualan]'>
          <tr><th scope='row' width='120px'>No Pesanan</th>       <td><input type='text' name='a' class='form-control' style='width:100%' value='$rows[kode_transaksi]' placeholder='TRX-0000000000' required>";
          if ($rows['kode_transaksi']!=''){
            echo "<tr><th scope='row'>Tota Bayar</th>                  <td><input type='text' name='c' class='form-control' style='width:50%' value='Rp ".rupiah($total['total']+$ongk['ongkir'])."' required>
         
            
            <tr><th width='130px' scope='row'>Komentar Barang</th>  <td><input type='text' class='form-control' style='width:70%' name='b' required></td></tr>
     
            <tr><th scope='row'>Foto Barang</th><td><input type='file' name='d'></td></tr>";
          }
        echo "</tbody>
      </table>

    <div class='box-footer'>";
        if ($rows['kode_transaksi']!=''){
          echo "<button type='submit' name='submit' class='btn btn-info'>Kirimkan</button>";
        }else{
          echo "<button type='submit' name='submit1' class='btn btn-info'>Cek Invoice</button>";
        }
    echo "</div>";
    echo form_close();
}
