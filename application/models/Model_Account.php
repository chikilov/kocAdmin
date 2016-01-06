<?php
class Model_Account extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_account", TRUE);
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

	public function getPidByName( $name )
	{
		$query = "select pid from koc_account.account where name = ? ";

		return $this->DB->query($query, array($name));
	}

	public function requestTodayNew()
	{
		$query = "select count(pid) as user from koc_account.account where reg_date BETWEEN '".date('Y-m-d')." 00:00:00.000' and '".date('Y-m-d')." 23:59:59.999' ";

		return $this->DB->query($query);
	}

	public function requestPlayerInfo( $pid )
	{
		$query = "select email, id, affiliate_name, affiliate_type, reg_date, limit_type, retire_date from koc_account.account where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function getblocklist( $pid )
	{
		if ( $pid )
		{
			$query = "select pid, type, reg_id, reg_datetime, text from koc_account.user_limit_log where pid = ? order by idx desc ";

			return $this->DB->query($query, array($pid));
		}
		else
		{
			$query = "select pid, type, reg_id, reg_datetime, text from koc_account.user_limit_log order by idx desc ";

			return $this->DB->query($query);
		}
	}

	public function getaccountlist( $stype, $svalue )
	{
		$query = "select pid, id, email, affiliate_name, affiliate_type, reg_date, limit_type, retire_date from koc_account.account where ".$stype." = ? ";

		return $this->DB->query($query, array($svalue));
	}
}
?>
