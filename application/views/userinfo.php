					<script type="text/javascript">
						$(document).ready(function () {
							$(".btnGroup > button").on("click", function () {
								/* ui 직접 고치는 방식으로 나중에 바꾸자
								var data;
								if ( $(this).attr('class').split(' ').indexOf('btntype') >= 0 )
								{
									data = { "idx" : $(this).parent().children("input[name=\"idx\"]").val(), "type" : $(this).parent().children("input[name=\"typ\"]").val() };
									$.ajax({
										url : '/kocAdmin/index.php/admin/adminmain/templeteModify',
										type : 'POST',
										async : true,
										data : data,
										success : function ( data ) {
											if ( data != '0' )
											{
												alert($(".btnGroup").has("input[name=\"idx\"][value=\"" + data + "\"]").html());
											}
											else
											{
												alert('오류가 발생하였습니다.');
											}
										}
									});
								}
								else if ( $(this).attr('class').split(' ').indexOf('btnedit') >= 0 )
								{
									return false;
								}
								else if ( $(this).attr('class').split(' ').indexOf('btndelete') >= 0 )
								{
									data = { "idx" : $(this).parent().children("input[name=\"idx\"]").val(), "type" : "3" };
									$.ajax({
										url : '/kocAdmin/index.php/admin/adminmain/templeteModify',
										type : 'POST',
										async : true,
										data : data,
										success : function ( data ) {
											if ( data != '0' )
											{
												$(".btnGroup").has("input[name=\"idx\"][value=\"" + data + "\"]").prev().prev().remove();
												$(".btnGroup").has("input[name=\"idx\"][value=\"" + data + "\"]").prev().remove();
												$(".btnGroup").has("input[name=\"idx\"][value=\"" + data + "\"]").remove();
											}
											else
											{
												alert('오류가 발생하였습니다.');
											}
										}
									});
								}
								*/
								// ui 손 안대고 리로드
								var data;
								if ( $(this).attr('class').split(' ').indexOf('btntype') >= 0 )
								{
									data = { "idx" : $(this).parent().children("input[name=\"idx\"]").val(), "type" : $(this).parent().children("input[name=\"typ\"]").val() };
								}
								else if ( $(this).attr('class').split(' ').indexOf('btnedit') >= 0 )
								{
									data = { "idx" : $(this).parent().children("input[name=\"idx\"]").val(), "title" : $(this).parent().parent().children('div').eq(0).children("input[name=\"title\"]").val(), "memo" : $(this).parent().parent().children('div').eq(1).children("input[name=\"memo\"]").val() };
								}
								else if ( $(this).attr('class').split(' ').indexOf('btndelete') >= 0 )
								{
									data = { "idx" : $(this).parent().children("input[name=\"idx\"]").val(), "type" : "3" };
								}

								$.ajax({
									url : '/kocAdmin/index.php/admin/adminmain/templeteModify',
									type : 'POST',
									async : true,
									data : data,
									success : function ( data ) {
										if ( data != '0' )
										{
											self.location.reload();
										}
										else
										{
											alert('오류가 발생하였습니다.');
										}
									}
								});
							});

							$("#btnins").on("click", function () {
								var data;
								data = { "title" : $("#institle").val(), "memo" : $("#insmemo").val() };

								$.ajax({
									url : '/kocAdmin/index.php/admin/adminmain/templeteModify',
									type : 'POST',
									async : true,
									data : data,
									success : function ( data ) {
										if ( data != '0' )
										{
											self.location.reload();
										}
										else
										{
											alert('오류가 발생하였습니다.');
										}
									}
								});
							});
						});
					</script>
					<!-- PAGE CONTENT WRAPPER -->
					<div class="page-content-wrap" style="padding-top:10px;">
						<div class="row">
							<div class="col-md-3 col-sm-4 col-xs-5">
								<div class="panel panel-default ">
									<div class="panel-body">
										<h3><span class="fa fa-user"></span> <?php echo $this->session->userdata('user_name'); ?></h3>
										<p><?php echo $this->session->userdata('user_depart'); ?></p>
										<div class="text-center" id="user_image">
											<img style="width: 60%" src="<?php echo $this->session->userdata('photo'); ?>" class="img-thumbnail" />
										</div>
									</div>
									<div class="panel-body form-group-separated">
										<form action="#" class="form-horizontal">
										<div class="form-group">
											<div class="col-md-12 col-xs-12">
												<a href="#" class="btn btn-primary btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_photo">Change Photo</a>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">#ID</label>
											<div class="col-md-9 col-xs-7"><input type="text" value="<?php echo $this->session->userdata('user_id'); ?>" class="form-control" /></div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Name</label>
											<div class="col-md-9 col-xs-7"><input type="text" value="<?php echo $this->session->userdata('user_name'); ?>" class="form-control" /></div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">E-mail</label>
											<div class="col-md-9 col-xs-7"><input type="text" id="email" value="<?php echo $this->session->userdata('user_email'); ?>" class="form-control" /></div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">HP</label>
											<div class="col-md-9 col-xs-7"><input type="text" id="hp" value="<?php echo $this->session->userdata('user_hp'); ?>" class="form-control" /></div>
										</div>
										<div class="form-group">
											<label class="col-md-3 col-xs-5 control-label">Last visit</label>
											<div class="col-md-9 col-xs-7"><input type="text" value="<?php echo $this->session->userdata('login_date'); ?>" class="form-control"/></div>
										</div>
										</form>
										<div class="form-group">
											<div class="col-md-12 col-xs-12"><button id="info_change" class="btn btn-primary btn-block btn-rounded">정보 수정</a></div>
										</div>
										<div class="form-group">
											<div class="col-md-12 col-xs-12"><a href="#" class="btn btn-danger btn-block btn-rounded" data-toggle="modal" data-target="#modal_change_password">Change password</a></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-9 col-sm-8 col-xs-7">
								<div class="panel panel-default">
								<form action="#" class="form-horizontal">
									<div class="panel-body">
										<h3><span class="fa fa-pencil"></span>공용 템플릿</h3>
									</div>
									<div class="panel-body form-group-separated">
