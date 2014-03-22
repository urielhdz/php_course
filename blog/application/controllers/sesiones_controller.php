<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesiones_controller extends ApplicationController {
	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('usuarios_model');
	}
	public function destroy(){
		$this->session->unset_userdata('idUsuario');
		redirect('/sesiones/new','refresh');
	}
	public function nuevo(){
		$this->load->view('common/header',$this->headerData);
		$this->load->view('sesiones/new');
		$this->load->view('common/footer');
	}
	public function create(){
	    $data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$usuario = $this->usuarios_model->where($data);
	    if($usuario){
	    	$this->session->set_userdata(array('idUsuario' => $usuario->id));
	    	redirect('/','refresh');
	    }
	    else{
	    	$this->session->set_userdata(array('intentos' => 1));
	    	redirect('/sesiones/new','refresh');
	    }

	}
}