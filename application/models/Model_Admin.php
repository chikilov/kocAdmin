<?php
class Model_Admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_admin_master", TRUE);
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

	public function getaccesseventlist()
	{
		$query = "select a.idx, a.start_date, a.end_date, a.reg_id, a.evt_reason, (case when a.evt_category = 'ASST' then '자원' when a.evt_category = 'BCPC' then '백팩' ";
		$query .= "when a.evt_category = 'BTIK' then '백팩뽑기권' when a.evt_category = 'CHAR' then '캐릭터' when a.evt_category = 'CTIK' then '캐릭터뽑기권' ";
		$query .= "when a.evt_category = 'OPRT' then '오퍼레이터' when a.evt_category = 'PILT' then '파일럿' when a.evt_category = 'SKIL' then '스킬' ";
		$query .= "when a.evt_category = 'STIK' then '스킬뽑기권' when a.evt_category = 'WEPN' then '무기' when a.evt_category = 'WTIK' then '무기뽑기권' end) as evt_category, ";
		$query .= "concat( if(a.evt_category = 'CHAR' or a.evt_category = 'WEPN' or a.evt_category = 'SKIL' or a.evt_category = 'BCPC', ";
		$query .= "concat('★', if(a.evt_category = 'CHAR', d.grade, c.grade)), ''), b.".$this->input->cookie('language').") as evt_target,	a.evt_value, if(a.is_valid = 0, 0, 1) as is_valid, a.reg_date ";
		$query .= "from koc_admin.event_access as a left outer join koc_ref.text as b on concat( 'NG_ARTICLE_', a.evt_target ) = b.id ";
		$query .= "left outer join koc_ref.item as c on a.evt_target = c.id left outer join koc_ref.ref_character as d on a.evt_target = d.id ";

		return $this->DB->query($query);
	}

	public function requestAccEventInsert( $start_date, $end_date, $evt_category, $evt_target, $evt_value, $evt_reason )
	{
		$query = "insert into koc_admin.event_access ";
		$query .= "( start_date, end_date, evt_category, evt_target, evt_value, evt_reason, is_valid, reg_date, reg_id ) values ";
		$query .= "(?, ?, ?, ?, ?, ?, 1, now(), ?) ";

		$this->DB->query($query, array( $start_date, $end_date, $evt_category, $evt_target, $evt_value, $evt_reason, $this->admin_id ));
		return $this->DB->affected_rows();
	}

	public function requestAccEventStop( $idx )
	{
		$query = "update koc_admin.event_access set is_valid = 0, upd_date = now(), upd_id = ? ";
		$query .= "where idx = '".$idx."' ";

		$this->DB->query($query, array($this->user_id));
		return $this->DB->affected_rows();
	}
}
?>
