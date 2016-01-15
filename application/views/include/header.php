<?php
	$urlConvert =	array (
							"/kocAdmin/index.php/admin/event/accesseventwrite" => "/kocAdmin/index.php/admin/event/accesseventlist"
					);
?>
		<script type="text/javascript">
			$(document).ready(function () {
				var page = '<?php echo "http://".$this->input->server('SERVER_NAME').(array_key_exists( $this->input->server('PHP_SELF'), $urlConvert ) ? $urlConvert[$this->input->server('PHP_SELF')] : $this->input->server('PHP_SELF')); ?>';
				var href;
				$('.x-navigation li a').each(function () {
					href = this.href;
					if (href == page)
					{
						$(this).parent().addClass('active');
					}
					else
						$(this).parent().removeClass('active');
				});

				$('.xn-openable li a').each(function () {
					href = this.href;
					if (href == page)
					{
						$(this).parent().addClass('active');
						$(this).parent().parent().parent().addClass('active');
						if ( $(this).parent().parent().parent().parent().parent().attr('class') == 'xn-openable' )
						{
							$(this).parent().parent().parent().parent().parent().addClass('active');
						}
					}
					else
					{
						$(this).parent().removeClass('active');
					}
				});

				var timer1 = setInterval(function () { //인터벌 30초인 타이머 생성후 코드 반복 실행
					$.ajax({
						url : '/<?php echo ROOTPATH; ?>/index.php/admin/customer/requestConsultThumb',
						type : 'GET',
						async : true,
						success : function ( data ) {
							$("#consult").html(data);
						}
					});
				}, 30000, true);
				var timer2 = setInterval(function () { //인터벌 30초인 타이머 생성후 코드 반복 실행
					$.ajax({
						url : '/<?php echo ROOTPATH; ?>/index.php/admin/customer/requestConsultNew',
						type : 'GET',
						async : true,
						success : function ( data ) {
							$("#new3").html(data);
							$("#new4").html(data + ' NEW');
						}
					});
				}, 30000, true);

				$("#lang_sel > li > a").on("click", function () {
					$.removeCookie('language', { path: '/' });
					$.cookie('language', $(this).children('span').attr('class').replace(/flag flag-/gi, ''), { expires: 1/4, path: '/' } );
					$('#curlang').html($(this).children('span').attr('class').replace(/flag flag-/gi, ''));
					$('#lang_sel').parent().removeClass('active');
				});

				$(document).on("submit", "#iForm, #tForm", function (e) {
					e.preventDefault();
					var titles, data;
					if ( $(this).is($("#iForm")) )
					{
						titles = '코드 확인';
						data = { "idtext" : $("#idtext").val() };
					}
					else if ( $(this).is($("#tForm")) )
					{
						titles = '텍스트 확인';
						data = { "text" : $("#text").val() };
					}
					$("#modal_codelist").modal();

					$("#smallModalHead3").html(titles);

					$('#TopSearchTable').dataTable({
						"ajax": {
							"type"   : "POST",
							"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/getCodeInfo',
							"data"   : data,
							"dataSrc": "",

						},
						"columns": [
							{"data" : "id"},
							{"data" : $.cookie('language')},
						],
						"bDestroy": true
					});
				});

				$(document).on("submit", "#cForm", function (e) {
					e.preventDefault();
					var titles, data;
					titles = '캐릭터 확인';
					data = { "char" : $("#char").val() };

					$("#modal_codeinfo").modal();
					$('#TopSearchChar').dataTable({
						"ajax": {
							"type"   : "POST",
							"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/getCodeInfo',
							"data"   : data,
							"dataSrc": "",

						},
						"columns": [
							{ "data" : "title" },
							{ "data" : "value" },
						],
						"bDestroy": true,
						"paging": false,
						"searching": false,
						"info": false
					});
				});
			});
		</script>
	</head>
	<body>
		<!-- START PAGE CONTAINER -->
		<div class="page-container page-navigation-top-fixed">
			<!-- START PAGE SIDEBAR -->
			<div class="page-sidebar">
				<!-- START X-NAVIGATION -->
				<ul class="x-navigation">
					<li><a style="padding:0;" href="/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/"><img src="/<?php echo ROOTPATH; ?>/static/img/logo.png" /></a><a href="#" class="x-navigation-control"></a></li>
					<li class="xn-profile">
						<a href="#" class="profile-mini"><img src="<?php echo $this->session->userdata('photo'); ?>" alt="<?php echo $this->session->userdata('user_name'); ?>" /></a>
						<div class="profile">
							<div class="profile-image"><img src="<?php echo $this->session->userdata('photo'); ?>" alt="<?php echo $this->session->userdata('user_name'); ?>" /></div>
							<div class="profile-data">
								<div class="profile-data-name"><?php echo $this->session->userdata('user_name'); ?></div>
								<div class="profile-data-title"><?php echo $this->session->userdata('user_depart'); ?></div>
							</div>
