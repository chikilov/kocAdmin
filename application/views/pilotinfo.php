					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val() };
							$('#dataTableList3').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getpilotinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "idx"},
									{"data" : "itemname"},
									{"className" : "text-center", "data" : "board"},
									{"className" : "text-center", "data" : "grade", "searchable": false},
									{"className" : "text-center", "data" : "reg_date", "searchable": false}
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
										<div class="tab-pane active" role="tabpanel" id="t3">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">보유파일럿</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList3">
																		<thead>
																			<tr>
																				<th style="width:10%">ID</th>
							                                                    <th style="width:30%">파일럿</th>
							                                                    <th style="width:20%">탑승</th>
							                                                    <th style="width:20%">등급</th>
							                                                    <th style="width:30%">구매일자</th>
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
