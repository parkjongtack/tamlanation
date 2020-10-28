<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";
?>
<script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
<div class="main_slider swiper-container sub_slide">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="/img/sub_slide_img01.png" alt="슬라이드1">
        </div>
        <div class="swiper-slide">
            <img src="/img/sub_slide_img02.png" alt="슬라이드2">
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<div class="sub sub_outer login_outer inner">
    <div class="page_subject">
        <h2>로그인</h2>
    </div>
    <div class="login">
        <div class="tabs">
            <div class="tab_top">
                <div id="tab1" class="tab_ on">
                    일반회원
                </div>
                <div id="tab2" class="tab_">
                    가맹점회원
                </div>
            </div>
            
            <div class="tab1 tab_inner">
                <h2 class="gmarket">LOGIN</h2>
                <p>탐라국 일반회원 로그인</p>
                <form action="/action/write_action.php" method="post" onsubmit="return login_action();">
					<input type="hidden" name="login_type" value="1" />
					<input type="hidden" name="board_type" value="general_login" />
                    <label><i class="fas fa-user"></i><input type="text" name="user_id" placeholder="아이디" required></label>
                    <label><i class="fas fa-unlock-alt"></i><input type="password" name="user_pass" placeholder="비밀번호" required></label>
                    <input type="submit" value="로그인">
                </form>
                <div class="fine_box">
                    <a href="#none">아이디 찾기</a>ㅣ
                    <a href="#none">비밀번호 찾기</a>
                </div>
                <hr class="login_line">
                <div class="join_box">
                    <p><i class="fas fa-angle-right"></i> 아직 탐라국 회원이 아니신가요?</p>
                    <a href="/sub/join_step1.php">회원가입</a>
                </div>
            </div>

            <div class="tab2 tab_inner">
                <h2 class="gmarket">LOGIN</h2>
                <p>탐라국 가맹점회원</p>
                <form action="/action/write_action.php" method="post" onsubmit="return login_action2();">
					<input type="hidden" name="login_type" value="2" />
					<input type="hidden" name="board_type" value="store_login" />
                    <label><i class="fas fa-user"></i><input type="text" name="user_id2" placeholder="아이디" required></label>
                    <label><i class="fas fa-unlock-alt"></i><input type="password" name="user_pass2" placeholder="비밀번호" required></label>
                    <input type="submit" value="로그인">
                </form>
                <div class="fine_box">
                    <a href="#none">아이디 찾기</a>ㅣ
                    <a href="#none">비밀번호 찾기</a>
                </div>
                <hr class="login_line">
                <div class="join_box">
                    <p><i class="fas fa-angle-right"></i> 아직 탐라국 가맹점회원이 아니신가요?</p>
                    <a href="/sub/join_step1.php">회원가입</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

	function login_action() {
		

		
	}

	function login_action2() {
		

		
	}

    $('.tab_').click(function(e){
        
        $('.tab_').removeClass('on');
        $(this).addClass('on');
        var tab = $(this).attr('id');

        $('.tab_inner').hide();
        $('.'+tab).show();
    });
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>