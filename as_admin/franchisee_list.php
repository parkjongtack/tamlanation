<?php 

include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";
include $_SERVER['DOCUMENT_ROOT']."/inc/library.php";

include $_SERVER['DOCUMENT_ROOT']."/as_admin/include/admin_header.php"; 

?>
<?php
	if(!$_GET['page']) $page = 1;
	else $page = $_GET['page'];
?>
<div class="con_main">
    <form action="" method="get">
        <table>
            <colgroup>
                <col width="100">
                <col width="200">
                <col width="250">
                <col width="200">
                <col width="200">
                <col width="200">
                <col width="200">
            </colgroup>
            <thead>
                <tr>
					<th>번호</th>
                    <th>업종</th>
                    <th>매장이름</th>
                    <th>매장주소</th>
                    <th>홈페이지주소</th>
                    <th>매장연락처</th>
					<th>관리</th>
                </tr>
            </thead>
            <tbody>
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
				if($_GET['study_search']) {
					//$where .= " and study = '".$_GET['study_search']."'"; 
				}

				$sql = "select * from franchisee where 1=1 ".$where." order by ".$array_table_set." ".$array_sort." limit " .(($page-1)*$page_set).",".$page_set;
				$result = mysqli_query($link, $sql);				
				//$count = mysqli_num_rows($result);

				$sql2 = "select * from franchisee where 1=1 ".$where."";
				$result2 = mysqli_query($link, $sql2);								
				$total = mysqli_num_rows($result2);

				$pageCnt = (($total-1)/$page_set) +1;						//전체 페이지의 수
				if($page > $pageCnt) $page = 1;

			?>
				<?php if($total == 0) { ?>
					<tr>
						<td colspan="8">게시글이 없습니다.</td>
					</tr>
				<?php } else { ?>
					<?php 
						$i = 0;
						while($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?=$total-($page-1)*$page_set-$i?></td>
							<td>
								<?php if($row['user_sectors'] == "gas_station") { ?>
									주유소정보
								<?php } else if($row['user_sectors'] == "mart") { ?>
									마트정보
								<?php } else if($row['user_sectors'] == "motel") { ?>
									숙박정보
								<?php } else if($row['user_sectors'] == "restaurant") { ?>
									음식점정보
								<?php } else if($row['user_sectors'] == "marketplace") { ?>
									장터정보
								<?php } else if($row['user_sectors'] == "etc") { ?>
									기타정보
								<?php } ?>
							</td>
							<td>
								<?=$row['user_store_name'] ?>
							</td>
							<td>
								<?=$row['user_addr']?>
							</td>
							<td>
								<?=$row['user_url']?>
							</td>
							<td>
								<?=$row['user_phone']?>
							</td>					
							<td class="delete_box"><a href="javascript:control('<?=$row['user_id']?>');">삭제</a><a href="/as_admin/franchisee_regist_form.php?idx=<?=$row['idx']?>&board_type=franchisee_modify" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
						</tr>
						<?php $i++; } ?>
					<?php } ?>
            </tbody>
        </table>
        <div class="paging">
			<?php
				$param = "order_table=".$_GET['order_table']."&orderby=".$_GET['orderby']."&study_search=".$_GET['study_search'];
			?>
			<?=print_pagelist($page, $total, $page_set, $block_set, $param); ?>
		</div>
		<!--
        <div class="create" style="padding-bottom:10px;">
			<a href="/admin_page/member_regist_form.php">등록</a>
        </div>
		-->
		<input type="hidden" name="page" value="<?=$page?>" />
	</form>
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

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append("board_type", "delete_franchisee");

			$.ajax({
				type: 'post',
				url: '/action/write_action.php',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("삭제되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					return false;
				}
			});
		}
	}

</script>
<?php //include $_SERVER['DOCUMENT_ROOT']."/admin_page/inc/admin_footer.php"; ?>