<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {


	public function index(){
        $data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('Vehicles/listVehicles',$data);
        $this->load->view('MainViews/footer');

	}

    public function agregarVehiculo(){
        $data['title'] = "Nuevo Vehículo";
        $this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('Vehicles/addVehicle');
        $this->load->view('MainViews/footer');

    }

    public function misReservaciones(){
        $data['title'] = "Mis reservaciones";
        $this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('Vehicles/reservations');
        $this->load->view('MainViews/footer');

    }
    public function reservar(){
        $data['title'] = "Reservación";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);

        $this->load->view('Vehicles/reservation');
        $this->load->view('MainViews/footer');
    }

		public function listaReservas(){

		}
		public function controlDeUso(){
			$data['title'] = "Reservación";
	        $this->load->view('MainViews/header',$data);
	        $this->load->view('MainViews/sidebar',$data);

	        $this->load->view('Vehicles/usageControl');
	        $this->load->view('MainViews/footer');


		}

		public function mantenimiento(){
			$data['title'] = "Mantenimiento";
			$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);

			$this->load->view('Vehicles/maintenance');
			$this->load->view('MainViews/footer');

		}





}
