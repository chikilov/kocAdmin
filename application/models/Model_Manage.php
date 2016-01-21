<?php
class Model_Manage extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_manage", TRUE);
		/**
		 * 기본적으로 CodeIgniter 는 트랜잭션을 완벽모드(Strict Mode)로 실행합니다.
		 * 완벽모드가 활성화된 상태에서는 여러그룹의 트랜잭션을 실행했을때 단하나라도 실패하게되면 전체는 롤백됩니다.
		 * 만약 완벽모드가 비활성화라면, 여러그룹의 트랜잭션을 실행했을때
		 * 각각의 그룹은 독립적으로 실행되기때문에 각 그룹내에서만 성공여부에따라서 커밋,롤백 하게 됩니다.
		 * 즉 그룹간에는 서로 영향이 없습니다.
		 */
		$this->DB->trans_strict(FALSE);

		$this->DB->query("SET NAMES utf8");
	}

	public function __destruct() {
		$this->DB->close();
	}

	/************************* 트랜젝션 자동 처리용********************/
	/************************* 주의 : 트랜젝션 자동 처리용 함수와 수동 처리용 함수에 대해 섞어서 사용하면 안됨.********************/
	/**
	 * 트랜젝션 시작
	 */
	public function onStartTransaction()
	{
		$this->DB->trans_start();
	}

	/**
	 * 트랜젝션 종료
	 *start/complete 함수사이에 원하는 수 만큼의 쿼리를 실행하면 전체의 성공여부에따라 함수들이 알아서 커밋 혹은 롤백을 수행합니다.
	*/
	public function onCompleteTransaction()
    {
        $this->DB->trans_complete();
    }

	/************************* 트랜젝션 수동 처리용********************/
	/*
	 * 트랜젝션에 대한 처리를 수동으로 처리할때 사용하는 함수
	*/
	public function onBeginTransaction()
	{
		$this->DB->trans_begin();
	}

	/*
	 * 예외 상황 발생시 처리용
	*/
	public function onRollbackTransaction()
	{
		$this->DB->trans_rollback();
	}

	/*
	 * 로직이 끝나는 시점에서 호출해서 쿼리 수행에 문제가 있었는지 판단하여 롤벡 또는 커밋 시켜주는 함수.
	*/
	public function onEndTransaction()
	{
		if ($this->DB->trans_status() === FALSE)
		{
			$this->DB->trans_rollback();
		}
		else
		{
			$this->DB->trans_commit();
		}
	}

