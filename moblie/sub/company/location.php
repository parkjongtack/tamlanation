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
<div class="sub_nav_outer">
    <ul>
        <li>
            회사소개
        </li>
        <li>
            <div class="on"><a href="/sub/company/ceo.php">회사소개</a></div>
            <div><a href="/sub/tourism/gift_card.php">관광상품권</a></div>
            <div><a href="/sub/franchisee/apply.php">가맹점</a></div>
            <div><a href="#none">관광</a></div>
            <div><a href="/sub/shop.php">쇼핑몰</a></div>
            <div><a href="#none">고객센터</a></div>
        </li>
    </ul>
    <ul>
        <li>TRK 위치</li>
        <li>
            <div><a href="/sub/company/ceo.php">대표인사말</a></div>
            <div><a href="/sub/company/history.php">TRK 연혁</a></div>
            <div class="on"><a href="/sub/company/location.php">TRK 위치</a></div>
        </li>
    </ul>
</div>
<div class="sub sub_outer inner">
    
    <img src="/img/sub1_3.png" alt="">
</div>
<script>

</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>