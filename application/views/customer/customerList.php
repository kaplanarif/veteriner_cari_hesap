<div class="container">
    
    <div class="row-fluid">
        
        <?php if($this->session->flashdata('message1')){ ?>
        <div class="alert alert-success"><?php echo $this->session->flashdata('message1');?></div>
        <?php } ?>
        <?php if($this->session->flashdata('message0')){ ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('message0');?></div>
        <?php } ?>
        
        <div class="col-md-2">
            <button type="button" class="btn btn-info btn-block" id="btn_yeni_mus" >Yeni Müşteri&nbsp;
                    <span class="glyphicon glyphicon-plus"></span>
            </button>
                
            <div class="col-dm-12">&nbsp;</div>
            <div class="input-group">
               <input type="text" id="key" class="form-control" placeholder="Kelime Gir">
               <span class="input-group-btn">
                   <button class="btn btn-default" type="button" id="btn_customer_ara" >
                      <span class="glyphicon glyphicon-search"></span>
                  </button>
               </span>
            </div>
        </div>
    
        <div class="col-md-10">
            
            <div class="col-md-12">
                <div class="panel panel-info" id="customer_panelim">
                
                <table class="table table-striped">
                    <thead>
                        <th>&nbsp;</th>
                        <th>Adı</th>
                        <th>Soyadı</th>
                        <th>Telefon</th>
                        <th>Adress</th>
                        <th>Kayıt Tarihi</th>
                    </thead>
                    <tbody>
                   
                        <?php 
                            foreach ($list as $row)
                            {
                                $c_id = $row['musteri_id'];
                                
                                echo '<tr><td>';
                                echo '<a href="'.site_url("/customer_controller/customerUpdate/$c_id").'">
                                        <span class="glyphicon glyphicon-pencil"></span></a>';
                                echo '<a href="'.site_url("/customer_controller/delete/$c_id").'">
                                        <span class="glyphicon glyphicon-trash"></span></a>';
                                echo '<a href="'.site_url("/customer_controller/customerlook/$c_id").'">
                                        <span class="glyphicon glyphicon-eye-open"></span></a>';
                                echo '</td><td>';
                                echo ucfirst($row['ad']).'</td><td>'
                                   . strtoupper($row['soyad']) .'</td><td>'
                                   .$row['telefon'].'</td><td>'
                                   .$row['adres'].'</td><td>'
                                   .$row['kayit_tarihi'].'</td></tr>';
                            } 
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <ul class="pagination">
                    <?php 
                    if(isset($pageN)){
                        $pageCount = $pageC/5;
                        if($pageC%5 != 0) $pageCount++;
                        $prev = $pageN-1; $next = $pageN+1;
                        if($pageN != 1)echo '<li><a href="'.site_url("/customer_controller/listpage/$prev").'">&laquo;</a></li>';
                        
                        for($q=1 ; $q<=$pageCount ; $q++){
                            if($q == $pageN)
                                echo '<li class="active"><a href="'.site_url("/customer_controller/listpage/$q").'">'.$q.' <span class="sr-only">(current)</span></a></li>';
                            
                            else
                                echo '<li><a href="'.site_url("/customer_controller/listpage/$q").'">'.$q.'</a></li>';
                        }
                        if($next < $pageCount)echo '<li><a href="'.site_url("/customer_controller/listpage/$next").'">&raquo;</a></li>';
                    }
                    ?>
                  </ul>
            </div>
        </div>
    </div>
</div>