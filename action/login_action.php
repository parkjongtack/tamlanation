<?php
error_reporting(0);
session_start();
include_once $_SERVER['DOCUMENT_ROOT'].'/inc/init_config.php';

$sql = "select * from admin_member where user_id = '".$_POST['id']."'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

if(password_verify($_POST['pw'], $row['passwd'])) {
	
	$_SESSION['admin_user_id'] = $row['user_id'];
	//$_SESSION['id'] = $row['user_id'];

	echo "<script>alert('로그인 되었습니다..');location.href = '../as_admin/';</script>";
	exit;
	
} else {
	
	echo "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');history.go(-1);</script>";
	exit;
	
}

/*
echo password_hash('1234', PASSWORD_BCRYPT);

if(password_verify('1234', password_hash('1234', PASSWORD_BCRYPT))) {
	echo "성공";
} else {
	echo "실패";
}
*/

?>




<?php
	mysqli_close($link);
?>