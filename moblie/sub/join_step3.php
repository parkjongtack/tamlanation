<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/head.php";
?>
<script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
    function sample4_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var roadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 참고 항목 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if(data.buildingName !== '' && data.apartment === 'Y'){
                   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if(extraRoadAddr !== ''){
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('user_address_number').value = data.zonecode;
                document.getElementById("user_address").value = roadAddr;
                //document.getElementById("sample4_jibunAddress").value = data.jibunAddress;
                
				self.close();

                // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                //if(roadAddr !== ''){
                //    document.getElementById("sample4_extraAddress").value = extraRoadAddr;
                //} else {
                //    document.getElementById("sample4_extraAddress").value = '';
                //}
				/*
                var guideTextBox = document.getElementById("guide");
                // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
                if(data.autoRoadAddress) {
                    var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
                    guideTextBox.innerHTML = '(예상 도로명 주소 : ' + expRoadAddr + ')';
                    guideTextBox.style.display = 'block';

                } else if(data.autoJibunAddress) {
                    var expJibunAddr = data.autoJibunAddress;
                    guideTextBox.innerHTML = '(예상 지번 주소 : ' + expJibunAddr + ')';
                    guideTextBox.style.display = 'block';
                } else {
                    guideTextBox.innerHTML = '';
                    guideTextBox.style.display = 'none';
                }
				*/
            }
        }).open();
    }
</script>
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
<div class="sub sub_outer login_outer inner">
    <div class="page_subject join_subject">
        <h2>회원가입</h2>
    </div>
    <div class="join_outer">
        <ul class="step_box">
            <li class="step step1">
                <img src="../img/step01.png" alt="">
            </li>
            <li class="step step2">
                <img src="../img/step02.png" alt="">
            </li>
            <li class="step step3 on">
                <img src="../img/step03.png" alt="">
            </li>
            <li class="step step4">
                <img src="../img/step04.png" alt="">
            </li>
        </ul>
    
        <div class="sub_title">
            <h2>일반회원</h2>
            <p>탐라국에 오신것을 환영합니다. 회원가입 정보를 입력해주세요.</p>
        </div>
        <form action="../action/write_action.php" class="join_form" method="POST" onsubmit="return member_insert_action();">
            <input type="hidden" name="board_type" value="join">
            <input type="hidden" name="join_type" value="1">
            <input type="hidden" name="id_dup_check" value="no">
            <ul>
                <li>
                    <p>아이디</p>
                    <input type="text" name="user_id" required>
                    <span class="id_check" onclick="javascript:id_dup_check_action();">중복확인</span>
                </li>
                <li>
                    <p>비밀번호</p>
                    <input type="password" name="user_passwd" required>
                    <span>문자(영문)+특수문자+숫자 조합과 8자리 이상으로 비밀번호 설정하셔야 합니다.</span>
                </li>
                <li>
                    <p>비밀번호 확인</p>
                    <input type="password" name="user_passwd2" required>
                </li>
                <li>
                    <p>성함</p>
                    <input type="text" name="user_name" required>
                </li>
                <li>
                    <p>생년월일</p>
                    <input type="text" name="user_birthday" required>
                </li>
                <li>
                    <p>우편번호</p>
                    <input type="text" id="user_address_number" name="user_address_number" onclick="javascript:sample4_execDaumPostcode();" required readonly>
					<span class="id_check" onclick="javascript:sample4_execDaumPostcode();">주소찾기</span>
				</li>
                <li>
                    <p>기본주소</p>
                    <input type="text" id="user_address" name="user_address" readonly onclick="javascript:sample4_execDaumPostcode();">
                </li>
                <li>
                    <p>상세주소</p>
                    <input type="text" name="user_address_detail" required>
                </li>
                <li>
                    <p>연락처</p>
                    <input type="text" name="user_phone1" required> - <input type="text" name="user_phone2"> - <input type="text" name="user_phone3" required>
                </li>
                <li>
                    <p>이메일</p>
                    <input type="text" name="user_email1" required> @ <input type="text" name="user_email2" required>
                </li>
            </ul>
            <div class="submit_box">
                <input type="submit" value="가입하기">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

	function member_insert_action() {

		if($("input[name=id_dup_check]").val() == "no") {
			alert("아이디 중복체크를 해주세요.");
			$("input[name=user_id]").focus();
			return false;
		}

		if($("input[name=user_passwd]").val() != $("input[name=user_passwd2]").val()) {
			$("input[name=user_passwd]").focus();
			alert("비밀번호가 다릅니다.");
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

	function id_dup_check_action() {

		if($("input[name=user_id]").val() == "") {
			alert("아이디를 입력해주세요.");
			$("input[name=user_id]").focus();
			return;
		}

		$.ajax({
			type: 'post',
			url: '/action/write_action.php',
			data: "user_id="+$("input[name=user_id]").val()+"&board_type=id_dup_check",
			success: function(result) {

				if(result == "Y") {
					alert("사용가능한 아이디입니다.");
					$("input[name=user_id]").attr("readOnly", true);
					$("input[name=id_dup_check]").val("yes");
				} else {
					alert("이미 등록된 아이디입니다.");
					$("input[name=user_id]").attr("readOnly", false);
					$("input[name=id_dup_check]").val("no");
				}

			},
			error: function(xhr, status, error) {
				alert(xhr.responseText);
				return false;
			}
		});		

	}

</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/include/footer.php";
?>