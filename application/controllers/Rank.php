<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rank extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function pvprankthis()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('pvprankinfo');
		$this->load->view('include/footer');
	}

	public function pvpranklast()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('pvprankinfo');
		$this->load->view('include/footer');
	}

	public function getpvpranklistthis()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getpvpranklistthis( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getpvpranklistlast()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getpvpranklistlast( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function pvbrankthis()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('pvbrankinfo');
		$this->load->view('include/footer');
	}

	public function pvbranklast()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('pvbrankinfo');
		$this->load->view('include/footer');
	}

	public function getpvbranklistthis()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getpvbranklistthis( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getpvbranklistlast()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getpvbranklistlast( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function survivalrankthis()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('survivalrankinfo');
		$this->load->view('include/footer');
	}

	public function survivalranklast()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('survivalrankinfo');
		$this->load->view('include/footer');
	}

	public function getsurvivalranklistthis()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getsurvivalranklistthis( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getsurvivalranklistlast()
	{
		$this->load->model('Model_Rank', 'dbRank');
		$arrResult = $this->dbRank->getsurvivalranklistlast( $this->pid )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}
