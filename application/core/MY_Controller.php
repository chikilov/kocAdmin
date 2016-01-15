<?php
class MY_Controller extends CI_Controller {

	public $pid;
	public $name;
	public $start_date;
	public $start_time;
	public $end_date;
	public $end_time;
	public $stype;
	public $svalue;
	public $result;
	public $curServer;
	public $version;
	public $admin_id;

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->model('Model_Play', 'dbPlay');
		$this->load->model('Model_Account', 'dbAccount');

		$admin_id = $this->session->userdata('user_id');
//		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$user_depart = $this->session->userdata('user_depart');
		$user_level = $this->session->userdata('user_level');
		$login_date = $this->session->userdata('login_date');
		$user_email = $this->session->userdata('user_email');
		$user_hp = $this->session->userdata('user_hp');

		if ( $this->input->post('pid') )
		{
			$this->pid = $this->input->post('pid');
			$this->name = $this->dbPlay->getNameByPid( $this->input->post('pid') )->result_array();
			if ( is_array( $this->name ) && count( $this->name ) >= 1 )
			{
				$this->name = $this->name[0]['name'];
			}
			else
			{
				$this->name = '';
			}
		}
		else if ( $this->input->post('name') )
		{
			$this->pid = $this->dbAccount->getPidByName( $this->input->post('name') )->result_array();
			if ( is_array( $this->pid ) )
			{
				$this->pid = $this->pid[0]['pid'];
			}
			$this->name = $this->input->post('name');
		}

		if ( $this->input->post('start_date') )
		{
			$this->start_date = $this->input->post('start_date');
		}
		else
		{
			$this->start_date = date('Y-m-d');
		}

		if ( $this->input->post('start_time') )
		{
			$this->start_time = $this->input->post('start_time');
		}
		else
		{
			$this->start_time = '00:00:00';
		}

		if ( $this->input->post('end_date') )
		{
			$this->end_date = $this->input->post('end_date');
		}
		else
		{
			$this->end_date = date('Y-m-d');
		}

		if ( $this->input->post('end_time') )
		{
			$this->end_time = $this->input->post('end_time');
		}
		else
		{
			$this->end_time = '23:59:59';
		}

		if ( $this->input->post('stype') )
		{
			$this->stype = $this->input->post('stype');
		}

		if ( $this->input->post('svalue') )
		{
			$this->svalue = $this->input->post('svalue');
		}

		if ( $this->input->cookie('server_name') && $this->session->userdata('user_name') )
		{
			$this->curServer = json_decode($this->input->cookie('server_name'));
			$this->version = $this->input->cookie('version');
		}
		else
		{
			redirect('/admin/login');
		}
	}

	function index()
	{
		$this->load->view('error/403_Forbidden');
	}
}
?>