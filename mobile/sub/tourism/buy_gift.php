<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/head.php";
?>
<script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
<div class="main_slider swiper-container sub_slide">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="/img/m_sub_slide_img01.png" alt="슬라이드1">
        </div>
        <div class="swiper-slide">
            <img src="/img/m_sub_slide_img02.png" alt="슬라이드2">
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<div class="sub_nav_outer">
    <ul>
        <li>
            관광상품권
        </li>
        <li>
            <div><a href="/sub/company/ceo.php">회사소개</a></div>
            <div class="on"><a href="/sub/tourism/gift_card.php">관광상품권</a></div>
            <div><a href="/sub/franchisee/apply.php">가맹점</a></div>
            <div><a href="#none">관광</a></div>
            <div><a href="/sub/shop.php">쇼핑몰</a></div>
            <div><a href="#none">고객센터</a></div>
        </li>
    </ul>
    <ul>
        <li>상품권 구매신청</li>
        <li>
            <div><a href="/sub/tourism/gift_card.php">관광상품권이란?</a></div>
            <div><a href="/sub/tourism/use_info.php">이용안내</a></div>
            <div><a href="/sub/tourism/benefits.php">상품권 혜택</a></div>
            <div><a href="/sub/tourism/terms.php">상품권 약관</a></div>
            <div class="on"><a href="/sub/tourism/buy_gift.php">상품권 구매신청</a></div>
        </li>
    </ul>
</div>
<div class="sub sub_outer inner">
    <div class="page_subject">
        <h2>상품권 구매신청</h2>
    </div>
    <img src="/img/m_sub2_5.png" alt="">
    <div class="sale_action">
        <div class="form_outer">
            <h3><b>온라인</b> 상품권 구매신청</h3>
            <form action="/action/write_action.php" method="POST" onsubmit="return insert_action();" name="on_line">
            <input type="hidden" name="board_type" value="buy_gift">
            <input type="hidden" name="buy_gift_type" value="on">
            <input type="hidden" name="settle_type" value="무통장입금">
            <input type="hidden" name="product_name" value="온라인 상품권"">
                <div class="line">
                    <p>금액선택</p>
                    <div class="bg">
                        <label>
                            <input type="radio" name="price" value="5000">
                            5,000원
                        </label>
                        <label>
                            <input type="radio" name="price" value="10000">
                            10,000원
                        </label>
                        <label>
                            <input type="radio" name="price" value="50000">
                            50,000원
                        </label>
                    </div>
                </div>
                <div class="line">
                    <p>구매장수</p>
                    <div class="no_bg">
                        <input type="text" name="product_cnt">
                        <p>장(매)</p>
                         <span>*구매하고자 하는 상품권의 수량을 입력하세요.</span>
                    </div>
                </div>
                <div class="submit_box">
                    <input type="submit" value="구매신청">
                </div>
            </form>
        </div>
        <div class="form_outer">
            <h3><b>오프라인</b> 상품권 구매신청</h3>
            <form action="/action/write_action.php" method="POST" onsubmit="return insert_action2();" name="off_line">
            <input type="hidden" name="board_type" value="buy_gift">
            <input type="hidden" name="buy_gift_type" value="off">
            <input type="hidden" name="settle_type" value="무통장입금">
            <input type="hidden" name="product_name" value="오프라인 상품권"">
                <div class="line">
                    <p>금액선택</p>
                    <div class="bg">
                        <label>
                            <input type="radio" name="price" value="5000">
                            5,000원
                        </label>
                        <label>
                            <input type="radio" name="price" value="10000">
                            10,000원
                        </label>
                        <label>
                            <input type="radio" name="price" value="50000">
                            50,000원
                        </label>
                    </div>
                </div>
                <div class="line">
                    <p>구매장수</p>
                    <div class="no_bg">
                        <input type="text" name="product_cnt">
                        <p>장(매)</p>
                        <span>*구매하고자 하는 상품권의 수량을 입력하세요.</span>
                    </div>
                </div>
                <div class="submit_box">
                    <input type="submit" value="구매신청">
                </div>
            </form>
        </div>
        <p class="orange">
            상품권 구매 처리 상황과 결제는 회원님의 MyPage에서 확인 하실 수 있습니다.<br/><br/>
            <a href="/sub/my_page/lookup.php">MyPage 상품권관리 바로가기</a>
        </p>
        
    </div>
</div>
<script type="text/javascript">
	function insert_action() {

        if($("form[name=on_line] input[name=price]").val() == "") {
            alert("금액을 선택해주세요.");
            return false;
        }

        if($("form[name=on_line] input[name=count]").val() == "") {
            alert("구매 장수를 입력해주세요.");
            return false;
        }

    }

    function insert_action2() {

        if($("form[name=off_line] input[name=price]").val() == "") {
            alert("금액을 선택해주세요.");
            return false;
        }

        if($("form[name=off_line] input[name=count]").val() == "") {
            alert("구매 장수를 입력해주세요.");
            return false;
        }

    }
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>