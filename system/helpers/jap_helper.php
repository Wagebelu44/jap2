<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* End of file connect_helper.php */
/* Location: ./system/helpers/sof_helper.php */


//---------------------------------------- start common functions ---------------------//
//
if ( ! function_exists('admin_url'))
{
	function admin_url()
	{
		$CI = get_instance();
		return $CI->config->item('admin_url');
	}
}

if ( ! function_exists('admin_controller'))
{
	function admin_controller()
	{
		$CI = get_instance();
		return $CI->config->item('admin_controller');
	}

}


if ( ! function_exists('employee_url'))
{
	function employee_url()
	{
		$CI = get_instance();
		return $CI->config->item('employee_url');
	}
}


if ( ! function_exists('employee_controller'))
{
	function employee_controller()
	{
		$CI = get_instance();
		return $CI->config->item('employee_controller');
	}

}


if ( ! function_exists('show_admin404'))
{
	function show_admin404()
	{
		$CI = get_instance();
		return $CI->load->view('common/admin_error_page');
	}
}

if ( ! function_exists('get_session'))
{
	function get_session($session_name)
	{
		$CI = get_instance();
		return $CI->session->userdata($session_name);
	}

}
if ( ! function_exists('set_session'))
{
	function set_session($session_name, $value)
	{
		$CI = get_instance();
		return $CI->session->set_userdata($session_name, $value);
	}

}
if ( ! function_exists('unset_session'))
{
	function unset_session($session_name)
	{
		$CI = get_instance();
		return $CI->session->unset_userdata($session_name);
	}
}
if ( ! function_exists('admin_email'))
{
	function admin_email()
	{
		$CI = get_instance();
		return $CI->config->item('admin_email');
	}
}
if ( ! function_exists('no_reply_email'))
{
	function no_reply_email()
	{
		$CI = get_instance();
		return $CI->config->item('no_reply_email');
	}
}
if ( ! function_exists('login_email'))
{
	function login_email()
	{
		$CI = get_instance();
		return $CI->config->item('login_email');
	}
}

if ( ! function_exists('custom_substr'))
{
	function custom_substr($x, $length) {
		if (strlen($x) <= $length) {
			echo $x;
		} else {
			$y = substr($x, 0, $length) . '...';
			echo $y;
		}
	}
}

if ( ! function_exists('support_email'))
{
	function support_email()
	{
		$CI = get_instance();
		return $CI->config->item('support_email');
	}
}

if ( ! function_exists('show'))
{
	function show($data){
		echo "<pre>";
		print_r($data);
	}
}

if ( ! function_exists('check_admin'))
{
	function check_admin($id) {

		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('admin_users');
		$CI->db->where('id', $id);
		$query = $CI->db->get();
		if($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}



if ( ! function_exists('formated_date'))
{
	function formated_date($datee){
		return date("d/m/Y" , strtotime($datee));
	}
}

if ( ! function_exists('db_date'))
{
	function db_date($datee){
		return date("Y-m-d" , strtotime($datee));
	}
}

if ( ! function_exists('js_date_formate'))
{
	function js_date_formate(){
		return "dd/mm/yyyy";
	}
}

if ( ! function_exists('dateTimeCC'))
{
	function date_time ($time) { 
		return   $newDateTime = formated_date($time)." ".date('h:i A', strtotime($time));
	}
}

//---------------------------------------- end common functions ---------------------//

if ( ! function_exists('get_employees'))
{
	function get_employees() {

		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('employees');
		$query = $CI->db->get();
		return $query->result_array();
	}
}

if ( ! function_exists('get_gift_card_title'))
{
	function get_gift_card_title($gift_id) {

		$CI = & get_instance();
		$CI->db->select('gift_card_title');
		$CI->db->from('gift_cards');
		$CI->db->where('id', $gift_id);
		$query = $CI->db->get()->row_array();
		return $query['gift_card_title'];
	}
}

if ( ! function_exists('get_gift_card_values'))
{
	function get_gift_card_values($gift_id) {

		$CI = & get_instance();
		$CI->db->select('gift_card_value');
		$CI->db->from('gift_cards');
		$CI->db->where('id', $gift_id);
		$query = $CI->db->get()->row_array();
		return $query['gift_card_value'];
	}
}


if ( ! function_exists('get_gift_codes'))
{
	function get_gift_codes($code_id) {

		$CI = & get_instance();
		$CI->db->select('gift_card_code');
		$CI->db->from('gift_card_codes');
		$CI->db->where('id', $code_id);
		$query = $CI->db->get()->row_array();
		return $query['gift_card_code'];
	}
}


if ( ! function_exists('get_available_voucher'))
{
	function get_available_voucher($gift_id) {

		$CI = & get_instance();
		$CI->db->select('*');
		$CI->db->from('gift_card_codes');
		$CI->db->where('gift_card_id', $gift_id);
		$CI->db->where('is_sell_out', '0');
		$query = $CI->db->get();
		return $query->num_rows();
	}
}
