					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val() };
							$('#dataTableList5_1').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypveinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "stage", "searchable": false},
									{"className" : "text-center", "data" : "scene", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_2').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvpinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_3').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvplastinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_4').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvbinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_5').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvblastinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_6').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvbinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_7').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplaypvblastinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "rank", "searchable": false},
									{"className" : "text-center", "data" : "match_count", "searchable": false},
									{"className" : "text-center", "data" : "win_count", "searchable": false},
									{"className" : "text-center", "data" : "lose_count", "searchable": false},
									{"className" : "text-center", "data" : "score", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
							});

							$('#dataTableList5_8').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getplayexplorationinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "charname", "searchable": false},
									{"className" : "text-center", "data" : "tcnt", "searchable": false},
									{"className" : "text-center", "data" : "notcnt", "searchable": false},
									{"className" : "text-center", "data" : "ecnt", "searchable": false}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bDestroy": true,
								"paging": false,
								"searching": false,
								"ordering": false,
								"info": false
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
										<div class="tab-pane active" role="tabpanel" id="t5">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_2">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_3">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_4">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_5">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_6">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_7">
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
																	<table class="display table table-striped table-bordered" id="dataTableList5_8">
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
										<!---------------------------------------->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->
