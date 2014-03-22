<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class articulos_model extends Activerecord {
	var $database = "articulos";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function obtenerURLImagen($id){
		$this->db->where('id',$id);
		$query = $this->db->get($this->database);
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	
	function tags($id){
		$query = $this->db->query("SELECT t.id as id, t.titulo as titulo FROM tags t INNER JOIN taggable tg ON t.id = tg.idTag INNER JOIN articulos a ON tg.idArticulo = a.id WHERE a.id = ".$id);
		if($query->num_rows() > 0) return $query;
		else return false;
	}
}

?>