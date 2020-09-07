<?php
class My404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	if(check_admin($this->session->userdata('admin_id')))
    	{
    		show_admin404();
    	}
    	// else
    	// {
    	// 	show_employee404();
    	// }
       
    }
}