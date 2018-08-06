<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicles extends CI_Controller {


	public function index(){
        $data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('MainViews/index');
        $this->load->view('MainViews/footer');

	}

	public function vehicles(){
		$data['title'] = "vehículos";
		$this->load->view('MainViews/header',$data);
		$this->load->view('MainViews/login');
		$this->load->view('MainViews/footer');

	}


}
