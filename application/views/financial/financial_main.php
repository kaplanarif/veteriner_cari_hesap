<div class="container">    
    <div class="row">
      <div class="col-md-8">      
          <div class="panel panel-success">
              <div class="panel-heading">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#process" data-toggle="tab">İşlem Listesi</a></li>
                  <li><a href="#payment" data-toggle="tab">Ödemeler</a></li>
                </ul>
              </div>
              <div class="panel-body">
                  <div class="tab-content">
                    <div class="tab-pane fade in active" id="process">

                                <?php if($process != NULL){ ?>
                                <table class="table table-striped">      
                                    <thead>
                                              <th>Müşteri Adı</th>
                                              <th>İşlem Adı</th>
                                              <th>Hayvan Kulak No</th>
                                              <th>Not</th>
                                              <th>Fiyatı</th>
                                     </thead>
                                     <tbody>
                                     <?php

                                          foreach ($process as $row)
                                          {  
                                              echo '<tr><td>';
                                              echo $row['sahip_adi'].'</td><td>'
                                                   .$row['islem_adi'].'</td><td>'
                                                   .$row['h_id'].'</td><td>'
                                                   .$row['aciklama'].'</td><td>'
                                                   .$row['fiyat'].' TL</td></tr>';  
                                          }     
                                          ?>
                                      </tbody>
                                </table>
                                <?php } ?>
                    </div>

                    <div class="tab-pane fade" id="payment">
                                <?php if($payment != NULL){ ?>
                                <table class="table table-striped">      
                                    <thead>
                                              <th>Müşteri Adı</th>
                                              <th>Ödeme Miktarı</th>
                                              <th>Ödeme Tarihi</th>
                                    </thead>
                                     <tbody>
                                     <?php

                                          foreach ($payment as $row)
                                          {  
                                              echo '<tr><td>';
                                              echo $row['customer'].'</td><td>'
                                                   .$row['miktar'].' TL</td><td>'
                                                   .$row['tarih'].'</td></tr>';  
                                          }     
                                          ?>
                                      </tbody>
                                </table>
                                <?php } ?>
                    </div>
                  </div    
              </div>
          </div>
          
         
      </div>
        
    </div>  
      <div class="col-md-4">
          <div class="panel panel-danger">
              <div class="panel-heading">Borçlu Listesi</div>
              <div class="panel-body">
                <?php if($list != NULL){ ?>
                  <table class="table table-striped">
                    <thead>
                        <th></th>
                        <th>Adı</th>
                        <th>Soyadı</th>
                        <th>Borcu</th>
                    </thead>
                    <tbody>
                   
                        <?php 
                            foreach ($list as $row)
                            {
                                $c_id = $row['musteri_id'];
                                
                                echo '<tr><td>';
                                echo '<a href="'.site_url("/customer_controller/customerlook/$c_id").'">
                                        <span class="glyphicon glyphicon-user"></span></a></td><td>';
                                echo ucfirst($row['ad']).'</td><td>'
                                   . strtoupper($row['soyad']) .'</td><td>'
                                   .$row['borc'].' TL</td></tr>';
                            } 
                        ?>
                    </tbody>
                </table>
                <?php } else{
                echo 'Tebrikler! Kendinize hiç borç takırtmamışsınız. Helal olsun. Bizim enişteyi öyle dolandırdılardı';} ?>
                  
                  
              </div>
          </div>
      </div>
    </div>
</div>