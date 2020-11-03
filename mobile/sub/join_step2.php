<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/head.php";
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
                <img src="/img/step01.png" alt="">
            </li>
            <li class="step step2 on">
                <img src="/img/step02.png" alt="">
            </li>
            <li class="step step3">
                <img src="/img/step03.png" alt="">
            </li>
            <li class="step step4">
                <img src="/img/step04.png" alt="">
            </li>
        </ul>
    
        <div class="sub_title">
            <h2>약관동의</h2>
            <p>탐라국에 오신것을 환영합니다. 약관에 동의하셔야 회원가입을 하실 수 있습니다.</p>
        </div>
        <div class="terms_outer">
            <div class="terms_box">
                <span class="bar"></span>
                <h3>이용약관</h3>
                <textarea readonly></textarea>
            </div>
            <div class="terms_box">
                <span class="bar"></span>
                <h3>개인정보 수집 및 이용안내</h3>
                <textarea readonly></textarea>
            </div>
            <form action="">
                <label><input type="checkbox" name="checkbox1" class="active"> 전체동의</label>
            </form>
        </div>
    </div>
</div>
<script>
    $('.active').click(function(){
        var type = '<?php echo $_GET['join_type']?>';
        if(type == 1){
            location.href = 'join_step3.php';
        }else{
            location.href = 'join_step4.php';
        }
    })
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>