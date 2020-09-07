<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift_cards extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->model(admin_controller().'gift_cards_model');

		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect(admin_url().'login');
		}
	}

	public function index()
	{	
		$data['gift_cards'] = $this->gift_cards_model->get_gift_cards();
		$this->load->view('gift_cards/gift_cards_list' , $data);
	}

	
	public function add()
	{
		$this->load->view('gift_cards/add_gift_card');
	}

	public function add_gift_card()
	{
		if($_POST) {

			$data = $_POST;
			$this->form_validation->set_rules('gift_card_code','Gift Card Code','trim|required|xss_clean');
			$this->form_validation->set_rules('gift_card_value','Gift Card Value','trim|required|xss_clean');
			$this->form_validation->set_rules('gift_card_title','Gift Card Title','trim|required|xss_clean');
			$this->form_validation->set_rules('actual_price','Actual Price','trim|required|xss_clean');
			$this->form_validation->set_rules('description','Description','trim|xss_clean');

			if ($this->form_validation->run($this) == FALSE)
			{
				$finalResult = array('msg' => 'error', 'response'=>validation_errors());
				echo json_encode($finalResult);
				exit;

			} else {
				$coupon_status = $this->gift_cards_model->insert_gift_card($data);
				if($coupon_status) {
					$finalResult = array('msg' => 'success', 'response'=>"Gift card Successfully added.");
					echo json_encode($finalResult);
					exit;
				} else {
					$finalResult = array('msg' => 'error', 'response'=>'Something went wrong!');
					echo json_encode($finalResult);
					exit;
				}
			}
		} else {
			show_admin404();
		}
	}


	public function edit($id)
	{
		$data['gift_cards'] = $this->gift_cards_model->get_gift_card_details($id);
		if(!empty($data['gift_cards'])) {
			$this->load->view('gift_cards/edit_gift_card', $data);
		} else {
			show_admin404();
		}
		
	}

	public function update()
	{
		if($_POST) {
			$data = $_POST;
			$this->form_validation->set_rules('gift_card_value','Gift Card Value','trim|required|xss_clean');
			$this->form_validation->set_rules('gift_card_title','Gift Card Title','trim|required|xss_clean');
			$this->form_validation->set_rules('actual_price','Actual Price','trim|required|xss_clean');
			$this->form_validation->set_rules('description','Description','trim|xss_clean');
			if ($this->form_validation->run($this) == FALSE)
			{
				$finalResult = array('msg' => 'error', 'response'=>validation_errors());
				echo json_encode($finalResult);
				exit;

			}else{
				$gift_status = $this->gift_cards_model->update_gift_card($data);
				if($gift_status > 0){
					$finalResult = array('msg' => 'success', 'response'=>"Gift card successfully updated.");
					echo json_encode($finalResult);
					exit;
				}else{
					$finalResult = array('msg' => 'error', 'response'=>'Something went wrong!');
					echo json_encode($finalResult);
					exit;
				}
			}
		} else {
			show_admin404();
		}
	}

	public function delete_gift_card()
	{
		if($_POST){
			$gift_card_id = $_POST['gift_card_id'];
			$status = $this->gift_cards_model->delete_gift_card($gift_card_id);
			if($status > 0){
				$finalResult = array('msg' => 'success', 'response'=>"Gift card successfully deleted.");
				echo json_encode($finalResult);
				exit;

			} else {
				$finalResult = array('msg' => 'error', 'response'=>"Something went wrong please try again.");
				echo json_encode($finalResult);
				exit;
			}
		} else {
			show_admin404();
		}
	}

	public function delete_gift_codes()
	{
		if($_POST){
			$gift_code_id = $_POST['id'];
			$status = $this->gift_cards_model->delete_gift_codes($gift_code_id);
			if($status > 0){
				$finalResult = array('msg' => 'success', 'response'=>"Gift card code successfully deleted.");
				echo json_encode($finalResult);
				exit;

			} else {
				$finalResult = array('msg' => 'error', 'response'=>"Something went wrong please try again.");
				echo json_encode($finalResult);
				exit;
			}
		} else {
			show_admin404();
		}
	}


	public function get_gift_codes()
	{
		$data['gift_card_id'] = $this->input->post();
		$data['gift_cards'] = $this->gift_cards_model->get_gift_codes($_POST);
		$data['gift_id'] = $data['gift_card_id'];
		$htmlresult = $this->load->view('gift_cards/gift_card_code_ajax' , $data,TRUE);
		$finalResult = array('msg' => 'success', 'response'=>$htmlresult);
		echo json_encode($finalResult);
		exit;
	}


	public function add_gift_codes()
	{
		$data = $this->input->post();
		$result = $this->gift_cards_model->insert_gift_codes($data);
		if($result > 0){
			
			$data['gift_card_id'] = $data['gift_id'];
			$data['gift_cards'] = $this->gift_cards_model->get_gift_codes($data);
			$htmlresult = $this->load->view('gift_cards/add_gift_code_ajax' , $data,TRUE);

			$finalResult = array('msg' => 'success', 'response'=>"Gift card code successfully added.", 'table_response'=>$htmlresult);
			echo json_encode($finalResult);
			exit;
		} else {
			$finalResult = array('msg' => 'error', 'response'=>"Something went wrong please try again.");
			echo json_encode($finalResult);
			exit;
		}
	}

	










}