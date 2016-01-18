<?php
class Model_Ref extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_ref_master", TRUE);
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

	public function getgatchainfo( $pid )
	{
		$query = "select a.result_date, c.".$this->input->cookie('language')." as gatcha, ";
		$query .= "if(d.".$this->input->cookie('language')." is null, f.".$this->input->cookie('language').", d.".$this->input->cookie('language').") as item, a.grade ";
		$query .= "from koc_ref.gatcha_result as a left outer join koc_ref.ref_character as b on a.refid = b.id left outer join koc_ref.text as c on concat('NG_ARTICLE_', a.id) = c.id ";
		$query .= "left outer join koc_ref.text as d on d.id = concat('NG_ARTICLE_', b.implement) left outer join koc_ref.item as e on a.refid = e.id ";
		$query .= "left outer join koc_ref.text as f on f.id = concat('NG_ARTICLE_', e.id) or f.id = concat('NG_ARTICLE_', e.implement) where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function getgatchalog( $pid, $start_date, $end_date )
	{
		$query = "select a.pid, b.".$this->input->cookie('language')." as ticket, concat( '★', a.grade, ' ', ";
		$query .= "if( d.".$this->input->cookie('language')." is null, if( f.".$this->input->cookie('language')." is null, ";
		$query .= "g.".$this->input->cookie('language').", f.".$this->input->cookie('language')." ), d.".$this->input->cookie('language')." ) ) as result, a.result_date ";
		$query .= "from koc_ref.gatcha_result as a left outer join koc_ref.text as b on b.id = concat( 'NG_ARTICLE_', a.id ) ";
		$query .= "left outer join koc_ref.ref_character as c on a.refid = c.id ";
		$query .= "left outer join koc_ref.text as d on d.id = concat( 'NG_ARTICLE_', c.implement ) ";
		$query .= "left outer join koc_ref.item as e on a.refid = e.id ";
		$query .= "left outer join koc_ref.text as f on f.id = concat( 'NG_ARTICLE_', e.implement ) ";
		$query .= "left outer join koc_ref.text as g on g.id = concat( 'NG_ARTICLE_', a.refid ) ";
		$query .= "where pid = ? and result_date between ? and ? ";

		return $this->DB->query($query, array($pid, $start_date, $end_date));
	}

	public function getgatchalist( $type )
	{
		$query = "select a.id, b.".$this->input->cookie('language')." from koc_ref.gatcha as a inner join koc_ref.text as b on b.id = concat('NG_ARTICLE_', a.id) ";
		$query .= "where a.category = ? group by a.id ";

		return $this->DB->query($query, array($type));
	}

	public function getgatcharateinfo( $id )
	{
		$query = "select a.category, a.id, b.".$this->input->cookie('language')." as gatcha_name, a.reference, e.".$this->input->cookie('language')." as item_name, if( c.id is null, d.grade, c.grade ) as grade, ";
		$query .= "round(a.probability / (select sum(probability) from koc_ref.gatcha where id = a.id) * 100, 3) as prob ";
		$query .= "from koc_ref.gatcha as a  left outer join koc_ref.text as b on b.id = concat('NG_ARTICLE_', a.id) ";
		$query .= "left outer join koc_ref.ref_character as c on a.reference = c.id left outer join koc_ref.item as d on a.reference = d.id ";
		$query .= "left outer join koc_ref.text as e on e.id = if( c.implement is null, if( d.category = 'BACKPACK' or d.category = 'WEAPON', concat('NG_ARTICLE_', d.implement), concat('NG_ARTICLE_', d.id)), ";
		$query .= "concat('NG_ARTICLE_', c.implement) ) where a.id = ? ";

		return $this->DB->query($query, array($id));
	}
}
?>
