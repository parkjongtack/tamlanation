<?php include $_SERVER['DOCUMENT_ROOT']."/as_admin/include/admin_header.php"; ?>
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
		<input type="hidden" name="member_type" value="1" />
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
						성함
                    </div>
                    <div class="line_content">
						<input type="text" name="user_name" placeholder="성함을 입력하세요." style="width:300px;" value="<?=$row_member['user_name']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						생년월일
                    </div>
                    <div class="line_content">
						<input type="text" name="user_birthday" placeholder="생년월일을 입력하세요." style="width:400px;" value="<?=$row_member['user_birthday']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						우편번호
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address_number" placeholder="우편번호를 입력하세요." value="<?=$row_member['user_address_number']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						기본주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address" placeholder="기본주소를 입력하세요." value="<?=$row_member['user_address']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						상세주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_address_detail" placeholder="상세주소를 입력하세요" value="<?=$row_member['user_address_detail']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						연락처
                    </div>
                    <div class="line_content">
						<input type="text" name="user_phone" placeholder="연락처를 입력하세요" value="<?=$row_member['user_phone']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line all_line_bottom">
                    <div class="line_title">
						이메일
                    </div>
                    <div class="line_content">
						<input type="text" name="user_email" placeholder="이메일을 입력하세요" value="<?=$row_member['user_email']?>" required />
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