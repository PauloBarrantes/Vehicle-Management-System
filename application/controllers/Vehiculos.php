<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('User', 'user_model', TRUE);
			$this->load->model('Vehicle', 'vehicle_model', TRUE);
			$this->load->model('Reservation', 'reservation_model', TRUE);

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->roles = $this->config->item('roles');
			$this->load->library('userlevel');
		}

	public function index(){
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
			if ($data['rol'] == 1) {
				$data = $this->session->userdata;
		        $data['title'] = "Inicio";
				$data['vehiculos'] = $this->vehicle_model->getVehicles();
		        $this->load->view('MainViews/header',$data);
		        $this->load->view('MainViews/sidebar',$data);
				$this->load->view('Vehicles/listVehicles',$data);
		        $this->load->view('MainViews/footer');
			}else{
				redirect(site_url().'main/');
			}

		}

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

			$this->form_validation->set_rules('placa','Placa','required');
			$this->form_validation->set_rules('marca','Modelo','required');
			$this->form_validation->set_rules('modelo','Correo Electrónico','required');
			$this->form_validation->set_rules('kilometraje','Rol','required');
			$this->form_validation->set_rules('combustible','Contraseña','required');
			$data['title'] = "Nuevo Vehículo";

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('MainViews/container');
				$this->load->view('Vehicles/addVehicle', $data);
				$this->load->view('MainViews/footer');
			}else{
				if ($this->vehicle_model->isDuplicate($this->input->post('placa'))) {
					$this->session->set_flashdata('flash_message','El vehículo con esta placa ya está registrado');
					redirect(site_url().'main/agregarVehiculo');
				}else {
					$post = $this->input->post(NULL, TRUE);
					//Acá lo insertamos en la base de datos
					if (!$this->vehicle_model->addVehicle($post)) {
						$this->session->set_flashdata('flash_message','Existe un problema guardando el vehículo');
					}else{
						$this->session->set_flashdata('success_message','Vehículo guardado con éxito');
					}
					redirect(site_url().'vehiculos/');
				}


			}



		}
    }

    public function misReservaciones(){
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
			$data = $this->session->userdata;
			$data['title'] = "Mis Reservas";
			$data['reservas'] = $this->reservation_model->getReservationByEmail($data['email']);
			$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);
			$this->load->view('Vehicles/reservations',$data);
			$this->load->view('MainViews/footer');
		}


    }
    public function reservar(){
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
			$this->form_validation->set_rules('carros','Vehículo','required');
			$this->form_validation->set_rules('fechaSalida','Fecha de Salida','required');
			$this->form_validation->set_rules('horaSalida','Hora de Salida','required');
			$this->form_validation->set_rules('horaLlegada','Hora de Llegada','required');


			$data['title'] = "Reservación";
			$data['vehiculos'] = $this->vehicle_model->getVehicles();
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('MainViews/container');
				$this->load->view('Vehicles/reservation', $data);
				$this->load->view('MainViews/footer');
			}else{
				if(!$this->reservation_model->isAlreadyReserved(
					$this->input->post('fechaSalida'),
					$this->input->post('horaSalida'),
					$this->input->post('horaLlegada'),
					$this->input->post('fechaLlegada')))

				{
					$this->session->set_flashdata('flash_message','El vehículo ya está reservado para esa hora');
					redirect(site_url().'vehiculos/reservar');
					}else{
						$post = $this->input->post(NULL, TRUE);

						$fechaSalida1 = new DateTime($post['fechaSalida']);
						$fechaLlegada1 = new DateTime($post['fechaLlegada']);

						$reserva = array(
							'FechaInicio'		=> 	$fechaSalida1->format("Y-m-d H:i:s"),
							'HoraInicio'		=>	$post['horaSalida'],
							'PlacaVehiculo'		=>	$post['carros'],
							'EmailUsuario'		=>	$data['email'],
							'FechaFinalizacion'	=>	$fechaLlegada1->format("Y-m-d H:i:s"),
							'HoraFinalizacion'	=>	$post['horaLlegada'],
							'TodoElDia'			=>	0,
							'VariosDias'		=>	0
						);
						if (!$this->vehicle_model->addReservation($reserva)) {
							$this->session->set_flashdata('flash_message','Existe un problema realizando la reserva');
						}else{
							$this->session->set_flashdata('success_message','Reserva realizada con éxito');
						}
						redirect(site_url().'main/');
					}
			}
		}


    }
	public function controlDeUso(){
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
			$data['title'] = "Control de Uso";
			$data['vehiculos'] = $this->vehicle_model->getVehicles();
			$data['reservasSalida'] = $this->reservation_model->getReservationByEmail($data['email']);
			$data['reservasEntrada'] = $this->reservation_model->getReservationByEmail($data['email']);


			if (isset ($_POST['enviarSalida'])){

				$this->form_validation->set_rules('carros','Vehículo','required');
				$this->form_validation->set_rules('fechaSalida','Fecha de Salida','required');
				$this->form_validation->set_rules('horaSalida','Hora de Salida','required');
				$this->form_validation->set_rules('horaLlegada','Hora de Llegada','required');


				if ($this->form_validation->run() == FALSE) {
					$this->load->view('MainViews/header',$data);
					$this->load->view('MainViews/sidebar',$data);
					$this->load->view('Vehicles/usageControl',$data);
					$this->load->view('MainViews/footer');
				}else{
						$post = $this->input->post(NULL, TRUE);
						var_dump($post);
						$fechaSalida = new DateTime($post['inputFechaSalida']);
						$horaSalida = $post['inputHoraSalida'];
						$placaVehiculo = $post['inputPlaca'];

						$salida = array(
							'fecha'		=> 	$fechaSalida->format("Y-m-d H:i:s"),
							'hora'		=>	$horaSalida,
							'placaVehiculo'		=>	$placaVehiculo,
							'kilometraje'		=>	$post['kmSalida'],
							'combustible'	=>	$post['combustible'],
							'observaciones'	=>	$post['observaciones']
						);
						if (!$this->vehicle_model->addReservation($reserva)) {
							$this->session->set_flashdata('flash_message','Existe un problema realizando la reserva');
						}else{
							$this->session->set_flashdata('success_message','Reserva realizada con éxito');
						}
						//redirect(site_url().'main/');
				}

			}elseif (isset ($_POST['enviarLlegada'])) {
				$this->form_validation->set_rules('carros','Vehículo','required');
				$this->form_validation->set_rules('fechaSalida','Fecha de Salida','required');
				$this->form_validation->set_rules('horaSalida','Hora de Salida','required');
				$this->form_validation->set_rules('horaLlegada','Hora de Llegada','required');


				if ($this->form_validation->run() == FALSE) {
					$this->load->view('MainViews/header',$data);
					$this->load->view('MainViews/sidebar',$data);

					$this->load->view('Vehicles/usageControl',$data);
					$this->load->view('MainViews/footer');
				}else{
					if($this->vehicle_model->reservationDuplicate(
						$this->input->post('carros'),
						$this->input->post('fechaSalida'),
						$this->input->post('fechaLlegada'),
						$this->input->post('horaSalida'),
						$this->input->post('horaLlegada')
					)){
						$this->session->set_flashdata('flash_message','El vehículo ya está reservado para esa hora');
						redirect(site_url().'vehiculos/reservar');
					}else{
						$post = $this->input->post(NULL, TRUE);

						$fechaSalida1 = new DateTime($post['fechaSalida']);
						$fechaLlegada1 = new DateTime($post['fechaLlegada']);

						$reserva = array(
							'FechaInicio'		=> 	$fechaSalida1->format("Y-m-d H:i:s"),
							'HoraInicio'		=>	$post['horaSalida'],
							'PlacaVehiculo'		=>	$post['carros'],
							'EmailUsuario'		=>	$data['email'],
							'FechaFinalizacion'	=>	$fechaLlegada1->format("Y-m-d H:i:s"),
							'HoraFinalizacion'	=>	$post['horaLlegada'],
							'TodoElDia'			=>	$v1,
							'VariosDias'		=>	$v2
						);
						if (!$this->vehicle_model->addReservation($reserva)) {
							$this->session->set_flashdata('flash_message','Existe un problema realizando la reserva');
						}else{
							$this->session->set_flashdata('success_message','Reserva realizada con éxito');
						}
						//redirect(site_url().'main/');
					}
				}

			}else{

				$this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('Vehicles/usageControl',$data);

				$this->load->view('MainViews/footer');
			}

		}
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
