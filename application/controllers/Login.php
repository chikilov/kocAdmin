<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('cookie');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('include/head');
		$this->load->view('login');
	}

	public function requestLogin()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult = $this->dbManage->getLoginInfo( $this->input->post('id'), $this->input->post('pass') )->result_array();
		if (!empty($arrResult))
		{
			$row = $arrResult[0];
			$setArray['user_id'] = $row['admin_id'];
			$setArray['user_name'] = $row['admin_name'];
			$setArray['user_depart'] = $row['admin_depart'];
			$setArray['user_level'] = $row['admin_level'];
			$setArray['login_date'] = $row['edit_date'];
			$setArray['user_email'] = $row['admin_email'];
			$setArray['user_hp'] = $row['admin_hp'];
			if (file_exists('/'.ROOTPATH.'/static/img/admin/'.$this->session->userdata('user_id').'.jpg')) {
				$setArray['photo'] =  '/'.ROOTPATH.'/static/img/admin/'.$this->session->userdata('user_id').'.jpg';
			} else {
				$setArray['photo'] =  '/'.ROOTPATH.'/static/img/admin/avatar.jpg';
			}
			$this->session->set_userdata($setArray);
			$cookie = array(
			    'name'   => 'server_name',
			    'value'  => $this->input->post('server'),
			    'expire' => time() + (3600 * 6),
			);
			$this->input->set_cookie( $cookie );
			$cookie = array(
			    'name'   => 'language',
			    'value'  => $this->input->post('lang'),
			    'expire' => time() + (3600 * 6),
			);
			$this->input->set_cookie( $cookie );
			$cookie = array(
			    'name'   => 'version',
			    'value'  => $this->input->post('version'),
			    'expire' => time() + (3600 * 6),
			);
			$this->input->set_cookie( $cookie );

			if ( $this->dbManage->putLastLogin( $this->input->post('id') ) > 0 )
			{
				echo $this->session->userdata('user_level');
			}
			else
			{
				echo "3";
			}
		}
		else
		{
			echo "2";
		}
	}
}
