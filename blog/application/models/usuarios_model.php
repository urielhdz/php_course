<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_model extends Activerecord {
	var $database = "usuarios";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function articulos($id){
		$query = $this->db->query("SELECT a.id as id, a.titulo as titulo, a.cuerpo as cuerpo, a.extension as extension FROM usuarios u INNER JOIN articulos a ON u.id = a.idUsuario WHERE u.id = ".$id);
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	
}

?>