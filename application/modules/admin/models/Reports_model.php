<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_sales_voucher($today='', $gift_card, $date_from, $date_to)
	{
		$this->db->select('gift_card_codes.*, gift_cards.gift_card_title, gift_cards.gift_card_value');
		$this->db->from('gift_card_codes');
		$this->db->join('gift_cards', 'gift_cards.id = gift_card_codes.gift_card_id');

		if(!empty($today)) {
			$this->db->where('DATE(sell_out_date)', date("Y-m-d", strtotime(str_replace('/','-', $today))));
		}elseif(!empty($date_from) && !empty($date_to)) {
			$this->db->where('DATE(sell_out_date) >=', date("Y-m-d", strtotime(str_replace('/','-', $date_from))));
			$this->db->where('DATE(sell_out_date) <=', date("Y-m-d", strtotime(str_replace('/','-', $date_to))));
		}else{
			$this->db->where('sell_out_date >= DATE_SUB(CURDATE(), INTERVAL 10 DAY )');
		}

		if(!empty($gift_card)) {
			$this->db->where('gift_cards.gift_card_value', $gift_card);
		}

		$this->db->where('is_sell_out', 1);
		$this->db->order_by('DATE(sell_out_date)', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

}