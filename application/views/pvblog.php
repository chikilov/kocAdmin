					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "end_date" : $("#end_date").val() };
							$('#log_data2').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/history/getpvblog',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "weekseq", "searchable": false, "sortable" : false},
									{"className" : "text-center", "data" : "start_datetime", "searchable": false, "sortable" : false},
									{"className" : "text-center", "data" : "result_datetime", "sortable" : false},
									{"className" : "text-center", "data" : "level", "sortable" : false},
									{"className" : "text-center", "data" : "score", "sortable" : false},
									{"className" : "text-center", "data" : "instant_item1", "sortable" : false, "render" : function ( data, type, row, meta ) {
																							var itemString = '';
																							itemString += (row.instant_item1 == '0' ? '' : row.instant_item1);
																							itemString += (row.instant_item2 == '0' ? '' : ', ' + row.instant_item2);
																							itemString += (row.instant_item3 == '0' ? '' : ', ' + row.instant_item3);
																							itemString += (row.instant_item4 == '0' ? '' : ', ' + row.instant_item4);
																							return itemString;
																						}
									},
									{"className" : "text-center", "data" : "is_clear", "sortable" : false},
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [[0, 'desc'],[1, 'desc']],
								"bDestroy": true
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-file-o"></span> 보스전로그</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">보스전로그</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="log_data2" class="display table">
													<thead>
														<tr>
															<th style="width: 10%">주차</th>
															<th style="width: 20%">시작시간</th>
															<th style="width: 20%">종료시간</th>
															<th style="width: 10%">레벨</th>
															<th style="width: 10%">획득점수</th>
															<th style="width: 30%">사용아이템</th>
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
