
<div class="container">


    
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('user_page_controller/new_user_process'); ?>">
        <h2 class="form-signin-heading">Yeni Kullanıcı</h2>
        <input class="form-control" name="new_user_name" type="text" autofocus="" required="" placeholder="Kullanıcı Adınız">
        <input class="form-control" name="new_user_realName" type="text" autofocus="" required="" placeholder="Adınız">
        <input class="form-control" name="new_user_realSurname" type="text" autofocus="" required="" placeholder="Soyadınız">
        <input class="form-control" name="new_user_email" type="text" autofocus="" required="" placeholder="E-mail Adresiniz">
        <input class="form-control" name="new_user_password" type="password" required="" placeholder="Şifre">
        <input class="form-control" name="new_user_passwordCheck" type="password" required="" placeholder="Şifre bir kere daha giriniz">
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Kullanıcı Oluştur</button>
    </form>
    

</div>