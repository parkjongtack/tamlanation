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
            <div><a href="/mobile/sub/company/ceo.php">회사소개</a></div>
            <div><a href="/mobile/sub/tourism/gift_card.php">관광상품권</a></div>
            <div><a href="/mobile/sub/franchisee/apply.php">가맹점</a></div>
            <div><a href="#none">관광</a></div>
            <div><a href="/mobile/sub/shop.php">쇼핑몰</a></div>
            <div class="on"><a href="/mobile/sub/cs_center/notice_list.php">고객센터</a></div>
        </li>
    </ul>
    <ul>
        <li>TRK 공지</li>
        <li>
            <div class="on"><a href="/mobile/sub/cs_center/notice_list.php">TRK 공지</a></div>
            <div><a href="/mobile/sub/cs_center/inquiry.php">문의사항</a></div>
        </li>
    </ul>
</div>
<div class="sub sub_outer cs_center mypage">
    <div class="page_subject inner">
        <h2>TRK 공지</h2>
    </div>
    <div class="inner">
        <table>
            <colgroup>
                <col width="10%">
                <col width="*">
                <col width="15%">
                <col width="25%">
            </colgroup>
            <tbody>
                <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>등록일</th>
                </tr>
                
            
            <?php
                $page_set = 10;
				$block_set = 10;
				//$page = "";
				//$page = (empty($_GET['page']) == true) ? $_GET['page'] : 1;
				/*
				if($_GET['order_table'] == "") {
					$array_table_set = "identity_number, affiliation, study_set";
					$array_sort = "asc";
				} else {
					$array_table_set = $_GET['order_table'];
					$array_sort = $_GET['orderby'];
				}
				*/
				$array_table_set = "idx";
				$array_sort = "desc";
				
				$where = "";
				$where .= " and board_type = 'notice'"; 

				$sql = "select * from board where 1=1 ".$where." order by ".$array_table_set." ".$array_sort." limit " .(($page-1)*$page_set).",".$page_set;
				$result = mysqli_query($link, $sql);				
				//$count = mysqli_num_rows($result);

				$sql2 = "select * from board where 1=1 ".$where."";
				$result2 = mysqli_query($link, $sql2);						
				$total = mysqli_num_rows($result2);

				$pageCnt = (($total-1)/$page_set) +1;						//전체 페이지의 수
                if($page > $pageCnt) $page = 1;
                
                if($total == 0){
                ?>
                <li>
                    <div class="notice_num"></div>
                    <div class="notice_title">등록된 게시글이 없습니다.</a></div>
                    <div class="notice_name"></div>
                    <div class="notice_date"></div>
                </li>
                <?php
                }else{$i = 1;
				while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?=$i?></td>
                <td><a href="/mobile/sub/cs_center/notice_view.php?idx=<?=$row['idx']?>"><?=$row['subject']?></a></td>
                <td>관리자</td>
                <td><?=substr($row['reg_date'],0,10)?></td>
            </tr>
            <!-- <li>
                <div class="notice_num"><?=$i?></div>
                <div class="notice_title"><a href="/mobile/sub/cs_center/notice_view.php?idx=<?=$row['idx']?>"><?=$row['subject']?></a></div>
                <div class="notice_name">관리자</div>
                <div class="notice_date"><?=$row['reg_date']?></div>
            </li> -->
            <?php $i++; } } ?>
            
            </tbody>
        </table>
        <div class="paging">
                <?php
                    $param = "order_table=".$_GET['order_table']."&orderby=".$_GET['orderby']."&study_search=".$_GET['study_search'];
                ?>
                <?=print_pagelist($page, $total, $page_set, $block_set, $param); ?>
            </div>
            <input type="hidden" name="page" value="<?=$page?>" />
        <form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();">
            <input type="hidden" name="page" />
            <!-- <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required> -->
            <button></button>
        </form>
    </div>
<script type="text/javascript">
	function study_search_q(thisValue) {
		location.href="<?=$_SERVER['PHP_SELF']?>?page=<?=$page?>order_table=<?=$_GET['order_table']?>&orderby=<?=$_GET['orderby']?>&study_search=" + thisValue
	}
</script>
<?php
    include $_SERVER['DOCUMENT_ROOT']."/mobile/include/footer.php";
?>