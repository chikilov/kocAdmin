					<script type="text/javascript">
						$(document).ready( function () {
							$(document).on('change', '#gift_type', function () {
								$.ajax({
									url: '/<?php echo ROOTPATH; ?>/index.php/admin/present/getpresentlist',
									type: 'POST',
									data: { 'type' : $('#gift_type').val() },
									dataType: 'html',
									success: function(data){
										var arrayData = eval(data);
										var nameString;
										$('#p_type > option').remove();
										$.each(arrayData, function(index, item) {
											nameString = eval('item.' + $.cookie('language'));
											if ( $('#gift_type').val() == 'BCPC' || $('#gift_type').val() == 'CHAR' || $('#gift_type').val() == 'OPRT' || $('#gift_type').val() == 'PILT' || $('#gift_type').val() == 'SKIL' || $('#gift_type').val() == 'WEPN' )
											{
												nameString = nameString + ' ★' + item.grade;
											}
											$('#p_type').append(new Option(nameString, item.article_id));
										});
									}
								});
							});

							$(document).on('submit', '#jjvalidate', function (e) {
								e.preventDefault();
								var delimiter = ( $("#optionsRadios2").is(":checked") ? "comma" : "enter" );
								var table = $('#SendResultTable').dataTable({
									"ajax": {
										"type"   : "POST",
										"url"    : '/<?php echo ROOTPATH; ?>/index.php/admin/present/actpresent',
										"data"   : { 'user_list' : $('#user_list').val(), 'delimiter' : delimiter, 'gift_type' : $('#gift_type').val(), 'p_type' : $('#p_type').val(), 'p_value' : $('#p_value').val(), 'memo' : $('#memo').val() },
										"dataSrc": function ( data ) {
											if ( data[0]['result'] == 'error1' )
											{
												alert('입력된 대상이 잘못되었습니다.');
												return false;
											}
											else
											{
												$('#modal_sendresult').modal('toggle');
												return data;
											}
										}
									},
									"columns": [
										{"data" : "result"},
										{"data" : "text"},
									],
									"bDestroy": true,
									"bSort" : false
								});
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>선물 보내기</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT FORM ELEMENTS -->
									<div class="panel panel-default">
										<div class="panel-body">
											<h3>지급하기</h3>
											<form id="jjvalidate" class="form-horizontal" method="post" role="form" action="#">
											<div class="form-group">
												<label class="col-md-2 control-label">대상</label>
												<div class="col-md-4">
													<textarea name="user_list" id="user_list" class="form-control"/></textarea>
												</div>
												<div class="col-md-4">
													<div class="radio">
														<label><input type="radio" name="delimiter" id="optionsRadios1" value="enter" checked /> 엔터</label>
													</div>
													<div class="radio">
														<label><input type="radio" name="delimiter" id="optionsRadios2" value="comma" />콤마</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">보상</label>
												<div class="col-md-2">
													<select class="form-control" name="gift_type" id="gift_type" >
														<option value="">카테고리</option>
														<option value="ASST">자원</option>
														<option value="BTIK">백팩 티켓</option>
														<option value="CTIK">캐릭터 티켓</option>
														<option value="STIK">스킬 티켓</option>
														<option value="WTIK">무기 티켓</option>
														<option value="BCPC">백팩</option>
														<option value="CHAR">캐릭터</option>
														<option value="OPRT">오퍼레이터</option>
														<option value="PILT">파일럿</option>
														<option value="SKIL">스킬</option>
														<option value="WEPN">무기</option>
													</select>
												</div>
												<div class="col-md-2">
													<select name="p_type" class="form-control" id="p_type">
														<option value="">대상상품</option>
													</select>
												</div>
												<label class="col-md-1 control-label">수량</label>
												<div class="col-md-1">
													<input name="p_value" id="p_value" type="text" class="form-control" />
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-2 control-label">메모</label>
												<div class="col-md-4">
													<input name="memo" id="memo" type="text" class="form-control" />
												</div>
												<div class="col-md-2 text-right" >
													<button id="actSend" type="submit" class='btn btn-danger'>지급</button>
												</div>
											</div>
											</form>
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
											<h3 class="panel-title">지급내역</h3>
										</div>
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table datatable">
													<thead>
														<tr>
															<th style="width: 15%">지급일자</th>
															<th style="width: 5%">PID</th>
															<th style="width: 30%">내용</th>
															<th style="width: 10%">품목</th>
															<th style="width: 10%">수량</th>
															<th style="width: 10%">성공여부</th>
															<th style="width: 10%">서버</th>
															<th style="width: 10%">전송자</th>
														</tr>
													</thead>
													<tbody>
<?php
	foreach( $sendlist as $row )
	{
?>
														<tr>
															<td><?=$row['send_datetime']?></td>
															<td><?=$row['pid']?></td>
															<td><?=$row['memo']?></td>
															<td><?=$row['p_type']?></td>
															<td><?=$row['p_value']?></td>
															<td><? if($row['is_success']==1) echo"성공"; else echo "실패";?></td>
															<td><? if($row['server']==1) echo"아이린"; else echo "루루";?></td>
															<td><?=$row['send_name']?></td>
														</tr>
<?php
	}
?>
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
