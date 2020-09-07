<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	   		//Do your magic here
	}


	public function get_gift_cards()
	{
		$this->db->select('*');
		$this->db->from('gift_cards');
		$this->db->order_by('gift_card_value', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

}