<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function requestConsultThumb()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult = $this->dbManage->requestConsultThumb()->result_array();

		foreach( $arrResult as $row )
		{
			echo "<a class=\"list-group-item\" href=\"/".ROOTPATH."/index.php/admin/customer/consultview/".$row['idx']."\">";
			echo "<span class=\"contacts-title\">".$row['server']." ".$row['category']." | </span>";
		    echo "<strong>".iconv_substr($row['subject'], 0, 20, 'UTF-8')."</strong>";
		    echo "<div><small class=\"text-muted\">".$row['nick']." ".$row['created']."</small></div>";
			echo "</a>";
		}
	}

	public function requestConsultNew()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult = $this->dbManage->requestConsultNew()->result_array();
		if ( empty($arrResult) )
			echo '0';
		else
			echo $arrResult[0]['cnt'];
	}

	public function consult()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('consult');
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function consultView( $idx )
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult1 = $this->dbManage->getConsultInfo( $idx )->result_array();
		if ( empty($arrResult1) )
		{
			redirect('/admin/customer/consult');
		}
		else
		{
			$arrResult1 = $arrResult1[0];
		}

		$arrResult2 = $this->dbManage->getConsultAnswerInfo( $idx )->result_array();
		if ( !empty($arrResult2) )
		{
			$arrResult2 = $arrResult2[0];
		}

		$arrResult3 = $this->dbManage->requestCsTempleteByType( '2' )->result_array();
		$arrResult4 = $this->dbManage->requestCsTempleteByUser( $this->session->userdata('user_id') )->result_array();

		$this->load->view('include/head');
		$this->load->view('include/header');

		$this->load->view('consultview', array('pid' => $arrResult1['appid'], 'question' => $arrResult1, 'answer' => $arrResult2, 'comTemp' => $arrResult3, 'indTemp' => $arrResult4));
		$this->load->view('include/footer', array( 'pid' => $this->pid, 'name' => $this->name ));
	}

	public function consultList()
	{
		$this->load->model('Model_Manage', 'dbManage');
		if ( $this->pid )
		{
			$arrResult = $this->dbManage->getConsultListByPid( $this->pid )->result_array();
		}
		else
		{
			$arrResult = $this->dbManage->getConsultListByResult( $this->input->post('result') )->result_array();
		}

		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function consultAnswer()
	{
		$up_idx = $this->input->post('up_idx'); //문의번호
		$idx = $this->input->post('idx'); //답변번호
		$answer = filter_var($this->input->post('answer'), FILTER_SANITIZE_STRING);
		$check = $this->input->post('check');
		$uname = $this->session->userdata('user_name');
		$user_file = $this->input->post('userfile');

		$status = intval(!boolval($check - 1)) + 1;

		if ( $_FILES['userfile']['name'] )
		{
			$config['upload_path']          = substr(BASEPATH, 0, strpos(BASEPATH, ROOTPATH) + 9).'static/upload/csimg/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2048;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				$data['file_name'] = null;
			}
			else
			{
				$data = $this->upload->data();
			}
		}

		$this->load->model('Model_Manage', 'dbManage');
		if ( $idx )
		{
			$this->dbManage->updateAnswer( $answer, $data, $up_idx, $idx );
			$this->dbManage->updateConsultStatus( $uname, $status, $up_idx );
			redirect('/admin/customer/consult');
		}
		else
		{
			$this->dbManage->insertAnswer( $answer, $data, $up_idx );
			$this->dbManage->updateConsultStatus( $uname, $status, $up_idx );
			redirect('/admin/customer/consult');
		}
	}
}
