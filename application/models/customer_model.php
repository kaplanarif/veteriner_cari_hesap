<?php if (!defined('BASEPATH')) die();

/**
 * Description of customer_model
 * bu model dosyası customer_controller dosyasındaki
 * müsteri işlemlerindeki veri tabanı kullanımı içindir.
 *
 * @author arif
 */
class customer_model extends CI_Model {
    
    function get_customer($id){
        
        $sql = "SELECT * FROM musteri WHERE musteri_id = ?";
        
        $query = $this->db->query($sql,array($id));
        if($query->num_rows > 0 ){
            //tek bir satır döndürmek için row_array kullanılır.
            return $query->row_array();
        }
        
        else{
            return 0;
        }
        
    }
    
    function list_Customers_byPage($pageNumber){
        $sql = "SELECT * FROM musteri LIMIT ?,5 ";
        $query = $this->db->query($sql,array(($pageNumber-1)*5));
        
        if($query->num_rows > 0 ){
            //müsterilerin tümmü çeken sorgu bunu bir array formatı ile return
            // etmektedir.
            return $query->result_array();
        }
        
        else{
            return 0;
        }
    }
    function rowNum(){
        $query = $this->db->query("SELECT * FROM musteri");
        
        return $query->num_rows;        
    }
            
    function getNamebyID($id){
        $sql = "SELECT ad,soyad FROM musteri WHERE musteri_id = ?";
        
        $query = $this->db->query($sql,array($id));
        $query = $query->row_array();
        $name = $query['ad']." ".$query['soyad'];
        if($name !=NULL){
           
           return $name;
        }
        
        else{
            return 0;
        }
        
        
    }
            
    function list_customers(){
        $sql = "SELECT * FROM musteri";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows > 0 ){
            //müsterilerin tümmü çeken sorgu bunu bir array formatı ile return
            // etmektedir.
            return $query->result_array();
        }
        
        else{
            return 0;
        }
    }
    
    function list_customers_are_dept(){
        $sql = "SELECT `musteri_id`, `ad`, `soyad`, `borc` FROM `musteri` WHERE `borc`> 0 ORDER BY `borc` DESC";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows > 0 ){
            //müsterilerin tümmü çeken sorgu bunu bir array formatı ile return
            // etmektedir.
            return $query->result_array();
        }
        
        else{
            return 0;
        }
    }
    function add_customer($data){
        extract($data);
        
        $sql = "INSERT INTO musteri (`musteri_id`, `ad`, `soyad`, `telefon`, `adres`, `kayit_tarihi`) 
            VALUES (NULL, ?,?,?,?,CURRENT_TIMESTAMP)";
    
        $query = $this->db->query($sql, 
                array($customer_name,$customer_surname,$customer_phone,$customer_address));
        
        if ($query)
            return 1;
        
        else {
            return 0;
        }
    }
    function delete_customer($id){
        $sql = "DELETE FROM musteri WHERE musteri_id = ?";
        
        $query = $this->db->query($sql, array($id));
        
        if ($query)//bu statement her koşulda success veriyor
            return $query;
        
        else {
            return 0;
        }
    }
    
    function customer_Search($data){
        
         $query = $this->db->select('*')
                 ->from('musteri')
                 ->like('ad', $data)
                 ->or_like('soyad',$data)
                 ->get();
         
         if ($query)
             return $query->result_array();
         else
             return 0;
         
    }
    
    function updateCustomer($data){
        extract($data);
        $sql = "UPDATE musteri
                SET ad = ?, soyad = ?, telefon = ?, adres = ?, kayit_tarihi = ?
                WHERE musteri_id = ?";
        
        //$query = $this->db->query($sql,array($animal_name,$animal_KulakNo,$birth_Date,$animal_Notes,$animal_id));
        
        $data = array('ad' => $customer_name, 'soyad' => $customer_surmane, 'kayit_tarihi' => $reg_date, 'telefon' => $telephone, 'adres' => $address);

        $where = array('musteri_id' => $customer_id); 

        $str = $this->db->update('musteri', $data, $where);
        
        
        if($str)
            return 1;
        else
            return 0;
    }
    
    function updateCustomerDept($id,$cost){
        $sql = "UPDATE musteri
                SET borc = ?
                WHERE musteri_id = ?";
        
        //$query = $this->db->query($sql,array($animal_name,$animal_KulakNo,$birth_Date,$animal_Notes,$animal_id));
        
        $data = array('borc' => $cost );

        $where = array('musteri_id' => $id); 

        $str = $this->db->update('musteri', $data, $where);
        
        
        if($str)
            return 1;
        else
            return 0;
        
    }
            
    function findCustomerByID($id){
        $sql = "SELECT * FROM musteri WHERE musteri_id = ?";
        
        $query = $this->db->query($sql, array($id));
        
        if ($query)//bu statement her koşulda success veriyor
            return $query->row_array();
        
        else 
            return 0;
    }
   
}

?>
