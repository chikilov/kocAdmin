					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val(), "start_date" : $("#start_date").val(), "end_date" : $("#end_date").val() };
							$('#charge_data').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/payment/getchargeinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "buy_date"},
									{"className" : "text-center", "data" : "storetype"},
									{"className" : "text-center", "data" : "paymentTime", "searchable": false},
									{"className" : "text-center", "data" : "approvedPaymentNo", "searchable": false},
									{"className" : "text-center", "data" : "naverId", "searchable": false},
									{"className" : "text-center", "data" : "payment_value", "searchable": false},
									{"className" : "text-center", "data" : "product_id", "searchable": false},
									{"className" : "text-center", "data" : "is_provision", "searchable": false},
									{"className" : "text-center", "data" : "is_refund", "searchable": false},
									{"className" : "text-center", "data" : "curcash", "searchable": false}
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
							<h2><span class="fa fa-krw"></span> 충전 내역</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">충전 내역</h3>
											<div class="btn-group pull-right">
												<a download="<?php echo ( $this->start_date ? $this->start_date : date('Y-m-d') ).'-'.( $this->end_date ? $this->end_date : date('Y-m-d') ).'_'.($this->pid ? $this->pid : 0).'_charge.xls' ?>" href="#" onclick="return ExcellentExport.excel(this, 'charge_data', 'charge_data');">
													<button class="btn btn-danger"><i class="fa fa-floppy-o"></i>Export XLS</button>
												</a>
											</div>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table id="charge_data" class="display table">
													<thead>
														<tr>
															<th>결제일</th>
															<th>플렛폼</th>
															<th>플랫폼시간</th>
															<th>플랫폼결제코드</th>
															<th>플렛폼아이디</th>
															<th>구매금액</th>
															<th>구매상품</th>
															<th>지급여부</th>
															<th>취소여부</th>
															<th>보유수정</th>
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
