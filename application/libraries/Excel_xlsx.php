<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 //echo base_url()."umar/PHPExcel.php";
require_once APPPATH."/third_party/PHPExcel.php"; 
class Excel_xlsx extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}
