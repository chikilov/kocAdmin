<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gatcha extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function gatchalist()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('gatchalist');
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function getgatchalist()
	{
		$this->load->model('Model_Ref', 'dbRef');

		$arrResult = $this->dbRef->getgatchalist( $this->input->post('type') )->result_array();
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function getgatcharateinfo()
	{
		$this->load->model('Model_Ref', 'dbRef');

		$arrResult = $this->dbRef->getgatcharateinfo( $this->input->post('id') )->result_array();
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}
}
