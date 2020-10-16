<body>
    <div id="container">
        <div id="header">
            <div class="inner flex_normal">
                <div class="logo">
                    <a href="/"><img src="/img/logo.png" alt="logo"></a>
                </div>
                <ul class="gnb flex_normal">
                    <li><a href="#none">회사소개</a></li>
                    <li><a href="#none">관광상품권</a></li>
                    <li><a href="/sub/franchisee.php?user_sectors=gas_station">가맹점</a></li>
                    <li><a href="#none">관광</a></li>
                    <li><a href="/sub/shop.php">쇼핑몰</a></li>
                    <li><a href="#none">고객센터</a></li>
                </ul>
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