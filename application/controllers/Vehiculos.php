<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {


	public function index(){
		$data = $this->session->userdata;

        $data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('Vehicles/listVehicles',$data);
        $this->load->view('MainViews/footer');

	}

    public function agregarVehiculo(){
		$data = $this->session->userdata;

		if(empty($data)){
			redirect(site_url().'main/login/');
		}
		if(empty($data['rol'])){
			redirect(site_url().'main/login/');
		}
		$dataLevel = $this->userlevel->checkLevel($data['rol']);
		if (empty($this->session->userdata['email'])) {
			redirect(site_url().'main/login/');
		}else {



    		$data['title'] = "Nuevo Vehículo";
    		$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);
			$this->load->view('Vehicles/addVehicle');
    		$this->load->view('MainViews/footer');
		}
    }

    public function misReservaciones(){
		$data = $this->session->userdata;

        $data['title'] = "Mis reservaciones";
        $this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('Vehicles/reservations');
        $this->load->view('MainViews/footer');

    }
    public function reservar(){
		$data = $this->session->userdata;

        $data['title'] = "Reservación";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);

        $this->load->view('Vehicles/reservation');
        $this->load->view('MainViews/footer');
    }

		public function listaReservas(){
			$data = $this->session->userdata;


		}
		public function controlDeUso(){
			$data = $this->session->userdata;

			$data['title'] = "Reservación";
	        $this->load->view('MainViews/header',$data);
	        $this->load->view('MainViews/sidebar',$data);

	        $this->load->view('Vehicles/usageControl');
	        $this->load->view('MainViews/footer');


		}

		public function mantenimiento(){
			$data = $this->session->userdata;

			$data['title'] = "Mantenimiento";
			$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);

			$this->load->view('Vehicles/maintenance');
			$this->load->view('MainViews/footer');

		}





}
