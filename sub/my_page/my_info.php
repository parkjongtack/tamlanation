<?php
	include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";

    if(!isset($_SESSION['user_id'])){
        echo "<script>alert('로그인 후 이용해주세요.'); location.href='../login.php'</script>";
        exit;
    }

    $sql = "select * from as_account where user_id = '".$_SESSION['user_id']."'";
    //echo $sql;
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result);
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
<div class="sub sub_outer mypage login_outer inner">
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
    <div class="mypage_inner join_outer">
        <h3>회원정보수정</h3>
        <?php
            if($_SESSION['user_type'] == 2){
        ?>
        <form action="../action/write_action.php" class="join_form" method="POST" onsubmit="return member_insert_action();">
            <input type="hidden" name="board_type" value="join">
            <input type="hidden" name="join_type" value="2">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="" value="">
            <input type="hidden" name="id_dup_check" value="no">
            <ul>
                <li>
                    <p>아이디</p>
                    <input type="text" name="user_id" value="<?=$row['user_id']?>" readonly>
                </li>
                <li>
                    <p>비밀번호</p>
                    <input type="password" name="user_passwd_before" required>
                    <span>현재 비밀번호를 입력해주세요.</span>
                </li>
                <li>
                    <p>새비밀번호</p>
                    <input type="password" name="user_passwd">
                    <span>문자(영문)+특수문자+숫자 조합과 8자리 이상으로 비밀번호 설정하셔야 합니다.</span>
                </li>
                <li>
                    <p>새비밀번호 확인</p>
                    <input type="password" name="user_passwd2">
                </li>
                <li>
                    <p>업종선택</p>
                    <select name="user_sectors">
						<option value="gas_station"<?php if($row['user_sectors'] == "gas_station"){echo "selected";}?>>주유소정보</option>
						<option value="mart"<?php if($row['user_sectors'] == "mart"){echo "selected";}?>>마트정보</option>
						<option value="motel"<?php if($row['user_sectors'] == "motel"){echo "selected";}?>>숙박정보</option>
						<option value="restaurant"<?php if($row['user_sectors'] == "restaurant"){echo "selected";}?>>음식점정보</option>
						<option value="marketplace"<?php if($row['user_sectors'] == "marketplace"){echo "selected";}?>>장터정보</option>
						<option value="etc"<?php if($row['user_sectors'] == "etc"){echo "selected";}?>>기타정보</option>
                    </select>
                </li>
                <li>
                    <p>매장 이름</p>
                    <input type="text" name="user_store_name" value="<?=$row['user_store_name']?>">
                </li>
                <li>
                    <p>매장 우편번호</p>
                    <input type="text" id="user_address_number" name="user_address_number" value="<?=$row['user_address_number']?>" onclick="javascript:sample4_execDaumPostcode();">
					<span class="id_check" onclick="javascript:sample4_execDaumPostcode();">주소찾기</span>
                </li>
                <li>
                    <p>매장 기본주소</p>
                    <input type="text" id="user_address" name="user_address" value="<?=$row['user_address']?>" readonly onclick="javascript:sample4_execDaumPostcode();">
                </li>
                <li>
                    <p>매장 상세주소</p>
                    <input type="text" name="user_address_detail" value="<?=$row['user_address_detail']?>">
                </li>
                <li>
                    <p>매장 일반전화</p>
                    <input type="text" name="user_store_call" value="<?=$row['user_store_call']?>">
                </li>
                <li>
                    <p>사업자등록번호</p>
                    <input type="text" name="user_business_number" value="<?=$row['user_business_number']?>">
                </li>
                <li>
                    <p>대표자 이름</p>
                    <input type="text" name="user_name" value="<?=$row['user_name']?>">
                </li>
                <li>
                    <p>대표자 핸드폰</p>
                    <input type="text" name="user_phone1" value="<?=substr($row['user_phone'],0,3)?>"> - <input type="text" name="user_phone2" value="<?=substr($row['user_phone'],4,4)?>"> - <input type="text" name="user_phone3" value="<?=substr($row['user_phone'],9,4)?>">
                </li>
                <li>
                    <p>은행명&예금주</p>
                    <input type="text" name="user_bank" value="<?=$row['user_bank']?>"> <input type="text" name="user_bank_name" value="<?=$row['user_bank_name']?>">
                </li>
                <li>
                    <p>은행 계좌번호</p>
                    <input type="text" name="user_bank_info" value="<?=$row['user_bank_info']?>">
                </li>
                <li>
                    <p>홈페이지 주소</p>
                    <input type="text" name="user_url" value="<?=$row['user_url']?>">
                </li>
                <li>
                    <p>매장 오픈날짜</p>
                    <input type="text" name="user_store_opendate" value="<?=$row['user_store_opendate']?>">
                </li>
                <li>
                    <p>매장 소개글</p>
                    <textarea name="user_memo" wrap="hard"><?=$row['user_memo']?></textarea>
                </li>
            </ul>
            <div class="submit_box">
                <input type="submit" value="가입신청">
            </div>
        </form>
            <?php }else{ ?>
        <form action="../action/write_action.php" class="join_form" method="POST" onsubmit="return member_insert_action();">
            <input type="hidden" name="board_type" value="join">
            <input type="hidden" name="join_type" value="1">
            <input type="hidden" name="id_dup_check" value="no">
            <ul>
                <li>
                    <p>아이디</p>
                    <input type="text" name="user_id" value="<?=$row['user_id']?>" readonly>
                </li>
                <li>
                    <p>비밀번호</p>
                    <input type="password" name="user_passwd_before" required>
                    <span>현재 비밀번호를 입력해주세요.</span>
                </li>
                <li>
                    <p>새비밀번호</p>
                    <input type="password" name="user_passwd">
                    <span>문자(영문)+특수문자+숫자 조합과 8자리 이상으로 비밀번호 설정하셔야 합니다.</span>
                </li>
                <li>
                    <p>새비밀번호 확인</p>
                    <input type="password" name="user_passwd2">
                </li>
                <li>
                    <p>성함</p>
                    <input type="text" name="user_name" value="<?=$row['user_name']?>">
                </li>
                <li>
                    <p>생년월일</p>
                    <input type="text" name="user_birthday" value="<?=$row['user_id']?>">
                </li>
                <li>
                    <p>우편번호</p>
                    <input type="text" id="user_address_number" name="user_address_number" value="<?=$row['user_address_number']?>" onclick="javascript:sample4_execDaumPostcode();" readonly>
					<span class="id_check" onclick="javascript:sample4_execDaumPostcode();">주소찾기</span>
				</li>
                <li>
                    <p>기본주소</p>
                    <input type="text" id="user_address" name="user_address" value="<?=$row['user_address']?>" readonly onclick="javascript:sample4_execDaumPostcode();">
                </li>
                <li>
                    <p>상세주소</p>
                    <input type="text" name="user_address_detail" value="<?=$row['user_address_detail']?>">
                </li>
                <li>
                    <p>연락처</p>
                    <input type="text" name="user_phone1" value="<?=substr($row['user_phone'],0,3)?>"> - <input type="text" name="user_phone2" value="<?=substr($row['user_phone'],4,4)?>"> - <input type="text" name="user_phone3" value="<?=substr($row['user_phone'],9,4)?>">
                </li>
                <li>
                    <p>이메일</p>
                    <input type="hidden" value="<?=$row['user_email']?>" id="user_email">
                    <input type="text" name="user_email1"> @ <input type="text" name="user_email2">
                </li>
            </ul>
            <div class="submit_box">
                <input type="submit" value="가입하기">
            </div>
        </form>
        <script type="text/javascript">
            $(function(){
                var email = $('#user_email').val();

                var email_after = email.split('@');
                $('input[name=user_email1]').val(email_after[0]);
                $('input[name=user_email2]').val(email_after[1]);
            });
        </script>
            <?php } ?>
    </div>
</div>
<script type="text/javascript">



    	function member_insert_action() {

            if($("input[name=user_passwd]").val() != $("input[name=user_passwd2]").val()) {
                $("input[name=user_passwd]").focus();
                alert("새비밀번호가 다릅니다.");
                return false;
            }

            var pattern1 = /[0-9]/;
            var pattern2 = /[a-zA-Z]/;
            var pattern3 = /[~!@\#$%<>^&*]/;     // 원하는 특수문자 추가 제거

            if(!pattern1.test($("input[name=user_passwd]").val())||!pattern2.test($("input[name=user_passwd]").val())||!pattern3.test($("input[name=user_passwd]").val())||$("input[name=user_passwd]").val().length<8||$("input[name=user_passwd]").val().length>50){
                alert("비밀번호는 영문+숫자+특수기호 8자리 이상으로 구성하여야 합니다.");
                $("input[name=user_passwd]").focus();
                return false;
            }          

        }
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>