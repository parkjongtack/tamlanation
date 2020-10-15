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
<div class="sub sub_outer shop inner">
    <div class="page_subject">
        <h2>쇼핑몰</h2>
    </div>
    <div class="list_cate">
        <!-- <a href="#none" class="on">추천순</a> -->
        <a href="?order_table=regdate">등록일순 정렬</a>
        <!-- <a href="#none">인기순</a>
        <a href="#none">낮은가격순</a>
        <a href="#none">높은가격순</a> -->
    </div>
    <script>
        $('.list_cate a').hover(function(){
            $(this).toggleClass('on');
        });
    </script>
    <ul class="sale_list_outer">
			<?php
				$page_set = 10;
				$block_set = 10;
				//$page = "";
				//$page = (empty($_GET['page']) == true) ? $_GET['page'] : 1;

				if($_GET['order_table'] == "") {
					$array_table_set = "idx";
					$array_sort = "desc";
				} else {
					$array_table_set = $_GET['order_table'];
					$array_sort = 'desc';
				}

				
				$where = "";
				if($_GET['search_value']) {
					$where .= " and subject like '%".$_GET['search_value']."%'"; 
				}

				$sql = "select * from shopping where 1=1 ".$where." order by ".$array_table_set." ".$array_sort." limit " .(($page-1)*$page_set).",".$page_set;
				$result = mysqli_query($link, $sql);				
				//$count = mysqli_num_rows($result);

				$sql2 = "select * from shopping where 1=1 ".$where."";
				$result2 = mysqli_query($link, $sql2);								
				$total = mysqli_num_rows($result2);

				$pageCnt = (($total-1)/$page_set) +1;						//전체 페이지의 수
				if($page > $pageCnt) $page = 1;

			?>
					<?php 
						$i = 0;
						while($row = mysqli_fetch_array($result)) { ?>

					<?php
						$sql_file_list = "select * from file_list where board_type = 'shopping' and board_idx = '".$row['idx']."' order by idx asc limit 1";
						$result_file_list = mysqli_query($link, $sql_file_list);
						$row_file_list = mysqli_fetch_array($result_file_list);
					?>

							<li data-aos="fade-up" data-aos-delay="0">
								<a href="/sub/product.php?idx=<?=$row['idx']?>">
									<div class="sale_img">
										<img src="/upload/img/<?=$row_file_list['real_file_name']?>" alt="" style="width:300px;">
									</div>
									<p class="sale_name"><?=$row['subject']?><br><span><?=$row['model_name']?></span></p>
									<p class="sale_price"><span class="not_dis"><?=number_format($row['price'])?></span><br><?=number_format($row['discount'])?><span>원</span></p>
									<div class="sale_ico">
										<?php
											if($row['new_status'] == "Y") {
										?>
										<img src="/img/ico_new.png" alt="">
										<?php
											}

											if($row['best_status'] == "Y") {
										?>
										<img src="/img/ico_best.png" alt="">
										<?php
											}
										?>
									</div>
								</a>
							</li>
						<?php $i++; } ?>

        <!-- <li data-aos="fade-up" data-aos-delay="100">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="200">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="300">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="0">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="100">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="200">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="300">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="0">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="100">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="200">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li>
        <li data-aos="fade-up" data-aos-delay="300">
            <a href="/sub/product.php">
                <div class="sale_img">
                    <img src="/img/sample_sale_img.png" alt="">
                </div>
                <p class="sale_name">위니아 딤채 김치냉장고<br><span>WDS10DPACR</span></p>
                <p class="sale_price"><span class="not_dis">300,000</span><br>250,000<span>원</span></p>
                <div class="sale_ico">
                    <img src="/img/ico_new.png" alt="">
                    <img src="/img/ico_best.png" alt="">
                </div>
            </a>
        </li> -->
    </ul>
    <div class="list_serach">
        <!-- <ul class="paging">
            <li>
                <a href="#none">&lt;</a>
            </li>
            <li class="on">
                <a href="#none">1</a>
            </li>
            <li>
                <a href="#none">2</a>
            </li>
            <li>
                <a href="#none">3</a>
            </li>
            <li>
                <a href="#none">4</a>
            </li>
            <li>
                <a href="#none">5</a>
            </li>
            <li>
                <a href="#none">&gt;</a>
            </li>
        </ul> -->
        <div class="paging">
			<?php
				$param = "order_table=".$_GET['order_table']."&orderby=".$_GET['orderby']."&study_search=".$_GET['study_search'];
			?>
			<?=print_pagelist($page, $total, $page_set, $block_set, $param); ?>
		</div>
        <div class="search_box">
            <form action="<?=$_SERVER['PHP_SELF']?>">
                <select name="search_type">
                    <option value="subject" selected>제목</option>
                </select>
                <input type="text" name="search_value">
                <input type="submit" value="검색">
            </form>
        </div>
    </div>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>