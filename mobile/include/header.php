<body>
<script src="https://kit.fontawesome.com/7f5faa19ba.js" crossorigin="anonymous"></script>
    <div id="container">
        <div id="header">
            <div class="inner">
                <div class="logo">
                    <a href="/mobile/"><img src="/img/m_logo.png" alt=""></a>
                </div>
                <div class="ham_menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div id="side_bg"></div>
        <div id="side_nav">
            <div class="side_dep1">
                <p>회사소개</p>
                <ul class="side_dep2">
                    <li><a href="/mobile/sub/company/ceo.php">대표인사말</a></li>
                    <li><a href="/mobile/sub/company/history.php">TRK 연혁</a></li>
                    <li><a href="/mobile/sub/company/location.php">TRK 위치</a></li>
                </ul>
            </div>
            <div class="side_dep1">
                <p>관광상품권</p>
                <ul class="side_dep2">
                    <li><a href="/mobile/sub/tourism/gift_card.php">관광상품권이란?</a></li>
                    <li><a href="/mobile/sub/tourism/use_info.php">이용안내</a></li>
                    <li><a href="/mobile/sub/tourism/benefits.php">상품권 혜택</a></li>
                    <li><a href="/mobile/sub/tourism/terms.php">상품권 약관</a></li>
                    <li><a href="/mobile/sub/tourism/buy_gift.php">상품권 구매신청</a></li>
                </ul>
            </div>
            <div class="side_dep1">
                <p>가맹점</p>
                <ul class="side_dep2">
                    <li><a href="/mobile/sub/franchisee/apply.php">TRK 가맹점이란?</a></li>
                    <li><a href="/mobile/sub/franchisee/franchisee.php?user_sectors=gas_station">가맹점 리스트</a></li>
                </ul>
            </div>
            <div class="side_dep1">
                <p>관광</p>
                <ul class="side_dep2">
                    <li><a href="#none">숙박정보</a></li>
                    <li><a href="#none">식당정보</a></li>
                    <li><a href="#none">렌트카정보</a></li>
                    <li><a href="#none">골프투어</a></li>
                    <li><a href="#none">명소탐방</a></li>
                    <li><a href="#none">테마관광</a></li>
                </ul>
            </div>
            <div class="side_dep1">
                <p>쇼핑몰</p>
                <ul class="side_dep2">
                    <li><a href="/mobile/sub/shop.php">상품전체</a></li>
                </ul>
            </div>
            <div class="side_dep1">
                <p>고객센터</p>
                <ul class="side_dep2">
                        <li><a href="/mobile/sub/cs_center/notice_list.php">TRK 공지</a></li>
                        <li><a href="/mobile/sub/cs_center/inquiry.php">문의사항</a></li>
                </ul>
            </div>
            <div class="header_login">
                <div class="flex_normal">
                    <?php
                        if(isset($_SESSION['user_id'])){
                    ?>
                    <div class="join_box"><a href="/mobile/sub/my_page/my_info.php"><i class="fas fa-user-alt"></i>마이페이지</a></div>
                    <div class="join_box"><a href="/mobile/sub/logout.php"><i class="fas fa-lock-open"></i>로그아웃</a></div>
                    <?php
                        }else{
                    ?>
                    <div class="join_box"><a href="/mobile/sub/login.php"><i class="fas fa-lock"></i>로그인</a></div>
                    <div class="join_box"><a href="/mobile/sub/join_step1.php"><i class="fas fa-user-alt"></i>회원가입</a></div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div id="section">