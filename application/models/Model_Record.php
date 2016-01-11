<?php
class Model_Record extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_record", TRUE);
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

	public function getplayexplorationinfo( $pid )
	{
		$query = "select a.pid, b.idx, d.".$this->input->cookie('language')." as charname, b.refid, b.grade, b.level, b.up_grade ";
		$query .= "from koc_play.player_basic as a ";
		$query .= "left outer join koc_play.player_character as b on a.pid = b.pid ";
		$query .= "left outer join koc_ref.ref_character as c on b.refid = c.id ";
		$query .= "left outer join koc_ref.text as d on concat( 'NG_ARTICLE_', c.implement ) = d.id ";
		$query .= "left outer join koc_play.player_team as e on a.pid = e.pid ";
		$query .= "and ( b.idx = e.memb_0 or b.idx = e.memb_1 or b.idx = e.memb_2 ) ";
		$query .= "where a.pid = ? and b.is_del = 0 and b.exp_idx is not null ";
		$query .= "group by a.pid, a.name, a.affiliate_name, b.idx ";

		return $this->DB->query($query, array($pid));
	}

	public function getplayexplorationcount( $pid )
	{
		$query = "select max(exp_idx) as tcnt, sum(if( reward_datetime, 1, 0 )) as notcnt, sum(if( is_enemy && reward_datetime, 1, 0 )) as ecnt ";
		$query .= "from koc_record.exploration ";
		$query .= "where pid = ? and exp_group_idx = ( select max(exp_group_idx) from koc_record.exploration_group where pid = ? ) ";

		return $this->DB->query($query, array($pid, $pid));
	}

	public function getexplorationlog( $pid, $start_date, $end_date )
	{
		$query = "select e.".$this->input->cookie('language').", d.grade, a.cid, a.exp_second, a.start_datetime, a.reward_datetime, a.exp_cost, ";
		$query .= "a.reward_type, a.reward_value, a.exp_experience, if(b.is_clear = 1, 1, 0) as is_clear, a.is_enemy ";
		$query .= "from koc_record.exploration as a left outer join koc_record.exploration_group as b on a.exp_group_idx = b.exp_group_idx and a.pid = b.pid ";
		$query .= "left outer join koc_play.player_character as c on a.cid = c.idx left outer join koc_ref.ref_character as d on c.refid = d.id ";
		$query .= "left outer join koc_ref.text as e on e.id = concat('NG_ARTICLE_', d.implement) ";
		$query .= "where a.pid = ? and a.start_datetime between concat(?, ' 00:00:00') and concat(?, ' 23:59:59') ";

		return $this->DB->query($query, array($pid, $start_date, $end_date));
	}

	public function getpvelog( $pid, $start_date, $end_date )
	{
		$query = "select a.stageid, a.start_datetime, a.result_datetime, a.basic_reward_type, a.basic_reward_value, a.random_reward_type, a.random_reward_value, a.additional_reward_type, a.additional_reward_value, ";
		$query .= "a.instant_item1, a.instant_item2, a.instant_item3, a.instant_item4, a.is_clear ";
		$query .= "from koc_record.pve as a ";
		$query .= "where a.pid = ? and a.start_datetime between concat(?, ' 00:00:00') and concat(?, ' 23:59:59') ";

		return $this->DB->query($query, array($pid, $start_date, $end_date));
	}

	public function getpvplog( $pid, $start_date, $end_date )
	{
		$query = "select a.start_datetime, a.result_datetime, a.score, a.instant_item1, a.instant_item2, a.instant_item3, a.instant_item4, a.enemy_id, a.is_clear ";
		$query .= "from koc_record.pvp as a ";
		$query .= "where a.pid = ? and a.start_datetime between concat(?, ' 00:00:00') and concat(?, ' 23:59:59') ";

		return $this->DB->query($query, array($pid, $start_date, $end_date));
	}
}
?>
