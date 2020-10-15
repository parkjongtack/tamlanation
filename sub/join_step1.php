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
    <div class="page_subject join_subject">
        <h2>회원가입</h2>
    </div>
    <div class="join_outer">
        <ul class="step_box">
            <li class="step step1 on">
                <img src="../img/step01.png" alt="">
            </li>
            <li class="step step2">
                <img src="../img/step02.png" alt="">
            </li>
            <li class="step step3">
                <img src="../img/step03.png" alt="">
            </li>
            <li class="step step4">
                <img src="../img/step04.png" alt="">
            </li>
        </ul>
    
        <div class="sub_title">
            <h2><span>탐라국</span> 회원가입</h2>
            <p>탐라국에 오신것을 환영합니다. 고객님께서 해당하는 유형을 선택하여 가입해주세요.</p>
        </div>
        <div class="select_join_box">
            <div class="select_join">
                <div class="select_join_inner">
                    <span class="bar"></span>
                    <h3>일반회원</h3>
                    <p>탐라국회원이 되시면 다양한 혜택을 제공합니다.</p>
                    <a href="join_step2.php?join_type=1">가입하기</a>
                </div>
            </div>
            <div class="select_join">
                <div class="select_join_inner">
                    <span class="bar"></span>
                    <h3>가맹점회원</h3>
                    <p>탐라국 회원이 되시면 다양한 혜택을 제공합니다.</p>
                    <a href="join_step2.php?join_type=2">가입하기</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>