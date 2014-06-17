<div class="container">
    <?php if($this->session->flashdata('message1')){ ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('message1');?></div>
        <?php } ?>
        <?php if($this->session->flashdata('message0')){ ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message0');?></div>
        <?php } ?>
    <div class="row-fluid">
        
         
        
    <div class="col-md-6">
         <div class="panel well">
            
          
                 
                 <h2>Vet. Hek. Mehmet KAPLAN</h2>
                 <h4>0 542 596 98 05</h4>
                 <p>Atatürk Cad. <br>Yunus Emre Sok.<br> No:17/A<br>
                 (Koçarlı Minibüs Garaj Girişi Karşısı)</p>
                 <p>Koçarlı/AYDIN</p>
            
         </div>
    </div>
    <div class="col-md-6 well">
        <div class="panel">
            
            <div class="panel-body">
            <form method="POST" action="<?php echo site_url('main_page_controller/contact_message'); ?>">
               
                <table class="table">
                    <tr>
                        <td>Adınız:</td>
                        <td><input class="form-control" name="contacter_name" type="text" autofocus="" required="" placeholder="Adınız"></td>
                    </tr>
                    <tr>
                        <td>Soyadınız:</td>
                        <td><input class="form-control" name="contacter_sname" type="text" autofocus="" required="" placeholder="Soyadınız"></td>
                    </tr>
                    <tr>
                        <td>E-Posta Adresiniz</td>
                        <td><input class="form-control" name="contacter_email" type="text" autofocus="" placeholder="E-posta adresiniz"></td>
                    </tr>
                    <tr>
                        <td>Açıklama:</td>
                        <td><textarea class="form-control" name="contacter_text" placeholder="Açıklama" rows="4" autofocus="" required=""></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                       
                        <td><button class="btn btn-lg btn-warning btn-block" type="submit">Gönder</button></td>
                    </tr>
                </table>
                
       
            </form>
            </div>
        </div>
    </div>
  </div>
    
    
    
</div>