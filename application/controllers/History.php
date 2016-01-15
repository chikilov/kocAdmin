<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function basiclog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'datetime' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'start_time' => $this->start_time, 'end_date' => $this->end_date, 'end_time' => $this->end_time));
		$this->load->view('basiclog');
		$this->load->view('include/footer');
	}

	public function getbasiclog()
	{
		$this->load->model('Model_Log', 'dbLog');
		if ( $this->pid && $this->start_date && $this->start_time && $this->end_date && $this->end_time )
		{
			$arrResult = $this->dbLog->getbasiclog( $this->pid, $this->start_date.' '.$this->start_time, $this->end_date.' '.$this->end_time )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function gatchalog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'datetime' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'start_time' => $this->start_time, 'end_date' => $this->end_date, 'end_time' => $this->end_time));
		$this->load->view('gatchalog');
		$this->load->view('include/footer');
	}

	public function getgatchalog()
	{
		$this->load->model('Model_Ref', 'dbRef');
		if ( $this->pid && $this->start_date && $this->start_time && $this->end_date && $this->end_time )
		{
			$arrResult = $this->dbRef->getgatchalog( $this->pid, $this->start_date.' '.$this->start_time, $this->end_date.' '.$this->end_time )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function explorationlog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('explorationlog');
		$this->load->view('include/footer');
	}

	public function getexplorationlog()
	{
		$this->load->model('Model_Record', 'dbRecord');
		if ( $this->pid )
		{
			$arrResult = $this->dbRecord->getexplorationlog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function pvelog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('pvelog');
		$this->load->view('include/footer');
	}

	public function getpvelog()
	{
		$this->load->model('Model_Record', 'dbRecord');
		if ( $this->pid )
		{
			$arrResult = $this->dbRecord->getpvelog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function pvplog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('pvplog');
		$this->load->view('include/footer');
	}

	public function getpvplog()
	{
		$this->load->model('Model_Record', 'dbRecord');
		if ( $this->pid )
		{
			$arrResult = $this->dbRecord->getpvplog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function pvblog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('pvblog');
		$this->load->view('include/footer');
	}

	public function getpvblog()
	{
		$this->load->model('Model_Record', 'dbRecord');
		if ( $this->pid )
		{
			$arrResult = $this->dbRecord->getpvblog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function survivallog()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('survivallog');
		$this->load->view('include/footer');
	}

	public function getsurvivallog()
	{
		$this->load->model('Model_Record', 'dbRecord');
		if ( $this->pid )
		{
			$arrResult = $this->dbRecord->getsurvivallog( $this->pid, $this->start_date, $this->end_date )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}
}
