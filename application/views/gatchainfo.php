					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val() };
							$('#dataTableList8').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getgatchainfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "result_date", "searchable": false},
									{"className" : "text-center", "data" : "gatcha", "searchable": false},
									{"className" : "text-center", "data" : "item", "searchable": false, "render": function ( data, type, row, meta ) { return row.item + ' ★' + row.grade;}}
								],
								"oLanguage": {
									"sEmptyTable": '검색된 결과가 없습니다.'
								},
								"order": [0, 'desc'],
								"bDestroy": true
							});
							$("#d_tab > ul > li > a[href=\"<?php echo $_SERVER['REQUEST_URI'] ?>\"]").parent().addClass("active");
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<div class="row">
							<div class="col-md-12">
								<div id="d_tab" class="panel panel-default tabs">
									<ul class="nav nav-tabs" role="tablist">
										<?php include VIEWPATH."/include/subtab_detail_view.php"; ?>
									</ul>
									<div class="panel-body tab-content">
										<!------------------------------------------->
										<div class="tab-pane active" role="tabpanel" id="t8">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">뽑기확인</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList8">
																		<thead>
																			<tr>
																				<th style="width:15%">뽑기시간</th>
																				<th style="width:30%">쿠폰명</th>
																				<th style="width:30%">결과</th>
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
										<!---------------------------------------->
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->
