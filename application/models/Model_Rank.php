<?php
class Model_Rank extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_rank", TRUE);
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

	public function requestPVPRank( $pid )
	{
		$query = "select rank, score from koc_rank.pvp where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function requestPVBRank( $pid )
	{
		$query = "select rank, score from koc_rank.pvb where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function requestSURVIVALRank( $pid )
	{
		$query = "select rank, score from koc_rank.survival where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function requestPVERank( $pid )
	{
		$query = "select b.diff, c.".$this->input->cookie('language').", substring(max(b.id), 5, 2) as scene from koc_rank.pve as a inner join koc_ref.stage as b on a.stageid = b.id ";
		$query .= "inner join koc_ref.text as c on concat('EPISODE_', upper(b.episode), '_NAME') = c.id where a.pid = ?	group by b.episode, b.diff order by b.id asc ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaypveinfo( $pid )
	{
		$query = "select a.pid, concat(d.".$this->input->cookie('language').", ' (', if(c.diff = 0, 'Normal', if(c.diff = 1, 'Hard', 'Hell')), ')') as stage, substring(max(c.id), 5, 2) as scene ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.pve as b on a.pid = b.pid ";
		$query .= "left outer join koc_ref.stage as c on b.stageid = c.id ";
		$query .= "left outer join koc_ref.text as d on concat('EPISODE_', upper(c.episode), '_NAME') = d.id ";
		$query .= "where a.pid = ? ";
		$query .= "group by c.episode, c.diff ";
		$query .= "order by c.id asc ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaypvpinfo( $pid )
	{
		$query = "select ifnull(b.rank, '-') as rank, ifnull(count(c.idx), '-') as match_count, ";
		$query .= "ifnull(sum(if( c.is_clear = 1, 1, 0 )), '-') as win_count, ";
		$query .= "ifnull(sum(if( c.is_clear = -1, 1, 0 )), '-') as lose_count, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.pvp_store as b on a.pid = b.pid ";
		$query .= "inner join koc_record.pvp as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 3 then ";
		$query .= "yearweek(date_add(now(), interval -7 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaypvplastinfo( $pid )
	{
		$query = "select ifnull(b.rank, '-') as rank, ifnull(count(c.idx), '-') as match_count, ";
		$query .= "ifnull(sum(if( c.is_clear = 1, 1, 0 )), '-') as win_count, ";
		$query .= "ifnull(sum(if( c.is_clear = -1, 1, 0 )), '-') as lose_count, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.pvp_lastweek as b on a.pid = b.pid ";
		$query .= "inner join koc_record.pvp as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 3 then ";
		$query .= "yearweek(date_add(now(), interval -14 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaypvbinfo( $pid )
	{
		$query = "select ifnull(b.rank, '-') as rank, ifnull(count(c.idx), '-') as match_count, ";
		$query .= "ifnull(sum(if( c.is_clear = 1, 1, 0 )), '-') as win_count, ";
		$query .= "ifnull(sum(if( c.is_clear = -1, 1, 0 )), '-') as lose_count, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.pvb_store as b on a.pid = b.pid ";
		$query .= "inner join koc_record.pvb as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 4 then ";
		$query .= "yearweek(date_add(now(), interval -7 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaypvblastinfo( $pid )
	{
		$query = "select ifnull(b.rank, '-') as rank, ifnull(count(c.idx), '-') as match_count, ";
		$query .= "ifnull(sum(if( c.is_clear = 1, 1, 0 )), '-') as win_count, ";
		$query .= "ifnull(sum(if( c.is_clear = -1, 1, 0 )), '-') as lose_count, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.pvb_lastweek as b on a.pid = b.pid ";
		$query .= "inner join koc_record.pvb as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 4 then ";
		$query .= "yearweek(date_add(now(), interval -14 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaysurvivalinfo( $pid )
	{
		$query = "select ifnull(b.rank, '-') as rank, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.survival_store as b on a.pid = b.pid ";
		$query .= "inner join koc_record.survival as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 5 then ";
		$query .= "yearweek(date_add(now(), interval -7 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}

	public function getplaysurvivallastinfo( $pid )
	{
		$query .= "select 'lastSeason' as season, ifnull(b.rank, '-') as rank, ifnull(b.score, '-') as score ";
		$query .= "from koc_play.player_basic as a left outer join koc_rank.survival_lastweek as b on a.pid = b.pid ";
		$query .= "inner join koc_record.survival as c on b.pid = c.pid and b.weekseq = c.weekseq ";
		$query .= "where a.pid = ? and b.weekseq = ( ";
		$query .= "case when dayofweek(now()) < 5 then ";
		$query .= "yearweek(date_add(now(), interval -14 day), 2) else yearweek(now(), 2) end ) ";

		return $this->DB->query($query, array($pid));
	}
}
?>
