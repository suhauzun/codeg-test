<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anasayfa_model extends CI_Model
{   
    function __construct() {  }

    public function get_sayfa_verileri()
    {
        $this->db->select('title,description,keywords');
        $this->db->from('home');
        $sorgu = $this->db->get();
        $satir = $sorgu->row_array();
        return $satir;
    }
 }