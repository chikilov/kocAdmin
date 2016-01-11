					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "end_date" : $("#end_date").val() };
							$('#log_data1').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/history/getexplorationlog',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "start_datetime", "searchable": false},
									{"className" : "text-center", "data" : "reward_datetime"},
									{"data" : "cid", "render" : function ( data, type, row, meta ) { var nameString = eval('row.' + $.cookie('language')); return '★' + row.grade + ' ' + nameString + '<br />(' + row.cid + ')'; }},
									{"className" : "text-center", "data" : "exp_second", "render" : function ( data, type, row, meta ) { return Math.floor(row.exp_second / 60) + '분 ' + (row.exp_second % 60) + '초'; }},
									{"className" : "text-center", "data" : "exp_cost"},
									{"className" : "text-center", "data" : "reward_type", "render" : function ( data, type, row, meta ) { return row.reward_type + ' * ' + row.reward_value; }},
									{"className" : "text-center", "data" : "exp_experience"},
									{"className" : "text-center", "data" : "is_enemy", "render" : function ( data, type, row, meta ) { return (row.is_enemy == 1 ? '<button class="btn btn-danger">enemy</button>' : '<button type="button" class="btn btn-info">nothing</button>'); }},
									{"className" : "text-center", "data" : "is_clear", "render" : function ( data, type, row, meta ) { return (data ? '<button class="btn btn-danger">clear</button>' : '<button type="button" class="btn btn-info">Not Yet</button>'); }}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [1, 'desc'],
								"bSort": false,
								"bDestroy": true
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-file-o"></span> 행성탐색로그</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">탐색 내역</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="log_data1" class="display table">
													<thead>
														<tr>
															<th style="width: 15%">시작시간</th>
															<th style="width: 15%">종료시간</th>
															<th style="width: 10%">탐색기체</th>
															<th style="width: 10%">탐색시간</th>
															<th style="width: 10%">탐색비용</th>
															<th style="width: 15%">획득아이템</th>
															<th style="width: 5%">획득경험치</th>
															<th style="width: 10%">적발견여부</th>
															<th style="width: 10%">클리어여부</th>
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
					<!-- END PAGE CONTENT WRAPPER -->
