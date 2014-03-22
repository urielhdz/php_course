<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activerecord extends CI_Model {
	var $database = "";
	function __construct(){
		parent::__construct();
	}
	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete($this->database);
	}
	function find($id){
		$this->db->where('id',$id);
		$query = $this->db->get($this->database);
		if($query->num_rows() > 0) return array_shift(array_values($query->result()));
		else return false;
	}

	function all(){
		$query = $this->db->get($this->database);
		if($query->num_rows() > 0) return $query;
		else return false;
	}
	function create($data){
		$this->db->insert($this->database,$data);
		return $this->db->insert_id();
	}
	function update($id,$data){
		$this->db->where('id', $id);
		return $this->db->update($this->database,$data);
	}

}

?>