<?php
	if ( $this->session->userdata('user_depart') != '외부' )
	{
?>
							<div class="profile-controls">
								<a href="/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/userinfo" class="profile-control-left"><span class="fa fa-info"></span></a>
								<!--<a class="profile-control-right"><span class="fa fa-envelope"></span></a>-->
							</div>
<?php
	}
?>
						</div>
					</li>
					<li class="xn-title">Navigation</li>
<?php
	if ( $this->session->userdata('user_depart') != '외부')
	{
?>
					<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/customer/consult"><span class="fa fa-question"></span> <span class="xn-text">고객문의</span></a></li>
					<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/present/sendpresent"><span class="fa fa-search"></span> <span class="xn-text">상품지급</span></a></li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-group"></span> <span class="xn-text">유저정보</span></a>
						<ul>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/playerinfo"><span class="fa fa-user"></span>기본정보</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/mailbox/maillist"><span class="fa fa-envelope-o"></span>우편함</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/blockinfo"><span class="fa fa-minus-circle"></span>제제관리</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/accountinfo"><span class="fa fa-users"></span>계정정보</a></li>
						</ul>
					</li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-th"></span> <span class="xn-text">상세정보</span></a>
						<ul>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/charinfo"><span class="fa fa-fighter-jet"></span>보유기체</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/inventoryinfo"><span class="fa fa-gear"></span>보유장비</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/pilotinfo"><span class="fa fa-male"></span>보유파일럿</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/operatorinfo"><span class="fa fa-female"></span>오퍼레이터</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/playinfo"><span class="fa fa-plane"></span>플레이정보</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/friendinfo"><span class="fa fa-smile-o"></span>친구정보</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/achieveinfo"><span class="fa fa-shield"></span>임무확인</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/player/gatchainfo"><span class="fa fa-shield"></span>뽑기확인</a></li>
						</ul>
					</li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-dollar"></span> <span class="xn-text">결제정보</span></a>
						<ul>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/payment/chargeinfo"><span class="fa fa-krw"></span>충전 내역</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/payment/cashlog"><span class="fa fa-krw"></span>사용 내역</a></li>
						</ul>
					</li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-sort-numeric-asc"></span> <span class="xn-text">랭킹</span></a>
						<ul>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-sort-numeric-asc"></span>실시간 랭킹</a>
								<ul>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/pvprankthis"><span class="fa fa-sort-numeric-asc"></span>PVP 랭킹</a></li>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/pvbrankthis"><span class="fa fa-sort-numeric-asc"></span>PVB 랭킹</a></li>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/survivalrankthis"><span class="fa fa-sort-numeric-asc"></span>생존전 랭킹 </a></li>
								</ul>
							</li>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-sort-numeric-asc"></span>지난 랭킹 조회</a>
								<ul>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/pvpranklast"><span class="fa fa-sort-numeric-asc"></span>PVP 랭킹</a></li>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/pvbranklast"><span class="fa fa-sort-numeric-asc"></span>PVB 랭킹</a></li>
									<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/rank/survivalranklast"><span class="fa fa-sort-numeric-asc"></span>생존전 랭킹 </a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">로그조회</span></a>
						<ul>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/basiclog"><span class="fa fa-file-o"></span>상세로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/gatchalog"><span class="fa fa-file-o"></span>뽑기로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/explorationlog"><span class="fa fa-file-o"></span>탐색 로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/pvelog"><span class="fa fa-file-o"></span>행성전 로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/pvplog"><span class="fa fa-file-o"></span>일대일 로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/pvblog"><span class="fa fa-file-o"></span>보스전 로그</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/history/survivallog"><span class="fa fa-file-o"></span>생존모드 로그</a></li>
						</ul>
					</li>
					<li class="xn-openable">
						<a href="#"><span class="fa fa-calendar-o"></span> <span class="xn-text">이벤트관리</span></a>
						<ul>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/event/accesseventlist"><span class="fa fa-calendar"></span>이벤트 설정</a></li>
							<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/coupon/couponlist"><span class="fa fa-ticket"></span>쿠폰 관리</a></li>
							<!--<li><a href="5star_coupon.php"><span class="fa fa-dollar"></span>5성지급 쿠폰</a></li>-->
						</ul>
					</li>
					<!--<li class="xn-openable">
						<a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">통계</span></a>
						<ul>
							<li><a href="chart_basic.php"><span class="fa fa-bar-chart-o"></span>기본지표</a></li>
							<li><a href="chart_noo.php"><span class="fa fa-bar-chart-o"></span>동시접속</a></li>
							<li><a href="chart_stay_user.php"><span class="fa fa-bar-chart-o"></span>잔존인원</a></li>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-bar-chart-o"></span>재화</a>
								<ul>
									<li><a href="chart_goods_cristal.php"><span class="fa fa-bar-chart-o"></span>수정</a></li>
									<li><a href="chart_goods_gold.php"><span class="fa fa-bar-chart-o"></span>골드</a></li>
									<li><a href="chart_goods_friends.php"><span class="fa fa-bar-chart-o"></span>우정포인트</a></li>
								</ul>
							</li>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-bar-chart-o"></span>매출</a>
								<ul>
									<li><a href="chart_sales_detail_1.php"><span class="fa fa-bar-chart-o"></span>상품별매출</a></li>
									<li><a href="chart_sales_detail_2.php"><span class="fa fa-bar-chart-o"></span>상품별구매건수</a></li>
									<li><a href="chart_sales_detail_3.php"><span class="fa fa-bar-chart-o"></span>상품별구매자수</a></li>
									<li><a href="chart_sales_detail_4.php"><span class="fa fa-bar-chart-o"></span>결제금액분포(월별)</a></li>
									<li><a href="chart_sales_detail_5.php"><span class="fa fa-bar-chart-o"></span>결제금액분포(전체)</a></li>
									<li><a href="chart_sales_detail_6.php"><span class="fa fa-bar-chart-o"></span>마켓별매출</a></li>
								</ul>
							</li>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-bar-chart-o"></span>아이템 보유</a>
								<ul>
									<li><a href="chart_item_1.php"><span class="fa fa-bar-chart-o"></span>기제보유</a></li>
									<li><a href="chart_item_2.php"><span class="fa fa-bar-chart-o"></span>무기보유</a></li>
									<li><a href="chart_item_3.php"><span class="fa fa-bar-chart-o"></span>백팩보유</a></li>
									<li><a href="chart_item_4.php"><span class="fa fa-bar-chart-o"></span>스킬보유</a></li>
									<li><a href="chart_item_5.php"><span class="fa fa-bar-chart-o"></span>파일럿보유</a></li>
								</ul>
							</li>
							<li class="xn-openable">
								<a href="#"><span class="fa fa-bar-chart-o"></span>아이템 분포</a>
								<ul>
									<li><a href="chart_count_1.php"><span class="fa fa-bar-chart-o"></span>기제분포</a></li>
									<li><a href="chart_count_2.php"><span class="fa fa-bar-chart-o"></span>무기분포</a></li>
									<li><a href="chart_count_3.php"><span class="fa fa-bar-chart-o"></span>백팩분포</a></li>
									<li><a href="chart_count_4.php"><span class="fa fa-bar-chart-o"></span>스킬분포</a></li>
									<li><a href="chart_count_5.php"><span class="fa fa-bar-chart-o"></span>파일럿분포</a></li>
								</ul>
							</li>
						</ul>
					</li>-->
					<li class="xn-title">Admin</li>
						<li class="xn-openable">
							<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">공지관리</span></a>
							<ul>
								<li><a href="admin_notice.php"><span class="fa fa-image"></span>공지사항</a></li>
								<!--<li><a href="admin_event.php"><span class="fa fa-dollar"></span>이벤트</a></li>-->
								<li><a href="image_banner.php"><span class="fa fa-wrench"></span>이미지 배너</a></li>
								<!--<li><a href="board.php"><span class="fa fa-image"></span>게시판</a></li>-->
							</ul>
						</li>
						<li class="xn-openable">
							<a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">권한관리</span></a>
							<ul>
								<li><a href="admin_edit.php"><span class="fa fa-image"></span>아이디관리</a></li>
								<!--<li><a href="#"><span class="fa fa-dollar"></span>로그조회</a></li>-->
							</ul>
						</li>
						<li><a href="/<?php echo ROOTPATH; ?>/index.php/admin/gatcha/gatchalist"><span class="fa fa-file-text-o"></span> <span class="xn-text">가챠관리</span></a></li>
						<!--<li class="xn-openable">
							<a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">정산관리</span></a>
							<ul>
								<li><a href="lazenca.php">라젠카팩</a></li>
								<li><a href="cybernator.php">발켄팩</a></li>
								<li><a href="restol.php">레스톨팩</a></li>
							</ul>
						</li>-->
<?php
	}

	if ( $this->session->userdata('user_level') == 1 )
	{
?>
						<li><a href="lazenca.php"><span class="fa fa-desktop"></span> <span class="xn-text">라젠카팩</span></a></li>
<?php
	}

	if ( $this->session->userdata('user_level') == 2 )
	{
?>
						<li><a href="cybernator.php"><span class="fa fa-desktop"></span> <span class="xn-text">발켄팩</span></a></li>
<?php
	}

	if ( $this->session->userdata('user_level') == 3 )
	{
?>
						<li><a href="restol.php"><span class="fa fa-desktop"></span> <span class="xn-text">레스톨팩</span></a></li>
<?php
	}
