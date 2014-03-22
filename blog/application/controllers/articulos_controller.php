<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulos_controller extends ApplicationController {
	var $configuracion = array(
		'upload_path' => '././uploads/',
	    'allowed_types' => 'gif|jpg|png|jpeg',
	    'max_size' => '2000',
	    'overwrite' => TRUE
	);
	function __construct(){
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('articulos_model');
		$this->load->model('tags_model');
		$this->load->model('taggable_model');
	}
	public function show(){
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		$data['articulo'] = $this->articulos_model->find($id);
		$data['my_colors'] = $this->articulos_model->tags($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('articulos/show',$data);
		$this->load->view('common/footer');
	}
	public function destroy(){
		$id = $this->uri->segment(3);
		$this->articulos_model->delete($id);
		redirect('/admin','refresh');
	}
	public function nuevo(){
		if($this->headerData['user']){
			$data['id'] = $this->articulos_model->nextId();
			$data['tags'] = $this->tags_model->all();
			$this->load->view('common/header',$this->headerData);
			$this->load->view('articulos/new',$data);
			$this->load->view('common/footer');
		}
		else
			redirect('/sesiones/new/','refresh');
	}
	public function edit(){
		$id = $this->uri->segment(3);
		$data['articulo'] = $this->articulos_model->find($id);
		$this->load->view('common/header',$this->headerData);
		$this->load->view('articulos/edit',$data);
		$this->load->view('common/footer');
	}
	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'titulo' => $this->input->post('titulo'),
			'cuerpo' => $this->input->post('cuerpo')
		);
		if(!empty($_FILES)){
			$this->configuracion['file_name'] = $id;
			if (!is_dir($this->configuracion['upload_path']) ) die('THE FOLDER DIRECTORY DOES NOT EXIST');
		    $this->load->library('upload', $this->configuracion);
		    if ( ! $this->upload->do_upload('imagenArticulo'))
		    {
		        //var_dump( $this->upload->display_errors());
		    }
		    else
		    {
		    	$data['extension'] = end(explode(".", $this->upload->file_name));
		    }	
		}
		if($this->articulos_model->update($id,$data)) redirect('/articulos/show/'.$id,'refresh');
		else redirect('/articulos/edit/'.$id,'refresh');
		
	}
	public function create(){
		if($this->headerData['user']){
			$this->configuracion['file_name'] = $this->articulos_model->nextId();
		    if ( ! is_dir($this->configuracion['upload_path']) ) die('THE FOLDER DIRECTORY DOES NOT EXIST');
		    $this->load->library('upload', $this->configuracion);
		    if ( ! $this->upload->do_upload('imagenArticulo'))
		    {
		        var_dump( $this->upload->display_errors());
		    }
		    else
		    {
		    	$data = array(
					'titulo' => $this->input->post('titulo'),
					'cuerpo' => $this->input->post('cuerpo'),
					'idUsuario' => $this->headerData['user']->id,
					'extension' => end(explode(".", $this->upload->file_name))
				);
		    	$id = $this->articulos_model->create($data);
		    	$tags = $this->input->post('tags');
		    	while(count($tags)> 0){ 
					$tag = array_shift($tags);
					$taggable = array('idTag' => $tag, 'idArticulo' => $id);
					$this->taggable_model->create($taggable);

				}

		    	redirect('/articulos/show/'.$id,'refresh');
		    }		
		}
		else{
			redirect('/sesiones/new/','refresh');
		}
		
	}
	public function index()
	{
		$data['articulos'] = $this->articulos_model->all();
		$this->load->view('common/header',$this->headerData);
		$this->load->view('articulos/index',$data);
		$this->load->view('common/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */