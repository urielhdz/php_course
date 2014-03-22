<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comentarios_controller extends ApplicationController {
	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('comentarios_model');
	}
	public function destroy(){
		$id = $this->uri->segment(3);
		$this->comentarios_model->delete($id);
		redirect('/admin','refresh');
	}
	public function create(){
	    $data = array(
			'cuerpo' => $this->input->post('cuerpo'),
			'idArticulo', => $this->input,
			'idUsuario' => $this->headerData['user']->id
		);
	    $id = $this->comentarios_model->create($data);

    	redirect('/articulos/show/'.$idArticulo,'refresh');
	}
}