					<script type="text/javascript">
						$(document).ready(function () {
							$("#coupon_list").dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/coupon/getcouponlist',
									"data"   : null,
									"dataSrc": ""
								},
								"columns": [
									{"className" : "text-center", "data" : "reg_datetime", "searchable": false},
									{"className" : "text-center", "data" : "coupon_count", "searchable": false},
									{"className" : "text-center", "data" : "start_date", "searchable": false, "render" : function ( data, type, row, meta ) { return row.start_date + ' ~ ' + row.end_date }},
									{"data" : "group_name", "searchable": true},
									{"data" : "reward_type", "searchable": true, "render" : function ( data, type, row, meta ) {
																								var rewardtype = row.reward_type.split(',');
																								var rewardvalue = row.reward_value.split(',');
																								var rowstring = '';
																								for ( var i = 0; i < rewardtype.length; i++ )
																								{
																									rowstring += rewardtype[i] + ' : ' + rewardvalue[i] + '<br />';
																								}
																								return rowstring;
																							}
									},
									{"className" : "text-center", "data" : "is_valid", "searchable" : true},
									{"className" : "text-center", "data" : "group_id", "searchable" : false, "render" : function ( data, type, row, meta ) { return '<button type="button" class="btn btn-Default">Check</button><input type="hidden" name="group_id" value="' + row.group_id + '" />'; }}
								],
								"bDestroy": true,
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"bSort" : false
							});

							$(document).on("click", ".btn-Default:contains('Check')", function () {
								var data = {"group_idx" : $(this).siblings("input").val()};
								$("#modal_couponlist").modal();
								$('#coupon_detail').dataTable({
									"ajax": {
										"type"   : "POST",
										"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/coupon/getcoupondetail',
										"data"   : data,
										"dataSrc": "",

									},
									"columns": [
										{"className" : "text-center", "data" : "coupon_use_datetime"},
										{"className" : "text-center", "data" : "coupon_user_id", "render" : function ( data, type, row, meta ) { return ( row.coupon_user_id != '0' ? row.coupon_user_id : '-' ); }},
										{"className" : "text-center", "data" : "coupon_id"}
									],
									"bDestroy": true
								});
							});

							$(document).on("click", "#modal_couponlist > div > div > div > button.close, #modal_couponlist > div > div > div > button:contains('Close')", function () {
								if ($.fn.dataTable.isDataTable('#coupon_detail'))
								{
									$('#coupon_detail').dataTable().fnClearTable();
									$('#coupon_detail').dataTable().fnDestroy();
								}
							});
							$("#user_mail").dataTable.ext.errMode = 'none';
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-ticket"></span>쿠폰 내역</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">쿠폰내역</h3>
											<button type="button" onclick="location.href='./couponcharge.php' " class="btn btn-info pull-right">쿠폰생성</a></button>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="display table table-striped" id="coupon_list">
													<thead>
														<tr>
															<th style="width: 15%">생성일</th>
															<th style="width: 10%">발행수</th>
															<th style="width: 20%">유효기간</th>
															<th style="width: 15%">내용</th>
															<th style="width: 20%">상품</th>
															<th style="width: 7%">사용</th>
															<th style="width: 7%">Check</th>
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