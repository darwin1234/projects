<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actionmodel extends CI_Model {

	public function createQuery($data){
		$this->db->insert('business',$data);
	}
}

?>