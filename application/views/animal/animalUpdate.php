<div class="container">
    
    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('animal_controller/animalUpdateProcess'); ?>">
        <h2 class="form-signin-heading">Lütfen hayvan bilgilerini giriniz</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $animal['h_adi'];?>" name="animal_name">
        <input class="form-control" type="hidden" autofocus="" required="" 
               value="<?php echo $animal['h_id'];?>" name="animal_id">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $animal['kulak_no'];?>" name="animal_KulakNo">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $animal['dogum_tarihi'];?>" name="birth_Date">
        <input class="form-control" type="text" autofocus="" required="" 
               value="<?php echo $animal['not'];?>" name="animal_Notes">
           
        <button class="btn btn-lg btn-success btn-block" type="submit">Hayvan Düzenle</button>

    </form>
    
</div>