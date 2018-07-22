<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function index()
	{
        $data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('MainViews/index');
        $this->load->view('MainViews/footer');

	}
}
