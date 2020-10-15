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
            <li class="step step1">
                <img src="../img/step01.png" alt="">
            </li>
            <li class="step step2">
                <img src="../img/step02.png" alt="">
            </li>
            <li class="step step3">
                <img src="../img/step03.png" alt="">
            </li>
            <li class="step step4 on">
                <img src="../img/step04.png" alt="">
            </li>
        </ul>

        <div class="join_end">
            <h2>가입이 완료됐습니다. 감사합니다.</h2>
            <a href="/">메인 페이지</a>
        </div>
    </div>
</div>
<script>
    var before = document.referrer;

    if(before.indexOf('step4')){
        $('.join_end h2').text('가입신청 완료됐습니다. 감사합니다.');
    }
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>