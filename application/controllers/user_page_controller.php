<?php if (!defined('BASEPATH')) die();
class user_page_controller extends CI_Controller {

    public function index(){
       if( $this->session->userdata('logged_in') ){
           
           $this->load_pages('user_main'); //burada user ana sayfası yüklenir.
            
        } 
    }
    public function login_process() {
        /*
         * 
         * bu fonksiyonda model dosyasında sorgu istenilecek 
         * ve kullanıcı olup olmadığına göre işlem yapılcak.
         * 
         */
        
        if( $this->session->userdata('logged_in') ){
            //giriş yapmış biri bir şekilde login formunu açarsa direk yönlendirir.
            redirect('user_page_controller');
        }
        else{
            extract($_POST); // exract fonksiyonu form nameine göre değişkenlere atıyor
            
            // hack olayların karşın alınan inputtaki sql ifadeleri temizlerinir
            $user_name = xss_clean($user_name);
            $user_pass = xss_clean($user_pass);
         
            $this->load->model('user_model');
            
            $user = $this->user_model->check_login($user_name,$user_pass);
            /*
             * $user bir class 
             * username,name,surname,email
             * degişkinlerine sahiptir. 
             */
            if ( isset($user->username) ){
                //giriş başarı ise kullanıcı anasayfası yüklenir.
              
                $this->session->sess_destroy();
                $this->session->sess_create();
                $this->session->set_userdata('logged_in',TRUE); 
                $this->session->set_userdata('username',$user->username);
                $this->session->set_userdata('name',$user->name);
                $this->session->set_userdata('surname',$user->surname);
                 
               
                redirect('user_page_controller');
            }
            else{
                // kullanıcı bilgileri yanlış demektir.
                // hata mesaji için get ile error kodu göndermek gerek
                $this->session->set_flashdata('message0', 'Hata: Kullanıcı adı/ şifre yanlış. Tekrar deneyiniz.');
                redirect('main_page_controller/login');
            }
            
        }
        
    }
    
    public function new_user_process(){
        /*
         * 
         * bu fonksiyonda model yeni kullanıcı oluşturulacak
         * kullanıcı adı ve email var mı kontrol edilir ve uygunsa yeni veri tabanı oluşturulur
         *  $user_name = xss_clean($user_name);
         $user_pass = xss_clean($user_pass);
         $use
        
         */
        extract($_POST);
        $new_user_name = xss_clean($new_user_name);
        $new_user_realName = xss_clean($new_user_realName);
        $new_user_realSurname = xss_clean($new_user_realSurname);
        $new_user_email = xss_clean($new_user_email);
        $new_user_password = xss_clean($new_user_password);
         
            $this->load->model('user_model');
        
        $newuser = $this->user_model->insert_user($new_user_name, $new_user_realName,$new_user_realSurname,$new_user_email,$new_user_password);
        if($newuser == 1)
            redirect('main_page_controller/login');
        
        else
            redirect ('main_page_controller/new_user');
    }
    
  
    function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
     private function load_pages($page_name){
        
        $this->load->view('user/header');
        $this->load->view('user/'.$page_name);
        $this->load->view('user/footer');
     }
    
}  
?>