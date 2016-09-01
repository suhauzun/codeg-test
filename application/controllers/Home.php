<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
   $this->load->model('user');
   $this->load->helper(array('form'));
   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 }

function index(){
   if($this->session->userdata('logged_in'))
   {
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $data['role'] = $session_data['role'];
    $data['users'] = $this->user->getAllUsers();
    $this->load->view('home_view', $data);
   }else{
     redirect('login', 'refresh');
   }
}

// Burada aynı data var mı diye bakıyor
public function checkUsername($username){
  $result = $this->user->checkUsernameModel($username);
  return $result;
}
// Kullanıcı adı şifre ve pass insert edilen yer
public function deneme(){
  if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['role'] = $session_data['role'];
      $data['users'] = $this->user->getAllUsers();



      // Burada aynı data var mı diye bakıyor
      $username = $_POST['username'];
      $password = $_POST['password'];
      $role =  $_POST['role'];


          $result = $this->checkUsername($data['username']); 
          
          if($result > 0){
            $data['message'] = "Boyle bi adam var";
            redirect('home',$data); 
            exit();
          }

          
          if($username == "" || $password == ""){
            $data['message'] = "Bu alanlar boş bırakılamaz";
            redirect('home',$data); 
            exit();
          }

 
         
      
      $result = $this->user->deneme($username,$password,$role);
      if($result){
        redirect('home','refresh');
      }else{
        redirect('login', 'refresh');
      }


  }
}

public function activedUser(){
  $userId = $_POST['userId'];
  $this->user->ActivedUserData($userId);
  redirect('home', 'refresh');
}

public function removeUser(){
  $userId = $_POST['userId'];
  $this->user->removeUserData($userId);
  redirect('home', 'refresh');
}

public function solData(){
  $userId = $_POST['userId'];
  $this->user->sol2Data($userId);
  redirect('home', 'refresh');
}

public function updateUser(){
  $userId = $_POST['userId'];
  $username = $_POST['username'];
  $this->user->update2User($userId,$username);
  redirect('home', 'refresh');
}





public function changePassword(){
  if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $data['username'] = $session_data['username'];
    $id = $this->input->get_post('id');
    $data['userId'] = $session_data['id'];
    $this->load->view('change_password_view', $data);
  }else{
    redirect('login', 'refresh');
  }
}

public function changeYourPassword(){
  $oldPassword = $_POST['oldPassword'];
  $newPassword = $_POST['newPassword'];
  $newPassword2 = $_POST['newPassword2'];
  $userId = $_POST['userId'];
  $session_data = $this->session->userdata('logged_in');
  $checkOldPassword = $this->user->checkPassword($userId,$oldPassword);
  if($checkOldPassword =='1'){
            if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $data['message'] = "Şifrenizi yanlış girdiniz. Lütfen tekrar deneyin.";
             $data['userId'] = $session_data['id'];
             $this->load->view('change_password_view', $data);
           }
           else
           {
             redirect('login', 'refresh');
           }
  }elseif($newPassword != $newPassword2){
           $data['message2'] = "Şifreler aynı değil. Lütfen tekrar deneyin.";
           if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $role = $session_data['role'];
             $data['message'] = "Şifreler aynı değil. Lütfen tekrar deneyin.";
             $data['userId'] = $session_data['id'];
             $this->load->view('change_password_view', $data);
           }else{
             redirect('login', 'refresh');
           }
  }else{
          $this->user->updatePassword($userId,$newPassword);
          redirect('home',$data);
  }
}



 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

 
}
 
?>