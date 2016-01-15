					<script type="text/javascript">
						$(document).ready(function () {
							$(".datepicker").datepicker({
								"format": "yyyy-mm-dd"
							});
							var localNow = new Date();
							var utcNow = new Date(localNow.getUTCFullYear(), localNow.getUTCMonth(), localNow.getUTCDate(), localNow.getUTCHours(), localNow.getUTCMinutes(), localNow.getUTCSeconds());
							$(".datepicker").datepicker("setDate", utcNow);
							$(".timepicker24").timepicker({
								defaultTime: utcNow,
								format:'hh:mm:ss',
								minuteStep: 1,
								secondStep: 1,
								showSeconds: true,
								showMeridian: false
							});

							$(document).on("change", "#gift_type", function () {
								$.ajax({
									url: "/<?php echo ROOTPATH; ?>/index.php/admin/present/getpresentlist",
									type: "POST",
									data: { "type" : $("#gift_type").val() },
									dataType: "html",
									success: function(data){
										var arrayData = eval(data);
										var nameString;
										$("#p_type > option").remove();
										$.each(arrayData, function(index, item) {
											nameString = eval("item." + $.cookie("language"));
											if ( $("#gift_type").val() == "BCPC" || $("#gift_type").val() == "CHAR" || $("#gift_type").val() == "OPRT" || $("#gift_type").val() == "PILT" || $("#gift_type").val() == "SKIL" || $("#gift_type").val() == "WEPN" )
											{
												nameString = nameString + " ★" + item.grade;
											}
											$("#p_type").append(new Option(nameString, item.article_id));
										});
										if ( $("#gift_type").val() != "ASST" )
										{
											$("#p_value").val(1);
											$("#p_value").prop("readonly", true);
										}
									}
								});
							});

							$(document).on("click", "#btnInsert", function (e) {
								e.preventDefault();
								$.ajax({
									url: "/<?php echo ROOTPATH; ?>/index.php/admin/event/accesseventinsert",
									type: "POST",
									data: { "evt_category" : $("#gift_type").val(), "evt_target" : $("#p_type > option:selected").val(), "evt_value" : $("#p_value").val(), "evt_reason" : $("#evt_reason").val(), "start_date" : $("#start_date").val() + ' ' + $("#start_time").val(), "end_date" : $("#end_date").val() + ' ' + $("#end_time").val() },
									success: function(data){
										if ( data == '1' )
										{
											alert('등록 되었습니다.');
											location.href = '/<?php echo ROOTPATH; ?>/index.php/admin/event/accesseventlist';
										}
										else
										{
											alert('등록이 실패하였습니다.');
										}
									}
								});
							});

							$(document).on("click", "#btnReset", function (e) {
								e.preventDefault();
								location.href = '/<?php echo ROOTPATH; ?>/index.php/admin/event/accesseventlist';
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap">
						<!-- PAGE TITLE -->
						<div class="page-title">
							<h2><span class="fa fa-dollar"></span>이벤트 설정</h2>
						</div>
						<!-- END PAGE TITLE -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-horizontal">
									<!-- START DEFAULT FORM ELEMENTS -->
									<div class="panel panel-default">
										<form class="form-horizontal" method="post" role="form" >
										<div class="panel-body">
											<h3>리스트 공지</h3>
											<div class="form-group">
												<label class="col-md-2 control-label">시작일</label>
												<div class="col-md-3">
													<input name="start_date" id="start_date" type="text" class="form-control datepicker" value="" />
												</div>
												<div class="col-md-3">
													<div class="input-group bootstrap-timepicker">
														<input id="start_time" name="start_time" type="text" class="form-control timepicker24" value="" />
														<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
													</div>
												</div>
											<div class="col-md-6">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">종료일</label>
											<div class="col-md-3">
												<input name="end_date" id="end_date" type="text" class="form-control datepicker" value="" />
											</div>
											<div class="col-md-3">
												<div class="input-group bootstrap-timepicker">
													<input name="end_time" id="end_time" type="text" class="form-control timepicker24" value="" />
													<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
												</div>
											</div>
											<div class="col-md-6">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">보상</label>
											<div class="col-md-2">
												<select class="form-control" name="gift_type" id="gift_type">
													<option>카테고리</option>
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
												<input name="p_value" type="text" class="form-control" id="p_value" value="" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">내용</label>
											<div class="col-md-6">
												<input name="evt_reason" id="evt_reason" type="text" class="form-control" value="" />
											</div>
											<div class="col-md-4">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-10 text-center">
												<button id="btnInsert" class="btn btn-danger">추가</button>
												<button id="btnReset" class="btn btn-primary">취소</button>
											</div>
										</div>
										</form>
									</div>
									<!-- END DEFAULT FORM ELEMENTS -->
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->