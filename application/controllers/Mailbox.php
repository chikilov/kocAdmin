<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function maillist()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('maillist');
		$this->load->view('include/footer');
	}

	public function getmaillist()
	{
		$this->load->model('Model_Mail', 'dbMail');
		$arrResult = $this->dbMail->getmaillist( $this->pid, $this->start_date, $this->end_date )->result_array();
		if ( empty($arrResult) )
		{
			$arrResult = array( 'draw' => 0, 'iTotalRecords' => 0, 'iTotalDisplayRecords' => 0, 'aaData' => array() );
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}
