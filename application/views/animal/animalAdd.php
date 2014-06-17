<div class="container">
    
    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('animal_controller/animalAddProcess'); ?>">
        <h2 class="form-signin-heading">Lütfen hayvan bilgilerini giriniz</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Hayvan Adı" name="animal_name">
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Kulak No" name="animal_KulakNo">
        <select class="form-control" name="animal_SahipNo">
               <?php 
                     foreach ($customer as $row)
                     {  
                         echo '<option value='.$row['musteri_id'].'>';
                         echo $row['ad'].' '.$row['soyad'].'</option>';
                     } 
               ?>
        </select>
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Hayvan Doğum Tarihi" name="birth_Date">
        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Not" name="animal_Notes">
           
        <button class="btn btn-lg btn-success btn-block" type="submit">Hayvan Ekle</button>

    </form>
    
</div>