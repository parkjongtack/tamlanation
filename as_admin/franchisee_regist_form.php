<?php include_once $_SERVER['DOCUMENT_ROOT']."/as_admin/include/admin_header.php"; ?>
<?php
	if($_GET['board_type'] == "franchisee_modify") {
		$sql_modify = "select * from franchisee where idx = '".$_GET['idx']."'";
		$result_modify = mysqli_query($link, $sql_modify);
		$row_member = mysqli_fetch_array($result_modify);
	}
?>
<div class="con_main">
    <form action="/action/write_action.php" method="post" style="margin-left:20px;" enctype="multipart/form-data">
		<input type="hidden" name="idx" value="<?=$_GET['idx']?>" />
		<input type="hidden" name="board_type" value="<?php if($_GET['board_type'] == "") { echo "franchisee_add"; } else { echo "franchisee_modify"; }?>" />
        <div class="write_box">
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						도시
                    </div>
                    <div class="line_content">
						<select name="city" required>
							<option value="jeju" <?=($row_member['city'] == "jeju") ? "selected" : ""; ?> >제주시</option>
							<option value="seogipo" <?=($row_member['city'] == "seogipo") ? "selected" : ""; ?> >서귀포시</option>
						</select>
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
						<select name="user_sectors2">

						</select>
                    </div>
                </div>
			</div>
			<script type="text/javascript">
				var option_2 = "<?php echo $row_member['user_sectors2']; ?>";
				var list = [
					['주유소정보'],
					['마트정보'],
					['호텔', '휴양콘도', '리조트', '펜션', '민박', '게스트하우스'],
					['한식', '중식', '일식', '기타'],
					['장터정보'],
					['기타정보']
				];

				var option_1 = $('select[name=user_sectors]').val();
				function list_change(){
					var idx = select_list();
					for(var j = 0; j < list[idx].length; j++){
						if(option_2 == list[idx][j]){
							$('select[name=user_sectors2]').append('<option value="'+list[idx][j]+'" selected>'+list[idx][j]+'</option>');
						}else{
							$('select[name=user_sectors2]').append('<option value="'+list[idx][j]+'">'+list[idx][j]+'</option>');
						}
					}
				}
				list_change()
				function select_list(){
					if(option_1 == 'gas_station'){
						return 0;
					}else if(option_1 == 'mart'){
						return 1;
					}else if(option_1 == 'motel'){
						return 2;
					}else if(option_1 == 'restaurant'){
						return 3;
					}else if(option_1 == 'marketplace'){
						return 4;
					}else if(option_1 == 'etc'){
						return 5;
					}
				}
				$('select[name=user_sectors]').on('change', function(){
					$('select[name=user_sectors2] option').remove();
					option_1 = $('select[name=user_sectors]').val();
					list_change();
				});
				//console.log(option_1);
			</script>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장이름
                    </div>
                    <div class="line_content">
						<input type="text" name="user_store_name" placeholder="매장이름을 입력하세요." style="width:400px;" value="<?=$row_member['user_store_name']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장주소
                    </div>
                    <div class="line_content">
						<input type="text" name="user_addr" placeholder="매장주소를 입력하세요." value="<?=$row_member['user_addr']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line">
                    <div class="line_title">
						매장 홈페이지
                    </div>
                    <div class="line_content">
						<input type="text" name="user_url" placeholder="매장 홈페이지를 입력하세요." value="<?=$row_member['user_url']?>" required />
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
						상세이미지 리스트
                    </div>
                    <div class="line_content">
						<input type="file" name="upload_image[]" placeholder="이미지를 선택하세요" />&nbsp;<a href="javascript:image_tag_add();">[이미지추가]</a>
						<div id="image_upload_tag"></div>
						<?php
							// $sql_files = "select * from file_list where board_type = 'franchisee' and board_idx = '".$_GET['idx']."'";
							// $result_files = mysqli_query($link, $sql_files);

							// $i = 1;
							// while($row_files = mysqli_fetch_array($result_files)) {
						?>
								<!-- <a href="/upload/img/<?=$row_files['real_file_name']?>" target="_blank">[이미지보기<?=$i?>]</a><a href="javascript:image_delete('<?=$row_files['idx']?>')">[이미지 삭제]</a><br/> -->
						<?php
							// 	$i++;
							// }
						?>
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

	var tag_index = 1;

	function image_tag_add() {
		$("#image_upload_tag").append("<div id='image_tag_index_"+tag_index+"'><input type='file' name='upload_image[]' />&nbsp;<a href='javascript:image_tag_delete("+tag_index+");'>[이미지제거]</a><br/></div>");

		tag_index = tag_index + 1;
	}

	function image_tag_delete(tag_index_set) {
		$("#image_tag_index_"+tag_index_set).remove();
	}

	function image_delete(idx) {
		
		if(confirm("삭제하시겠습니까?")) {
			$.ajax({
				type: 'post',
				url: '/action/write_action.php',
				data: "idx="+idx+"&board_type=img_file_delete",
				success: function(result) {
					alert("삭제되었습니다.");
					location.reload();
				},
				error: function(xhr, status, error) {
					alert(xhr.responseText);
					return false;
				}
			});
		}

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