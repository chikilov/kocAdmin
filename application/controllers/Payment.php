<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function chargeinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('chargeinfo');
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function cashlog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('cashlog');
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function getchargeinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getchargeinfo( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getcashlog()
	{
		$this->load->model('Model_Log', 'dbLog');

		if ( $this->pid )
		{
			$arrResult = $this->dbLog->getcashlog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}
