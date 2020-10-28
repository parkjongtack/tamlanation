<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";
?>
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
<div class="sub sub_outer product inner">
    <div class="page_subject">
        <h2>쇼핑몰</h2>
    </div>
    <div class="product">
        <div class="product_outer">
            <div class="product_img">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="/img/product_img01.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/product_img02.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/product_img01.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/product_img02.png" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="product_info franchisee">
                <form action="">
                    <h2>가맹점 업체명</h2>
                    <div class="info_detail">
                        <div class="info_detail_outer">
                            <p>연락처</p>
                            <div class="option_line tel">
                                <p>02-1234-5678</p>
                            </div>
                        </div>
                        <div class="info_detail_outer">
                            <p>주소</p>
                            <div class="option_line">
                                <p>제주시 ㅇㅇㅇㅇㅇㅇㅇ</p>
                            </div>
                        </div>
                    </div>
                    <div class="wish_buy">
                        <a href="#none" class="buy">홈페이지</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="detail_outer">
            <div class="sub_title">
                <h2>상세정보</h2>
                <p>탐라국에 오신것을 환영합니다. 탐라국 주유소 가맹점 상세정보를 보실 수 있습니다.</p>
            </div>
            <div class="detail_contents">

            </div>
        </div>
        <div class="his_back">
            <a href="#none" class="" onclick="javascript:history.go(-1);">리스트로</a>
        </div>
    </div>
</div>
<script>
    var list = [];
    for(var i = 0; i < $('.product_img .swiper-slide').length; i++){
        // list[i] = '<img src="' + $('.product_img .swiper-slide img').eq(i).attr('src') + '">';
        list[i] = $('.product_img .swiper-slide img').eq(i).attr('src');
    }
    var swiper = new Swiper('.product_img', {
            effect: 'fade',
            pagination: {
                el: '.product_img .swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    //var list = [];
                    return `<span class="product_img_dot swiper-pagination-bullet" style="background-image:url(${list[index]})"></span>`;
                },
            },
    });            
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>