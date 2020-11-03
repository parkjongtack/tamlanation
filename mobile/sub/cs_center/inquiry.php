<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/inc/library.php";

    include_once $_SERVER['DOCUMENT_ROOT']."/mobile/include/head.php";
?>
<?php
	if(!$_GET['page']) $page = 1;
	else $page = $_GET['page'];
?>
<!-- <script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script> -->
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
            고객센터
        </li>
        <li>
            <div><a href="/sub/company/ceo.php">회사소개</a></div>
            <div><a href="/sub/tourism/gift_card.php">관광상품권</a></div>
            <div><a href="/sub/franchisee/apply.php">가맹점</a></div>
            <div><a href="#none">관광</a></div>
            <div><a href="/sub/shop.php">쇼핑몰</a></div>
            <div class="on"><a href="/sub/cs_center/notice_list.php">고객센터</a></div>
        </li>
    </ul>
    <ul>
        <li>문의사항</li>
        <li>
            <div><a href="/sub/cs_center/notice_list.php">TRK 공지</a></div>
            <div class="on"><a href="/sub/cs_center/inquiry.php">문의사항</a></div>
        </li>
    </ul>
</div>
<div class="sub sub_outer cs_center">
    <div class="page_subject inner">
        <h2>문의사항</h2>
    </div>
    <div class="inner">
        <form action="/action/write_action.php" method="post" style="" enctype="multipart/form-data">
            <input type="hidden" name="board_type" value="inquiry_add" />
            <div class="form_inner">
                <div class="form_line">
                    <div class="line_title">
                        이름
                    </div>
                    <div class="line_text">
                        <input type="text" name="writer" placeholder="이름을 입력해주세요">
                    </div>
                </div>
                <div class="form_line emali">
                    <div class="line_title">
                        이메일
                    </div>
                    <div class="line_text">
                        <input type="text" name="email1" placeholder="이메일"> @ <input type="text" name="email2">
                        <select name="email3" onchange="selectEmail(this)">
                            <option value="1" selected="">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="hanmail.net">hanmail.net</option>
                            <option value="hotmail.com">hotmail.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="yahoo.co.kr">yahoo.co.kr</option>
                            <option value="empas.com">empas.com</option>
                            <option value="dreamwiz.com">dreamwiz.com</option>
                            <option value="freechal.com">freechal.com</option>
                            <option value="lycos.co.kr">lycos.co.kr</option>
                            <option value="korea.com">korea.com</option>
                            <option value="gmail.com">gmail.com</option>
                            <option value="hanmir.com">hanmir.com</option>
                            <option value="paran.com">paran.com</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="form_line">
                    <div class="line_title">
                        유형
                    </div>
                    <div class="line_text">
                        <select name="category" class="category">
                            <option value="1" selected="" disabled="">유형을 선택해주세요</option>
                            <option value="광고/홍보/협찬 마케팅 제휴문의">광고/홍보/협찬 마케팅 제휴문의</option>
                            <option value="파트너쉽 문의">파트너쉽 문의</option>
                        </select>
                    </div>
                </div> -->
                <div class="form_line">
                    <div class="line_title">
                        제목
                    </div>
                    <div class="line_text">
                        <input type="text" name="subject" placeholder="제목을 입력해주세요">
                    </div>
                </div>
                <div class="form_line text_area">
                    <div class="line_title">
                        내용
                    </div>
                    <div class="line_text">
                        <textarea name="contents" placeholder="내용을 입력해주세요"></textarea>
                    </div>
                </div>
                <div class="submit_box_outer">
                    <input type="submit" value="신청하기">
                </div>
            </div>
        </form>
    </div>
    <script>
        function selectEmail(ele){
            var $ele = $(ele);
            var $email2 = $('input[name=email2]'); // '1'인 경우 직접입력
            if($ele.val() == "1"){
                $email2.attr('readonly', false); $email2.val('');

                }else{
                    $email2.attr('readonly', true);
                    $email2.val($ele.val());
                    }
                }

        function submit_check() {

        var form = document.board_write_form;
        var select_category = $('select.category option:selected').val();

            if(form.subject.value == "") {
                alert('제목을 입력해주세요.');
                form.subject.focus();
                return false;
            }

            if(form.writer.value == "") {
                alert('이름을 입력해주세요.');
                form.writer.focus();
                return false;
            }

            // if(select_category == "1") {
            //     alert('유형을 선택해주세요.');
            //     $('select.category').focus();
            //     return false;
            // }

            if(form.email1.value == "" || form.email2.value == "") {
                alert('이메일 입력해주세요.');
                form.email.focus();
                return false;
            }

            if(form.contents.value == "") {
                alert('내용을 입력해주세요.');
                form.contents.focus();
                return false;
            }

            if($("input[name=check_]").is(":checked") == false) {
                alert('개인정보 수집 및 이용 동의를 확인해주세요.');
                form.check_.focus();
                return false;
            }

        }
    </script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>