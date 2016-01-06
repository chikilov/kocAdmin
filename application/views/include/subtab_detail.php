					<script type="text/javascript">
						$(document).ready(function () {
							$(document).on("click", "#d_tab > ul > li > a", function (e) {
								e.preventDefault();
								$("#subform").attr('action', $(this).attr('href'));
								$("#subform").submit();
							});
						});
					</script>