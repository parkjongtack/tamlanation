<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";

    if(!isset($_SESSION['user_id'])){
        echo "<script>alert('로그인 후 이용해주세요.'); location.href='../login.php'</script>";
        exit;
    }

    $sql_modify = "select * from order_table where user_id = '".$_SESSION['user_id']."' order by idx desc";
	$result_modify = mysqli_query($link, $sql_modify);
	$row = mysqli_fetch_array($result_modify);
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
<div class="sub sub_outer mypage inner order_completed">
    <div class="page_subject">
        <h2>주문완료</h2>
    </div>
    <div class="mypage_inner">
        <h3>고객님의 주문이 정상적으로 완료되었습니다.</h3>
        <p><span class="red">*무통장입금으로 결제가 진행되니 확인부탁드립니다.</span></p>
        <p>은행명 : 기업은행 ㅣ 예금주 : 홍길동</p>
        <p></p>
        <p>계좌번호 : <span class="red">111-11111111-11-111</span></p>
        <table>
            <colgroup>
                <col width="600px">
                <col width="150px">
                <col width="150px">
                <col width="150px">
                <col width="150px">
            </colgroup>
            <tr>
                <th>품목</th>
                <th>옵션</th>
                <th>금액</th>
                <th>수량</th>
                <th>합계금액</th>
            </tr>
            <tr>
                <td><?=$row['product_name']?></td>
                <td><?=$row['option']?></td>
                <td><?=number_format($row['discount'])?>원</td>
                <td><?=$row['amount']?></td>
                <td><?=number_format(($row['discount'] * $row['amount']))?>원</td>
            </tr>
        </table>
        <div class="all_price_box" style="margin-bottom: 40px;">
            <span>배송비</span>
            <span>0원</span>
            <span>총 주문금액</span>
            <span><?=number_format(($row['discount'] * $row['amount']))?>원</span>
        </div>
    </div>
</div>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>