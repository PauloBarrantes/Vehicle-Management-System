<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Model {


    function __construct(){
            // Call the Model constructor
            parent::__construct();
    }
    public function addVehicle($data){
        $vehiculo = array(
            'placa'=>$data['placa'],
            'kilometraje'=>$data['kilometraje'],
            'combustible'=>$data['combustible'],
        );
        $q = $this->db->insert_string('vehiculos',$vehiculo);
        $this->db->query($q);
        return $this->db->insert_id();
      }




}
