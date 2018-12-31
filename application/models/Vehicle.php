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
            'marca'=>$data['marca'],
            'modelo'=>$data['modelo'],
            'kilometraje'=>$data['kilometraje'],
            'combustible'=>$data['combustible'],
        );
        $q = $this->db->insert_string('vehiculos',$vehiculo);
        $this->db->query($q);
        return $this->db->affected_rows();
    }


    public function addReservation($reserva){
        // $this->db->trans_start();
            $query= $this->db->insert_string('reserva',$reserva);
            $this->db->query($query);
        // $this->db->trans_complete();
        //
        // if ($this->db->trans_status() === FALSE){
        //     $this->db->trans_rollback();
        // }else{
        //      $this->db->trans_commit();
        // }
        return $this->db->affected_rows();
    }
    public function isDuplicate($placa){
        $this->db->get_where('vehiculos', array('placa' => $placa), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }
    public function getVehicles(){
        $query = $this->db->get('vehiculos');
        return $query->result();
    }
    public function getReservations(){
        $query = $this->db->get('reserva');
        return $query->result();
    }


    public function actualizarKilometraje($placa,$km){
        $this->db->trans_start();
            $this->db->where('placa', $placa);
            $this->db->update('vehiculos', array('kilometraje' => $km));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }
        else{
                $this->db->trans_commit();
            }
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;
    }

    public function actualizarCombustible($placa,$combustible){
        $this->db->trans_start();
            $this->db->where('placa', $placa);
            $this->db->update('vehiculos', array('combustible' => $combustible));
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }
        else{
                $this->db->trans_commit();
            }
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;

    }





}
