<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

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

	public function buy_gift_card($data)
	{
		$this->db->select('*');
		$this->db->from('gift_cards');
		$this->db->where('id', $data['gift_card_id']);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function get_card_voucher($payment_id)
	{
		$this->db->select('*');
		$this->db->from('gift_card_codes');
		$this->db->where('payment_id', $payment_id);
		$this->db->where('is_sell_out' , 0);
		$this->db->order_by('id', 'ASC'); 
		$this->db->limit(1); 
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_user_info($payment_id)
	{
		$this->db->select('*');
		$this->db->from('temp_session');
		$this->db->where('id', $payment_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function temporary_payment($data)
	{
		$this->db->set('card_id',$data["gift_card"]);
		$this->db->set('actual_price',$data["actual_price"]);
		$this->db->set('first_name',$data["first_name"]);
		$this->db->set('last_name',$data["last_name"]);
		$this->db->set('email',$data["buyer_email"]);
		$this->db->set('city',$data["city"]);
		$this->db->set('phone_no',$data["phone_no"]);
		$this->db->set('state',$data["state"]);
		$this->db->set('zip_code',$data["zip_code"]);
		$this->db->insert('temp_session');
		$insert_id = $this->db->insert_id();

		if($insert_id > 0) {

			$this->db->select('*');
			$this->db->from('gift_card_codes');
			$this->db->where('gift_card_id', $data["gift_card"]);
			$this->db->where('is_sell_out' , 0);
			$this->db->where('payment_id' , NULL);
			$this->db->order_by('id', 'ASC'); 
			$this->db->limit(1); 
			$card_code_res = $this->db->get();
			$card_code = $card_code_res->row_array();
			if($card_code_res->num_rows() > 0) {
				$this->db->set('payment_id',$insert_id);
				$this->db->where('id', $card_code['id']);
				$query = $this->db->update('gift_card_codes');
				$affectedrows = $this->db->affected_rows();

				if($affectedrows > 0) {
					return $insert_id;
				} else {
					return  0;
				}

			} else {
				return  0;
			}
		} else {
			return  0;
		}
	}

	public function insert_sell_out_card($resp, $trx_id, $trx_amount, $voucher_code, $card_id, $first_name, $last_name, $email, $city, $phone_no, $state, $zip_code)
	{
		$this->db->set('trx_id', $trx_id);
		$this->db->set('trx_amount', $trx_amount);
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('email', $email);
		$this->db->set('city', $city);
		$this->db->set('phone_no', $phone_no);
		$this->db->set('state', $state);
		$this->db->set('zip_code', $zip_code);
		$this->db->set('is_sell_out', 1);
		$this->db->set('sell_out_date', date('Y-m-d h:i:s'));
		$this->db->where('is_sell_out' , 0);
		$this->db->where('payment_id' , $resp['PAYMENT_ID']);
		$this->db->where('gift_card_id' , $card_id);
		$this->db->where('id' , $voucher_code);
		
		$query = $this->db->update('gift_card_codes');
		$insertdId = $this->db->affected_rows();
		if ($insertdId > 0) {
			$this->db->set('pm_response', json_encode($resp));
			$this->db->where('id' , $resp['PAYMENT_ID']);
			$this->db->update('temp_session');
			return true;
		}else{
			return false;
		}
	}




}