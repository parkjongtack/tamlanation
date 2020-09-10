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
<div class="main_search_area sub sub_outer franchisee">
    <div class="page_subject inner">
        <h2>가맹점</h2>
    </div>
    <div class="inner">
        <div class="search_select_box box_shadow">
            <form action="">
                <select name="" id="">
                    <option value="#" selected>제주시</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <span class="select_line"></span>
                <select name="" id="">
                    <option value="#" selected>시/군/구</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <span class="select_line"></span>
                <select name="" id="">
                    <option value="#" selected>숙박정보</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <span class="select_line"></span>
                <select name="" id="">
                    <option value="#" selected>펜션</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select>
                <span class="select_line"></span>
                <input type="text" placeholder="업소 검색">
                <input type="submit" value="검색">
            </form>
        </div>
        <div class="franchise_area">
            <div class="fran_list_area">
                <div class="fran_list">
                    <ul>
                        <li class="on box_shadow">
                            <img src="/img/fr_nav01_on.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/fr_nav02.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/fr_nav03.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/fr_nav04.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/fr_nav05.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/fr_nav06.png" alt="">
                        </li>
                    </ul>
                </div>
                <script>
                    $(document).ready(function(){
                        $('.fran_list li').click(function(){
                            $('.fran_list li').removeClass('on');
                            $(this).addClass('on');
                            var idx = $(this).index();
                            var img_scr = $(this).children('img').attr('src');

                            if(img_scr.indexOf('_on') == -1){
                                for(var i = 0; i<$('.fran_list li').length; i++){
                                    $('.fran_list li').eq(i).children('img').attr('src','/img/fr_nav0'+(i+1)+'.png')
                                }
                                var re_img_scr = img_scr.substr(0,img_scr.indexOf('.png'));
                                var real_re_img_scr = re_img_scr+'_on.png';
                                $(this).children('img').attr('src',real_re_img_scr);
                                //$(this).children('img').attr('src',re_img_scr+'.png');
                            }
                            $('.fran_list_sub ul').hide();
                            $('.fran_list_sub ul').eq(idx).css({display:'flex'});

                        });

                        $('.fran_list_sub ul li').click(function(){
                            // $(this).closest('ul');
                            $(this).closest('ul').children('li').removeClass('on');
                            // $('.fran_list_sub').removeClass('on');
                            $(this).addClass('on');
                        });
                    });
                </script>
            </div>
            <div class="sub_title">
                <h2>주유소정보 <span>리스트</span></h2>
                <p>탐라국에 오신것을 환영합니다. 탐라국 주유소 가맹점들을 소개합니다.</p>
            </div>
            <ul class="fr_list_outer franchise_slide">
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="#none">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper('.main_slider', {
                // direction: 'vertical',
                spaceBetween: 10,
                loop: false,
                speed: 1000,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction :false,
                },
                pagination: {
                  el: '.main_slider .swiper-pagination',
                  clickable: true,
                  renderBullet: function (index, className) {
                    return `<span class="main_slider_dot swiper-pagination-bullet">${index+1}</span>`;
                },
                },
            });
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>