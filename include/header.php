<body>
    <div id="container">
        <div id="header">
            <div class="inner flex_normal">
                <div class="logo">
                    <a href="/"><img src="/img/logo.png" alt="logo"></a>
                </div>
                <ul class="gnb flex_normal">
                    <li>
                        <a href="/sub/company/ceo.php">회사소개</a>
                        <ul>
                            <li>
                                <a href="/sub/company/ceo.php">대표인사말</a>
                                <a href="/sub/company/history.php">TRK 연혁</a>
                                <a href="/sub/company/location.php">TRK 위치</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/sub/tourism/gift_card.php">관광상품권</a>
                        <ul>
                            <li>
                                <a href="/sub/tourism/gift_card.php">관광상품권이란?</a>
                                <a href="/sub/tourism/use_info.php">이용안내</a>
                                <a href="/sub/tourism/benefits.php">상품권 혜택</a>
                                <a href="/sub/tourism/terms.php">상품권 약관</a>
                                <a href="/sub/tourism/buy_gift.php">상품권 구매신청</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/sub/franchisee/apply.php">가맹점</a>
                        <ul>
                            <li>
                                <a href="/sub/franchisee/apply.php">TRK 가맹점이란?</a>
                                <a href="/sub/franchisee/franchisee.php?user_sectors=gas_station">가맹점 리스트</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#none">관광</a>
                        <ul>
                            <li>
                                <a href="#none">숙박정보</a>
                                <a href="#none">식당정보</a>
                                <a href="#none">렌트카정보</a>
                                <a href="#none">골프투어</a>
                                <a href="#none">명소탐방</a>
                                <a href="#none">테마관광</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/sub/shop.php">쇼핑몰</a>
                        <ul>
                            <li>
                                <a href="/sub/shop.php">상품전체</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/sub/cs_center/notice_list.php">고객센터</a>
                        <ul>
                            <li>
                                <a href="/sub/cs_center/notice_list.php">TRK 공지</a>
                                <a href="/sub/cs_center/inquiry.php">문의사항</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <script type="text/javascript">
                    $(function(){
                        $('#header .gnb li, #header .gnb li ul li').hover(function(){
                            $(this).stop().children().children().stop().slideToggle();
                        });
                    });
                </script>
                <div class="right flex_normal">
                    <?php
                        if(isset($_SESSION['user_id'])){
                    ?>
                    <div class="join_box"><a href="/sub/my_page/my_info.php"><img src="/img/my_page_img.png" alt="마이페이지"></a></div>
                    <div class="join_box"><a href="/sub/logout.php"><img src="/img/logout_img.png" alt="로그아웃"></a></div>
                    <?php
                        }else{
                    ?>
                    <div class="login_box"><a href="/sub/login.php"><img src="/img/login_img.png" alt="로그인"></a></div>
                    <div class="join_box"><a href="/sub/join_step1.php"><img src="/img/join_img.png" alt="회원가입"></a></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="section">