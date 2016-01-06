					<script type="text/javascript">
						$(document).ready(function () {
							$(".tab-pane").eq(0).addClass("active");

							$(document).on("click", ".nav-justified > li > a", function () {
								$(".tab-pane").removeClass("active");
								$(".tab-pane").eq($(this).parent().index()).addClass("active");
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-user"></span> User Profile</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-3">
								<div class="form-horizontal">
									<div class="panel panel-default">
										<div class="panel-body">
											<h3><span class="fa fa-user"></span> USER NAME</h3>
											<div class="text-center" id="user_image">
												<?php echo( !empty($accountInfo) ? ( $accountInfo['affiliate_name'] == '' || is_null($accountInfo['affiliate_name']) ? '-' : $accountInfo['affiliate_name'] ) : '-' ); ?>
											</div>
										</div>
										<div class="panel-body form-group-separated">
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">LOGIN</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($accountInfo) ? ( $accountInfo['affiliate_type'] == '' || is_null($accountInfo['affiliate_type']) ? '-' : $accountInfo['affiliate_type'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">id</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($accountInfo) ? ( $accountInfo['id'] == '' || is_null($accountInfo['id']) ? '-' : $accountInfo['id'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">E-mail</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($accountInfo) ? ( $accountInfo['email'] == '' || is_null($accountInfo['email']) ? '-' : $accountInfo['email'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">가입일</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($accountInfo) ? ( $accountInfo['reg_date'] == '' || is_null($accountInfo['reg_date']) ? '-' : $accountInfo['reg_date'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">계정상태</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($accountInfo) ? ( $accountInfo['limit_type'] != 'R' ? '정상&nbsp;<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_block">영구정지</button>' : ( $accountInfo['retire_date'] != '' ? '탈퇴&nbsp;<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal_restore">탈퇴해지</button>' : '정지&nbsp;<button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal_restore">정지해지</button>' ) ) : '-' ); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-horizontal">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">서버 유저정보</h3>
										</div>
										<div class="panel-body form-group-separated">
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">캐릭터명</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($basicInfo) ? ( $basicInfo['name'] == '' || is_null($basicInfo['name']) ? '-' : $basicInfo['name'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">최근접속</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($basicInfo) ? ( $basicInfo['login_datetime'] == '' || is_null($basicInfo['login_datetime']) ? '-' : $basicInfo['login_datetime'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">VIP레벨</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($basicInfo) ? ( $basicInfo['vip_level'] == '' || is_null($basicInfo['vip_level']) ? '-' : $basicInfo['vip_level'] ) : '-' ); ?></div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">서바이벌</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($rankInfo['survival']) ? ( $rankInfo['survival']['rank'] == '' || is_null($rankInfo['survival']['rank']) ? '-' : $rankInfo['survival']['rank'] ) : '-' ); ?>등&nbsp;/&nbsp;<?php echo( !empty($rankInfo['survival']) ? ( $rankInfo['survival']['score'] == '' || is_null($rankInfo['survival']['score']) ? '-' : $rankInfo['survival']['score'] ) : '-' ); ?>점</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">PVB랭킹</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($rankInfo['pvb']) ? ( $rankInfo['pvb']['rank'] == '' || is_null($rankInfo['pvb']['rank']) ? '-' : $rankInfo['pvb']['rank'] ) : '-' ); ?>등&nbsp;/&nbsp;<?php echo( !empty($rankInfo['pvb']) ? ( $rankInfo['pvb']['score'] == '' || is_null($rankInfo['pvb']['score']) ? '-' : $rankInfo['pvb']['score'] ) : '-' ); ?>점</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">PVP랭킹</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($rankInfo['pvp']) ? ( $rankInfo['pvp']['rank'] == '' || is_null($rankInfo['pvp']['rank']) ? '-' : $rankInfo['pvp']['rank'] ) : '-' ); ?>등&nbsp;/&nbsp;<?php echo( !empty($rankInfo['pvp']) ? ( $rankInfo['pvp']['score'] == '' || is_null($rankInfo['pvp']['score']) ? '-' : $rankInfo['pvp']['score'] ) : '-' ); ?>점</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 col-xs-5 control-label">MAX레벨</label>
												<div class="col-md-8 col-xs-7 line-height-30"><?php echo( !empty($maxInfo['mailCnt']) ? $maxInfo['mailCnt']['cnt'] : '-' ); ?>&nbsp;/&nbsp;<?php echo( !empty($maxInfo['maxChar']) ? $maxInfo['maxChar']['cnt'] : '-' ); ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 ">
								<div class="panel panel-default form-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title">남은 참여 횟수</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>에너지</th>
														<th>PVP</th>
														<th>보스전</th>
														<th>서바이벌</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['energy_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['pvp_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['pvb_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['survival_points'] : '-' ); ?></td>
													</tr>
												</tbody>
												<thead>
													<tr>
														<th>골드</th>
														<th>구매 수정</th>
														<th>이벤트 수정</th>
														<th>우정포인트</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['game_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['cash_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['event_points'] : '-' ); ?></td>
														<td><?php echo( !empty($itemInfo) ? $itemInfo['friendship_points'] : '-' ); ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel panel-default tabs form-horizontal">
									<ul class="nav nav-tabs nav-justified">
										<li class="active"><a href="#" data-toggle="tab">A팀</a></li>
										<li><a href="#" data-toggle="tab">B팀</a></li>
										<li><a href="#" data-toggle="tab">C팀</a></li>
									</ul>
									<div class="tab-content">
<?php
	if ( !empty($teamInfo) )
	{
		foreach( $teamInfo as $row )
		{
?>
										<div class="tab-pane panel-body">
											<div class="list-group list-group-contacts border-bottom">
												<div class="table-responsive">
													<table class="table table-bordered">
														<thead>
															<tr style="background-color: #F8FAFC">
																<th rowspan="2" style="vertical-align: middle">기체명</th>
																<th rowspan="2" style="vertical-align: middle">등급</th>
																<th rowspan="2" style="vertical-align: middle">레벨</th>
																<th rowspan="2" style="vertical-align: middle">강화</th>
																<th>무기</th>
																<th>백팩</th>
																<th>파일럿</th>
															</tr>
															<tr style="background-color: #F8FAFC">
																<th>스킬1</th>
																<th>스킬2</th>
																<th>스킬3</th>
															</tr>
														</thead>
														<tbody>
															<tr style="background-color: #F8FAFC">
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['ref_0'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['grd_0'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['level_0'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['upgrade_0'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['weapon_0'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['backpack_0'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['pilot_0'] : '-' ); ?></td>
															</tr>
															<tr style="background-color: #F8FAFC">
																<td><?php echo( !empty($row) ? $row['skill_00'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_01'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_02'] : '-' ); ?></td>
															</tr>
															<tr style="background-color: #F8FAFC">
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['ref_1'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['grd_1'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['level_1'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['upgrade_1'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['weapon_1'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['backpack_1'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['pilot_1'] : '-' ); ?></td>
															</tr>
															<tr style="background-color: #F8FAFC">
																<td><?php echo( !empty($row) ? $row['skill_10'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_11'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_12'] : '-' ); ?></td>
															</tr>
															<tr style="background-color: #F8FAFC">
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['ref_2'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['grd_2'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['level_2'] : '-' ); ?></td>
																<td rowspan="2" style="vertical-align: middle"><?php echo( !empty($row) ? $row['upgrade_2'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['weapon_2'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['backpack_2'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['pilot_2'] : '-' ); ?></td>
															</tr>
															<tr style="background-color: #F8FAFC">
																<td><?php echo( !empty($row) ? $row['skill_20'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_21'] : '-' ); ?></td>
																<td><?php echo( !empty($row) ? $row['skill_22'] : '-' ); ?></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
<?php
		}
	}
?>
									</div>
								</div>
								<div class="panel panel-default form-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title">스테이지 정보</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered text-center">
												<thead>
													<tr>
														<th class="text-center">행성명</th>
														<th class="text-center">일반</th>
														<th class="text-center">하드</th>
														<th class="text-center">헬</th>
													</tr>
												</thead>
												<tbody>
<?php
	if ( !empty($stageInfo) )
	{
		foreach( $stageInfo as $row )
		{
?>
													<tr>
														<td><?php echo $row[$this->input->cookie('language')]; ?></td>
														<td><?php echo ( !empty($row) ? ( $row['diff'] == '0' ? $row['scene'] : '' ) : '-' ); ?></td>
														<td><?php echo ( !empty($row) ? ( $row['diff'] == '1' ? $row['scene'] : '' ) : '-' ); ?></td>
														<td><?php echo ( !empty($row) ? ( $row['diff'] == '2' ? $row['scene'] : '' ) : '-' ); ?></td>
													</tr>
<?php
		}
	}
?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END STRIPED TABLE SAMPLE -->
							</div>
							<div class="col-md-3">
								<div class="panel panel-default form-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title"> Quick Info</h3>
									</div>
									<div class="panel-body form-group-separated">
										<div class="form-group">
											<div onclick="location.href='user_view01.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">상세내역</div>
											<div onclick="location.href='user_mail.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">우편함</div>
										</div>
										<div class="form-group">
											<div onclick="location.href='user_charge.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">층전내역</div>
											<div onclick="location.href='user_trade.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">거래내역</div>
										</div>
										<div class="form-group">
											<div onclick="location.href='user_pve_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">행성전로그</div>
											<div onclick="location.href='user_detail_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">상세로그</div>
										</div>
										<div class="form-group">
											<div onclick="location.href='user_survival_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">생존전로그</div>
											<div onclick="location.href='user_exp_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">탐험로그</div>
										</div>
										<div class="form-group">
											<div onclick="location.href='user_pvp_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">PVP로그</div>
											<div onclick="location.href='user_pvb_log.php?pid=<?=$pid?>'" class="col-md-6 col-xs-6 line-height-30 text-center">PVB로그</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default form-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title">도감</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered">
<?php
	if ( !empty($collection) )
	{
		foreach( $collection as $row )
		{
?>
												<tr>
													<th><?php echo ( !empty($row) ? $row['voc'] : '-' ); ?></th>
													<td><?php echo ( !empty($row) ? $row['ucnt'] : '-' ); ?>&nbsp;/&nbsp;<?php echo ( !empty($row) ? $row['tcnt'] : '-' ); ?></td>
												</tr>
<?php
		}
	}
?>
											</table>
										</div>
									</div>
								</div>
								<!-- END STRIPED TABLE SAMPLE -->
								<div class="panel panel-default form-horizontal">
									<div class="panel-heading">
										<h3 class="panel-title">오퍼레이터</h3>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>이름</th>
														<th>고용만료일</th>
													</tr>
												</thead>
												<tbody>
<?php
	if ( !empty($operator) )
	{
		foreach( $operator as $row )
		{
?>
													<tr>
														<td><?php echo ( !empty($row) ? $row['kr'] : '-' ); ?></td>
														<td><?php echo ( !empty($row) ? $row['expire'] : '-' ); ?></td>
													</tr>
<?php
		}
	}
	else
	{
?>
													<tr>
														<td class="text-center">-</td>
														<td class="text-center">-</td>
													</tr>
<?php
	}
?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END STRIPED TABLE SAMPLE -->
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->
