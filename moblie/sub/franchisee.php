<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";

    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";

?>
<?php
	if(!$_GET['page']) $page = 1;
	else $page = $_GET['page'];
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
            <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
                <select name="" id="">
                    <option value="#" selected>제주특별자치도</option>
                </select>
                <span class="select_line"></span>
                <select name="city" id="">
                    <option value="#" selected>시/군/구</option>
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
                <!-- <span class="select_line"></span> -->
               <!--  <select name="" id="">
                    <option value="#" selected>펜션</option>
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                </select> -->
                <span class="select_line"></span>
                <input type="text" name="user_store_name" placeholder="업소 검색" value="<?=$_GET['user_store_name']?>" style="width:300px;">
                <input type="submit" value="검색">
            </form>
        </div>
        <div class="franchise_area">
            <div class="fran_list_area">
                <div class="fran_list">
                    <ul>
                        <li class="<?=($_GET['user_sectors'] == "gas_station") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=gas_station';">
                            <img src="/img/fr_nav01.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "mart") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=mart';">
                            <img src="/img/fr_nav02.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "motel") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=motel';">
                            <img src="/img/fr_nav03.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "restaurant") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=restaurant';">
                            <img src="/img/fr_nav04.png" alt="">
                        </li>
                        <li class="<?=($_GET['user_sectors'] == "marketplace") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=marketplace';">
                            <img src="/img/fr_nav05.png" alt="">
                        </li>
                        <li class="<?=( $_GET['user_sectors'] == "etc") ? "on" : ""; ?> box_shadow" onclick="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?user_sectors=etc';">
                            <img src="/img/fr_nav06.png" alt="">
                        </li>
                    </ul>
                </div>
                <script>
                    $(document).ready(function(){
                        var idx = $('.fran_list li.on').index();
                        console.log('/img/fr_nav0'+idx+'.png');
                        $('.fran_list li.on').children('img').attr('src', '/img/fr_nav0'+(idx+1)+'_on.png');


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
                                $('.fran_list li.on').children('img').attr('src',real_re_img_scr);
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
				if($_GET['user_store_name']) {
					$where .= " and user_store_name = '".$_GET['user_store_name']."'"; 
				}

				if($_GET['city']) {
					$where .= " and city = '".$_GET['city']."'"; 
				}

				if($_GET['user_sectors']) {
					$where .= " and user_sectors = '".$_GET['user_sectors']."'"; 
				}

				$sql = "select * from franchisee where 1=1 ".$where." order by ".$array_table_set." ".$array_sort." limit " .(($page-1)*$page_set).",".$page_set;
				$result = mysqli_query($link, $sql);				
				//$count = mysqli_num_rows($result);

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
            <div class="sub_title">
                <h2><?=$sector_text?>정보 <span>리스트</span></h2>
                <p>탐라국에 오신것을 환영합니다. 탐라국 <?=$sector_text?> 가맹점들을 소개합니다.</p>
            </div>
            <ul class="fr_list_outer franchise_slide">
			<?php 
				$i = 0;
				while($row = mysqli_fetch_array($result)) { ?>

					<?php
						$sql_file_list = "select * from file_list where board_type = 'franchisee' and board_idx = '".$row['idx']."' order by idx asc limit 1";
						$result_file_list = mysqli_query($link, $sql_file_list);
						$row_file_list = mysqli_fetch_array($result_file_list);
					?>

					<li data-aos="fade-left">
						<div class="fr_list box_shadow">
							<div class="img_area">
								<img src="/upload/img/<?=$row_file_list['real_file_name']?>" alt="" style="width:300px;">
							</div>
							<div class="info_area">
								<p class="cate"><?=$sector_text?></p>
								<h2><?=$row['user_store_name']?></h2>
								<p class="gps_text"><span>위치</span><?=$row['user_addr']?></p>
								<a href="<?=$row['user_url']?>">홈페이지 이동</a>
							</div>
						</div>
					</li>
				<?php $i++; } ?>

				<!--
                <li data-aos="fade-left" data-aos-delay="100">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left" data-aos-delay="200">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left" data-aos-delay="300">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left" data-aos-delay="100">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left" data-aos-delay="200">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
                <li data-aos="fade-left" data-aos-delay="300">
                    <div class="fr_list box_shadow">
                        <div class="img_area">
                            <img src="/img/fran_sample_img.png" alt="">
                        </div>
                        <div class="info_area">
                            <p class="cate">호텔</p>
                            <h2>제주신라호텔</h2>
                            <p class="gps_text"><span>위치</span>서귀포시 중문관광로 72번길 75</p>
                            <a href="franchisee_view.php">홈페이지 이동</a>
                        </div>
                    </div>
                </li>
				-->
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