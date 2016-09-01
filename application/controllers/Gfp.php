<?php

class Gfp extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->database();
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
      }

      public function index()
      {
       
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
 
       if ($this->form_validation->run() == FALSE)
      {
             $this->load->view('email_check');
       }
       else
      {
         $email= $this->input->post('email');

$this->load->helper('string',6);
$rs= random_string('alnum', 12);

$data = array(
               'rs' => $rs
            );

$this->db->where('emailAddress', $email);
$this->db->update('users', $data);




//now we will send an email

              $config['protocol'] = 'smtp';
              $config['smtp_host'] = 'ssl://smtp.googlemail.com';
              $config['smtp_port'] = 465;
              $config['smtp_user'] = 'suha.uzun@kafein.com.tr';
              $config['smtp_pass'] = 'Mr258907';
       
          
              $this->load->library('email', $config);
              $this->email->set_newline("\r\n");

$this->email->from('suha.uzun@kafein.com.tr', 'Süha Uzun');
$this->email->to($email);

$this->email->subject('Test Password');
$this->email->message('Şifreniniz yenilemek için aşağıdaki linke tıklayın
        http://localhost/codeg/get_password/index/'.$rs );

$this->email->send();
echo "Şifrenizi yenilemek için email adresinizi kontrol edin!";

redirect (home, location);
       }
 }

      public function email_check($str)
      {
$query = $this->db->get_where('customers', array('emailAddress' => $str),1 );
 
      if ($query->num_rows()== 1)
      {
             return true;
            }
            else
            {    
             $this->form_validation->set_message('email_check', 'Böyle bir email adresi yok!');
       return false;

      }
   }    
}