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


		}

		public function mantenimiento(){


		}





}
