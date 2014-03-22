<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comentarios_model extends Activerecord {
	var $database = "comentarios";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	
}

?>