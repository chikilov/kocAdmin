<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends MY_Controller {

	function __construct(){
		parent::__construct();
	}

	public function playerinfo()
	{
		$this->load->model('Model_Account', 'dbAccount');
		$this->load->model('Model_Play', 'dbPlay');
		$this->load->model('Model_Rank', 'dbRank');
		$this->load->model('Model_Mail', 'dbMail');
		$this->load->model('Model_Manage', 'dbManage');

		if ( $this->pid )
		{
			$arrResult1 = $this->dbAccount->requestPlayerInfo( $this->pid )->result_array();
			if ( empty($arrResult1) )
			{
				$arrResult1 = null;
			}
			else
			{
				$arrResult1 = $arrResult1[0];
			}

			$arrResult2 = $this->dbPlay->requestBasicInfo( $this->pid )->result_array();
			if ( empty($arrResult2) )
			{
				$arrResult2 = null;
			}
			else
			{
				$arrResult2 = $arrResult2[0];
			}

			$arrResult3['pvp'] = $this->dbRank->requestPVPRank( $this->pid )->result_array();
			if ( empty($arrResult3['pvp']) )
			{
				$arrResult3['pvp'] = array('rank' => '-', 'score' => '-');
			}
			else
			{
				$arrResult3['pvp'] = $arrResult3['pvp'][0];
			}

			$arrResult3['pvb'] = $this->dbRank->requestPVBRank( $this->pid )->result_array();
			if ( empty($arrResult3['pvb']) )
			{
				$arrResult3['pvb'] = array('rank' => '-', 'score' => '-');
			}
			else
			{
				$arrResult3['pvb'] = $arrResult3['pvb'][0];
			}

			$arrResult3['survival'] = $this->dbRank->requestSURVIVALRank( $this->pid )->result_array();
			if ( empty($arrResult3['survival']) )
			{
				$arrResult3['survival'] = array('rank' => '-', 'score' => '-');
			}
			else
			{
				$arrResult3['survival'] = $arrResult3['survival'][0];
			}

			$arrResult4['mailCnt'] = $this->dbMail->requestMaxPresent( $this->pid )->result_array();
			if ( empty($arrResult4['mailCnt']) )
			{
				$arrResult4['mailCnt'] = array('cnt' => '-');
			}
			else
			{
				$arrResult4['mailCnt'] = $arrResult4['mailCnt'][0];
			}

			$arrResult4['maxChar'] = $this->dbPlay->requestMaxChar( $this->pid )->result_array();
			if ( empty($arrResult4['maxChar']) )
			{
				$arrResult4['maxChar'] = array('cnt' => '-');
			}
			else
			{
				$arrResult4['maxChar'] = $arrResult4['maxChar'][0];
			}

			$arrResult5 = $this->dbPlay->requestItemInfo( $this->pid )->result_array();
			if ( empty($arrResult5) )
			{
				$arrResult5 = null;
			}
			else
			{
				$arrResult5 = $arrResult5[0];
			}

			$arrResult6 = $this->dbPlay->requestTeamInfo( $this->pid )->result_array();
			if ( empty($arrResult6) )
			{
				$arrResult6 = null;
			}

			$arrResult7 = $this->dbRank->requestPVERank( $this->pid )->result_array();
			if ( empty($arrResult7) )
			{
				$arrResult7 = null;
			}

			$arrResult8 = $this->dbPlay->requestCollection( $this->pid )->result_array();
			if ( empty($arrResult8) )
			{
				$arrResult8 = null;
			}

			$arrResult9 = $this->dbPlay->requestOperator( $this->pid )->result_array();
			if ( empty($arrResult9) )
			{
				$arrResult9 = null;
			}
		}
		else
		{
			$arrResult1 = null;
			$arrResult2 = null;
			$arrResult3 = null;
			$arrResult4 = null;
			$arrResult5 = null;
			$arrResult6 = array(null, null, null);
			$arrResult7 = null;
			$arrResult8 = null;
			$arrResult9 = null;
		}
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('playerinfo', array('accountInfo' => $arrResult1, 'basicInfo' => $arrResult2, 'rankInfo' => $arrResult3, 'maxInfo' => $arrResult4, 'itemInfo' => $arrResult5, 'teamInfo' => $arrResult6, 'stageInfo' => $arrResult7, 'collection' => $arrResult8, 'operator' => $arrResult9));
		$this->load->view('include/footer');
	}

	public function charinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('charinfo');
		$this->load->view('include/footer');
	}

	public function inventoryinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('inventoryinfo');
		$this->load->view('include/footer');
	}

	public function pilotinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('pilotinfo');
		$this->load->view('include/footer');
	}

	public function operatorinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('operatorinfo');
		$this->load->view('include/footer');
	}

	public function playinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('playinfo');
		$this->load->view('include/footer');
	}

	public function friendinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('friendinfo');
		$this->load->view('include/footer');
	}

	public function achieveinfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('achieveinfo');
		$this->load->view('include/footer');
	}

	public function gatchainfo()
	{
		$this->load->view('include/head');
		$this->load->view('include/header');
		$this->load->view('include/subsearchbar', array('searchtype' => array( 'pid', 'name' ), 'pid' => $this->pid, 'name' => $this->name));
		$this->load->view('include/subtab_detail');
		$this->load->view('gatchainfo');
		$this->load->view('include/footer');
	}

	public function getcharinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getcharinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getinventoryinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getinventoryinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getpilotinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getpilotinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getoperatorinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getoperatorinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaypveinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaypveinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaypvpinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaypvpinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaypvplastinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaypvplastinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaypvbinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaypvbinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaypvblastinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaypvblastinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaysurvivalinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaysurvivalinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplaysurvivallastinfo()
	{
		$this->load->model('Model_Rank', 'dbRank');

		if ( $this->pid )
		{
			$arrResult = $this->dbRank->getplaysurvivallastinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getplayexplorationinfo()
	{
		$this->load->model('Model_Record', 'dbRecord');

		if ( $this->pid )
		{
			$arrResult1 = $this->dbRecord->getplayexplorationinfo( $this->pid )->result_array();
			$arrResult2 = $this->dbRecord->getplayexplorationcount( $this->pid )->result_array();
		}
		else
		{
			$arrResult1 = array();
		}

		if ( count($arrResult1) > 0 )
		{
			$charname = '';
			foreach ( $arrResult1 as $row )
			{
				$charname .= ( $charname == '' ? $row['charname'] : ', '.$row['charname'] );
			}
			$arrResult[0] = $arrResult2[0];
			$arrResult[0]["charname"] = $charname;
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getfriendinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getfriendinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getfriendsuminfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getfriendsuminfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getachieveinfo()
	{
		$this->load->model('Model_Play', 'dbPlay');

		if ( $this->pid )
		{
			$arrResult = $this->dbPlay->getachieveinfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}

	public function getgatchainfo()
	{
		$this->load->model('Model_Ref', 'dbRef');

		if ( $this->pid )
		{
			$arrResult = $this->dbRef->getgatchainfo( $this->pid )->result_array();
		}
		else
		{
			$arrResult = array();
		}

		echo json_encode($arrResult, JSON_UNESCAPED_UNICODE);
	}
}
