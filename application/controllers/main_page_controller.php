<?php if (!defined('BASEPATH')) die();
/*
 * Ana sayfadaki kontorller bu controller içinde yapılcak.
 * 
 */
class main_page_controller extends CI_Controller {

    public function index()
    {
      
        $this->load_pages('main_page');
         
    }
    
    public function contact_us(){
        $this->load_pages('templates/contact');
    }
    
    public function contact_message(){
        if(isset($_POST)){
            $this->session->set_flashdata('message1', 'Mesajınız alınmıştır. En kısa zamanda size geri dönüş yapılacaktır..');
            redirect('main_page_controller/contact_us');
        }
        else{
             $this->session->set_flashdata('message0', 'Üzgünüz bir hata oluştu!! Lütfen daha sonra tekrar deneyiniz..');
            redirect('main_page_controller/contact_us');
        }
        print_r($_POST);
    }

    public function about(){
        $this->load_pages('templates/about_view');
    }

    public function login(){
        //session varsa direk kullanıcı ana sayfaya yönlendiriyor.
        if( $this->session->userdata('logged_in') )
            redirect('user_page_controller');
            
            
        $this->load_pages('templates/login_form');
       
    }
    public function new_user(){
        
        $this->load_pages('templates/new_user_form');
        
    }

    private function load_pages($page_name){
        
        $this->load->view('include/header');
        $this->load->view($page_name);
        $this->load->view('include/footer');
        
    }
   
}

/* End of file frontpage.php */
/* Location: ./application/controllers/frontpage.php */
