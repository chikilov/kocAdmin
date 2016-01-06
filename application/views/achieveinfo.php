					<script type="text/javascript">
						$(document).ready(function () {
							var data = { "pid" : $('#pid').val() };
							$('#dataTableList7').dataTable({
								"ajax": {
									"type"   : "POST",
									"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/player/getachieveinfo',
									"data"   : data,
									"dataSrc": ""
								},
								"deferRender": true,
								"columns": [
									{"className" : "text-center", "data" : "start_datetime"},
									{"className" : "text-center", "data" : "reward_datetime"},
									{"data" : $.cookie('language'), "render": function ( data, type, row, meta ) { var nameString = eval('row.' + $.cookie('language')); return nameString + ' (' + row.aid + ')';}},
									{"className" : "text-center", "data" : "astatus", "searchable": false, "render": function ( data, type, row, meta ) { return row.astatus + ' / ' + row.agoal;}},
									{"className" : "text-center", "data" : "up_grade", "render": function ( data, type, row, meta ) { return row.reward_type + ' / ' + row.reward_value;}},
									{"className" : "text-center", "data" : "is_reward"}
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
										<div class="tab-pane active" role="tabpanel" id="t7">
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div class="form-horizontal">
														<!-- START DEFAULT DATATABLE -->
														<div class="panel panel-default form-horizontal">
															<div class="panel-heading">
																<h3 class="panel-title">임무확인</h3>
															</div>
															<div class="panel-body">
																<div class="table-responsive">
																	<table class="display table" id="dataTableList7">
																		<thead>
																			<tr>
																				<th style="width:15%">임무시작일</th>
																				<th style="width:15%">수령일</th>
																				<th style="width:30%">임무명</th>
																				<th style="width:15%">임무목표</th>
																				<th style="width:15%">임무보상</th>
																				<th style="width:10%">수령여부</th>
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
