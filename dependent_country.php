<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dependent_country extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dependent_country_m');
	}

	public function index(){
		$this->data['countrys'] = $this->dependent_country_m->get_country();
		$this->data['title'] = 'Dependent Dropdown';
		$this->data['subview'] = 'dependent_country/index';
		$this->load->view('layout',$this->data);
	}

	public function state(){
		$c_id = $this->input->post('c_id',true);
		$state = $this->dependent_country_m->get_state($c_id);
		echo json_encode($state);
	}
	public function city(){
		$ci_id = $this->input->post('ci_id',TRUE);
		$city = $this->dependent_country_m->get_city($ci_id);
		echo json_encode($city);
	}
}
