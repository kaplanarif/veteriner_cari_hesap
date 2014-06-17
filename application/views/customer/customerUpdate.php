<div class="container">
    
    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('customer_controller/customerUpdateProcess'); ?>">
        <h2 class="form-signin-heading">Lütfen müşteri bilgilerini giriniz</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $customer['ad'];?>" name="customer_name">
        <input class="form-control" type="hidden" autofocus="" required="" 
               value="<?php echo $customer['musteri_id'];?>" name="customer_id">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $customer['soyad'];?>" name="customer_surname">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $customer['telefon'];?>" name="telephone">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $customer['adres'];?>" name="address">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $customer['kayit_tarihi'];?>" name="reg_date">
        <input class="form-control" type="hidden" autofocus="" required="" 
               value="<?php echo $customer['borc'];?>" name="debt">
           
        <button class="btn btn-lg btn-success btn-block" type="submit">Hayvan Düzenle</button>

    </form>
    
</div>