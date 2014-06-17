<div class="container">
    
    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('customer_controller/customerAddProcess'); ?>">
        <h2 class="form-signin-heading">Lütfen müşteri bilgilerini giriniz</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Müşteri Adı" name="customer_name">
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Müşteri Soyadı" name="customer_surname">
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Müşteri Telefonu" name="customer_phone">
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Müşteri Adresi" name="customer_address">
           
        <button class="btn btn-lg btn-success btn-block" type="submit">Müşteri Ekle</button>

    </form>
    
</div>