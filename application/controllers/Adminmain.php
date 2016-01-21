<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmain extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('Model_Account', 'dbAccount');
		$arrResult = $this->dbAccount->requestTodayNew()->result_array();
		if ( empty($arrResult) )
		{
			$todaynew = 0;
		}
		else
		{
			$todaynew = $arrResult[0]['user'];
		}
		$this->load->model('Model_Play', 'dbPlay');
		$arrResult = $this->dbPlay->requestDau()->result_array();
		if ( empty($arrResult) )
		{
			$dau = 0;
		}
		else
		{
			$dau = $arrResult[0]['user'];
		}
		$this->load->view('include/head');
		$this->load->view('include/header', array( 'todaynew' => $todaynew, 'dau' => $dau ));
		$this->load->view('index');
		$this->load->view('include/footer');
	}

	public function userinfo()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$comTemplete = $this->dbManage->requestCsTempleteByType( '2' )->result_array();
		$indTemplete = $this->dbManage->requestCsTempleteByUser( $this->session->userdata('user_id') )->result_array();

		$this->load->view('include/head');
		$this->load->view('include/header', array( 'comTemplete' => $comTemplete, 'indTemplete' => $indTemplete ));
		$this->load->view('userinfo');
		$this->load->view('include/footer');
	}

	public function blockinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('blocklist');
		$this->load->view('include/footer');
	}

	public function accountinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'select' ), 'stype' => $this->stype, 'svalue' => $this->svalue));
		$this->load->view('accountlist');
		$this->load->view('include/footer');
	}

	public function templeteModify()
	{
		$idx = $this->input->post('idx');
		$title = $this->input->post('title');
		$memo = $this->input->post('memo');
		$type = $this->input->post('type');

		$this->load->model('Model_Manage', 'dbManage');
		if ( $type != '' )
		{
			if ( $type == '1' || $type == '2' )
			{
				$type = !( $type - 1 ) + 1;
				if ( $this->dbManage->putTempleteType( $idx, $type ) )
				{
					echo $idx;
				}
				else
				{
					echo "0";
				}
			}
			else if ( $type == '3' )
			{
				if ( $this->dbManage->delTemplete( $idx ) )
				{
					echo $idx;
				}
				else
				{
					echo "0";
				}
			}
		}

		if ( $title != '' && $memo != '' )
		{
			if ( $idx == '' )
			{
				if ( $idx = $this->dbManage->insTemplete( $title, $memo ) )
				{
					echo $idx;
				}
				else
				{
					echo "0";
				}
			}
			else
			{
				if ( $idx = $this->dbManage->putTemplete( $idx, $title, $memo ) )
				{
					echo $idx;
				}
				else
				{
					echo "0";
				}
			}
		}
	}

	public function getCodeInfo()
	{
		if ( $this->input->post('idtext') )
		{
			$this->load->model('Model_Ref', 'dbRef');
			$arrResult = $this->dbRef->getTextById( $this->input->post('idtext') )->result_array();
		}
		else if ( $this->input->post('text') )
		{
			$this->load->model('Model_Ref', 'dbRef');
			$arrResult = $this->dbRef->getTextByText( $this->input->post('text') )->result_array();
		}
		else if ( $this->input->post('char') )
		{
			$this->load->model('Model_Play', 'dbPlay');
			$arrTResult = $this->dbPlay->getCharById( $this->input->post('char') )->result_array();
			if ( !empty($arrTResult) )
			{
				for( $i = 0; $i < count($arrTResult); $i++ )
				{
					$arrResult = array(
									array( 'title' => 'ID', 'value' => $arrTResult[$i]['idx'] ),
									array( 'title' => '소유자 ID', 'value' => $arrTResult[$i]['pid'] ),
									array( 'title' => '기체이름', 'value' => $arrTResult[$i][$this->input->cookie('language')] ),
									array( 'title' => '등급', 'value' => $arrTResult[$i]['grade'] ),
									array( 'title' => '레벨', 'value' => $arrTResult[$i]['level'] ),
									array( 'title' => '경험치', 'value' => $arrTResult[$i]['exp'] ),
									array( 'title' => '강화수치', 'value' => $arrTResult[$i]['up_grade'] ),
									array( 'title' => '무기ID', 'value' => $arrTResult[$i]['weapon'] ),
									array( 'title' => '백팩ID', 'value' => $arrTResult[$i]['backpack'] ),
									array( 'title' => '스킬ID', 'value' => $arrTResult[$i]['skill_0'] ),
									array( 'title' => '스킬ID', 'value' => $arrTResult[$i]['skill_1'] ),
									array( 'title' => '스킬ID', 'value' => $arrTResult[$i]['skill_2'] ),
									array( 'title' => '소멸여부', 'value' => $arrTResult[$i]['is_del'] ),
									array( 'title' => '획득일', 'value' => $arrTResult[$i]['reg_date'] ),
									array( 'title' => '소멸일', 'value' => $arrTResult[$i]['del_date'] )
								);
				}
			}
		}
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getblocklist()
	{
		$this->load->model('Model_Account', 'dbAccount');
		$arrResult = $this->dbAccount->getblocklist( $this->pid, $this->name )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getaccountlist()
	{
		$this->load->model('Model_Account', 'dbAccount');
		$arrResult = $this->dbAccount->getaccountlist( $this->stype, $this->svalue )->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function manage()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('manage');
		$this->load->view('include/footer');
	}

	public function getadminlist()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult = $this->dbManage->getadminlist()->result_array();

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function updateadmin()
	{
		$this->load->model('Model_Manage', 'dbManage');
		if ( $this->dbManage->postadmin( $this->input->post('admin_id'), $this->input->post('admin_name'), $this->input->post('admin_depart'), $this->input->post('admin_email'), $this->input->post('admin_hp') ) )
		{
			echo '1';
		}
		else
		{
			echo '0';
		}
	}
}
