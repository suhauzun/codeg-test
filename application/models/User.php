<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this->db->select('id, username, password, role');
   $this->db->from('users');
   $this->db->where('username', $username);
   $this->db->where('password', MD5($password));
   $this->db->limit(1);
   $query = $this->db->get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 } 


public function checkPassword($userId,$oldPasswod){
 
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('password',md5($oldPasswod));
  $this->db->where('id',$userId);
  $query = $this->db->get();
  if($query->num_rows() == 1){
    return '2';
  }else{
    return '1';
  }
  
}


public function updatePassword($userId,$newPassword){

  $data=array('password' => md5($newPassword));
  $this->db->where('id',$userId);
  $this->db->update('users',$data);
  return TRUE;
 
}


  function deneme($username,$password,$role,$status){
      $data = array('username' => $username,'password' => md5($password),'role' => $role);
      $this->db->insert('users',$data);
      $userId = $this->db->insert_id();
      return TRUE;
  }



  //Tüm kullanıcıları çekmek için kullanıyoruz
  public function getAllUsers(){
    $this->db->select('*');
    $this->db->from('users');
    $query = $this->db->get();
    
    if($query -> num_rows() > 0)
    {
     return $query->result();
    }else{

    return FALSE;
    }
  }


  public function checkUsernameModel($username){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('username', $username);
    $query = $this->db->get();
    if($query -> num_rows() > 0)
    {
     return $query->num_rows();
    }else{
    return 0;
    }
  }


  //Status değerini aktive ve pasife çekmek için kullanıyoruz.
  public function removeUserData($userId){
  $data = array('status' => '1');
  $this->db->where('id' , $userId);
  $this->db->update('users',$data);
  return TRUE;
  }

  public function ActivedUserData($userId){
    $data = array('status' => '0');
    $this->db->where('id' , $userId);
    $this->db->update('users',$data);
    return TRUE;
  }

  public function sol2Data($userId){
    $this->db->where('id', $userId);
    $this->db->delete('users');
  //  print_r($this->db->last_query()); exit();
    return TRUE;
  }
  public function update2User($userId,$username){
  $data = array('username' => $username);
  $this->db->where('id',$userId);
  $this->db->update('users',$data);
  return TRUE;
}


}


?>



