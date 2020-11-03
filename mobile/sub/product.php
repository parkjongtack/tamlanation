<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";

    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/head.php";

	$sql_modify = "select * from shopping where idx = '".$_GET['idx']."'";
	$result_modify = mysqli_query($link, $sql_modify);
    $row_member = mysqli_fetch_array($result_modify);
    
    $per = (1 - $row_member['discount'] / $row_member['price'])*100;
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
					<?php
						$sql_img_file = "select * from file_list where board_type = 'shopping' and board_idx = '".$_GET['idx']."'";
						$result_img_file = mysqli_query($link, $sql_img_file);

						while($row_img_file = mysqli_fetch_array($result_img_file)) {					
					?>
                    <div class="swiper-slide">
                        <img src="/upload/img/<?=$row_img_file['real_file_name']?>" alt="">
                    </div>
					<?php
						}
                    ?>
                    <div class="swiper-slide">
                        <img src="/upload/img/<?=$row_img_file['real_file_name']?>" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/upload/img/<?=$row_img_file['real_file_name']?>" alt="">
                    </div>
                    <!-- <div class="swiper-slide">
                        <img src="/img/product_img02.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/product_img01.png" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="/img/product_img02.png" alt="">
                    </div> -->
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="product_info">
                <form action="/action/write_action.php" name="product" method="POST">
                <input type="hidden" name="board_type" value="product">
                <input type="hidden" name="wish_buy">
                <input type="hidden" name="settle_type" value="무통장입금">
                <input type="hidden" name="product_cnt" value="1">
                <input type="hidden" name="product_name" value="<?=$row_member['subject']?>">
                <input type="hidden" name="product_idx" value="<?=$_GET['idx']?>">
                    <h2><?=$row_member['subject']?></h2>
                    <div class="info_detail">
                        <div class="info_detail_outer">
                            <p>수량</p>
                            <div class="option_line pm_cnt">
                                <span class="pm_check minus">-</span>
                                <span class="cnt" id="product_cnt">1</span>
                                <span class="pm_check plus">+</span>
                            </div>
                        </div>
                        <div class="info_detail_outer">
                            <p>옵션</p>
                            <div class="option_line">
                                <select name="option">
									<?php
										$sql_img_file = "select * from product_option_list where product_idx = '".$_GET['idx']."'";
										$result_img_file = mysqli_query($link, $sql_img_file);

										while($row_img_file = mysqli_fetch_array($result_img_file)) {					
									?>
                                    <option value="<?=$row_img_file['option_name']?>"><?=$row_img_file['option_name']?></option>
									<?php
										}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="info_detail_outer">
                            <p>정상가</p>
                            <div class="option_line">
                                <input type="hidden" name="price" value="<?=$row_member['price']?>">
                                <span class="price price_"><?=number_format($row_member['price'])?>원</span>
                            </div>
                        </div>
                        <div class="info_detail_outer">
                            <p>할인가</p>
                            <div class="option_line">
                                <input type="hidden" name="discount" value="<?=$row_member['discount']?>">
                                <span class="price"><?=number_format($row_member['discount'])?>원</span>
                                <span class="percent"><?=$per?>%</span>
                            </div>
                        </div>
                    </div>
                    <div class="wish_buy">
                        <a href="#none" class="wish">장바구니</a>
                        <a href="#none" class="buy">구매하기</a>
                    </div>
                </form>
                <script type="text/javascript">

                    

                    $(function(){

                        $('.wish_buy a').click(function(){
                            if($(this).hasClass('wish')){
                                $('input[name=wish_buy]').val('wish');
                                product.submit();
                            }else{
                                $('input[name=wish_buy]').val('buy');
                                product.submit();
                            }
                        })

                        $('.minus').click(function(){
                            var product_cnt = $('#product_cnt').text();
                            product_cnt = parseInt(product_cnt);
                            var cnt = product_cnt-1;
                            if(cnt == 0){
                                alert('최소구매 수량입니다.')
                            }else{
                                $('#product_cnt').text(cnt);
                                $('input[name=product_cnt]').val(cnt);
                            }
                        });
                        $('.plus').click(function(){
                            var product_cnt = $('#product_cnt').text();
                            product_cnt = parseInt(product_cnt);
                            var cnt = product_cnt+1;
                            $('#product_cnt').text(cnt);
                            $('input[name=product_cnt]').val(cnt);
                        });
                    });
                </script>
            </div>
        </div>
        <div class="detail_outer">
            <div class="sub_title">
                <h2>상세정보</h2>
                <p>탐라국에 오신것을 환영합니다. 탐라국 주유소 가맹점 상세정보를 보실 수 있습니다.</p>
            </div>
            <div class="detail_contents">
				<?=$row_member['contents']?>
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
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>