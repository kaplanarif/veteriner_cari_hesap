<?php 
/*
 * bu dosya kullanıcı giriş yapıtında sonra ilk açılan sayfayı inşa eder.
 * 
 */
?>

<div class="container">

      <!-- Three columns of text below the carousel -->
      <div class="row-fluid">
        <div class="col-sm-4">
          <img class="img-circle" data-src="holder.js/140x140"
               src="<?php echo base_url('assets/img/customer.png') ?>" 
               alt="Generic placeholder image">
          <h2>Müsteriler</h2>
          <p><a class="btn btn-default" href="<?php echo site_url('/customer_controller/listpage/1'); ?>" 
                role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="img-circle" data-src="holder.js/140x140"
               src="<?php echo base_url('assets/img/cow.png') ?>"
               alt="Generic placeholder image">
          <h2>Hayvanlar</h2>
          <p><a class="btn btn-default" href="<?php echo site_url('/animal_controller/listpage/1'); ?>" 
                role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-sm-4">
          <img class="img-circle" data-src="holder.js/140x140"
               src="<?php echo base_url('assets/img/pie.png') ?>"
               alt="Generic placeholder image">
          <h2>Bütçe Durumu</h2>
          <p><a class="btn btn-default" href="<?php echo site_url('/financial_controller'); ?>" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
</div>