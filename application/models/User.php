<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public $roles;

    function __construct(){
            // Call the Model constructor
            parent::__construct();

            $this->roles = $this->config->item('roles');

    }
    public function addUser($data){
        $usuario = array(
            'nombre'=>$data['name'],
            'apellido1'=>$data['lastName'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'rol'=>$data['rol']
        );
        $q = $this->db->insert_string('usuarios',$usuario);
        $this->db->query($q);
        return $this->db->affected_rows();
      }
    //check is duplicate
    public function isDuplicate($email){
        $this->db->get_where('usuarios', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }
    //Obtiene la informacion de un solo usuarios
    public function getUserInfo($email){
        $q = $this->db->get_where('usuarios', array('email' => $email), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('No se pudo encontrar el usuario('.$email.')');
            return false;
        }
    }



    // Revisa si el email coincide con el password dados
    public function checkLogin($post) {
        $this->load->library('password');
        $this->db->select('*');
        $this->db->where('email', $post['email']);
        $query = $this->db->get('usuarios');
        $userInfo = $query->row();
        $count = $query->num_rows();

        if($count == 1){
            if(!$this->password->validate_password($post['password'], $userInfo->password))
            {
                error_log('Unsuccessful login attempt('.$post['email'].')');
                return false;
            }
        }else{
            error_log('Unsuccessful login attempt('.$post['email'].')');
            return false;
        }

        unset($userInfo->password);
        return $userInfo;
    }

    public function getUsers(){
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function editProfile($email, $post){
        $this->db->where('email', $email);
        $this->db->update('usuarios', array('email' => $post['email'], 'nombre' => $post['name'], 'apellido1' => $post['lastName']));
        $success = $this->db->affected_rows();

        if(!$success){
            return false;
        }
        return true;
    }
    public function deleteUser($email)
    {
        $this->db->where('email', $email);
        $this->db->delete('usuarios');

        if ($this->db->affected_rows() == '1') {
            return FALSE;
        }
        else {
            return TRUE;
        }
    }



}
