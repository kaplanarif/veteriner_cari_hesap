<?php
if (!defined('BASEPATH')) die();

/*
 * burada model olarak process model kullanıcalacak.
 * login girişin construct içinde kontrol edildigi için diğer fonksiyonlarda
 * terkar kontrol edilmesinie gerek yok.
 * model yükleme işleminde tek bir yerde construct içinde yapılmıştır.
 * 
 * Günlük veya aylık gelir-gider tabloları burada ayarlanacak.
 * 
 */
class financial_controller extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        if( $this->session->userdata('logged_in') ){
            //kulllanıcı login olduysa bu class 
            //içindeki işlemleri gerçekleştirebilr.
            $this->load->model('process_model');
        }else
            redirect('main_page_controller/login');
        //login olmadan bu sayfaya erişim saglanırsa
        //login ekranına yönlendirilir.
       
    }
        
    public function index(){
        
        $this->load->model('animal_model');
        $this->load->model('customer_model');
        $customer_data['list'] = $this->customer_model->list_customers_are_dept();
        $customer_data['payment'] = $this->process_model->get_daily_payment();
        $customer_data['process'] = $this->process_model->get_daily_process();
        
        for($i = 0; $i<count($customer_data['process']); $i++){
            $customer_data['process'][$i]['h_id'] = $this->animal_model->findAnimalKNByOwner($customer_data['process'][$i]['m_id']);
            $customer_data['process'][$i]['sahip_adi'] = $this->customer_model->getNamebyID($customer_data['process'][$i]['m_id']);
        }
        
        for($q=0; $q<count($customer_data['payment']); $q++){
            $customer_data['payment'][$q]['customer'] = $this->customer_model->getNamebyID($customer_data['payment'][$q]['m_id']);
        }
        
        //sayfayı yüklerken sayfaya veride gönderbiliyorz.
        $this->load_pages('financial_main',$customer_data);//gönderilen data $list şeklinde
    }
      

     private function load_pages($page_name,$data=0){
        
        $this->load->view('user/header');
        if( $data != 0 )
            $this->load->view('financial/'.$page_name,$data);
        else
            $this->load->view('financial/'.$page_name);
        $this->load->view('user/footer');
     }
}
?>
