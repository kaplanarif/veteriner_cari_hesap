<?php if (!defined('BASEPATH')) die();
class customer_controller extends CI_Controller {
    
//collapse işlemleri için http://getbootstrap.com/javascript/#collapse        
    public function index(){
          $this->customerlist();
        
    }
    public function __construct() {
        parent::__construct();
        
        if( $this->session->userdata('logged_in') ){
            //kulllanıcı login olduysa bu class 
            //içindeki işlemleri gerçekleştirebilr.
            $this->load->model('customer_model');
        }
        else
            redirect('main_page_controller/login');
        //login olmadan bu sayfaya erişim saglanırsa
        //login ekranına yönlendirilir.
        
    }   
    public function customerlist(){
        
        $customer_data['list'] = $this->customer_model->list_customers();

        //sayfayı yüklerken sayfaya veride gönderbiliyorz.
        $this->load_pages('customerList',$customer_data);//gönderilen data $list şeklinde
        
    }
    
    function listpage(){
        $pageNumber = $this->uri->segment(3, 0);
        
        $customer_data = $this->customer_model->list_Customers_byPage($pageNumber);
        
        $customer_data['list'] = $customer_data;
        $customer_data['pageN'] = $pageNumber;
        $customer_data['pageC'] = $this->customer_model->rowNum();
        
        //sayfayı yüklerken sayfaya veri de gönderbiliyorz.
        $this->load_pages('customerList',$customer_data);//gönderilen data $list şeklinde
    }


    public function customeradd(){
        
        $this->load_pages('customerAdd');
        
    }
    public function customerAddProcess(){
        
        $_POST = xss_clean($_POST);
        
        $query = $this->customer_model->add_customer($_POST);
        
        if($query){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Kayıt Başarılı!!');
            $page = floor($this->customer_model->rowNum() / 5);
            if($this->customer_model->rowNum()%5 != 0) $page++;
            redirect('customer_controller/listpage/'.$page);
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:Kayıt gerçekleştirilemedi.');
            redirect('customer_controller/listpage/1');
        }
        
        
    }

    public function delete(){
        
        $customer_id = $this->uri->segment(3, 0);
        $query = $this->customer_model->delete_customer($customer_id);
        if($query){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Müşteri veri tabanından silinmiştir.!!');
            redirect('customer_controller/listpage/1');
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:Silme işlemi gerçekleştirilememiştir.');
            redirect('customer_controller/listpage/1');
        }
        
    }
    public function customerlook(){
        $customer_id = $this->uri->segment(3, 0);
       
        //customer bilgileri çekiliyor çekiyoruz.
        $customer_data['customer'] = $this->customer_model->get_customer($customer_id);
        
        //bu customerın hayvan listesi
        $this->load->model('animal_model');
        //işlem yapılan müşterinin işlemleri için bu model yüklendi.
        $this->load->model('process_model');
         
        $processData = $this->process_model->get_process($customer_id);
        
        $customer_data['animals'] = $this->animal_model->get_animals_for_customer($customer_id);
        
       
        for($i=0 ; $i< count($processData); $i++){
            $hayvan_id = $processData[$i]['h_id'];
            $processData[$i]['h_id'] = $this->animal_model->findAnimalNameByID($hayvan_id);
         
        }
        $customer_data['process'] = $processData;
        $this->load_pages('customer',$customer_data);
           
        
    }
    public function customerUpdate(){
        $customer_id = $this->uri->segment(3, 0);
        $customer_data['customer'] = $this->customer_model->findCustomerByID($customer_id);
        $this->load_pages("customerUpdate",$customer_data);
    }
    
    function customerUpdateProcess(){
        $result = $this->customer_model->updateCustomer($_POST);
        if($result){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Müşteri veri tabanında güncellenmiştir.!!');
            redirect('customer_controller/listpage/1');
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:güncelleştirme işlemi gerçekleştirilememiştir.');
            redirect('customer_controller/listpage/1');
        }
        
    }

