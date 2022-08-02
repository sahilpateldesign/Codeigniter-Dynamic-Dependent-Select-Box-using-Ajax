<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependent_country_m extends CI_Model
{
	protected $table_name = 'country';

	public function __construct()
	{
		parent::__construct();
	}
	public function get_country(){
		$this->db->order_by('country_name','ASC');
		return $this->db->get($this->table_name)->result();
	}
	public function get_state($c_id){
		$this->db->where('country_id',$c_id);
		return $this->db->select('s_id,state_name')->get('state')->result();
	}

	public function get_city($ci_id){
		$this->db->where('state_id',$ci_id);
		return $this->db->select('ci_id,city_name')->get('city')->result();
	}
}
