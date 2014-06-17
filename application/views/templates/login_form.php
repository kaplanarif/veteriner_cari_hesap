<div class="container">
    
    
        
    
    <?php if($this->session->flashdata('message0')){ ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message0');?></div>
    <?php } ?>
        
    <form class="form-signin" method="POST" 
          action="<?php echo site_url('user_page_controller/login_process'); ?>">
        <h2 class="form-signin-heading">Lütfen giriş yapınız.</h2>

        <input class="form-control" type="text" autofocus="" required="" 
               placeholder="Kullanıcı Adı" name="user_name">
        <input class="form-control" type="password" required="" 
               placeholder="Şifre" name="user_pass">
           
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>

    </form>
    
</div>