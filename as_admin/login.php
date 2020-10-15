<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/inc/init_config.php';
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/as_index.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="js/as_index.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>관리자 페이지</title>
    </head>
    <body>
		<div id="login_con">
			<div id="login_box">
				<h1><img src="../img/logo.png"></h1>
		        <form name="login_form" action="../action/login_action.php" method="post" onsubmit="javascript:ey_login_action();">
		            <input type="text" name="id" placeholder="아이디" required>
		            <input type="password" name="pw" placeholder="비밀번호" required>
		            <input type="submit" value="LOGIN">
		        </form>
				<script type="text/javascript">
					function ey_login_action() {
						var form = document.login_form;
						
						if(form.id.value == "") {
							alert("아이디를 입력해주세요.");
							return false;
						}

						if(form.pw.value == "") {
							alert("비밀번호를 입력해주세요.");
							return false;
						}

					}
				</script>
		    </div>
		</div>
	</body>
</html>