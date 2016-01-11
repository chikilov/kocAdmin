					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "start_time" : $("#start_time").val(), "end_date" : $("#end_date").val(), "end_time" : $("#end_time").val() };
							$('#log_data1').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/history/getbasiclog',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "pid", "searchable": false},
									{"className" : "text-center", "data" : "log_datetime"},
									{"data" : "logcontent", "render" : function ( data, type, row, meta ) { return row.logcontent.replace(/(?:\r\n|\r|\n)/g, '<br />').replace(/(?:\t)/g, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') } }
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
							<h2><span class="fa fa-file-o"></span> 상세로그</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">상세로그</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="log_data1" class="display table">
													<thead>
														<tr>
															<th style="width: 5%">PID</th>
															<th style="width: 15%">로그시간</th>
															<th style="width: 80%">내용</th>
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