    public function customerSearch(){
        
        //gelen key e göre veritabanında arama yapılacak.
        $key = $_POST['key'];
        $query = $this->customer_model->customer_Search($key);
        
        echo '<table class="table table-striped">
                    <thead>
                        <th>Adı</th>
                        <th>Soyadı</th>
                        <th>Telefon</th>
                        <th>Adres</th>
                        <th>Kayıt Tarihi</th>
                    </thead>
                    <tbody>';
        
        
            foreach ($query as $row) {
                 echo '<tr><td>';
                 echo ucfirst($row['ad']).'</td><td>'
                 . strtoupper($row['soyad']) .'</td><td>'
                 .$row['telefon'].'</td><td>'
                 .$row['kayit_tarihi'].'</td><td>'
                 .$row['adres'].'</td></tr>';
            }
            
            echo '
                    </tbody>
                </table>';
        
    }
    public function new_process(){
       
        // müsteriye gelen yeni işlemi ekler.
         $this->load->model('process_model');
         $id = $this->process_model->add_process($_POST);
         if ( $id != 0){
            $this->session->set_flashdata('message1', 'İşlem Kaydedilmiştir.!!');
            redirect("customer_controller/customerlook/".$id);
         }
         else{
             $this->session->set_flashdata('message0', 'Bir Hata oluştu Tekrar deneyiniz.');
            redirect("customer_controller/listpage/1");
         }
               
    }
    public function new_animal(){
        // müsteriye gelen yeni işlemi ekler.
         $this->load->model('animal_model');
         $id = $this->animal_model->add_animal($_POST);
         if ( $id != 0){
            $this->session->set_flashdata('message1', 'Hayvan Kaydedilmiştir.!!');
            redirect("customer_controller/customerlook/".$_POST['animal_SahipNo']);
         }
         else{
             $this->session->set_flashdata('message0', 'Bir Hata oluştu Tekrar deneyiniz.');
            redirect("customer_controller/listpage/1");
         }
               
    }
    public function pay_dept(){
        extract($_POST);
        //$customer_id,$pay_cost bu bilgiler ile ödeme tablosuna kaydedilecek.
        //$customer_dept ile kalan borç update edilir.
      
        $over_money = 0;
        if ($customer_dept == 0 ){
            
            $this->session->set_flashdata('message1',"Müşterinin Borcu bulunmamaktadır.");
            redirect("customer_controller/customerlook/".$customer_id); 
            
        }    
        if ($pay_cost > $customer_dept){
            $over_money = $pay_cost - $customer_dept;
        }
        
       
        
        $this->load->model('process_model');
        if ($this->process_model->add_pay_info($customer_id,$pay_cost)){
            
            $customer_dept = $customer_dept - $pay_cost;
            if($customer_dept < 0 ){ $customer_dept = 0;}
            $result = $this->customer_model->updateCustomerDept($customer_id,$customer_dept);
            
            if ($result){
                if ( $over_money > 0 ){ $msg = "Borç Kapanmıştır. Para Üstü:".$over_money;}
                else{ $msg = "Ödeme alındı.";}
                
                $this->session->set_flashdata('message1',$msg);
                redirect("customer_controller/customerlook/".$customer_id); 
            }
            else{
                $this->session->set_flashdata('message0', 'Bir Hata oluştu Tekrar deneyiniz.');
                redirect("customer_controller/listpage/1");
            }
            
        }else{
            $this->session->set_flashdata('message0', 'Bir Hata oluştu Tekrar deneyiniz.');
            redirect("customer_controller/listpage/1");
        }
        
       
       
    }

    private function load_pages($page_name,$data=0){
        
        $this->load->view('user/header');
        //sayfaya veri gönderirken bu şekilde gönderiliyor.
        // ancak $data['veriAdı'] şeklinde bir aray olmalı 
        // view dosyasında $veriAdı diye kullanabilriz.
        // örnek olarak customer_list fonksiyonuna bakılabilinir.
        if( $data != 0 )
            $this->load->view('customer/'.$page_name,$data);
        else
            $this->load->view('customer/'.$page_name);
        $this->load->view('user/footer');
     }
}
?>
