<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');	

	}
	public function index()
	{
		$data['cards'] = $this->home_model->get_gift_cards();
		$this->load->view('index', $data);
	}

	public function buy_gift_card()
	{
		$data['gift_card_id'] = $this->input->post();
		$data['gift_cards'] = $this->home_model->buy_gift_card($_POST);
		$data['cards'] = $this->home_model->get_gift_cards();
		$data['gift_id'] = $data['gift_card_id'];
		$htmlresult = $this->load->view('buy_now_ajax', $data, TRUE);
		$finalResult = array('msg' => 'success', 'response'=>$htmlresult);
		echo json_encode($finalResult);
		exit;
	}

	public function change_gift_card()
	{
		$data['gift_card_id'] = $this->input->post();
		$data['gift_cards'] = $this->home_model->buy_gift_card($_POST);
		$htmlresult = $this->load->view('change_gift_card_ajax', $data, TRUE);
		$finalResult = array('msg' => 'success', 'response'=>$htmlresult, 'actual_price' => $data['gift_cards']['actual_price']);
		echo json_encode($finalResult);
		exit;
	}


	public function make_payment()
	{
		$data = $_POST;
		$dataa['actual_price'] = $data['actual_price'];
		$dataa['payment_id'] = $this->home_model->temporary_payment($data);

		if($dataa['payment_id'] == 0 ) {
			$this->load->view('out_of_stock');
		} else {
			$this->load->view('make_payment', $dataa);
		}
		

	}

	public function payment()
	{
		// print_r($_REQUEST); exit;

		if(!empty($_REQUEST['PAYMENT_BATCH_NUM'])){

			$trx_amount = $_REQUEST['PAYMENT_AMOUNT'];
			$payment_id = $_REQUEST['PAYMENT_ID'];
			$trx_id = $_REQUEST['PAYMENT_BATCH_NUM'];

			$user_info = $this->home_model->get_user_info($payment_id);
			$card_id = $user_info['card_id'];
			$first_name = $user_info['first_name'];
			$email = $user_info['email'];
			$country = $user_info['country'];
			$username = $user_info['username'];

			$voucher = $this->home_model->get_card_voucher($payment_id);
			$voucher_id = $voucher['id'];
			$voucher_code = $voucher['gift_card_code'];

			$result = $this->home_model->insert_sell_out_card($_REQUEST,$trx_id, $trx_amount, $voucher_id, $card_id, $first_name, $last_name, $email, $country, $username);
			if($result){
				$this->send_voucher_code_email($voucher_code, $first_name, $email, $payment_id, $card_id);
			} else {
				$this->load->view('error_page');
			}
		}else{
			$this->load->view('error_page');
		}
	}

	public function success()
	{
		if(!empty($_REQUEST['PAYMENT_BATCH_NUM'])){
			$payment_id = $_REQUEST['PAYMENT_ID'];

			$this->load->view('success_page', compact('payment_id'));
		} else {
			$this->load->view('error_page');
		}
	}

	public function cancel()
	{	
		$this->load->view('cancel_payment');
	}

	public function send_voucher_code_email($voucher_code, $first_name, $email, $payment_id, $card_id)
	{
		$voucher_image = $this->home_model->get_voucher_image($card_id);

		$card_image = $voucher_image['gift_card_value'];


		$body = $this->load->view('home/voucher_mail_template', compact('voucher_code','first_name', 'payment_id', 'card_image'), TRUE);

		$to = $email;
		$subject = 'Gift Card Voucher Code';

    	// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    	// More headers
		$headers .= 'From: JAP Gift Card <noreply@jap.com>' . "\r\n";

     	//Send mail 
		@mail($to,$subject,$body,$headers);
		return true;
	}


}