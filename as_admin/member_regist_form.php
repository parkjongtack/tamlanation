<?php include_once $_SERVER['DOCUMENT_ROOT']."/as_admin/include/admin_header.php"; ?>
<?php
	if($_GET['board_type'] == "user_modify") {
		$sql_modify = "select * from as_account where user_id = '".$_GET['id']."'";
		$result_modify = mysqli_query($link, $sql_modify);
		$row_member = mysqli_fetch_array($result_modify);
	}
?>
<div class="con_main">
    <form action="/action/write_action.php" method="post" style="margin-left:20px;">
		<input type="hidden" name="user_id" value="<?=$_GET['id']?>" />
		<input type="hidden" name="member_type" value="2" />
		<input type="hidden" name="board_type" value="<?php if($_GET['board_type'] == "") { echo "user_add"; } else { echo "user_modify"; }?>" />
        <div class="write_box">
			<div class="write_line">
                <div class="all_line all_line_top">
                    <div class="line_title">
                        회원아이디*
                    </div>
                    <div class="line_content">
						<?=$row_member['user_id']?>
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        업종선택
                    </div>
                    <div class="line_content">
						<select name="user_sectors" required>
							<option value="gas_station" <?=($row_member['user_sectors'] == "gas_station") ? "selected" : ""; ?> >주유소정보</option>
							<option value="mart" <?=($row_member['user_sectors'] == "mart") ? "selected" : ""; ?> >마트정보</option>
							<option value="motel" <?=($row_member['user_sectors'] == "motel") ? "selected" : ""; ?> >숙박정보</option>
							<option value="restaurant" <?=($row_member['user_sectors'] == "restaurant") ? "selected" : ""; ?> >음식점정보</option>
							<option value="marketplace" <?=($row_member['user_sectors'] == "marketplace") ? "selected" : ""; ?> >장터정보</option>
							<option value="etc" <?=($row_member['user_sectors'] == "etc") ? "selected" : ""; ?> >기타정보</option>
						</select>
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
                        PASSWORD
                    </div>
                    <div class="line_content">
						<input type="password" name="user_pass" placeholder="연구자의 비밀번호" style="width:300px;" />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 이름
                    </div>
                    <div class="line_content">
						<input type="text" name="user_store_name" placeholder="매장 이름을 입력하세요." style="width:400px;" value="<?=$row_member['user_store_name']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 우편번호
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address_number" placeholder="매장 우편번호를 입력하세요." value="<?=$row_member['user_address_number']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 기본주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address" placeholder="매장 기본주소를 입력하세요." value="<?=$row_member['user_address']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 상세주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address_detail" placeholder="이메일을 입력하세요" value="<?=$row_member['user_address_detail']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 일반전화
                    </div>
                    <div class="line_content">
						<input type="text" name="user_store_call" placeholder="이메일을 입력하세요" value="<?=$row_member['user_store_call']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						사업자등록번호
                    </div>
                    <div class="line_content">
						<input type="text" name="user_business_number" placeholder="이메일을 입력하세요" value="<?=$row_member['user_business_number']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						대표자 이름
                    </div>
                    <div class="line_content">
						<input type="text" name="user_name" placeholder="이메일을 입력하세요" value="<?=$row_member['user_name']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						대표자 핸드폰
                    </div>
                    <div class="line_content">
						<input type="text" name="user_name" placeholder="이메일을 입력하세요" value="<?=$row_member['user_phone']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						은행명
                    </div>
                    <div class="line_content">
						<input type="text" name="user_bank" placeholder="이메일을 입력하세요" value="<?=$row_member['user_bank']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						예금주
                    </div>
                    <div class="line_content">
						<input type="text" name="user_bank_name" placeholder="이메일을 입력하세요" value="<?=$row_member['user_bank_name']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						은행 계좌번호
                    </div>
                    <div class="line_content">
						<input type="text" name="user_bank_info" placeholder="이메일을 입력하세요" value="<?=$row_member['user_bank_info']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						홈페이지 주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_url" placeholdeuser_url="이메일을 입력하세요" value="<?=$row_member['user_url']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 오픈날짜
                    </div>
                    <div class="line_content">
						<input type="text" name="user_store_opendate" placeholder="이메일을 입력하세요" value="<?=$row_member['user_store_opendate']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 소개글
                    </div>
                    <div class="line_content">
						<textarea name="user_memo"><?=$row_member['user_memo']?></textarea>
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title all_line_bottom">
						승인여부
                    </div>
                    <div class="line_content">
						<select name="check_join">
							<option value="Y" <?=($row_member['check_join']=='Y') ? "selected" : ""; ?> >승인</option>
							<option value="N" <?=($row_member['check_join']=='N' || $row_member['check_join']=='') ? "selected" : ""; ?> >미승인</option>
						</select>
                    </div>
                </div>
			</div>
			<div class="submit_box" style="text-align:center;margin-top:10px;">
			   <input type="submit" value="등록">
			   <!-- <input type="reset" value="취소"> -->
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">

	function identity_number_duplication_check(thisValue) {

		$.ajax({
			type: 'post',
			url: '/admin_page/action.php',
			data: "identity_number="+thisValue+"&type=identity_number_check",
			success: function(result) {

				if(result == "Y") {
					alert("중복된 번호입니다.");
					$("input[name=identity_number]").val('');
				} else {
					//alert("사용가능한 번호입니다.")
				}
			},
			error: function(xhr, status, error) {
				alert(xhr.responseText);
				return false;
			}
		});

	}

	function status_change_action() {
		if(confirm("위기단계를 변경하시겠습니다?")) {
			var formData = new FormData();
			formData.append("type", 'main_status');
			formData.append("main_status", $("#main_status").val());

			$.ajax({
				type: 'post',
				url: '/admin_page/action.php',
				processData: false,
				contentType: false,
				data: formData,
				success: function(result) {
					alert("변경되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					//$("#loading").hide();
					return false;
				}
			});			
		} else {
			location.reload();
		}
	}

	function control(idx) {

		if(confirm("삭제하시겠습니까?")) {
			var formData = new FormData();
			formData.append("idx", idx);
			formData.append('_token', '{{ csrf_token() }}');

			$.ajax({
				type: 'post',
				url: '/ey_admin/{{ request()->segment(2) }}/control',
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
<?php include $_SERVER['DOCUMENT_ROOT']."/admin_page/inc/admin_footer.php"; ?>
<?php
	mysqli_close($link);
?>