<?php if (!defined('BASEPATH')) die();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author arif
 */
class user_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }
    function check_login($username,$password){
        
        $sql = "SELECT username,name,surname,email 
                FROM kullanici 
                WHERE username = ? AND password = ?";

        $query = $this->db->query($sql, array($username,md5($password))); 
        
        if ( $query->num_rows() == 1 )
        {
            return $query->row(0);
        }
        else
            return 0;
   
    }
    function insert_user($username,$userRealname,$userRealsurname,$userEmail,$password){
        
        $sql = "INSERT INTO kullanici (username,name,surname,email,password) VALUES (?,?,?,?,?)";

        $query = $this->db->query($sql, array($username,$userRealname,$userRealsurname,$userEmail,md5($password))); 
        
        if (  $query == 1 )
        {
            return 1;
        }
        else
            return 0;
   
    }
    
    
}

?>
