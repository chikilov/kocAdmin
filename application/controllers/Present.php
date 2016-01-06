<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Present extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function sendpresent()
	{
		$this->load->model('Model_Manage', 'dbManage');
		$arrResult = $this->dbManage->requestPresentLog( $this->pid, $this->start_date, $this->end_date )->result_array();
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name', 'date' ), 'pid' => $this->pid, 'name' => $this->name, 'start_date' => $this->start_date, 'end_date' => $this->end_date));
		$this->load->view('sendpresent', array('sendlist' => $arrResult));
		$this->load->view('include/footer');
	}

	public function getPresentList()
	{
		$this->load->model('Model_Manage', 'dbManage');
		if ( $this->input->post('type') == 'CHAR' )
		{
			$arrResult = $this->dbManage->requestCharPresent()->result_array();
		}
		else
		{
			$arrResult = $this->dbManage->requestItemPresent( $this->input->post('type') )->result_array();
		}
		echo json_encode( $arrResult, JSON_UNESCAPED_UNICODE );
	}

	public function actpresent()
	{
		if ( $this->input->post('delimiter') == 'enter')
		{
			$deli = PHP_EOL;
			if ( strpos( $this->input->post('user_list'), ',' ) != false )
			{
				echo '[{"result":"error1","text":"dataerror"}]';
				exit;
			}
		}
		else if ( $this->input->post('delimiter') == 'comma')
		{
			$deli = ',';
		}

		$pid_arr = explode( $deli, $this->input->post('user_list') );

		if ( ENVIRONMENT == 'development' || ENVIRONMENT == 'testing' )
		{
			$sendAddr = $this->curServer->addr.'/koc/index.php/request/api/requestSendMail/';
		}
		else
		{
			$sendAddr = $this->curServer->addr.'/koc'.$this->version.'/index.php/request/api/requestSendMail/';
		}

		$j = 0;
		while ( count($pid_arr) > $j )
		{
			$pid_arr[$j] = trim( $pid_arr[$j] );
			if ( $pid_arr[$j] )
			{
				$this->load->model('Model_Manage', 'dbManage');
				if ( $this->input->post('gift_type') == 'ASST' )
				{
					$encString = "{\"pid\":\"".$pid_arr[$j]."\",\"sid\":\"0\",\"title\":\"NG_MESSAGE_MAIL_REWARD_EV\",\"attach_type\":\"".$this->input->post('p_type')."\",\"attach_value\":\"".$this->input->post('p_value')."\",\"expire_date\":\"0\",\"cursession\":\"forAdmin\"}";
					$send_data = urlencode(base64_encode(openssl_encrypt($encString, "aes-256-cbc", $this->config->item('encryption_key'), true, str_repeat(chr(0), 16))));
				    $post_field_string = "data=".$send_data;

				    $ch = curl_init();
				    curl_setopt($ch, CURLOPT_URL, $sendAddr);
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
				    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
				    curl_setopt($ch, CURLOPT_POST, true);
				    $response = curl_exec($ch);
				    curl_close ($ch);
					$arrResponse = json_decode(openssl_decrypt(base64_decode($response), "aes-256-cbc", $this->config->item('encryption_key'), true, str_repeat(chr(0), 16)), true);

				    if($arrResponse["resultCd"]=="0200")
					{
						$this->dbManage->presentLog( $pid_arr[$j], $this->session->userdata('user_name'), $this->input->post('gift_type'), $this->input->post('p_type'), $this->input->post('p_value'), true, $this->curServer->name, $this->input->post('memo') );
						$arrResult[] = array( 'result' => '성공', 'text' => $pid_arr[$j].' 님께 '.$this->input->post('p_type').' 을 '.$this->input->post('p_value').' 개 지급하였습니다.' );
					}
					else
					{
						$this->dbManage->presentLog( $pid_arr[$j], $this->session->userdata('user_name'), $this->input->post('gift_type'), $this->input->post('p_type'), $this->input->post('p_value'), false, $this->curServer->name, $this->input->post('memo') );
						$arrResult[] = array( 'result' => '실패', 'text' => $pid_arr[$j].' 님께 '.$this->input->post('p_type').' 을 '.$this->input->post('p_value').' 개 지급실패하였습니다.' );
					}
				}
				else
				{
					for ( $i = 0; $i < $this->input->post('p_value'); $i++ )
					{
						$encString = "{\"pid\":\"".$pid_arr[$j]."\",\"sid\":\"0\",\"title\":\"NG_MESSAGE_MAIL_REWARD_EV\",\"attach_type\":\"".$this->input->post('p_type')."\",\"attach_value\":\"1\",\"expire_date\":\"0\",\"cursession\":\"forAdmin\"}";
						$send_data = urlencode(base64_encode(openssl_encrypt($encString, "aes-256-cbc", $this->config->item('encryption_key'), true, str_repeat(chr(0), 16))));
					    $post_field_string = "data=".$send_data;

					    $ch = curl_init();
					    curl_setopt($ch, CURLOPT_URL, $sendAddr);
					    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
					    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
					    curl_setopt($ch, CURLOPT_POST, true);
					    $response = curl_exec($ch);
					    curl_close ($ch);

					    if ( $arrResponse = json_decode($response, true) )
					    {

						}
						else
						{
							$arrResponse = json_decode(openssl_decrypt(base64_decode($response), "aes-256-cbc", $this->config->item('encryption_key'), true, str_repeat(chr(0), 16)), true);
						}

					    if ( $arrResponse["resultCd"] == "0200" )
						{
							$this->dbManage->presentLog( $pid_arr[$j], $this->session->userdata('user_name'), $this->input->post('gift_type'), $this->input->post('p_type'), $this->input->post('p_value'), true, $this->curServer->name, $this->input->post('memo') );
							$arrResult[] = array( 'result' => '성공', 'text' => $pid_arr[$j].' 님께 '.$this->input->post('p_type').' 을 '.$this->input->post('p_value').' 개 지급하였습니다.' );
						}
						else
						{
							$this->dbManage->presentLog( $pid_arr[$j], $this->session->userdata('user_name'), $this->input->post('gift_type'), $this->input->post('p_type'), $this->input->post('p_value'), false, $this->curServer->name, $this->input->post('memo') );
							$arrResult[] = array( 'result' => '실패', 'text' => $pid_arr[$j].' 님께 '.$this->input->post('p_type').' 을 '.$this->input->post('p_value').' 개 지급실패하였습니다.' );
						}
					}
				}
			}
			$j++;
		}
		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}
