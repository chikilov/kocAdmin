<?php
	$arrRequest = explode('/', $_SERVER['REQUEST_URI']);
	$arrRequest = explode('rank', $arrRequest[count($arrRequest) - 1]);
	$arrRequest = $arrRequest[count($arrRequest) - 1];
?>
					<script type="text/javascript">
						$(document).ready(function () {
							$("#datatable1").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/rank/getpvbranklist<?php echo $arrRequest; ?>',
									"data"   : {'pid': '<?php echo $this->pid; ?>', 'name': '<?php echo $this->name; ?>'},
									"dataSrc": ""
								},
								"columns": [
									{"className" : "text-center", "data" : "rank"},
									{"className" : "text-center", "data" : "pid"},
									{"className" : "text-center", "data" : "name"},
									{"className" : "text-center", "data" : "score", "searchable": false},
									{"className" : "text-center", "data" : "level", "searchable": false}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								}
							});
							$("#user_mail").dataTable.ext.errMode = 'none';
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-sort-numeric-asc"></span>&nbsp;<?php echo ($arrRequest == 'this' ? '실시간' : '지난' );?>&nbsp;랭킹 - PVB 랭킹</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">랭킹 조회</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table table-striped" id="datatable1">
													<thead>
														<tr>
															<th style="width: 10%">랭킹</th>
															<th style="width: 20%">PID</th>
															<th style="width: 20%">이름</th>
															<th style="width: 20%">점수</th>
															<th style="width: 20%">승패</th>
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