<?php
	foreach ( $comTemplete as $row )
	{
?>
										<div class="form-group">
											<label class="col-md-2 col-xs-4 control-label"><?php echo $row['title']; ?></label>
											<div class="col-md-8 col-xs-6"><input type="text" value="<?php echo $row['memo']; ?>" class="form-control" /></div>
											<div class="col-md-2 col-xs-2 "><?php echo $row['user']; ?></div>
										</div>
<?php
	}
?>
									</div>
								</form>
								</div>
								<div class="panel panel-default form-horizontal">
									<div class="panel-body">
										<h3><span class="fa fa-pencil"></span> 개인 템플릿</h3>
										<p>1:1문의에서 템플릿 답변을 위해 미리 기입해 주시기 바랍니다.</p>
									</div>
									<div class="panel-body form-group-separated">
<?php
	foreach ( $indTemplete as $row )
	{
?>
										<div class="form-group">
											<div class="col-md-2 col-xs-4 control-label"><input name="title" type="text" value="<?php echo $row['title']; ?>" class="form-control" /></div>
											<div class="col-md-8 col-xs-6"><input name="memo" type="text" value="<?php echo $row['memo']; ?>" class="form-control" /></div>
											<div class="col-md-2 col-xs-2 btnGroup">
												<input type="hidden" name="idx" value="<?php echo $row['idx']; ?>" />
												<input type="hidden" name="typ" value="<?php echo $row['type']; ?>" />
												<button class='btn btn-primary btn-rounded btntype'><?php echo ( $row['type'] == 1 ? "공용" : "개인" )?></button>
												<button class="user_memo btn btn-warning btn-rounded btnedit" name="<?php echo $row['idx']; ?>">수정</button>
												<button class="btn btn-danger btn-rounded btndelete">삭제</button>
											</div>
										</div>
<?php
	}
?>
										<div class="form-group">
											<div class="col-md-2 col-xs-4">
												<input id="idx" type="hidden" name="idx"  class="form-control" value=""/>
												<input id="institle" type="text" name="title" placeholder="제목"  class="form-control"/>
											</div>
											<div class="col-md-8 col-xs-6">
												<textarea id="insmemo" name="memo" class="form-control" rows="8" placeholder="새로운 내용을 입력하세요"></textarea>
											</div>
											<div class="col-md-2 col-xs-2" style="min-height: 182px;">
												<button id="btnins" class="btn btn-primary btn-rounded">등록</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT WRAPPER -->
