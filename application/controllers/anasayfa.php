<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anasayfa extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

      public function index() {

		    $this->load->model('anasayfa_model'); // Model dosyamızı çağırıyoruz

		    $veriler = $this->anasayfa_model->get_sayfa_verileri(); // Model'deki fonksiyonumuz...

		    $data['title'] = $veriler['title'];
		    $data['description'] = $veriler['description'];
		    $data['keywords'] = $veriler['keywords'];
		    $this->load->view('anasayfa_view',$data);
		}
}