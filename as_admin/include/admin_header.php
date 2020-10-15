<?php
    
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";

	if($_SERVER['REQUEST_URI'] != "/as_admin/login.php" && $_SESSION['admin_user_id'] == "") {
?>
	<script type="text/javascript">
		alert('로그인 해주세요.');
		location.href = '/as_admin/login.php';
	</script>
<?php
	}

	//$hashed = hash('sha512', "1234");
	//echo $hashed."<Br/>";
	//$hashed = hash('sha512', "1234");
	//echo $hashed."<Br/>";
	
	//echo "33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e";
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="./css/as_index.css">
        <script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="./js/as_index.js"></script>
		<!-- <script src="./ckeditor/ckeditor.js"></script> -->
		<script src="/js/ckeditor4/ckeditor.js"></script>
    </head>
    <body>
        <div id="container">
            <div class="nav_space"></div>
            <div id="nav">
				
                <div class="logo">
                    <a href="/as_admin/pcslider">
                        <img src="../img/logo.png" alt="로고" width="100%">
                    </a>
                </div>
                <div class="nav_title">
                    <span>ADMIN</span><a href="/as_admin/main"><i class="fas fa-sign-out-alt"></i></a>
                </div>
                <div class="nav_con">
                    <!-- <div class="na_title nav_img"><i class="fas fa-desktop"></i>메인페이지 설정</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_category_list.php">메인 슬라이드</a></div>
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_list.php">팝업</a></div>
                    </div> -->
                    <!-- <div class="na_title nav_img"><i class="fas fa-desktop"></i>페이지 설정</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_category_list.php">이용약관</a></div>
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_list.php">개인정보 방침</a></div>
                    </div> -->
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>가맹점 관리</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/franchisee_list.php">가맹점 목록</a></div>
                        <div class="nav_sub"><a href="/as_admin/franchisee_regist_form.php">가맹점 등록</a></div>
                    </div>
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>쇼핑몰 관리</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/shopping_list.php">상품 목록</a></div>
                        <div class="nav_sub"><a href="/as_admin/shopping_regist_form.php">상품 등록</a></div>
                    </div>
                    <div class="na_title nav_img"><i class="fas fa-desktop"></i>회원 관리</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/member_list.php">전체회원 목록</a></div>
                        <div class="nav_sub"><a href="/as_admin/general_member_list.php">일반회원 목록</a></div>
                        <div class="nav_sub"><a href="/as_admin/store_member_list.php">가맹점회원 목록</a></div>
                    </div>
                    <!-- <div class="na_title nav_img"><i class="fas fa-desktop"></i>통계</div>
                    <div class="na_title dep2">
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_category_list.php">접속 통계</a></div>
                        <div class="nav_sub"><a href="/as_admin/admin_equipment_list.php">유입 경로</a></div>
                    </div> -->
                </div>
            </div>
            <div id="con">
                <div class="header">
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="top_nav">
                        <ul>
                            <a href="/">
                                <li>
                                    <i class="fas fa-desktop"></i>홈페이지
                                </li>
                            </a>
                            <a href="#none">
                                <li>
                                    <i class="fas fa-sign-out-alt"></i><a href="/as_admin/logout.php">로그아웃</a>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="con_title">
                    <h2>
						관리자
					</h2>
                    <div class="title_nav">
						관리자
					</div>
                </div>