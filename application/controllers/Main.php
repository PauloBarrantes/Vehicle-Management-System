<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public $roles;

	function __construct(){
	        parent::__construct();
	        $this->load->model('User', 'user_model', TRUE);
	        $this->load->library('form_validation');
	        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	        $this->roles = $this->config->item('roles');
	        $this->load->library('userlevel');
	    }
	public function index(){
		$data = $this->session->userdata;


		$data['title'] = "Inicio";
        $this->load->view('MainViews/header',$data);
        $this->load->view('MainViews/sidebar',$data);
		$this->load->view('MainViews/index');
        $this->load->view('MainViews/footer');

	}

	public function login(){
		$data = $this->session->userdata;
        if(!empty($data['email'])){
	        redirect(site_url().'main/');
	    }else{
           	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
           	$this->form_validation->set_rules('password', 'Password', 'required');

			$data['title'] = "Login";
			if($this->form_validation->run() == FALSE) {
					  $this->load->view('MainViews/header',$data);
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

        if(!$getAccess && $setLogin["name"] == $neMSC){
            $this->load->library('email');
            $this->load->library('sendmail');
            $bUrl = base_url();
            $message = $this->sendmail->secureMail($data['first_name'],$data['last_name'],$data['email'],$dTod,$dTim,$stLe,$browser,$os,$getip,$bUrl);
            $to_email = $data['email'];
            $this->email->from($this->config->item('register'), 'New sign-in! from '.$browser.'');
            $this->email->to($to_email);
            $this->email->subject('New sign-in! from '.$browser.'');
            $this->email->message($message);
            $this->email->set_mailtype("html");
            $this->email->send();

            $this->input->set_cookie($setLogin, TRUE);
            redirect(site_url().'main/');
        }else{
            $this->input->set_cookie($setLogin, TRUE);
            redirect(site_url().'main/');
        }
	}
	public function profile(){
		$data['title'] = "Login";
		$this->load->view('MainViews/header',$data);
		$this->load->view('MainViews/sidebar',$data);
		$this->load->view('MainViews/profile');
		$this->load->view('MainViews/footer');

	}
	//Cierra la sesion del usuario
	public function logout() {
		$this->session->sess_destroy();
		redirect(site_url().'main/login/');
	}


}
