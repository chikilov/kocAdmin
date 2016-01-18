<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function accesseventlist()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('accesseventlist');
		$this->load->view('include/footer');
	}

	public function getaccesseventlist()
	{
		$this->load->model('Model_Admin', 'dbAdmin');

		$arrResult = $this->dbAdmin->getaccesseventlist()->result_array();
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function accesseventwrite()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('accesseventwrite');
		$this->load->view('include/footer');
	}

	public function accesseventinsert()
	{
		$this->load->model('Model_Admin', 'dbAdmin');
		if ( $this->dbAdmin->requestAccEventInsert( $this->input->post('start_date'), $this->input->post('end_date'), $this->input->post('evt_category'), $this->input->post('evt_target'), $this->input->post('evt_value'), $this->input->post('evt_reason') ) )
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}
