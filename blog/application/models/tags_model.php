<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tags_model extends Activerecord {
	var $database = "tags";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function articulos($id){
		$query = $this->db->query("SELECT a.id as id, a.titulo as titulo, a.cuerpo as cuerpo, a.extension as extension FROM tags t INNER JOIN taggable tg ON t.id = tg.idTag INNER JOIN articulos a ON tg.idArticulo = a.id WHERE t.id = ".$id);
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	
}

?>