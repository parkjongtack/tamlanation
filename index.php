<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";
?>
<div class="main_slider swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="/img/main_slide_img01.png" alt="슬라이드1">
        </div>
        <div class="swiper-slide">
            <img src="/img/main_slide_img02.png" alt="슬라이드2">
        </div>
    </div>
    <div class="swiper-pagination"></div>
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
<div class="main_search_area">
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
            <div class="fran_title">
                <p>가맹점</p>
                <h2>FRANCHISE</h2>
                <span>탐라국의 다양한 가맹점들을<br>안내해드립니다.</span>
                <a href="#none"><img src="/img/fran_read_btn.png" alt=""></a>
            </div>
            <div class="fran_list_area">
                <div class="fran_list">
                    <ul>
                        <li class="on box_shadow">
                            <img src="/img/main_nav01_on.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/main_nav02.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/main_nav03.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/main_nav04.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/main_nav05.png" alt="">
                        </li>
                        <li class="box_shadow">
                            <img src="/img/main_nav06.png" alt="">
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
                                    $('.fran_list li').eq(i).children('img').attr('src','/img/main_nav0'+(i+1)+'.png')
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
                <div class="fran_list_sub">
                    <ul>
                        <li class="on top_arrow">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                    <ul>
                        <li class="on">호텔</li>
                        <li>휴양콘도</li>
                        <li>리조트</li>
                        <li>펜션</li>
                        <li>민박</li>
                        <li>게스트하우스</li>
                    </ul>
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                    <ul>
                        <li class="on">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                    </ul>
                </div>
            </div>
            <div class="swiper-container franchise_slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide box_shadow">
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
                    <div class="swiper-slide box_shadow">
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
                    <div class="swiper-slide box_shadow">
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
                    <div class="swiper-slide box_shadow">
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
                    <div class="swiper-slide box_shadow">
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
                    <div class="swiper-slide box_shadow">
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
                </div>
            </div>
            <div class="franchise_slide_wrapper">
                <div class="franchise_slide_btn swiper-button-next"></div>
                <div class="franchise_slide_btn swiper-button-prev"></div>
            </div>
            <script>
                var swiper = new Swiper('.franchise_slide', {
                slidesPerView: 4,
                spaceBetween: 16,
                loop: true,
                speed: 1000,
                navigation: {
                    nextEl: '.franchise_slide_wrapper .swiper-button-next',
                    prevEl: '.franchise_slide_wrapper .swiper-button-prev',
                },
                });
            </script>
        </div>
    </div>
</div>
<div class="contact_area">
    <div class="inner">
        <div class="box_shadow">
            <a href="#none">
                <img src="/img/contact_area_img01.png" alt="">
            </a>
        </div>
        <div class="box_shadow">
            <a href="#none">
                <img src="/img/contact_area_img02.png" alt="">
            </a>
        </div>
    </div>
