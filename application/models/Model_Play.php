<?php
class Model_Play extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->DB = $this->load->database("koc_play_master", TRUE);
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

	public function requestDau()
	{
		$query = "select count(pid) as user, attend_date as date from koc_play.player_attend where attend_date = '".date('Y-m-d')."' ";

		return $this->DB->query($query);
	}

	public function getNameByPid( $pid )
	{
		$query = "select name from koc_play.player_basic where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function getCharById( $cid )
	{
		$query = "select a.idx, a.pid, if(c.".$this->input->cookie('language')." = '' or c.".$this->input->cookie('language')." is null, ";
		$query .= "a.refid, c.".$this->input->cookie('language').") as ".$this->input->cookie('language').", a.grade, a.level, a.exp, a.up_grade, a.weapon, a.backpack, a.skill_0, a.skill_1, a.skill_2, ";
		$query .= "if(a.is_del=0,'생존','소멸') as is_del, a.reg_date, a.del_date from koc_play.player_character as a left outer join koc_ref.ref_character as b on a.refid = b.id ";
		$query .= "left outer join koc_manage.text as c on c.id = concat('NG_ARTICLE_', b.implement) where a.idx = ? ";

		return $this->DB->query($query, array($cid));
	}

	public function requestBasicInfo( $pid )
	{
		$query = "select login_datetime, vip_level, prof_img, name from koc_play.player_basic where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function requestMaxChar( $pid )
	{
		$query = "select count(distinct refid) as cnt from koc_play.player_character where pid = ? and level = 30 ";

		return $this->DB->query($query, array($pid));
	}

	public function requestItemInfo( $pid )
	{
		$query = "select energy_points, pvb_points, pvp_points, survival_points, game_points, cash_points, event_points, friendship_points from koc_play.player_item where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function requestTeamInfo( $pid )
	{
		$query = "select team_seq, ifnull(max(if(a.memb_0 = b.idx, e.".$this->input->cookie('language').", null)), '-') as ref_0, ifnull(a.memb_0, '-') as memb_0, ";
		$query .= "ifnull(max(if(a.memb_1 = b.idx, e.".$this->input->cookie('language').", null)), '-') as ref_1, ifnull(a.memb_1, '-') as memb_1, ";
		$query .= "ifnull(max(if(a.memb_2 = b.idx, e.".$this->input->cookie('language').", null)), '-') as ref_2, ifnull(a.memb_2, '-') as memb_2, ";
		$query .= "ifnull(max(if(a.pilot_0 = c.idx, g.".$this->input->cookie('language').", null)), '-') as pilot_0, ifnull(a.pilot_0, '-') as pi_0, ";
		$query .= "ifnull(max(if(a.pilot_1 = c.idx, g.".$this->input->cookie('language').", null)), '-') as pilot_1, ifnull(a.pilot_1, '-') as pi_1, ";
		$query .= "ifnull(max(if(a.pilot_2 = c.idx, g.".$this->input->cookie('language').", null)), '-') as pilot_2, ifnull(a.pilot_2, '-') as pi_2, ";
		$query .= "ifnull(max(if(b.idx = a.memb_0, b.grade, null)), '-') as grd_0, ifnull(max(if(b.idx = a.memb_1, b.grade, null)), '-') as grd_1, ifnull(max(if(b.idx = a.memb_2, b.grade, null)), '-') as grd_2, ";
		$query .= "ifnull(max(if(b.idx = a.memb_0, b.level, null)), '-') as level_0, ifnull(max(if(b.idx = a.memb_1, b.level, null)), '-') as level_1, ifnull(max(if(b.idx = a.memb_2, b.level, null)), '-') as level_2, ";
		$query .= "ifnull(max(if(b.idx = a.memb_0, b.up_grade, null)), '-') as upgrade_0, ifnull(max(if(b.idx = a.memb_1, b.up_grade, null)), '-') as upgrade_1, ifnull(max(if(b.idx = a.memb_2, b.up_grade, null)), '-') as upgrade_2, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, g.".$this->input->cookie('language').", null)), '-') as weapon_0, ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.idx, null)), '-') as wep_0, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as wup_0, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_1, g.".$this->input->cookie('language').", null)), '-') as weapon_1, ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_1, c.idx, null)), '-') as wep_1, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as wup_1, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_2, g.".$this->input->cookie('language').", null)), '-') as weapon_2, ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_2, c.idx, null)), '-') as wep_2, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as wup_2, ";
		$query .= "ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_0, g.".$this->input->cookie('language').", null)), '-') as backpack_0, ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_0, c.idx, null)), '-') as bp_0, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as bup_0, ";
		$query .= "ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_1, g.".$this->input->cookie('language').", null)), '-') as backpack_1, ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_1, c.idx, null)), '-') as bp_1, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as bup_1, ";
		$query .= "ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_2, g.".$this->input->cookie('language').", null)), '-') as backpack_2, ifnull(max(if(c.idx = b.backpack and b.idx = a.memb_2, c.idx, null)), '-') as bp_2, ";
		$query .= "ifnull(max(if(c.idx = b.weapon and b.idx = a.memb_0, c.up_grade, null)), '-') as bup_2, ";
		$query .= "ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_0, h.".$this->input->cookie('language').", null)), '-') as skill_00, ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_0, c.idx, null)), '-') as skl_00, ";
		$query .= "ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_0, h.".$this->input->cookie('language').", null)), '-') as skill_01, ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_0, c.idx, null)), '-') as skl_01, ";
		$query .= "ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_0, h.".$this->input->cookie('language').", null)), '-') as skill_02, ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_0, c.idx, null)), '-') as skl_02, ";
		$query .= "ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_1, h.".$this->input->cookie('language').", null)), '-') as skill_10, ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_1, c.idx, null)), '-') as skl_10, ";
		$query .= "ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_1, h.".$this->input->cookie('language').", null)), '-') as skill_11, ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_1, c.idx, null)), '-') as skl_11, ";
		$query .= "ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_1, h.".$this->input->cookie('language').", null)), '-') as skill_12, ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_1, c.idx, null)), '-') as skl_12, ";
		$query .= "ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_2, h.".$this->input->cookie('language').", null)), '-') as skill_20, ifnull(max(if(c.idx = b.skill_0 and b.idx = a.memb_2, c.idx, null)), '-') as skl_20, ";
		$query .= "ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_2, h.".$this->input->cookie('language').", null)), '-') as skill_21, ifnull(max(if(c.idx = b.skill_1 and b.idx = a.memb_2, c.idx, null)), '-') as skl_21, ";
		$query .= "ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_2, h.".$this->input->cookie('language').", null)), '-') as skill_22, ifnull(max(if(c.idx = b.skill_2 and b.idx = a.memb_2, c.idx, null)), '-') as skl_22 ";
		$query .= "from koc_play.player_team as a left outer join koc_play.player_character as b on b.pid = a.pid and (a.memb_0 = b.idx or a.memb_1 = b.idx or a.memb_2 = b.idx) ";
		$query .= "left outer join koc_play.player_inventory as c on c.pid = a.pid and ";
		$query .= "(a.pilot_0 = c.idx or a.pilot_1 = c.idx or a.pilot_2 = c.idx or b.weapon = c.idx or b.backpack = c.idx or b.skill_0 = c.idx or b.skill_1 = c.idx or b.skill_2 = c.idx) ";
		$query .= "left outer join koc_ref.ref_character as d on b.refid = d.id left outer join koc_ref.text as e on concat('NG_ARTICLE_', d.implement) = e.id ";
		$query .= "left outer join koc_ref.item as f on c.refid = f.id left outer join koc_ref.text as g on concat('NG_ARTICLE_', f.implement) = g.id ";
		$query .= "left outer join koc_ref.text as h on concat('NG_ARTICLE_', c.refid) = h.id ";
		$query .= "where a.pid = ? group by a.team_seq ";

		return $this->DB->query($query, array($pid));
	}

	public function requestCollection( $pid )
	{
		$query = "select a.voc, ifnull(b.ucnt, 0) as ucnt, ifnull(a.tcnt, 0) as tcnt from ( select if(category = 'LICENSE', category, vocation) as voc, count(id) as tcnt from koc_ref.ref_character ";
		$query .= "where category != 'ENEMY' group by voc ) as a left outer join (select if(d.category = 'LICENSE', d.category, d.vocation) as voc, count(d.id) as ucnt from koc_play.player_collection as c ";
		$query .= "inner join koc_ref.ref_character as d on c.cid = d.id where pid = ? group by voc ) as b on a.voc = b.voc ";

		return $this->DB->query($query, array($pid));
	}

	public function requestOperator( $pid )
	{
		$query = "select c.".$this->input->cookie('language').", ifnull(a.expire, '9999-12-31 23:59:59') as expire from koc_play.player_inventory as a inner join koc_ref.item as b on a.refid = b.id ";
		$query .= "inner join koc_ref.text as c on concat('NG_ARTICLE_', b.id) = c.id where b.category = 'OPERATOR' and a.pid = ? order by expire asc ";

		return $this->DB->query($query, array($pid));
	}

	public function getcharinfo( $pid )
	{
		$query = "select a.pid, if( a.affiliate_name != '', concat(a.name, '(', a.affiliate_name, ')'), a.name) as name, ";
		$query .= "b.idx, e.".$this->input->cookie('language')." as charname, b.refid, b.grade, b.level, b.up_grade, ";
		$query .= "ifnull(max(if(d.idx = b.weapon, d.idx, null)), '-') as weapon, ifnull(max(if(d.idx = b.weapon, g.".$this->input->cookie('language').", null)), '-') as weapon_name, ";
		$query .= "ifnull(max(if(d.idx = b.backpack, d.idx, null)), '-') as backpack, ifnull(max(if(d.idx = b.backpack, g.".$this->input->cookie('language').", null)), '-') as backpack_name, ";
		$query .= "ifnull(max(if(d.idx = b.skill_0, d.idx, null)), '-') as skill_0, ifnull(max(if(d.idx = b.skill_0, h.".$this->input->cookie('language').", null)), '-') as skill_0_name, ";
		$query .= "ifnull(max(if(d.idx = b.skill_1, d.idx, null)), '-') as skill_1, ifnull(max(if(d.idx = b.skill_1, h.".$this->input->cookie('language').", null)), '-') as skill_1_name, ";
		$query .= "ifnull(max(if(d.idx = b.skill_2, d.idx, null)), '-') as skill_2, ifnull(max(if(d.idx = b.skill_2, h.".$this->input->cookie('language').", null)), '-') as skill_2_name, ";
		$query .= "if( i.team_seq = 0, 'A', if( i.team_seq = 1, 'B', if( i.team_seq = 2, 'C', if( exp_idx is not null, '탐색', '-' ) ) ) ) as team, ";
		$query .= "exp_group_idx, exp_idx, exp_time ";
		$query .= "from koc_play.player_basic as a ";
		$query .= "left outer join koc_play.player_character as b on a.pid = b.pid ";
		$query .= "left outer join koc_ref.ref_character as c on b.refid = c.id ";
		$query .= "left outer join koc_play.player_inventory as d on a.pid = d.pid ";
		$query .= "and ( b.weapon = d.idx or b.backpack = d.idx or b.skill_0 = d.idx or b.skill_1 = d.idx or b.skill_2 = d.idx ) ";
		$query .= "left outer join koc_ref.text as e on concat( 'NG_ARTICLE_', c.implement ) = e.id ";
		$query .= "left outer join koc_ref.item as f on d.refid = f.id ";
		$query .= "left outer join koc_ref.text as g on concat( 'NG_ARTICLE_', f.implement ) = g.id ";
		$query .= "left outer join koc_ref.text as h on concat( 'NG_ARTICLE_', d.refid ) = h.id ";
		$query .= "left outer join koc_play.player_team as i on a.pid = i.pid and ( b.idx = i.memb_0 or b.idx = i.memb_1 or b.idx = i.memb_2 ) ";
		$query .= "where a.pid = ? and b.is_del = 0 ";
		$query .= "group by a.pid, a.name, a.affiliate_name, b.idx ";

		return $this->DB->query($query, array($pid));
	}

	public function getinventoryinfo( $pid )
	{
		$query = "select a.pid, concat(a.name, '(', a.affiliate_name, ')') as name,b.idx, ";
		$query .= "if( d.category = 'WEAPON', '무기', if( d.category = 'BACKPACK', '백팩', '스킬') ) as category, ";
		$query .= "f.".$this->input->cookie('language')." as itemname, d.grade, if( c.idx = max(c.idx), concat(g.".$this->input->cookie('language').", ' ( ', c.idx, ' )'), '') as equip ";
		$query .= "from koc_play.player_basic as a ";
		$query .= "left outer join koc_play.player_inventory as b on a.pid = b.pid ";
		$query .= "left outer join koc_play.player_character as c on a.pid = c.pid and ( b.idx = c.weapon or b.idx = c.backpack or b.idx = c.skill_0 or b.idx = c.skill_1 or b.idx = c.skill_2 ) ";
		$query .= "left outer join koc_ref.item as d on b.refid = d.id ";
		$query .= "left outer join koc_ref.ref_character as e on c.refid = e.id ";
		$query .= "left outer join koc_ref.text as f on concat( 'NG_ARTICLE_', d.implement ) = f.id or concat( 'NG_ARTICLE_', b.refid ) = f.id ";
		$query .= "left outer join koc_ref.text as g on concat( 'NG_ARTICLE_', e.implement ) = g.id ";
		$query .= "where a.pid = ? and b.is_del = 0 and ( b.expire is null or b.expire > now() ) ";
		$query .= "and d.category in ('WEAPON', 'BACKPACK', 'TECHNIQUE') group by a.pid, a.name, a.affiliate_name, b.idx ";

		return $this->DB->query($query, array($pid));
	}

	public function getpilotinfo( $pid )
	{
		$query = "select a.pid, b.idx, e.".$this->input->cookie('language')." as itemname, d.grade ,";
		$query .= "concat( if( c.team_seq = 0, 'A', if( c.team_seq = 1, 'B', if( c.team_seq = 2, 'C', '' ) ) ), ";
		$query .= "if( b.idx = c.pilot_0, '1', if( b.idx = c.pilot_1, '2', if( b.idx = c.pilot_2, '3', '' ) ) ) ) as board, ";
		$query .= "b.reg_date from koc_play.player_basic as a ";
		$query .= "left outer join koc_play.player_inventory as b on a.pid = b.pid ";
		$query .= "left outer join koc_play.player_team as c on a.pid = c.pid ";
		$query .= "and ( b.idx = c.pilot_0 or b.idx = c.pilot_1 or b.idx = c.pilot_2 ) ";
		$query .= "left outer join koc_ref.item as d on b.refid = d.id ";
		$query .= "left outer join koc_ref.text as e on concat( 'NG_ARTICLE_', d.implement ) = e.id ";
		$query .= "where a.pid = ? and b.is_del = 0 and ( b.expire is null or b.expire > now() ) ";
		$query .= "and d.category = 'PILOT' group by a.pid, a.name, a.affiliate_name, b.idx ";

		return $this->DB->query($query, array($pid));
	}

	public function getoperatorinfo( $pid )
	{
		$query = "select a.pid, concat(a.name, '(', a.affiliate_name, ')') as name, b.idx, e.".$this->input->cookie('language')." as itemname, ";
		$query .= "if(c.operator = b.idx, 1, 0) as is_equip, b.reg_date, b.ext_date, b.expire ";
		$query .= "from koc_play.player_basic as a ";
		$query .= "left outer join koc_play.player_inventory as b on a.pid = b.pid ";
		$query .= "left outer join koc_play.player_basic as c on a.pid = c.pid and b.idx = c.operator ";
		$query .= "left outer join koc_ref.item as d on b.refid = d.id ";
		$query .= "left outer join koc_ref.text as e on concat( 'NG_ARTICLE_', d.implement ) = e.id ";
		$query .= "where a.pid = ?  ";
		$query .= "and d.category = 'OPERATOR' group by a.pid, a.name, a.affiliate_name, b.idx ";

		return $this->DB->query($query, array($pid));
	}

	public function getfriendinfo( $pid )
	{
		$query = "select fid, fname from koc_play.player_friend where pid = ? and friend_status = 1 ";

		return $this->DB->query($query, array($pid));
	}

	public function getfriendsuminfo( $pid )
	{
		$query = "select sum(if( friend_status = 1, 1, 0 )) as fcnt, sum(if( friend_status = 0, 1, 0 )) as icnt from koc_play.player_friend where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function getachieveinfo( $pid )
	{
		$query = "select a.aid, a.astatus, a.agoal, if(a.is_reward=0,'미수령','수령') as is_reward, a.start_datetime, a.reward_datetime, ";
		$query .= "b.".$this->input->cookie('language').", c.reward_type , c.reward_value ";
		$query .= "from koc_play.player_achieve as a inner join koc_ref.text as b on concat('ACHIEVEMENT_DESC_' , a.aid) = b.id ";
		$query .= "inner join koc_ref.achievements as c on a.aid = c.id where pid = ? ";

		return $this->DB->query($query, array($pid));
	}

	public function getchargeinfo( $pid, $start_date, $end_date )
	{
		$query = "select idx, pid, sid, product_id, buy_date, storetype, expire_date, payment_unit, payment_type, payment_value, is_refund, is_provision, paymentSeq, approvedPaymentNo, naverId, paymentTime, curcash, reasonCode ";
		$query .= "from koc_play.player_iap where pid = ? and buy_date between concat(?, ' 00:00:00') and concat(?, ' 23:59:59') order by paymentTime desc ";

		return $this->DB->query($query, array($pid, $start_date, $end_date));
	}
}
?>