?>
					</ul>
					<!-- END X-NAVIGATION -->
				</div>
				<!-- END PAGE SIDEBAR -->
				<!-- PAGE CONTENT -->
				<div class="page-content">
					<!-- START X-NAVIGATION VERTICAL -->
					<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
						<!-- TOGGLE NAVIGATION -->
						<li class="xn-icon-button"><a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a></li>
						<!-- END TOGGLE NAVIGATION -->
<?php
	if ( $this->session->userdata('user_depart') != '외부' )
	{
?>
						<!-- SEARCH -->
						<li class="xn-search">
							<form role="form" id="pForm" action="user_basic.php" method="get">
								<input type="text" name="pid" placeholder="pid..." />
							</form>
						</li>
						<li class="xn-search">
							<form role="form" id="iForm" method="get">
								<input type="text" id="idtext" name="idtext" placeholder="code..." />
							</form>
						</li>
						<li class="xn-search">
							<form role="form" id="tForm" method="get">
								<input type="text" id="text" name="text" placeholder="text..." />
							</form>
						</li>
						<li class="xn-search">
							<form role="form" id="cForm" method="get">
								<input type="text" id="char" name="char" placeholder="robot..." />
							</form>
						</li>
						<!-- END SEARCH -->
<?php
	}
?>
						<!-- POWER OFF -->
						<li class="xn-icon-button pull-right last">
							<a href="#"><span class="fa fa-power-off"></span></a>
							<ul class="xn-drop-left animated zoomIn">
								<!--<li><a href="user_profile.php"><span class="fa fa-user"></span> User Info</a></li>
								<li><a href="pages-lock-screen.html"><span class="fa fa-lock"></span> Lock Screen</a></li>-->
								<li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> 로그아웃</a></li>
							</ul>
						</li>
						<!-- END POWER OFF -->
