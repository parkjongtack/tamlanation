<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";
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
        <div class="search_select_box box_shadow" data-aos="fade-up">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
                <select name="" id="">
                    <option value="#" selected>제주특별자치도</option>
                </select>
                <span class="select_line"></span>
                <select name="city" id="">
                    <option value="" selected>시/군/구</option>
                    <option value="jeju" <?=($_GET['city'] == "jeju") ? "selected" : ""; ?> >제주시</option>
                    <option value="seogipo" <?=($_GET['city'] == "seogipo") ? "selected" : ""; ?> >서귀포시</option>
                </select>
                <span class="select_line"></span>
                <select name="user_sectors" required>
					<option value="gas_station" <?=($_GET['user_sectors'] == "gas_station") ? "selected" : ""; ?> >주유소정보</option>
					<option value="mart" <?=($_GET['user_sectors'] == "mart") ? "selected" : ""; ?> >마트정보</option>
					<option value="motel" <?=($_GET['user_sectors'] == "motel") ? "selected" : ""; ?> >숙박정보</option>
					<option value="restaurant" <?=($_GET['user_sectors'] == "restaurant") ? "selected" : ""; ?> >음식점정보</option>
					<option value="marketplace" <?=($_GET['user_sectors'] == "marketplace") ? "selected" : ""; ?> >장터정보</option>
					<option value="etc" <?=($_GET['user_sectors'] == "etc") ? "selected" : ""; ?> >기타정보</option>
				</select>
                <span class="select_line"></span>
                <select name="user_sectors2" id="">
                </select>
                <span class="select_line"></span>
                <input type="text" name="user_store_name" placeholder="업소 검색" value="<?=$_GET['user_store_name']?>">
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
                        <li class="<?=($_GET['user_sectors'] == "gas_station" || $_GET['user_sectors'] == "") ? "on" : ""; ?> box_shadow" data-aos="fade-left">
                            <img src="/img/main_nav01.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "mart") ? "on" : ""; ?> box_shadow" data-aos="fade-left" data-aos-delay="200">
                            <img src="/img/main_nav02.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "motel") ? "on" : ""; ?> box_shadow" data-aos="fade-left" data-aos-delay="300">
                            <img src="/img/main_nav03.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "restaurant") ? "on" : ""; ?> box_shadow" data-aos="fade-left" data-aos-delay="400">
                            <img src="/img/main_nav04.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "marketplace") ? "on" : ""; ?> box_shadow" data-aos="fade-left" data-aos-delay="500">
                            <img src="/img/main_nav05.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "etc") ? "on" : ""; ?> box_shadow" data-aos="fade-left" data-aos-delay="600">
                            <img src="/img/main_nav06.png" alt="">
                        </li>
                    </ul>
                </div>
                <?php
				$page_set = 10;
				$block_set = 10;
				//$page = "";
				//$page = (empty($_GET['page']) == true) ? $_GET['page'] : 1;
				/*
				if($_GET['order_table'] == "") {
					$array_table_set = "identity_number, affiliation, study_set";
					$array_sort = "asc";
				} else {
					$array_table_set = $_GET['order_table'];
					$array_sort = $_GET['orderby'];
				}
				*/
				$array_table_set = "idx";
				$array_sort = "desc";
				
                $where = "";
                if($_GET['user_store_name'] == ""){

                }else if($_GET['user_store_name']) {
					$where .= " and user_store_name = '".$_GET['user_store_name']."'"; 
				}

				if($_GET['city']) {
					$where .= " and city = '".$_GET['city']."'"; 
				}

				if($_GET['user_sectors']) {
					$where .= " and user_sectors = '".$_GET['user_sectors']."'"; 
                }else{
                    $where .= " and user_sectors = 'gas_station'";
                }
                
                if($_GET['user_sectors2']) {
					$where .= " and user_sectors2 = '".$_GET['user_sectors2']."'"; 
				}

				$sql = "select * from franchisee where 1=1 ".$where." order by ".$array_table_set." ".$array_sort."";
                $result = mysqli_query($link, $sql);
                //$row = mysqli_fetch_array($result);
				// $count = mysqli_num_rows($result);

				$sql2 = "select * from franchisee where 1=1 ".$where."";
				$result2 = mysqli_query($link, $sql2);								
                $total = mysqli_num_rows($result2);

				$pageCnt = (($total-1)/$page_set) +1;						//전체 페이지의 수
                if($page > $pageCnt) $page = 1;
                
                if(!$_GET['user_sectors']) {
					$sector_text = "주유소";
				} else {
					if($_GET['user_sectors'] == "gas_station") {
						$sector_text = "주유소";
					} else if($_GET['user_sectors'] == "mart") {
						$sector_text = "마트";
					} else if($_GET['user_sectors'] == "motel") {
						$sector_text = "숙박";
					} else if($_GET['user_sectors'] == "restaurant") {
						$sector_text = "음식점";
					} else if($_GET['user_sectors'] == "marketplace") {
						$sector_text = "장터";
					} else if($_GET['user_sectors'] == "etc") {
						$sector_text = "기타";
					}
                }
                
            ?>
                <script>
                    $(document).ready(function(){
                        <?php if($_GET['user_sectors']){ ?>
                            $('html, body').animate({scrollTop:$('.search_select_box').offset().top-150},0);
                        <?php } ?>
                        var idx = $('.fran_list li.on').index();
                        $('.fran_list li.on').children('img').attr('src', '/img/main_nav0'+(idx+1)+'_on.png');
                        $('.fran_list_sub ul').hide();
                        $('.fran_list_sub ul').eq(idx).css({display:'flex'});
                        $('.fran_list li').click(function(){
                            $('.fran_list li').removeClass('on');
                            $(this).addClass('on');
                            var idx = $(this).index();
                            if(idx == 0){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=gas_station&user_sectors2=주유소정보';
                            }else if(idx == 1){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=mart&user_sectors2=마트정보';
                            }else if(idx == 2){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=호텔';
                            }else if(idx == 3){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant&user_sectors2=한식';
                            }else if(idx == 4){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=marketplace&user_sectors2=장터정보';
                            }else if(idx == 5){
                                location.href = '<?=$_SERVER['PHP_SELF']?>?user_sectors=etc&user_sectors2=기타정보';
                            }
                            var img_scr = $(this).children('img').attr('src');

                            // if(img_scr.indexOf('_on') == -1){
                            //     for(var i = 0; i<$('.fran_list li').length; i++){
                            //         $('.fran_list li').eq(i).children('img').attr('src','/img/main_nav0'+(i+1)+'.png')
                            //     }
                            //     var re_img_scr = img_scr.substr(0,img_scr.indexOf('.png'));
                            //     var real_re_img_scr = re_img_scr+'_on.png';
                            //     $(this).children('img').attr('src',real_re_img_scr);
                            //     //$(this).children('img').attr('src',re_img_scr+'.png');
                            // }
                        });

                        $('.fran_list_sub ul li').click(function(){
                            // $(this).closest('ul');
                            $(this).closest('ul').children('li').removeClass('on');
                            // $('.fran_list_sub').removeClass('on');
                            $(this).addClass('on');
                        });

                        var option_2 = "<?php echo $_GET['user_sectors2']; ?>";
                        var list = [
                            ['주유소정보'],
                            ['마트정보'],
                            ['호텔', '휴양콘도', '리조트', '펜션', '민박', '게스트하우스'],
                            ['한식', '중식', '일식', '기타'],
                            ['장터정보'],
                            ['기타정보']
                        ];

                        var option_1 = $('select[name=user_sectors]').val();
                        function list_change(){
                            var idx = select_list();
                            for(var j = 0; j < list[idx].length; j++){
                                if(option_2 == list[idx][j]){
                                    $('select[name=user_sectors2]').append('<option value="'+list[idx][j]+'" selected>'+list[idx][j]+'</option>');
                                    console.log(list[idx]);
                                }else{
                                    $('select[name=user_sectors2]').append('<option value="'+list[idx][j]+'">'+list[idx][j]+'</option>');
                                }
                            }
                        }
                        list_change()
                        function select_list(){
                            if(option_1 == 'gas_station'){
                                return 0;
                            }else if(option_1 == 'mart'){
                                return 1;
                            }else if(option_1 == 'motel'){
                                return 2;
                            }else if(option_1 == 'restaurant'){
                                return 3;
                            }else if(option_1 == 'marketplace'){
                                return 4;
                            }else if(option_1 == 'etc'){
                                return 5;
                            }
                        }
                        $('select[name=user_sectors]').on('change', function(){
                            $('select[name=user_sectors2] option').remove();
                            option_1 = $('select[name=user_sectors]').val();
                            list_change();
                        });
                    });
                </script>
                <div class="fran_list_sub">
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "주유소정보" || $_GET['user_sectors2'] == "") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=gas_station&user_sectors2=주유소정보'">주유소정보</li>
                    </ul>
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "마트정보") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=mart&user_sectors2=마트정보'">마트정보</li>
                    </ul>
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "호텔") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=호텔'">호텔</li>
                        <li class="<?=($_GET['user_sectors2'] == "휴양콘도") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=휴양콘도'" >휴양콘도</li>
                        <li class="<?=($_GET['user_sectors2'] == "리조트") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=리조트'" >리조트</li>
                        <li class="<?=($_GET['user_sectors2'] == "펜션") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=펜션'" >펜션</li>
                        <li class="<?=($_GET['user_sectors2'] == "민박") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=민박'" >민박</li>
                        <li class="<?=($_GET['user_sectors2'] == "게스트하우스") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel&user_sectors2=게스트하우스'" >게스트하우스</li>
                    </ul>
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "한식") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant&user_sectors2=한식'">한식</li>
                        <li class="<?=($_GET['user_sectors2'] == "중식") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant&user_sectors2=중식'">중식</li>
                        <li class="<?=($_GET['user_sectors2'] == "일식") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant&user_sectors2=일식'">일식</li>
                        <li class="<?=($_GET['user_sectors2'] == "기타") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant&user_sectors2=기타'">기타</li>
                    </ul>
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "장터정보") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=marketplace&user_sectors2=장터정보'">장터정보</li>
                    </ul>
                    <ul>
                        <li class="<?=($_GET['user_sectors2'] == "기타정보") ? "on" : ""; ?>" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=etc&user_sectors2=기타정보'">기타정보</li>
                    </ul>
                </div>
            </div>            
            <div class="swiper-container franchise_slide">
                <div class="swiper-wrapper">
                <?php 
                if($total == 0){
                    echo "<p class='no_list'>등록된 가맹점정보가 없습니다.</p>";
                }
				while($row = mysqli_fetch_array($result)) { 
                    
                    ?>

					<?php
						$sql_file_list = "select * from file_list where board_type = 'franchisee' and board_idx = '".$row['idx']."' order by idx asc limit 1";
						$result_file_list = mysqli_query($link, $sql_file_list);
						$row_file_list = mysqli_fetch_array($result_file_list);
					?>

                    <div class="swiper-slide box_shadow">
                        <div class="img_area">
                            <img src="/upload/img/<?=$row_file_list['real_file_name']?>" alt="" width="288px">
                        </div>
                        <div class="info_area">
                            <p class="cate"><?=$sector_text?></p>
                            <h2><?=$row['user_store_name']?></h2>
                            <p class="gps_text"><span>위치</span><?=$row['user_addr']?></p>
                            <a href="<?=$row['user_url']?>">홈페이지 이동</a>
                        </div>
                    </div>
				<?php } ?>
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
                loop: false,
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
        <div class="box_shadow" data-aos="fade-right">
            <a href="#none">
                <img src="/img/contact_area_img01.png" alt="">
            </a>
        </div>
        <div class="box_shadow" data-aos="fade-left">
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
            <a href="/sub/shop.php"><img src="/img/shop_area_img01.png" alt=""></a>
        </div>
        <div class="tel_area box_shadow">
            <img src="/img/tel_area_img01.png" alt="">
        </div>
    </div>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>