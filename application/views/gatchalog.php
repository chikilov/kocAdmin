					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "start_time" : $("#start_time").val(), "end_date" : $("#end_date").val(), "end_time" : $("#end_time").val() };
							$('#log_data2').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/history/getgatchalog',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "pid", "searchable": false, "sortable" : false},
									{"className" : "text-center", "data" : "ticket", "sortable" : false},
									{"className" : "text-center", "data" : "result", "sortable" : false},
									{"className" : "text-center", "data" : "result_date"}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [[3, 'desc']],
								"bDestroy": true
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-file-o"></span> 뽑기로그</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">뽑기내역</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="log_data2" class="display table">
													<thead>
														<tr>
															<th style="width: 10%">pid</th>
															<th style="width: 30%">티켓명</th>
															<th style="width: 35%">결과</th>
															<th style="width: 25%">뽑기시간</th>
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
