<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/head.php";

    if(!isset($_SESSION['user_id'])){
        echo "<script>alert('로그인 후 이용해주세요.'); location.href='../login.php'</script>";
        exit;
    }

	$sql_modify = "select * from shopping where idx = '".$_GET['idx']."'";
	$result_modify = mysqli_query($link, $sql_modify);
	$row_member = mysqli_fetch_array($result_modify);
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
<div class="sub sub_outer mypage inner">
    <div class="page_subject">
        <h2>마이페이지</h2>
    </div>
    <div class="mypage_list">
        <ul class="flex_normal">
            <li>
                <span class="bar"></span>
                <h2>
                    MYPAGE<br/><span>마이페이지</span>
                </h2>
            </li>
            <li>
                <a href="my_info.php">
                    <i class="fas fa-user"></i>
                    회원정보수정
                </a>
            </li>
            <li>
                <a href="payment.php">
                    <i class="far fa-credit-card"></i>
                    개인결제창
                </a>
            </li>
            <li>
                <a href="lookup.php">
                    <i class="fas fa-receipt"></i>
                    주문내역조회
                </a>
            </li>
            <li>
                <a href="basket.php">
                    <i class="fas fa-shopping-cart"></i>
                    장바구니
                </a>
            </li>
        </ul>
    </div>
    <div class="mypage_inner">
        <h3>장바구니</h3>
        <table>
            <colgroup>
                <col width="750px">
                <col width="150px">
                <col width="150px">
                <col width="150px">
            </colgroup>
            <tr>
                <th>품목</th>
                <th>금액</th>
                <th>수량</th>
                <th>합계금액</th>
            </tr>
            <tr>
                <td>품목</td>
                <td>고객명</td>
                <td>연락처</td>
                <td>배송중</td>
            </tr>
        </table>
        <div class="all_price_box">
            <span>배송비</span>
            <span>0원</span>
            <span>총 주문금액</span>
            <span>0원</span>
        </div>
        <div class="submit_box">
            <a href="#none">주문하기</a>
            <a href="#none">선택삭제</a>
        </div>
    </div>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>