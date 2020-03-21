<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Model{
    
    public function getuser(){
        $data = $this->db->query("Select * from tb_user");
        return $data->result_array();
    }
    
    
    public function insertuser(){
        $data = $this->db->query("insert into tb_user (id_user, username, password, email, id_level, id_medsos, foto, tgllahir, aktivasi) values"
                . "");
    }
    
    
    public function aktivasiuser(){
        $data = $this->db->query("update tb_user set aktivasi ='1' where id_user = $iduser");
    }
    
    public function getlogin($username,$password){
            $this->db->select('a.user,a.id_level,a.id_user,c.status');
            $this->db->from('user a');
            $this->db->join('level_user b','a.id_level=b.id_level');
            $this->db->join('detail_person c','a.id_user=c.id_user','left');
            $this->db->where('a.user',$username);
            $this->db->where('a.password',$password);
            $query = $this->db->get();
            return $query->result();
    }
    
    public function is_members($facebook_user){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$facebook_user['id']);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return true;
        }else {
            return false;
        }
    }
    
    
    public function log_in($facebook_user){
        $data = array(
          'is_logged_in'=>1,
            'id_user' =>$facebook_user['id'],
            'name' =>$facebook_user['name'],
            'email' =>$facebook_user['email'],
        );        
        $this->session->set_userdata($data);
    }
    
    public function sign_up_facebook($facebook_user){
        if($facebook_user['email']!=""){
            $email = $facebook_user['email'];
        }elseif($facebook_user['picture']!=""){
               //$picture = $facebook_user['picture']['url'];
               foreach ($facebook_user['picture'] as $pict){
                   $picture = $pict['url'];
               }
        }
        else {
            $email = null;
            $picture = null;
        }
        $this->db->set(array(
        
          'id_user'=>$facebook_user['id'],
           'user'=>$facebook_user['name'],
           'email'=>$email,
           'password'=>NULL,
           'id_level'=>'3',
           'id_source'=>'1',
           'picture'=>$picture,
        ))->insert('user');
        
    }
    
    public function register_user($email,$username,$password,$picture,$iduser){
        $data = array(
            'id_user'=>  $iduser,
          'user'=>$username,  
          'email'=>$email,  
          'password'=>$password,  
          'id_level'=>'2',  
          'id_source'=>'1',
            'picture'=>$picture
        );
        $this->db->insert('user',$data);
    }

    public function register_anggota($email,$username,$password,$picture,$iduser){
        $data = array(
            'id_user'=>  $iduser,
          'user'=>$username,  
          'email'=>$email,  
          'password'=>$password,  
          'id_level'=>'3',  
          'id_source'=>'1',
            'picture'=>$picture
        );
        $this->db->insert('user',$data);
    }

    public function insert_anggota ($email, $id_user){
      $data = array(
        'id_user'=>$id_user,
        'email'=>$email,
        'id_person'=>'p-'.$id_user
      );
      $this->db->insert('detail_person',$data);
    }

    public function update_nama ($fullname){
      $data = array(
        'id_user'=>$this->session->userdata('id_user'),
        'person'=>$fullname,
        'status'=>'0',
      );
      $this->db->where('id_user',$this->session->userdata('id_user'));
      $this->db->update('detail_person',$data);
    }
    
    public function get_user($iduser){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$iduser);
        $query = $this->db->get();
        return $query->result_array();
    }
}

?>
