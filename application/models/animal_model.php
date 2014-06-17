<?php if (!defined('BASEPATH')) die();

/*
 * Contorlller  => animal_control
 * bu model dosyası 
 *          veritabanında bulununan hayvan tablosu ile ilgili sorugulurı
 *       gerçekleştirmek için oluşturulumuştur.
 */
class animal_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }
    
    function list_Animals(){
        $sql = "SELECT * FROM hayvan";
        
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
    
    function list_Animals_byPage($pageNumber){
        $sql = "SELECT * FROM hayvan LIMIT ?,5 ";
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
        $query = $this->db->query("SELECT * FROM hayvan");
        
        return $query->num_rows;        
    }
            
    function add_animal($data){
        extract($data);
        
        $sql = "INSERT INTO hayvan (`h_id`,`m_id`, `kayit_tarihi`, `dogum_tarihi`, `kulak_no`, `not`, `h_adi`) 
            VALUES (NULL,?, CURRENT_TIMESTAMP,?,?,?,?)";
    
        $query = $this->db->query($sql, array($animal_SahipNo,$birth_Date,$animal_KulakNo,$animal_Notes,$animal_name));
        
        if ($query)
            return 1;
        
        else {
            return 0;
        }
    }
    
    function animal_Search($data){
         $query = $this->db->select('*')->from('hayvan')->like('h_adi', $data)->get();
         
         if ($query)
             return $query->result_array();
         else
             return 0;
         
    }
    function deleteAnimal($data){
        $sql = "DELETE FROM hayvan WHERE h_id = ?";
        
        $query = $this->db->query($sql, array($data));
        
        if ($query)//bu statement her koşulda success veriyor
            return $query;
        
        else {
            return 0;
        }
    }
    
    function findAnimalByID($data){
        $sql = "SELECT * FROM hayvan WHERE h_id = ?";
        
        $query = $this->db->query($sql, array($data));
        
        if ($query)//bu statement her koşulda success veriyor
            return $query->row_array();
        
        else {
            return 0;
        }
    }
    
    function findAnimalNameByID($data){
        $sql = "SELECT h_adi FROM hayvan WHERE h_id = ?";
        
        $query = $this->db->query($sql,array($data));
        $query = $query->row_array();
        $name = $query['h_adi'];
        if($name !=NULL){
           
           return $name;
        }
        
        else{
            return 0;
        }
        
    }
    function findAnimalKNByOwner($data){
        $sql = "SELECT kulak_no FROM hayvan WHERE m_id = ?";
        
        $query = $this->db->query($sql,array($data));
        $query = $query->row_array();
        $name = $query['kulak_no'];
        if($name !=NULL){
           
           return $name;
        }
        
        else{
            return 0;
        }
    }
            
    function updateAnimal($data){
        extract($data);
        $sql = "UPDATE hayvan
                SET h_adi = ?, kulak_no = ?, dogum_tarihi = ?, not = ?
                WHERE h_id = ?";
        
        //$query = $this->db->query($sql,array($animal_name,$animal_KulakNo,$birth_Date,$animal_Notes,$animal_id));
        
        $data = array('h_adi' => $animal_name, 'kulak_no' => $animal_KulakNo, 'dogum_tarihi' => $birth_Date, 'not' => $animal_Notes);

        $where = array('h_id' => $animal_id); 

        $str = $this->db->update('hayvan', $data, $where);
        
        
        if($str)
            return 1;
        else
            return 0;
        
}
        function get_animals_for_customer($m_id){
            $sql = "SELECT * FROM hayvan WHERE m_id=?";
        
            $query = $this->db->query($sql,array($m_id));

            if($query->num_rows > 0 ){
                //müsterilerin tümmü çeken sorgu bunu bir array formatı ile return
                // etmektedir.
                return $query->result_array();
            }

            else{
                return 0;
            }
            
        }
}

?>