<?php
	if( $this->session->userdata('user_depart') != '외부' )
	{
?>
						<!-- MESSAGES -->
						<!--<li id="messege_aa" class="xn-icon-button pull-right">
							<a id="messege_ss"  href="#"><span class="fa fa-comments"></span></a>
							<div class="informer informer-danger"><div id="new"></div></div>
							<div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>
									<div class="pull-right">
										<span class="label label-danger"><div id="new2"></div></span>
									</div>
								</div>
								<div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
									<div id="chatLog2"></div>
								</div>
								<div class="panel-footer text-center"><a href="admin_messages.php">Show all messages</a></div>
							</div>
						</li>-->
						<!-- END MESSAGES -->
						<!-- TASKS -->
						<li class="xn-icon-button pull-right">
							<a href="#"><span class="fa fa-tasks"></span></a>
							<div class="informer informer-warning"><div id="new3"></div></div>
							<div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
								<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-tasks"></span> 1:1 문의</h3>
									<div class="pull-right">
										<span class="label label-warning"><div id="new4"></div></span>
									</div>
								</div>
								<div class="panel-body list-group scroll" style="height: 200px;">
									<div id="consult"></div>
								</div>
								<div class="panel-footer text-center"><a href="./consult.php">1:1 문의 보기</a></div>
							</div>
						</li>
						<!-- END TASKS -->
						<!-- LANG BAR -->
						<li class="xn-icon-button pull-right">
							<a href="#"><span class="fa fa-refresh"></span></span></a>
							<div class="informer informer-warning"><div id="curlang"><?php echo $this->input->cookie('language'); ?></div></div>
							<ul id="lang_sel" class="xn-drop-left xn-drop-white animated zoomIn">
								<li><a style="cursor: pointer;"><span class="flag flag-kr"></span>한국어</a></li>
								<li><a style="cursor: pointer;"><span class="flag flag-en"></span>영어</a></li>
								<li><a style="cursor: pointer;"><span class="flag flag-jp"></span>일본어</a></li>
								<li><a style="cursor: pointer;"><span class="flag flag-cn"></span>중국어</a></li>
								<li><a style="cursor: pointer;"><span class="flag flag-tw"></span>대만어</a></li>
							</ul>
						</li>
						<!-- END LANG BAR -->
<?php
	}
?>
					</ul>
					<!-- END X-NAVIGATION VERTICAL -->
