					<script type="text/javascript">
						$(document).ready(function () {
							$("#user_block").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/getblocklist',
									"data"   : {'pid': '<?php echo $this->pid; ?>', 'start_date': '<?php echo $this->start_date; ?>', 'end_date': '<?php echo $this->end_date; ?>'},
									"dataSrc": ""
								},
								"columns": [
									{"className" : "text-center", "data" : "reg_datetime", "searchable": false},
									{"className" : "text-center", "data" : "pid", "searchable": true},
									{"className" : "text-center", "data" : "type", "searchable": false, "render" : function ( data, type, row, meta ) { return ( data == 'R' ? '정지' : '해지' ) } },
									{"className" : "text-center", "data" : "reg_id", "searchable": true},
									{"data" : "text", "searchable": true}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bSort" : false
							});
							$("#user_block").dataTable.ext.errMode = 'none';
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>계정 제제로그</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">정지 해지 내역</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table datatable table-striped" id="user_block">
													<thead>
														<tr>
															<th style="width: 20%">정지시간</th>
															<th style="width: 10%">PID</th>
															<th style="width: 10%">타입</th>
															<th style="width: 10%">담당자</th>
															<th style="width: 50%">사유</th>
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