					<script type="text/javascript">
						$(document).ready(function () {
							$("#access_event").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/event/getaccesseventlist',
									"data"   : {'pid': '<?php echo $this->pid; ?>', 'start_date': '<?php echo $this->start_date; ?>', 'end_date': '<?php echo $this->end_date; ?>'},
									"dataSrc": ""
								},
								"columns": [
									{"className" : "text-center", "data" : "start_date", "searchable": false, "sortable" : false},
									{"className" : "text-center", "data" : "end_date", "searchable": true, "sortable" : false},
									{"className" : "text-center", "data" : "evt_reason", "searchable": false, "sortable" : false, "render" : function ( data, type, row, meta ) { return data; } },
									{"className" : "text-center", "data" : "evt_target", "searchable": true, "sortable" : false},
									{"className" : "text-center", "data" : "evt_value", "searchable": true, "sortable" : false},
									{"className" : "text-center", "data" : "reg_id", "searchable": true, "sortable" : false},
									{"className" : "text-center", "data" : "reg_date", "searchable": true, "sortable" : false},
									{"className" : "text-center", "data" : "is_valid", "searchable": true, "sortable" : false}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order" : [0, 'desc']
							});
							$(document).on("draw.dt", "#access_event", function () {
								$("#access_event > tbody > tr").each(function () {
									var localNow = new Date();
									var utcNow = new Date(localNow.getUTCFullYear(), localNow.getUTCMonth(), localNow.getUTCDate(), localNow.getUTCHours(), localNow.getUTCMinutes(), localNow.getUTCSeconds());
									var strEnd = $(this).children("td").eq(1).html();
									var utcEnd = new Date(parseInt(strEnd.substring(0, 4)), parseInt(strEnd.substring(5, 7)) - 1, parseInt(strEnd.substring(8, 10)), parseInt(strEnd.substring(11, 13)), parseInt(strEnd.substring(14, 16)), parseInt(strEnd.substring(17, 19)));
									if ( utcNow > utcEnd )
									{
										$(this).attr("style", "background-color:#cccccc");
									}
								});
								$("#access_event_filter > label").append('&nbsp;&nbsp;<button type="button" id="btnNewReg" style="margin-top:-1px;" class="btn btn-warning">신규이벤트</button>');
							});

							$(document).on("click", "#btnNewReg", function () {
								location.href = '/<?php echo ROOTPATH; ?>/index.php/admin/event/accesseventwrite';
							});
							$("#access_event").dataTable.ext.errMode = 'none';
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>이벤트 설정</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">접속선물</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table" id="access_event">
													<thead>
														<tr>
															<th style="width: 15%">시작일</th>
															<th style="width: 15%">종료일</th>
															<th>내용</th>
															<th style="width: 15%">항목</th>
															<th style="width: 5%">수량</th>
															<th style="width: 5%">등록자</th>
															<th style="width: 10%">등록일</th>
															<th style="width: 15%">관리</th>
														</tr>
													</thead>
													<tbody>
													</tbody>
												</table>
											</div>
											<div class="form-group">
											</div>
										</div>
									</div>
									<!-- END DEFAULT DATATABLE -->
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->