<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {


	public function index(){
        $data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('MainViews/index');
        $this->load->view('MainViews/footer');

	}

    public function agregarVehiculo(){
        $data['title'] = "vehículos";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/login');
        $this->load->view('MainViews/footer');

    }
    public function reservar(){
        $data['title'] = "vehículos";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);

        $this->load->view('Vehicles/reservation');
        $this->load->view('MainViews/footer');

    }



}
