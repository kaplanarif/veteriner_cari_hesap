<?php if (!defined('BASEPATH')) die();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of process_model
 *bu model dosyası veteriner işlemlerini gerçekleştirmek için kullanılacak.
 * tohumlama, tedavi, hesap oluşturma gibi işlemler.
 * @author arif
 */
class process_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function add_process($data){
        extract($data);
      
    
        $sql = "INSERT INTO `isler`(`islem_id`, `m_id`, `h_id`, `islem_tarihi`, `aciklama`, `fiyat`, `islem_adi`)
            VALUES (NULL,?,?,CURRENT_TIMESTAMP,?,?,?)";
    
        $query = $this->db->query($sql, 
                array($process_customer,$process_animal,$process_note,$process_cost,$process_name));
        // bu sorgu ile işler tablosuna yapılan işlem eklenir.
        // eger başarılı bir kelme ise işlem fiyatı müsteri borc alanına eklenir.
        if ($query){
         
            $sql = "SELECT borc FROM musteri WHERE musteri_id = ?";
        
            $borc = $this->db->query($sql, array($process_customer))->row_array();
            //print_r($borc);
            $borc = $borc['borc'];
            $borc = $borc + $process_cost;
            
           
        
        
        
            $data = array('borc' => $borc);

            $where = array('musteri_id' => $process_customer); 

            $str = $this->db->update('musteri', $data, $where);
               
            if($str){
                return $process_customer;
                
            }
            else
                return 0;
            
        }else {
            return 0;
        }
    }
    function add_pay_info($id,$cost){
        $sql = "INSERT INTO `odemeler`(`id`, `m_id`, `miktar`, `tarih`) 
                        VALUES (NULL,?,?,CURRENT_TIMESTAMP)";
        
           
        $query = $this->db->query($sql,array($id,$cost));
        
        if($query){
            return 1;
        }else {
            return 0;
        }
    }
    
    function get_daily_payment(){
        
        $sql = "SELECT * FROM odemeler WHERE tarih>= DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY `tarih` DESC ";
        
        $query = $this->db->query($sql);
        
        if ($query)//bu statement her koşulda success veriyor
            return $query->result_array();
        
        else {
            return 0;
        }
    }
    
    function get_process($data){
        $sql = "SELECT * FROM isler WHERE m_id = ?";
        
        $query = $this->db->query($sql, array($data));
        
        if ($query)//bu statement her koşulda success veriyor
            return $query->result_array();
        
        else {
            return 0;
        }
    }
    function get_daily_process(){
       
        $sql = "SELECT * FROM isler WHERE islem_tarihi>= DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY `fiyat` DESC ";
        
        $query = $this->db->query($sql);
        
        if ($query)//bu statement her koşulda success veriyor
            return $query->result_array();
        
        else {
            return 0;
        }
    }
}

?>
