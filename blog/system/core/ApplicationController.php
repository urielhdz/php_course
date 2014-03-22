<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApplicationController extends CI_Controller {
	var $headerData = array('user' => , false);;
	var $configuracion = array(
		'upload_path' => '././uploads/',
	    'allowed_types' => 'gif|jpg|png|jpeg',
	    'max_size' => '2000',
	    'overwrite' => TRUE
	);

	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}
	function updateUser(){
		$id = $this->session->userdata('item');
		if($id){
			$this->headerData['user'] = $this->usuarios_model->find($id);
		}
		
	}
}