</div>
<div class="giftcard_area">
    <div class="inner">
        <div class="giftcard_slide swiper-container">
            <div class="title_area">
                <h2>관광상품권</h2>
                <p>탐라국 관광상품권 구매신청 및 이용안내를 보실 수 있습니다.</p>
                <div class="swiper-pagination">
                    
                </div>
            </div>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="img_area">
                        <div class="img_">
                            <img src="/img/giftcard_slide_img01.png" alt="">
                        </div>
                        <a href="#none" class="read_more"><img src="/img/giftcard_slide_read_btn.png" alt=""></a>
                    </div>
                    <div class="text_area">
                        <h3>관광상품권이란?</h3>
                        <span class="line_"></span>
                        <p>
                            다양한 곳에서 사용할 수 있기에<br>
                            여행을 좋아하는 분들에게 제격인<br>
                            상품권입니다.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_area">
                        <div class="img_">
                            <img src="/img/giftcard_slide_img01.png" alt="">
                        </div>
                        <a href="#none" class="read_more"><img src="/img/giftcard_slide_read_btn.png" alt=""></a>
                    </div>
                    <div class="text_area">
                        <h3>상품권구매신청</h3>
                        <span class="line_"></span>
                        <p>
                            다양한 곳에서 사용할 수 있기에<br>
                            여행을 좋아하는 분들에게 제격인<br>
                            상품권입니다.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_area">
                        <div class="img_">
                            <img src="/img/giftcard_slide_img01.png" alt="">
                        </div>
                        <a href="#none" class="read_more"><img src="/img/giftcard_slide_read_btn.png" alt=""></a>
                    </div>
                    <div class="text_area">
                        <h3>이용안내</h3>
                        <span class="line_"></span>
                        <p>
                            다양한 곳에서 사용할 수 있기에<br>
                            여행을 좋아하는 분들에게 제격인<br>
                            상품권입니다.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_area">
                        <div class="img_">
                            <img src="/img/giftcard_slide_img01.png" alt="">
                        </div>
                        <a href="#none" class="read_more"><img src="/img/giftcard_slide_read_btn.png" alt=""></a>
                    </div>
                    <div class="text_area">
                        <h3>상품권 혜택</h3>
                        <span class="line_"></span>
                        <p>
                            다양한 곳에서 사용할 수 있기에<br>
                            여행을 좋아하는 분들에게 제격인<br>
                            상품권입니다.
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="img_area">
                        <div class="img_">
                            <img src="/img/giftcard_slide_img01.png" alt="">
                        </div>
                        <a href="#none" class="read_more"><img src="/img/giftcard_slide_read_btn.png" alt=""></a>
                    </div>
                    <div class="text_area">
                        <h3>상품권 약관</h3>
                        <span class="line_"></span>
                        <p>
                            다양한 곳에서 사용할 수 있기에<br>
                            여행을 좋아하는 분들에게 제격인<br>
                            상품권입니다.
                        </p>
                    </div>
                </div>
            </div>
            <div class="giftcard_slide_pagi">
                <div class="giftcard_slide_btn swiper-button-next"></div>
                <div class="pagi_num"><b>01</b>/05</div>
                <div class="giftcard_slide_btn swiper-button-prev"></div>
            </div>
        </div>
        <script>
            var swiper = new Swiper('.giftcard_slide', {
                    effect: 'fade',
                    pagination: {
                        el: '.giftcard_slide .swiper-pagination',
                        clickable: true,
                        renderBullet: function (index, className) {
                            var list = ['관광상품권이란?','상품권구매신청','이용안내','상품권 혜택','상품권 약관'];
                            return `<span class="giftcard_slide_dot swiper-pagination-bullet">${list[index]}</span>`;
                        },
                    },
                    navigation: {
                        nextEl: '.giftcard_slide_pagi .swiper-button-next',
                        prevEl: '.giftcard_slide_pagi .swiper-button-prev',
                    },
                    on: {
                        slideChangeTransitionStart: function(){
                            var now_idx = this.activeIndex;
                            $('.pagi_num b').text('0'+(now_idx+1));
                        },
                    },
            });            
        </script>
    </div>
</div>
<div class="main_notice_area">
    <div class="inner">
        <div class="notice_list_area">
            <div class="notice_title">
                <div class="tabs">
                    <span>공지사항</span>
                    <a href="#none"><img src="/img/plus_btn.png" alt=""></a>
                </div>
            </div>
            <ul>
                <li>
                    <a href="#none">탐라국에서 알려드립니다5</a>
                    <span>2020-06-11</span>
                </li>
                <li>
                    <a href="#none">탐라국에서 알려드립니다4</a>
                    <span>2020-06-11</span>
                </li>
                <li>
                    <a href="#none">탐라국에서 알려드립니다3</a>
                    <span>2020-06-11</span>
                </li>
                <li>
                    <a href="#none">탐라국에서 알려드립니다2</a>
                    <span>2020-06-11</span>
                </li>
                <li>
                    <a href="#none">탐라국에서 알려드립니다1</a>
                    <span>2020-06-11</span>
                </li>
            </ul>
        </div>
        <div class="shop_area box_shadow">
            <a href="#none"><img src="/img/shop_area_img01.png" alt=""></a>
        </div>
        <div class="tel_area box_shadow">
            <img src="/img/tel_area_img01.png" alt="">
        </div>
    </div>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>