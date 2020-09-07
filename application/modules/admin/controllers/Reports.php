<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once './application/third_party/PHPExcel.php';
require_once './application/third_party/PHPExcel/IOFactory.php';


class Reports extends CI_Controller {
	public function __construct()
	{
		parent::__construct();	
		$this->load->model(admin_controller().'reports_model');

		if(!$this->session->userdata('admin_logged_in'))
		{
			redirect(admin_url().'login');
		}

		$this->load->library('excel_xlsx');
	}

	public function index()
	{
		if (isset($_GET['gift_card']) && !empty($_GET['gift_card'])) {
			$gift_card = $_GET['gift_card'];
		} else {
			$gift_card = null;
		}
		if (isset($_GET['date_from']) && !empty($_GET['date_from'])) {
			$date_from = $_GET['date_from'];
		} else {
			$date_from = null;
		}
		
		if (isset($_GET['date_to']) && !empty($_GET['date_to'])) {
			$date_to = $_GET['date_to'];
		} else {
			$date_to = null;
		}

		$today = (!empty($_GET['today'])) ? $_GET['today'] : "";
		$data['gift_card'] = $gift_card;
		$data['date_from'] = $date_from;
		$data['date_to'] = $date_to;
		$data['gift_cards'] = $this->reports_model->get_sales_voucher($today, $gift_card, $date_from, $date_to);
		$this->load->view('reports/sales_card_report' , $data);
	}


	public function excel_report()
	{
		$data = $_GET;

		$gift_cards_report = $this->reports_model->get_sales_voucher(@$data['today'], @$data['gift_card'], @$data['date_from'], @$data['date_to']);
		$file_name = 'sales-voucher-report-'.date('mdY');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set Orientation, size and scaling
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);


		$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.25);
		$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.25);
		$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.5);
		$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.25);

		$objPHPExcel->getActiveSheet()->setShowGridlines(true);

		$default_border = array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('rgb' => '000000'),
		);

		$top_header_style = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'd8d8d8'),
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 10,
				'name' => 'Arial',
				'bold' => true,
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);

		$style_header = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 10,
				'name' => 'Arial',
				'bold' => false,
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);

		$style_header_text_left = array(
			'borders' => array(
				'bottom' => $default_border,
				'left' => $default_border,
				'top' => $default_border,
				'right' => $default_border,
			),
			'font' => array(
				'color' => array('rgb' => '000000'),
				'size' => 10,
				'name' => 'Arial',
				'bold' => false,
			),
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				// 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			),
		);


		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Date');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Order #');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Title');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Card Value');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Gift Cards Code');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Customer');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Email');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Country');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Transaction ID');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Transaction Amount');


		$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($top_header_style);
		$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($top_header_style);


		$new_row = 2;

		foreach ($gift_cards_report as $report) {

			$date_format = formated_date($report['sell_out_date']); 
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$new_row, $date_format);
			$objPHPExcel->getActiveSheet()->getStyle('A'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('B'.$new_row, $report['payment_id']);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$new_row)->applyFromArray($style_header);


			$objPHPExcel->getActiveSheet()->setCellValue('C'.$new_row, $report['gift_card_title']);
			$objPHPExcel->getActiveSheet()->getStyle('C'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('D'.$new_row, CURRENCY.$report['gift_card_value']);
			$objPHPExcel->getActiveSheet()->getStyle('D'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('E'.$new_row, $report['gift_card_code']);
			$objPHPExcel->getActiveSheet()->getStyle('E'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('F'.$new_row, $report['first_name']);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('G'.$new_row, $report['email']);
			$objPHPExcel->getActiveSheet()->getStyle('G'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('H'.$new_row, $report['country']);
			$objPHPExcel->getActiveSheet()->getStyle('H'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('I'.$new_row, $report['trx_id']);
			$objPHPExcel->getActiveSheet()->getStyle('I'.$new_row)->applyFromArray($style_header);

			$objPHPExcel->getActiveSheet()->setCellValue('J'.$new_row, CURRENCY.$report['trx_amount']);
			$objPHPExcel->getActiveSheet()->getStyle('J'.$new_row)->applyFromArray($style_header);

			$new_row++;

		}


		ob_start();

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		header('Content-Disposition: attachment;filename='.$file_name.'.xlsx');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		ob_end_clean();
		$objWriter->save('php://output');
	}

}