<?php include_once "include/admin_header.php"; ?>
<?php

	if(!$_SESSION['admin_user_id']) {
		echo "<script>alert('로그인 해주세요.');location.href = '/as_admin/login.php';</script>";
		exit;
	}

    if(isset($_GET['page'])){
        if(!$_GET['page']) $page = 1;
        else $page = $_GET['page'];
    }
?>
<div class="con_main">
    <form action="">
        <table>
            <colgroup>
                <col width="100">
				<col width="75">
                <col width="400">
                <col width="250">
                <col width="100">
                <col width="180">
            </colgroup>
            <thead>
                <tr>
                    <th>번호</th>
                    <th>매장 이름</th>
                    <th>매장 업종</th>
					<th>대표자 이름</th>
                    <th>대표자 번호</th>
                    <th>기능</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><a href="#none"></a></td>
                    <td></td>
                    <td></td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td class="delete_box"><a href="#none">삭제</a><a href="#none" style="background-color: #08AEEA; border:1px solid #0faeea; color: #fff;">수정</a></td>
                </tr>
            </tbody>
        </table>
        <div class="paging">
			<!-- <?=print_pagelist($page, $total, $page_set, $block_set, $param); ?> -->
		</div>
        <div class="create" style="padding-bottom:10px;">
			<a href="/admin_page/write_board.php?board_type=slider">등록</a>
            <!-- <a href="/ey_write_gallery">등록</a> -->
        </div>
    </form>
	<form name="search_form" action="{{ $_SERVER['REQUEST_URI'] }}" class="board_search_con" onsubmit="return search();">
		<input type="hidden" name="page" />
		<!-- <input type="text" name="key" placeholder="검색어를 입력하세요" value="{{ $key }}" required> -->
		<button></button>
	</form>
</div>
<script type="text/javascript">

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append("type", "delete2");

			$.ajax({
				type: 'post',
				url: '/admin_page/action.php',
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
<?php include "include/admin_footer.php"; ?>