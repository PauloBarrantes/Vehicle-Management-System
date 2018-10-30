<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public $roles;

	function __construct(){
	        parent::__construct();
	        $this->load->model('User', 'user_model', TRUE);
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
			$data['title'] = "Inicio";
			$data['reservas'] = $this->reservation_model->getReservations();
	        $this->load->view('MainViews/header',$data);
	        $this->load->view('MainViews/sidebar',$data);
			$this->load->view('MainViews/container');
			$this->load->view('MainViews/index',$data);
    		$this->load->view('MainViews/footer');
		}
	}
	public function login(){
		$data = $this->session->userdata;
      	if(!empty($data['email'])){
	        redirect(site_url());
	    }else{
           	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
           	$this->form_validation->set_rules('password', 'Password', 'required');

			$data['title'] = "Login";
			if($this->form_validation->run() == FALSE) {
					  $this->load->view('MainViews/header',$data);
					  $this->load->view('MainViews/container');
					  $this->load->view('MainViews/login');
					  $this->load->view('MainViews/footer');
            }else{
				$post = $this->input->post();
                $clean = $this->security->xss_clean($post);
                $userInfo = $this->user_model->checkLogin($clean);

				//Comprobamos si el usuario coincide
				if(!$userInfo){
					$this->session->set_flashdata('flash_message', 'Email o contraseña incorrecto.');
					redirect(site_url().'main/login');
				}
				else{
                    foreach($userInfo as $key=>$val){
                        $this->session->set_userdata($key, $val);
            		}
                        redirect(site_url().'main/checkLoginUser/');
                }
			}
		}
	}
	public function checkLoginUser(){
	     //user data from session
	    $data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    $this->load->library('user_agent');
        $browser = $this->agent->browser();
        $os = $this->agent->platform();
        $getip = $this->input->ip_address();


        $stLe = "VMS";
		$tz = "America/Costa_Rica";

		$now = new DateTime();
        $now->setTimezone(new DateTimezone($tz));
        $dTod =  $now->format('Y-m-d');
        $dTim =  $now->format('H:i:s');

        $this->load->helper('cookie');
        $keyid = rand(1,9000);
        $scSh = sha1($keyid);
        $neMSC = md5($data['email']);
        $setLogin = array(
            'name'   => $neMSC,
            'value'  => $scSh,
            'expire' => strtotime("+2 year"),
        );
        $getAccess = get_cookie($neMSC);
				$this->input->set_cookie($setLogin, TRUE);
				redirect(site_url());

	}
	public function perfil(){
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
			$data['title'] = "Perfil";
			$data['datosPerfil'] = $this->user_model->getUserInfo($data['email']);
			$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);
			$this->load->view('MainViews/container');

			$this->load->view('Users/profile',$data);
			$this->load->view('MainViews/footer');
		}
	}
	public function editarPerfil(){
		$data = $this->session->userdata;

		if(empty($data)){
			redirect(site_url().'main/login/');
		}
		if(empty($data['rol'])){
			redirect(site_url().'main/login/');
		}
		$dataLevel = $this->userlevel->checkLevel($data['rol']);
		$data['datosPerfil'] = $this->user_model->getUserInfo($data['email']);

		if (empty($this->session->userdata['email'])) {
			redirect(site_url().'main/login/');
		}else{
           	$this->form_validation->set_rules('name', 'Nombre', 'required');
			$this->form_validation->set_rules('lastName', 'Apellido', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
           	$this->user_model->getUserInfo($data['email']);

			$data['title'] = "EditarPerfil";
			if($this->form_validation->run() == FALSE) {
				$this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('MainViews/container');
				$this->load->view('Users/editProfile',$data);
				$this->load->view('MainViews/footer');
            }else{
				$post = $this->input->post();
				if (
					$post['email'] == $data['datosPerfil']->email
					&&
					$post['name'] == $data['datosPerfil']->nombre
					&&
					$post['lastName'] == $data['datosPerfil']->apellido1
				) {
					$this->load->view('MainViews/header',$data);
					$this->load->view('MainViews/sidebar',$data);
					$this->load->view('MainViews/container');
					$this->load->view('Users/editProfile',$data);
					$this->load->view('MainViews/footer');
				}else{
					if(!$this->user_model->editProfile($data['email'],$post)){
						$this->session->set_flashdata('flash_message','Existe un problema agregando al usuario');
					}else{
						$this->session->set_flashdata('success_message','Usuario agregado con éxito');
						$data['email'] = $post['email'];
						$data['nombre'] = $post['name'];
						$data['apellido1'] = $post['lastName'];
					}
					redirect(site_url().'main/editarPerfil');
				}
			}
		}
	}
	public function cambiarContrasena(){
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
			$data['title'] = "CambiarContraseña";
			$this->load->view('MainViews/header',$data);
			$this->load->view('MainViews/sidebar',$data);
			$this->load->view('MainViews/container');
			$this->load->view('Users/changePassword');
			$this->load->view('MainViews/footer');
		}
	}
	// Muestra la lista de los usuarios
	public function usuarios(){
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
				$data ['usuarios'] = $this->user_model->getUsers();

				$data['title'] = "Usuarios";
				$this->load->view('MainViews/header',$data);
				$this->load->view('MainViews/sidebar',$data);
				$this->load->view('MainViews/container');

				$this->load->view('Users/listUser', $data);
				$this->load->view('MainViews/footer');
			}else{
				redirect(site_url().'main/');
			}

		}
	}
	public function agregarUsuario(){
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
			if ($dataLevel =="is_admin") {
				$this->form_validation->set_rules('name','Nombre','required');
				$this->form_validation->set_rules('lastName','Apellido','required');
				$this->form_validation->set_rules('email','Correo Electrónico','required|valid_email');
				$this->form_validation->set_rules('rol','Rol','required');
				$this->form_validation->set_rules('password','Contraseña','required|min_length[5]');
				$this->form_validation->set_rules('passwordCheck','Confirmación de contraseña ','required|matches[password]');


				$data['title'] = "AgregarUsuario";
				if ($this->form_validation->run() == FALSE) {
					$this->load->view('MainViews/header',$data);
					$this->load->view('MainViews/sidebar',$data);
					$this->load->view('MainViews/container');
					$this->load->view('Users/addUser', $data);
					$this->load->view('MainViews/footer');
				}else{
					if ($this->user_model->isDuplicate($this->input->post('email'))) {
						$this->session->set_flashdata('flash_message','El correo electrónico ya está en uso');
						redirect(site_url().'main/agregarUsuario');
					}else {
					 	$post = $this->input->post(NULL, TRUE);
						$this->load->library('password');
						$hashed = $this->password->create_hash($post['password']);

						$post['password'] = $hashed;
						unset($post['passwordCheck']);
						//Acá lo insertamos en la base de datos
						if (!$this->user_model->addUser($post)) {
							$this->session->set_flashdata('flash_message','Existe un problema agregando al usuario');
						}else{
							$this->session->set_flashdata('success_message','Usuario agregado con éxito');
						}
						redirect(site_url().'main/usuarios/');
					}
				}

			}else{
				redirect(site_url().'main/');
			}
		}
	}

	//delete user
    public function deleteuser($emailEncode) {
		$data = $this->session->userdata;
		$email = urldecode($emailEncode);
        if(empty($data['rol'])){
	        	redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['rol']);
  	    //check user level

  	    //check is admin or not
  	    if($dataLevel == "is_admin"){
      		$this->user_model->deleteUser($email);
      		if($this->user_model->deleteUser($email) == FALSE )
      		{
      		    $this->session->set_flashdata('flash_message', 'Error, no podemos eliminar este usuario!');
      		}
      		else
      		{
      		    $this->session->set_flashdata('success_message', 'Usuario eliminado satisfactoriamente');
      		}
      		redirect(site_url().'main/usuarios');
  	    }else{
  		    redirect(site_url().'main/');
  	    }
      }
	//Cierra la sesion del usuario
	public function logout() {
		$this->session->sess_destroy();
		redirect(site_url().'main/login/');
	}


}
