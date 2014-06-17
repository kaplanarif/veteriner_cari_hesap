<div class="container">
    
    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('user_customer_controller/customerDeleteProcess'); ?>">
        <h2 class="form-signin-heading">Silmesen iyidi be hacı</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Müşteri ID" name="customer_id">
           
        <button class="btn btn-lg btn-warning btn-block" type="submit">Müşteri Sil</button>

    </form>
    
</div>