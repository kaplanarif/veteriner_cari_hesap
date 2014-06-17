<?php if (!defined('BASEPATH')) die();

/*
 * view dosyaları views/animal altında tanımlanmıştır.
 * model dosyası  models/animal_model.php dosyasıdır.
 *
 */

/**
 * Description of animal_controller
 *
 * @author arif
 */
class animal_controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if( $this->session->userdata('logged_in') ){
            //kulllanıcı login olduysa bu class 
            //içindeki işlemleri gerçekleştirebilr.
            $this->load->model('animal_model');
        }else
            redirect('main_page_controller/login');
        //login olmadan bu sayfaya erişim saglanırsa
        //login ekranına yönlendirilir.
    }
    
    function index(){
         $animal_data = $this->animal_model->list_Animals();
         $this->load->model('customer_model');
         
         for($i=0 ; $i< count($animal_data); $i++){
            $musteri_id = $animal_data[$i]['m_id'];
            $animal_data[$i]['m_id'] = $this->customer_model->getNamebyID($musteri_id);
         }
         
        $animal_data['list'] = $animal_data;
        $animal_data['pageC'] = $this->animal_model->rowNum();
        
        //sayfayı yüklerken sayfaya veri de gönderbiliyorz.
        $this->load_pages('animalList',$animal_data);//gönderilen data $list şeklinde
        
    }
    
    function listpage(){
        $pageNumber = $this->uri->segment(3, 0);
        
        $animal_data = $this->animal_model->list_Animals_byPage($pageNumber);
        
        $this->load->model('customer_model');
         
         for($i=0 ; $i< count($animal_data); $i++){
            $musteri_id = $animal_data[$i]['m_id'];
            $animal_data[$i]['m_id'] = $this->customer_model->getNamebyID($musteri_id);
         }
        // print_r($animal_data);
        $animal_data['list'] = $animal_data;
        $animal_data['pageN'] = $pageNumber;
        $animal_data['pageC'] = $this->animal_model->rowNum();
        
        //sayfayı yüklerken sayfaya veri de gönderbiliyorz.
        $this->load_pages('animalList',$animal_data);//gönderilen data $list şeklinde
    }
    
    function animaladd(){
        $this->load->model('customer_model');
        $customer_data['customer'] = $this->customer_model->list_customers();
        $this->load_pages("animaladd",$customer_data);
    }
    
    function animalAddProcess(){
        //$_POST = xss_clean($_POST);
        print_r($_POST);
        $query = $this->animal_model->add_animal($_POST);
        
        if($query){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Kayıt Başarılı!!');
            $page = floor($this->animal_model->rowNum() / 5);
            if($this->animal_model->rowNum()%5 != 0) $page++;
            redirect('animal_controller/listpage/'.$page);
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:Kayıt gerçekleştirilemedi.');
            redirect('animal_controller/listpage/1');
        }
    }
    
    public function animalSearch(){
        
        //gelen key e göre veritabanında arama yapılacak.
        $key = $_POST['key'];
        $query = $this->animal_model->animal_Search($key);
        
        echo '<table class="table table-striped">
                    <thead>
                        <th>Adı</th>
                        <th>Kulak No</th>
                        <th>Sahip No</th>
                        <th>Doğum Tarihi</th>
                        <th>Kayıt Tarihi</th>
                        <th>Not</th>
                    </thead>
                    <tbody>';
        
        
            foreach ($query as $row) {
                 echo '<tr><td>';
                 echo ucfirst($row['h_adi']).'</td><td>'
                 . strtoupper($row['kulak_no']) .'</td><td>'
                 .$row['m_id'].'</td><td>'
                 .$row['dogum_tarihi'].'</td><td>'
                 .$row['kayit_tarihi'].'</td><td>'
                 .$row['not'].'</td></tr>';
            }
            
            echo '
                    </tbody>
                </table>';
        
    }
    
    function delete(){
        $animal_id = $this->uri->segment(3, 0);
        $query = $this->animal_model->deleteAnimal($animal_id);
        if($query){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Hayvan veri tabanından silinmiştir.!!');
            redirect('animal_controller/listpage/1');
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:Silme işlemi gerçekleştirilememiştir.');
            redirect('animal_controller/listpage/1');
        }
    }
    
    function update(){
        $animal_id = $this->uri->segment(3, 0);
        
        
        $animal_data['animal'] = $this->animal_model->findAnimalByID($animal_id);
        
        $this->load_pages("animalUpdate", $animal_data);
        
    }
    
    function animalUpdateProcess(){
        $result = $this->animal_model->updateAnimal($_POST);
        if($result){
            //succes bildirisi göndermek gerek.
            $this->session->set_flashdata('message1', 'Hayvan veri tabanında güncellenmiştir.!!');
            redirect('animal_controller/listpage/1');
        }
        else{
            //error bildiris eklenecek.
            $this->session->set_flashdata('message0', 'Hata:güncelleştirme işlemi gerçekleştirilememiştir.');
            redirect('animal_controller/listpage/1');
        }
    }

            
    private function load_pages($page_name,$data = 0){
       
        
        $this->load->view('user/header');
        //sayfaya veri gönderirken bu şekilde gönderiliyor.
        // ancak $data['veriAdı'] şeklinde bir aray olmalı 
        // view dosyasında $veriAdı diye kullanabilriz.
        // örnek olarak customer_list fonksiyonuna bakılabilinir.
        if( $data != 0 )
            $this->load->view('animal/'.$page_name,$data);
        else
            $this->load->view('animal/'.$page_name);
        $this->load->view('user/footer');
    }
    
}

?>
