					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "end_date" : $("#end_date").val() };
							$('#charge_data').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/payment/getcashlog',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "reg_datetime"},
									{"className" : "text-center", "data" : "usetype", "render": function ( data, type, row, meta ) { return ( data == 'use' ? '-' : ( data == 'save' ? '+' : '?' ) ) }},
									{"className" : "text-center", "data" : "asset_type"},
									{"className" : "text-center", "data" : "asset_value"},
									{"className" : "text-center", "data" : "description"}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [0, 'desc'],
								"bDestroy": true
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-krw"></span> 사용 내역</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">사용 내역</h3>
											<div class="btn-group pull-right">
												<a download="<?php echo date('Y-m-d').'_'.($this->pid ? $this->pid : 0).'_charge.xls' ?>" href="#" onclick="return ExcellentExport.excel(this, 'charge_data', 'charge_data');">
													<button class="btn btn-danger"><i class="fa fa-floppy-o"></i>Export XLS</button>
												</a>
											</div>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="charge_data" class="display table">
													<thead>
														<tr>
															<th style="width: 15%">날짜</th>
															<th style="width: 10%">수불</th>
															<th style="width: 16%">재화</th>
															<th style="width: 10%">금액</th>
															<th style="width: 30%">상세</th>
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