//for ADMIN
	public function getLoginInfo( $id, $pass )
	{
		$query = "select admin_id, admin_name, admin_depart, admin_level, edit_date, admin_email, admin_hp from koc_manage.admin_master where admin_id = ? and admin_pw = ? ";

		return $this->DB->query($query, array( $id, $pass ));
	}

	public function putLastLogin( $id )
	{
		$query = "update koc_manage.admin_master set last_login = now() where admin_id = ? ";

		$this->DB->query($query, array( $id ));
		return $this->DB->affected_rows();
	}

	public function requestConsultThumb()
	{
		$query = "select idx, server, category, subject, nick, created from koc_manage.consult where status = 0 order by idx desc ";

		return $this->DB->query($query);
	}

	public function requestConsultNew()
	{
		$query = "select count(idx) as cnt from koc_manage.consult where status = 0 ";

		return $this->DB->query($query);
	}

	public function requestCsTempleteByType( $type )
	{
		$query = "select idx, title, memo, user from koc_manage.cs_templete where type = ? ";

		return $this->DB->query($query, array($type));
	}

	public function requestCsTempleteByUser( $user )
	{
		$query = "select idx, type, title, memo, user from koc_manage.cs_templete where user = ? ";

		return $this->DB->query($query, array($user));
	}

	public function putTempleteType( $idx, $type )
	{
		$query = "update koc_manage.cs_templete set type = ? where idx = ? ";

		$this->DB->query($query, array($type, $idx));
		return $this->DB->affected_rows();
	}

	public function delTemplete( $idx )
	{
		$query = "delete from koc_manage.cs_templete where idx = ? ";

		$this->DB->query($query, array($idx));
		return $this->DB->affected_rows();
	}

	public function insTemplete( $title, $memo )
	{
		$query = "insert into koc_manage.cs_templete (type, title, memo, user) values ('1', ?, ?, ? ) ";

		$this->DB->query($query, array($title, $memo, $this->session->userdata('user_id')));
		return $this->DB->insert_id();
	}

	public function putTemplete( $idx, $title, $memo )
	{
		$query = "update koc_manage.cs_templete set title = ? , memo = ? where idx = ? ";

		$this->DB->query($query, array($title, $memo, $idx));
		return $this->DB->affected_rows();
	}

	public function getConsultListByPid( $pid )
	{
		$query = "select idx, created, server, appid, nick, category, subject, if(status = 1, uname, if(status = 0, '0', concat('0_', uname))) as uname from koc_manage.consult where appid = ? order by idx desc ";

		return $this->DB->query($query, array($pid));
	}

	public function getConsultListByResult( $result )
	{
		if ( $result == 'no' )
		{
			$query = "select idx, created, server, appid, nick, category, subject, if(status = 1, uname, if(status = 0, '0', concat('0_', uname))) as uname from koc_manage.consult where status in ( 0, 2 ) order by idx desc ";
		}
		else
		{
			$query = "select idx, created, server, appid, nick, category, subject, if(status = 1, uname, if(status = 0, '0', concat('0_', uname))) as uname from koc_manage.consult order by idx desc ";
		}

		return $this->DB->query($query, array($result));
	}

	public function getConsultInfo( $idx )
	{
		$query = "select idx, category, created, server, appid, nick, category, subject, memo, uname, status, ";
		$query .= "version, os, vender, hp from koc_manage.consult where idx = ? ";

		return $this->DB->query($query, array($idx));
	}

	public function getConsultAnswerInfo( $idx )
	{
		$query = "select idx, answer, check_time, created, up_file from koc_manage.consult_answer where up_idx = ? ";

		return $this->DB->query($query, array($idx));
	}

	public function updateAnswer( $answer, $data, $up_idx, $idx )
	{
		$query = "update koc_manage.consult_answer set answer = '".$answer."', up_file = '".$data['file_name']."', created = now() where up_idx = '".$up_idx."' and idx = '".$idx."' ";

		$this->DB->query($query, array($idx));
		return $this->DB->affected_rows();
	}

	public function updateConsultStatus( $uname, $status, $up_idx )
	{
		$query = "update koc_manage.consult set uname = '".$uname."' , status = '".$status."' where idx = '".$up_idx."' ";

		$this->DB->query($query, array($idx));
		return $this->DB->affected_rows();
	}

	public function insertAnswer( $answer, $data, $up_idx )
	{
		$query = "insert into koc_manage.consult_answer (up_idx, answer, up_file, created, ip) values ";
		$query .= "( '".$up_idx."', '".$answer."', '".$data['file_name']."', now(), '".$this->input->server('REMOTE_ADDR')."')";

		$this->DB->query($query, array($idx));
		return $this->DB->affected_rows();
	}

	public function requestPresentLog( $pid, $start_date, $end_date )
	{
		$query = "select pid, memo, p_type, p_value, is_success, server, send_name, send_datetime from koc_manage.present_log where ";
		if ( $pid )
		{
			$query .= "pid = '".$pid."' and ";
		}
		if ( !$start_date )
		{
			$start_date = date('Y-m-d');
		}
		if ( !$end_date )
		{
			$end_date = date('Y-m-d');
		}
		$query .= "send_datetime between '".$start_date." 00:00:00.000' and '".$end_date." 23:59:59.999' ";

		return $this->DB->query($query);
	}

	public function presentLog( $pid, $admin_name, $gift_type, $p_type, $p_value, $isSuccess, $server_name, $memo )
	{
		$query = "insert into koc_manage.present_log (pid, send_name, asset_type, p_type, p_value, send_datetime, is_success, server, memo) values ";
		$query .= "(".$pid.", '".$admin_name."', '".$gift_type."', '".$p_type."', '".$p_value."', now(), B'".$isSuccess."', '".$server_name."', '".$memo."') ";

		$this->DB->query($query);
		return $this->DB->affected_rows();
	}

	public function getadminlist()
	{
		$query = "select admin_id, admin_name, admin_depart, admin_email, admin_hp, last_login from koc_manage.admin_master ";

		return $this->DB->query($query);
	}

	public function postadmin( $admin_id, $admin_name, $admin_depart, $admin_email, $admin_hp )
	{
		$query = "update koc_manage.admin_master set admin_name = ?, admin_depart = ?, admin_email = ?, admin_hp = ? where admin_id = ? ";

		$this->DB->query($query, array( $admin_name, $admin_depart, $admin_email, $admin_hp, $admin_id ));
		return $this->DB->affected_rows();
	}
}
?>
