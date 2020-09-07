<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift_cards_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_gift_cards()
	{
		$this->db->select("*");
		$this->db->from("gift_cards");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_gift_card_details($gift_card_id)
	{
		$this->db->select("*");
		$this->db->from("gift_cards");
		$this->db->where('id',$gift_card_id);
		
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert_gift_card($data)
	{		
		$this->db->set('gift_card_title',$data["gift_card_title"]);
		$this->db->set('description',$data["description"]);
		$this->db->set('gift_card_value',$data["gift_card_value"]);
		$this->db->set('actual_price',$data["actual_price"]);
		$this->db->set('created_by',get_session('admin_id'));
		$this->db->set('created_date',date('Y-m-d h:i:s'));
		$query = $this->db->insert('gift_cards');

		$inserted_id = $this->db->insert_id();

		if($inserted_id > 0){
			$gift_codes = explode(',', $data["gift_card_code"]);
			foreach($gift_codes as $value){
				$this->db->set('gift_card_id', $inserted_id);
				$this->db->set('gift_card_code', $value);
				$query = $this->db->insert('gift_card_codes');
			}
			return true;
		}
		else{
			return false;
		}
	}


	public function update_gift_card($data)
	{
		$this->db->set('gift_card_title',$data["gift_card_title"]);
		$this->db->set('description',$data["description"]);
		$this->db->set('gift_card_value',$data["gift_card_value"]);
		$this->db->set('actual_price',$data["actual_price"]);
		$this->db->set('updated_by',get_session('admin_id'));
		$this->db->set('updated_date',date('Y-m-d h:i:s'));
		$this->db->where('id' , $data['gift_card_id']);
		$query = $this->db->update('gift_cards');
		$insertdId = $this->db->affected_rows();
		return true;
	}

	public function delete_gift_card($gift_card_id)
	{
		$this->db->where('id', $gift_card_id);
		$query = $this->db->delete('gift_cards');
		$this->db->where('gift_card_id', $gift_card_id);
		$query = $this->db->delete('gift_card_codes');
		return $this->db->affected_rows();
	}

	public function delete_gift_codes($gift_code_id)
	{
		$this->db->where('id', $gift_code_id);
		$query = $this->db->delete('gift_card_codes');
		return $this->db->affected_rows();
	}

	public function get_gift_codes($data)
	{
		$this->db->select("*");
		$this->db->from("gift_card_codes");
		$this->db->where('gift_card_id',$data['gift_card_id']);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_gift_codes($data)
	{	
		$gift_codes = explode(',', $data["gift_card_code"]);
		foreach($gift_codes as $value){
			$this->db->set('gift_card_id', $data["gift_id"]);
			$this->db->set('gift_card_code', $value);
			$this->db->insert('gift_card_codes');
		}
		return $this->db->insert_id();
	}




}