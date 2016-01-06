<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#login").click(function() {
					$.ajax({
						url: '/<?php echo ROOTPATH; ?>/index.php/admin/login/requestLogin',
						type: 'POST',
						data: {"id": $("#user_id").val() , "pass": $("#user_pw").val() ,"server": $("#server").val(), "lang": $("#lang").val(), "version": $("#version").val()},
						dataType: 'html',
						success: function(data){
							if (data == 0)
								location.href="/<?php echo ROOTPATH; ?>/index.php/admin/adminmain";
							else if (data == 1)
								location.href="lazenca.php";
							else if (data == 2)
								location.href="cybernator.php";
							else
								$("#mbox").html("Sorry, Incorrect username or password." );
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="login-container">
			<div class="login-box animated fadeInDown">
				<div><img src="/<?php echo ROOTPATH; ?>/static/img/logo-lr.png" style="width: 100%; margin-top: 0;" /></div>
				<div class="login-body">
					<div id="mbox" class="login-title">Welcome, Please login</div>
					<div class="form-horizontal" method="post">
						<div class="form-group">
							<div class="col-md-12"><input id='user_id' type="text" class="form-control" placeholder="Username" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-12"><input id='user_pw' type="password" class="form-control" placeholder="Password" /></div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<select class="validate[required] select btn" id="server">
<?php
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, VERSIONINFO_URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	curl_close ($ch);

	$arrResponse = json_decode(openssl_decrypt(base64_decode($response), "aes-256-cbc", $this->config->item('encryption_key'), true, str_repeat(chr(0), 16)), true);
	$version = $arrResponse['arrResult']['version'];
	$arrResponse = $arrResponse['arrResult']['server'];
	foreach( $arrResponse as $row )
	{
		if ( $row['name'] == 'dev' )
		{
			$row['id'] = '';
		}
?>
									<option value='<?php echo json_encode($row); ?>'><?php echo $row['name']; ?></option>
<?php
	}
?>
								</select>
								<input type="hidden" id="version" name="version" value="<?php echo $version; ?>" />
								<select class="validate[required] select btn" id="lang">
									<option value="en">언어선택</option>
									<option value="kr">한국어</option>
									<option value="en">영어</option>
									<option value="jp">일본어</option>
									<option value="cn">중국어</option>
									<option value="tw">대만어</option>
								</select>
								<span class="help-block">미선택시 영어 선택</span>
							</div>
							<div class="col-md-6"><button id='login' class="btn btn-info btn-block">Log In</button></div>
						</div>
					</div>
				</div>
				<div class="login-footer">
					<div class="pull-left">&copy; 2015 Knight Of Cosmo</div>
					<div class="pull-right"></div>
				</div>
			</div>
		</div>
	</body>
</html>