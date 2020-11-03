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
<div class="sub_nav_outer">
    <ul>
        <li>
            회사소개
        </li>
        <li>
            <div class="on"><a href="/mobile/sub/company/ceo.php">회사소개</a></div>
            <div><a href="/mobile/sub/tourism/gift_card.php">관광상품권</a></div>
            <div><a href="/mobile/sub/franchisee/apply.php">가맹점</a></div>
            <div><a href="#none">관광</a></div>
            <div><a href="/mobile/sub/shop.php">쇼핑몰</a></div>
            <div><a href="#none">고객센터</a></div>
        </li>
    </ul>
    <ul>
        <li>TRK 위치</li>
        <li>
            <div><a href="/mobile/sub/company/ceo.php">대표인사말</a></div>
            <div><a href="/mobile/sub/company/history.php">TRK 연혁</a></div>
            <div class="on"><a href="/mobile/sub/company/location.php">TRK 위치</a></div>
        </li>
    </ul>
</div>
<div class="sub sub_outer inner location">
    <div class="page_subject">
        <h2>TRK 연혁</h2>
    </div>
    <div class="inside">
        <div class="map_outer">
            <div id="daumRoughmapContainer1603976986923" class="root_daum_roughmap root_daum_roughmap_landing"></div>
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp" : "1603976986923",
                    "key" : "22q4g",
                    "mapWidth" : "340",
                    "mapHeight" : "280"
                }).render();
            </script>
        </div>
        <h2 class="ft_sd blue">탐라국에 오시는 길을<br/>안내 드립니다 <span class="org">.</span></h2>
        <div class="flex">
            <p class="left year">
                주소<br/><br/>
                전화번호<br/>
                FAX
            </p>
            <p class="right content">
            제주특별자치도 제주시 연삼로38<br/>
            연빌딩 4층<br/>
            064-756-0007<br/>
            064-727-1900
            </p>
        </div>
    </div>
    
</div>
<style>
    .root_daum_roughmap .wrap_controllers img{margin-bottom: 0;}
</style>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>