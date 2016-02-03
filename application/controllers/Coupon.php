<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function couponlist()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('couponlist');
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function getcouponlist()
	{
		$this->load->model('Model_Account', 'dbAccount');

		$arrResult = $this->dbAccount->getcouponlist()->result_array();
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function getcoupondetail()
	{
		$this->load->model('Model_Account', 'dbAccount');

		$arrResult = $this->dbAccount->getcoupondetail( $this->input->post('group_idx') )->result_array();
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}
}
