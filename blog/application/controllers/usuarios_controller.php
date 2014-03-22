<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_controller extends ApplicationController {
	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('usuarios_model');
	}
	public function show(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['usuario'] = $this->usuarios_model->find($id);
		$data['articulos'] = $this->usuarios_model->articulos($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('usuarios/show',$data);
		$this->load->view('common/footer');
	}
	public function destroy(){
		$id = $this->uri->segment(3);
		$this->usuarios_model->delete($id);
		redirect('/admin','refresh');
	}
	public function nuevo(){
		$this->load->view('common/header',$this->headerData);
		$this->load->view('usuarios/new');
		$this->load->view('common/footer');
	}
	public function edit(){
		$id = $this->uri->segment(3);
		$data['usuario'] = $this->usuarios_model->find($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('usuarios/edit',$data);
		$this->load->view('common/footer');
	}
	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		if($this->usuarios_model->update($id,$data)) redirect('/usuarios/show/'.$id,'refresh');
		else redirect('/usuarios/edit/'.$id,'refresh');
		
	}
	public function create(){
		
	    $data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
	    $id = $this->usuarios_model->create($data);

    	redirect('/usuarios/show/'.$id,'refresh');
	}
}