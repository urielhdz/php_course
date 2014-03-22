<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tags_controller extends ApplicationController {
	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('tags_model');
	}
	public function show(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['tag'] = $this->tags_model->find($id);
		$data['articulos'] = $this->tags_model->articulos($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('tags/show',$data);
		$this->load->view('common/footer');
	}
	public function destroy(){
		$id = $this->uri->segment(3);
		$this->tags_model->delete($id);
		redirect('/admin','refresh');
	}
	public function nuevo(){
		$this->load->view('common/header',$this->headerData);
		$this->load->view('tags/new');
		$this->load->view('common/footer');
	}
	public function edit(){
		$id = $this->uri->segment(3);
		$data['tag'] = $this->tags_model->find($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('tags/edit',$data);
		$this->load->view('common/footer');
	}
	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'titulo' => $this->input->post('titulo')
		);
		if($this->tags_model->update($id,$data)) redirect('/tags/show/'.$id,'refresh');
		else redirect('/tags/edit/'.$id,'refresh');
		
	}
	public function create(){
		
	    $data = array(
			'titulo' => $this->input->post('titulo')
		);
	    $id = $this->tags_model->create($data);

    	redirect('/tags/show/'.$id,'refresh');
	}
}