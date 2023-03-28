<title>Admin | Beranda</title>

<a style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/reseller'>

<div class='box-header with-border'>
                  <h3 class='box-title'>Beranda Admin</h3>
                </div>
  <div class="col-md-4 col-sm-8 col-xs-14">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pelaku UMKM yang mendaftar</span>
        <?php $jmla = $this->model_app->view('rb_reseller')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmla; ?> Pelaku UMKM</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <a style='color:#000' href='<?php echo base_url().$this->uri->segment(1); ?>/konsumen'>
  <div class="col-md-4 col-sm-6 col-xs-14">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pelanggan yang mendaftar</span>
        <?php $jmlb = $this->model_app->view('rb_konsumen')->num_rows(); ?>
        <span class="info-box-number"><?php echo $jmlb; ?> Pelanggan</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  </a>

  <section class="col-lg-5 connectedSortable">
    <?php include "grafik.php"; ?>
</section><!-- right col -->


<section class="col-lg-4 connectedSortable">
  <div class='box'>
    
    <div class='box-body'>
        
      <p>Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda 
          atau pilih ikon-ikon pada Control Panel di bawah ini : </p>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/reseller" class='btn btn-app'><i class='fa fa-users'></i> Pelaku UMKM</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/konsumen" class='btn btn-app'><i class='fa fa-users'></i> Pelanggan</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/identitaswebsite" class='btn btn-app'><i class='fa fa-th'></i> Identitas Website</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/menuwebsite" class='btn btn-app'><i class='fa fa-th-large'></i> Menu Website</a>
      <!-- <a href="<?php echo base_url().$this->uri->segment(1); ?>/halamanbaru" class='btn btn-app'><i class='fa fa-file-text'></i> Halaman</a> -->

      <!-- <a href="<?php echo base_url().$this->uri->segment(1); ?>/iklanatas" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Atas</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/iklansidebar" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Sidebar</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/iklanhome" class='btn btn-app'><i class='fa fa-file-image-o'></i> Ads Tengah</a> -->
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/logowebsite" class='btn btn-app'><i class='fa fa-circle-thin'></i> Logo Website</a>
      <!-- <a href="<?php echo base_url().$this->uri->segment(1); ?>/templatewebsite" class='btn btn-app'><i class='fa fa-file'></i> Template</a>
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/background" class='btn btn-app'><i class='fa fa-circle'></i> Background</a> -->
      
      
      <!-- <a href="<?php echo base_url().$this->uri->segment(1); ?>/alamat" class='btn btn-app'><i class='fa fa-bed'></i> Alamat</a> -->
      
      <a href="<?php echo base_url().$this->uri->segment(1); ?>/manajemenuser" class='btn btn-app'><i class='fa fa-users'></i>Pengguna</a>
    </div>
  </div>
</section><!-- /.Left col -->



