<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class taggable_model extends Activerecord {
	var $database = "taggable";
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

}

?>