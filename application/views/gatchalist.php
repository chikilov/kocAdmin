					<script type="text/javascript">
						$(document).ready( function () {
							$(document).on('change', '#gatcha_type', function () {
								$.ajax({
									url: '/<?php echo ROOTPATH; ?>/index.php/admin/gatcha/getgatchalist',
									type: 'POST',
									data: { 'type' : $('#gatcha_type').val() },
									dataType: 'html',
									success: function(data){
										var arrayData = eval(data);
										var nameString;
										$('#gatcha_ticket > option').remove();
										$('#gatcha_ticket').append(new Option('뽑기권 이름', ''));
										$.each(arrayData, function(index, item) {
											nameString = eval('item.' + $.cookie('language'));
											$('#gatcha_ticket').append(new Option(nameString, item.id));
										});
									}
								});
							});

							$(document).on('change', '#gatcha_ticket', function () {
								var data = { "id" : $('#gatcha_ticket > option:selected').val() };
								$('#gatcha_list').dataTable({
									"ajax": {
										"type"   : "POST",
										"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/gatcha/getgatcharateinfo',
										"data"   : data,
										"dataSrc": ""
									},
									"deferRender": true,
									"columns": [
										{"className" : "text-center", "data" : "category", "searchable": false, "sortable" : false},
										{"className" : "text-center", "data" : "id", "searchable": false, "sortable" : false},
										{"className" : "text-center", "data" : "gatcha_name", "searchable": false, "sortable" : false},
										{"className" : "text-center", "data" : "reference", "sortable" : false},
										{"className" : "text-center", "data" : "item_name", "sortable" : false},
										{"className" : "text-center", "data" : "grade", "sortable" : false},
										{"className" : "text-center", "data" : "prob", "sortable" : false}
									],
									"oLanguage": {
										"sEmptyTable": '검색된 결과가 없습니다.'
									},
									"order": [[0, 'desc'],[1, 'desc']],
									"bDestroy": true
								});
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>가챠 티켓 확률</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT FORM ELEMENTS -->
									<div class="panel panel-default">
										<div class="panel-body">
											<h3>티켓선택</h3>
											<div class="form-group">
												<label class="col-md-2 control-label">보상</label>
												<div class="col-md-2">
													<select class="form-control" id="gatcha_type">
														<option>카테고리</option>
														<option value="BACKPACK">백팩 티켓</option>
														<option value="CHARACTER">캐릭터 티켓</option>
														<option value="TECHNIQUE">스킬 티켓</option>
														<option value="WEAPON">무기 티켓</option>
													</select>
												</div>
												<div class="col-md-2">
													<select class="form-control" id="gatcha_ticket">
														<option value="">뽑기권 이름</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<!-- END DEFAULT FORM ELEMENTS -->
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default form-horizontal">
										<div class="panel-heading">
											<h3 class="panel-title">가챠 리스트</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table datatable" id="gatcha_list">
													<thead>
														<tr>
															<th>type</th>
															<th>ticket id</th>
															<th>ticket name</th>
															<th>item id</th>
															<th>item name</th>
															<th>grade</th>
															<th>뽑기 확률</th>
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
					<script type="text/javascript">
						var jjvalidate = $("#jjvalidate").validate({
		    				ignore: [],
							rules: {
								user_list: {
									required: true
								},
								p_type: {
									required: true
								},
								p_value: {
									required: true,
								}
							}
						});
					</script>
