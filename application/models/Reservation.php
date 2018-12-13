<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Model {


    function __construct(){
            // Call the Model constructor
            parent::__construct();
    }
    public function addReservation($data){
        $string = array(
            'FechaInicio'=>$data['fechaInicio'],
            'HoraInicio'=>$data['horaInicio'],
            'emailUsuario'=>$data['emailUsuario'],
            'FechaFinalizacion'=>$data['fechaFinalizacion'],
            'HoraFinalizacion'=>$data['horaFinalizacion'],
            'TodoElDia'=>$data['todoElDia'],
            'VariosDias'=>$data['variosDias']
        );
        $q = $this->db->insert_string('reserva',$string);
        $this->db->query($q);
        return $this->db->insert_id();
      }
    //check is duplicate
      public function isAlreadyReserved($fechaInicio, $horaInicio, $horaFin, $fechaFin){
          $date = new DateTime($fechaInicio);
          $dateFormat = $date->format('Y-m-d');
          $date2 = new DateTime($fechaFin);
          $dateFormat2 = $date2->format("Y-m-d");
          $this->db->select('*');
          $this->db->from('reserva');
          $this->db->where("FechaInicio >=", $dateFormat);
          $this->db->where("FechaFinalizacion <=", $dateFormat2);
          $this->db->where("HoraInicio >=", $horaInicio);
          $this->db->where("HoraFinalizacion <=", $horaFin);
          $this->db->get();

          return $this->db->affected_rows() > 0 ? TRUE : FALSE;
      }
      public function getReservations(){
            $this->db->select('EmailUsuario,
                FechaFinalizacion,
                FechaInicio,
                HoraFinalizacion,
                HoraInicio,
                PlacaVehiculo,
                nombre')
            ->from('reserva')
            ->join('usuarios', 'usuarios.email = reserva.EmailUsuario');
            $query = $this->db->get();
            return $query->result();
      }
      public function getReservationByEmail($email){
          $query = $this->db->get_where('reserva', array('EmailUsuario' => $email));
          return $query->result();
      }



}
