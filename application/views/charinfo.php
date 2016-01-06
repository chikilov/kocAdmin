					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val() };
							$('#dataTableList1').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getcharinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "idx"},
									{"data" : "charname"},
									{"className" : "text-center", "data" : "grade", "searchable": false},
									{"className" : "text-center", "data" : "level", "searchable": false},
									{"className" : "text-center", "data" : "up_grade", "searchable": false},
									{"className" : "text-center", "data" : "weapon_name", "searchable": false},
									{"className" : "text-center", "data" : "backpack_name", "searchable": false},
									{"className" : "text-center", "data" : "skill_0_name", "searchable": false},
									{"className" : "text-center", "data" : "skill_1_name", "searchable": false},
									{"className" : "text-center", "data" : "skill_2_name", "searchable": false},
									{"className" : "text-center", "data" : "team"}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [0, 'desc'],
								"bDestroy": true
							});
							$("#d_tab > ul > li > a[href=\"<?php echo $_SERVER['REQUEST_URI'] ?>\"]").parent().addClass("active");
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<div class="row">
							<div class="col-md-12">
								<div id="d_tab" class="panel panel-default tabs">
									<ul class="nav nav-tabs" role="tablist">
										<?php include VIEWPATH."/include/subtab_detail_view.php"; ?>
									</ul>
									<div class="panel-body tab-content">
										<!------------------------------------------->
										<div class="tab-pane active" role="tabpanel" id="t1">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">보유기체</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList1">
																		<thead>
																			<tr>
																				<th style="width:9%">ID</th>
																				<th style="width:10%">기체명</th>
																				<th style="width:4%">등급</th>
																				<th style="width:4%">레벨</th>
																				<th style="width:4%">강화</th>
																				<th style="width:11%">무기</th>
																				<th style="width:11%">백팩</th>
																				<th style="width:11%">스킬1</th>
																				<th style="width:11%">스킬2</th>
																				<th style="width:11%">스킬3</th>
																				<th style="width:4%">팀</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t2">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">보유장비</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList2">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
							                                                    <th style="width:15%">분류</th>
							                                                    <th style="width:30%">이름</th>
							                                                    <th style="width:10%">등급</th>
							                                                    <th style="width:30%">장착</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t3">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">보유파일럿</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList3">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
							                                                    <th style="width:30%">파일럿</th>
							                                                    <th style="width:20%">탑승</th>
							                                                    <th style="width:20%">등급</th>
							                                                    <th style="width:30%">구매일자</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t4">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">오퍼레이터</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
							                                                    <th style="width:30%">오퍼레이터</th>
							                                                    <th style="width:15%">구매일자</th>
							                                                    <th style="width:15%">만료일자</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t5">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">행성전</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList5_1">
																		<thead>
																			<tr>
																				<th>현재 스테이지</th>
							                                                    <th>총 진행 횟수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">1:1 대전</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList5_2">
																		<thead>
																			<tr>
																				<th>랭킹(현재시즌)</th>
																				<th>참가 횟수</th>
																				<th>승</th>
																				<th>패</th>
																				<th>점수</th>
																			</tr>
																		</thead>
																		<tbody>
																	</table>
																	<table class="display table" id="dataTableList5_3">
																		</tbody>
																		<thead>
							                                                <tr>
							                                                    <th>랭킹(지난시즌)</th>
							                                                   	<th>참가 횟수</th>
							                                                    <th>승</th>
																				<th>패</th>
																				<th>점수</th>
							                                                </tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">보스대전</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList5_4">
																		<thead>
																			<tr>
																				<th>랭킹(현재시즌)</th>
																				<th>참가 횟수</th>
																				<th>승</th>
																				<th>패</th>
																				<th>점수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																	<table class="display table" id="dataTableList5_5">
																		<thead>
																			<tr>
																				<th>랭킹(지난시즌)</th>
																				<th>참가 횟수</th>
																				<th>승</th>
																				<th>패</th>
																				<th>점수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">생존모드</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList5_6">
																		<thead>
																			<tr>
																				<th>랭킹(현재시즌)</th>
																				<th>참가 횟수</th>
																				<th>승</th>
																				<th>패</th>
																				<th>점수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																	<table class="display table" id="dataTableList5_7">
																		<thead>
																			<tr>
																				<th>랭킹(지난시즌)</th>
																				<th>참가 횟수</th>
																				<th>승</th>
																				<th>패</th>
																				<th>점수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">탐색</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList5_8">
																		<thead>
																			<tr>
																				<th>탐색중 기체</th>
																				<th>총 탐색 횟수</th>
																				<th>맵클리어수</th>
																				<th>적퇴치수</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t6">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">친구정보</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
																				<th style="width:15%">기체명</th>
																				<th style="width:5%">등급</th>
																				<th style="width:5%">레벨</th>
																				<th style="width:5%">강화</th>
																				<th style="width:10%">무기</th>
																				<th style="width:10%">백팩</th>
																				<th style="width:10%">스킬1</th>
																				<th style="width:10%">스킬2</th>
																				<th style="width:10%">스킬3</th>
																				<th style="width:5%">팀</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t7">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">임무확인</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
																				<th style="width:15%">기체명</th>
																				<th style="width:5%">등급</th>
																				<th style="width:5%">레벨</th>
																				<th style="width:5%">강화</th>
																				<th style="width:10%">무기</th>
																				<th style="width:10%">백팩</th>
																				<th style="width:10%">스킬1</th>
																				<th style="width:10%">스킬2</th>
																				<th style="width:10%">스킬3</th>
																				<th style="width:5%">팀</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" role="tabpanel" id="t8">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">뽑기확인</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
																				<th style="width:15%">기체명</th>
																				<th style="width:5%">등급</th>
																				<th style="width:5%">레벨</th>
																				<th style="width:5%">강화</th>
																				<th style="width:10%">무기</th>
																				<th style="width:10%">백팩</th>
																				<th style="width:10%">스킬1</th>
																				<th style="width:10%">스킬2</th>
																				<th style="width:10%">스킬3</th>
																				<th style="width:5%">팀</th>
																			</tr>
																		</thead>
																		<tbody>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
														<!-- END DEFAULT DATATABLE -->
													</div>
												</div>
											</div>
										</div>
										<!---------------------------------------->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->
