<?php
date_default_timezone_set('UTC');
/*
 * Tek müşteri bilgilerinin gösterildigi sayfadır.
 */
?>
<div class="container">
   
    <div class="row-fluid">
        
        <?php if($this->session->flashdata('message1')){ ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('message1');?></div>
        <?php } ?>
        <?php if($this->session->flashdata('message0')){ ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message0');?></div>
        <?php } ?>
        
        <div class="col-md-3">
            
                <div class="panel panel-success" id="panelim">
                    <div class="panel-heading"><?php echo $customer['ad'].' '.
                                                strtoupper($customer['soyad']); ?></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <tr>
                                <td>Tel:</td>
                                <td><?php echo '0'.$customer['telefon'] ?></td>
                            </tr>
                            <tr>
                                <td>Adres:</td>
                                <td><?php echo $customer['adres'] ?></td>
                            </tr>
                            <tr>
                                <td>Kayıt:</td>
                                <td><?php echo  date("d-m-Y",strtotime($customer['kayit_tarihi']));?></td>
                            </tr>
                            <tr>
                                <td>Borç:</td>
                                <td><span><?php echo  $customer['borc'];?></span>&nbsp;TL</td>
                            </tr>
                        </table>
                    </div>
                </div>
            <div class="panel panel-danger" id="open_dept">
                <div class="panel-body">
                    <span>Ödeme almak için tıklayınız..</span>
                    <div  id ="pay_off_debt">
                        <br>
                        <form class="input-group" method="POST"
                              action="<?php echo site_url('customer_controller/pay_dept'); ?>">
                        <input type="hidden" name="customer_id" 
                                      value="<?php echo $customer['musteri_id']; ?>"> 
                        <input type="hidden" name="customer_dept" 
                                      value="<?php echo $customer['borc']; ?>">
                        <div class="col-md-7">
                            <div class="input-group">  
                                <input type="text" class="form-control" 
                                   name="pay_cost" placeholder="Fiyat">
                                <span class="input-group-addon">.TL</span>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" id ="pay_button" class="btn btn-warning">ÖDE</button>
                        </div>
                        </form>
                    </div>
                </div>    
            </div>
          
            
        </div>
        
        
    
        <div class="col-md-9"> 
            <div class="panel panel-info" id="panelim">
                <div class="panel-heading">
                    <div class="row"> 
                        <div class="col-md-1 col-md-offset-0">&nbsp;&nbsp;
                         <a href="#" title="Yeni işlem Ekle" id="open_process">       
                             <span class="glyphicon glyphicon-plus"></span>
                         </a>
                        </div>
                        <div class="col-md-1 col-md-offset-4">İşlemler</div>
                    </div>    
                </div>
                <div class="panel-body">
                    
                    <div  id ="new_process">
                        <form class="input-group" method="POST"
                              action="<?php echo site_url('customer_controller/new_process'); ?>">
                           <div class="row-fluid-md-1 row-fluid-md-offset-1">
                               <input type="hidden" name="process_customer" 
                                      value="<?php echo $customer['musteri_id']; ?>"> 
                               <div class="col-xs-3 ">
                                  <input type="text" class="form-control" 
                                         name ="process_name" placeholder="Yapılan İşlem">
                                </div>
                               
                                <div class="col-xs-3">
                                    <div class="input-group " > 
                                    <input type="text" class="form-control" 
                                           name="process_note" placeholder="Açıklama">
                                    </div>
                                </div>
                               <div class="col-xs-2">  
                                   <div class="input-group"> 
                                   <select class="form-control" name="process_animal">
                                       <?php 
                                            foreach ($animals as $row)
                                            {  
                                                echo '<option value='.$row['h_id'].'>';
                                                echo $row['kulak_no'].'</option>';
                                            } 
                                        ?>
                                   </select>
                                   </div>
                               </div>
                              
                                <div class="col-xs-2">
                                  <div class="input-group">  
                                  <input type="text" class="form-control" 
                                         name="process_cost" placeholder="Fiyat">
                                  <span class="input-group-addon">.TL</span>
                                  </div>
                                </div>
                               <button type="submit" class="btn btn-warning">Kaydet</button>
                            </div>
                                
                            
                        </form>
                        <hr>
                    </div>
                    <div>
                        <table class="table table-striped">
                            <thead>

                                <th>İşlem Adı</th>
                                <th>Hayvan Adı</th>
                                <th>Not</th>
                                <th>Fiyatı</th>

                            </thead>
                            <tbody>

                                <?php
                                    foreach ($process as $row)
                                    {  
                                        echo '<tr><td>';
                                        echo $row['islem_adi'].'</td><td>'
                                           .$row['h_id'].'</td><td>'
                                           .$row['aciklama'].'</td><td>'
                                           .$row['fiyat'].' TL</td></tr>';
                                    } 
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                    
                    
                    
                </div>
               
                
            </div>
            <div class="panel panel-info" id="hayvan_panelim">                
                <div class="panel-heading">
                    <div class="row"> 
                        <div class="col-md-1 col-md-offset-0">&nbsp;&nbsp;
                         <a href="#" title="Yeni Hayvan Ekle" id="open_animal">       
                             <span class="glyphicon glyphicon-plus"></span>
                         </a>
                        </div>
                        <div class="col-md-1 col-md-offset-4">Hayvanlar</div>
                    </div>    
                </div>
                <div class="panel-body"></div>
                
                <div  id ="new_animal">
                        <form class="input-group" method="POST" action="<?php echo site_url('customer_controller/new_animal'); ?>">
                           
                               <div class="row-fluid-md-1 row-fluid-md-offset-1">
                                    <input type="hidden" name="animal_SahipNo" value="<?php echo $customer['musteri_id']; ?>"> 
                               <div class="col-xs-2 ">
                                    <input type="text" class="form-control" name ="animal_name" placeholder="Hayvan Adı"></div>
                               
                               <div class="col-xs-2">
                                    <div class="input-group " > 
                                    <input type="text" class="form-control" 
                                           name="animal_KulakNo" placeholder="Kulak No"></div></div>
                               
                               <div class="col-xs-2">
                                    <div class="input-group " > 
                                    <input type="text" class="form-control" 
                                           name="birth_Date" placeholder="Doğum Tarihi"></div></div>
                               
                               <div class="col-xs-3">
                                    <div class="input-group " > 
                                    <input type="text" class="form-control" 
                                           name="animal_Notes" placeholder="Not"></div></div>
                               
                                <button type="submit" class="btn btn-warning">Kaydet</button>
                              </div>
                                
                            
                        </form>
                        <hr>
                  </div>
                
                <?php if( $animals != NULL){ ?>
                <table class="table table-striped">
                    <thead>
                        
                        <th>Kulak No</th>
                        <th>Hayvan Adı</th>
                        <th>Not</th>
                        <th>Doğum Tarihi</th>
                       
                    </thead>
                    <tbody>
                   
                        <?php 
                        
                            foreach ($animals as $row)
                            {  
                                echo '<tr><td>';
                                echo $row['kulak_no'].'</td><td>'
                                   .$row['h_adi'].'</td><td>'
                                   .$row['not'].'</td><td>'
                                   .$row['dogum_tarihi'].'</td></tr>';
                            }
                        
                        ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>

        </div>
        
    </div>
</div>