<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Register extends CI_Model{
    
    public function gettimetutor($idtutor){
        $data = $this->db->query("SELECT sm_timetutor.id_day,sm_day.day, sm_tutor.nama_tutor,sm_timetutor.id_time "
                . "FROM `sm_timetutor` "
                . "join sm_tutor ON sm_tutor.id_tutor = sm_timetutor.id_tutor "
                . "INNER JOIN sm_day on sm_timetutor.id_day = sm_day.id_day "
                . "INNER JOIN sm_time ON sm_timetutor.id_time=sm_time.id_time "
                . "WHERE sm_tutor.id_tutor='1'"
                . "GROUP BY sm_timetutor.id_day"
                );
        return $data->result_array();
    }
    
    public function gettimebyday($idtutor,$idday){
        $data = $this->db->query("SELECT sm_tutor.nama_tutor, sm_time.time, sm_day.day, sm_day.id_day, sm_time.id_time 
            FROM `sm_timetutor` join sm_tutor ON sm_tutor.id_tutor = sm_timetutor.id_tutor
               INNER JOIN sm_day on sm_timetutor.id_day = sm_day.id_day
               INNER JOIN sm_time on sm_timetutor.id_time = sm_time.id_time
                WHERE sm_tutor.id_tutor='$idtutor' and sm_day.id_day='$idday'");
        return $data->result_array();
    }
    
    public function getwaktu(){
        $data = $this->db->query("select * from sm_waktu");
        return $data->result_array();
    }

    

    public function insertuser($kode, $id, $name, $email,$picture, $password){
        
        
        if($kode == 1){
            $query = "insert into user (id_user, name, email, password, id_level, id_source, picture) values ('$id', '$name', '$email','', '2', '$kode', '$picture' )";
            $this->db->query($query);
        }else if($kode == 2){
            $query = "insert into user (id_user, name, email, password, id_level, id_source, picture) values ('$id', '$name', '$email','', '2', '$kode', '$picture' )";
            $this->db->query($query);
        }else {
            $query = "insert into user (id_user, name, email, password, id_level, id_source, picture) values ('$id', '$name', '$email','$password', '2', '$kode', '$picture' )";
            $this->db->query($query);
        }
        
    }
    
    public function checkuser($id){
        $query = "select id_user from user where id_user = '$id'";
        return $this->db->query($query)->result();
    }
    
    public function getuser($email, $password){
        $data = $this->db->query("select * from user where email = '$email' and password = '$password'");
        return $data->result_array();
    }


    
    public function aktivasiuser(){
        $data = $this->db->query("update tb_user set aktivasi ='1' where id_user = $iduser");
    }
}

?>
