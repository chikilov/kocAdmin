					<script type="text/javascript">
						$(document).ready(function () {
							$(document).on("click", "#user_id", function (e) {
								e.preventDefault();
								$("#user_block").dataTable({
									"ajax": {
										"type"   : "POST",
										"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/adminmain/getaccountlist',
										"data"   : {'stype': $('#stype').val(), 'svalue': $('#svalue').val()},
										"dataSrc": ""
									},
									"columns": [
										{"className" : "text-center", "data" : "pid", "searchable": false},
										{"className" : "text-center", "data" : "id", "searchable": true},
										{"className" : "text-center", "data" : "email", "searchable": false},
										{"className" : "text-center", "data" : "affiliate_name", "searchable": true},
										{"className" : "text-center", "data" : "affiliate_type", "searchable": true},
										{"className" : "text-center", "data" : "reg_date", "searchable": false},
										{"className" : "text-center", "data" : "limit_type", "searchable": false, "render" : function ( data, type, row, meta ) { if ( row.limit_type == 'R' && row.retire_date != '' ) { return '탈퇴'; } else { if ( row.limit_type == 'R' ) { return '정지'; } else { return '정상'; } } } },
										{"className" : "text-center", "data" : "retire_date", "searchable": false}
									],
									"bDestroy": true,
									"oLanguage": {
										"sEmptyTable": '검색된 결과가 없습니다.'
									},
									"bSort" : false
								});
								$("#user_block").dataTable.ext.errMode = 'none';
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>로그인 정보 확인</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">USER LIST</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table datatable table-striped" id="user_block">
													<thead>
														<tr>
															<th style="width: 10%">PID</th>
															<th style="width: 10%">ID</th>
															<th style="width: 20%">E-Mail</th>
															<th style="width: 10%">로그인 이름</th>
															<th style="width: 10%">로그인 타입</th>
															<th style="width: 20%">가입일</th>
															<th style="width: 10%">정지사유</th>
															<th style="width: 10%">탈퇴일</th>
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