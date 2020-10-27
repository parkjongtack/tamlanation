<?php include_once $_SERVER['DOCUMENT_ROOT']."/as_admin/include/admin_header.php"; ?>
<?php
	if($_GET['board_type'] == "notice_modify") {
		$sql_modify = "select * from board where idx = '".$_GET['idx']."'";
		$result_modify = mysqli_query($link, $sql_modify);
		$row_member = mysqli_fetch_array($result_modify);
	}
?>

<div class="con_main">
    <form action="/action/write_action.php" method="post" style="margin-left:20px;" enctype="multipart/form-data">
		<input type="hidden" name="idx" value="<?=$_GET['idx']?>" />
		<input type="hidden" name="board_type" value="<?php if($_GET['board_type'] == "") { echo "inquiry_add"; } else { echo "inquiry_modify"; }?>" />
        <div class="write_box">
			<div class="write_line">
                <div class="all_line all_line_top">
                    <div class="line_title">
                        제목
                    </div>
                    <div class="line_content">
						<input type="text" name="subject" placeholder="제목을 입력하세요." style="width:400px;" value="<?=$row_member['subject']?>" required />
                    </div>
                </div>
			</div>
			<div class="write_line">
                <div class="all_line all_line_bottom">
                    <div class="line_title">
						내용
                    </div>
                    <div class="line_content">
						<textarea id="editor" name="contents" cols="60" rows="10"><?=$row_member['contents']?></textarea>
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
/*
	let editor2;
	//filebrowserImageUploadUrl:"/image_upload_action?type=Images"

	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
			ckfinder: {
				uploadUrl: '/editor_image_upload_action?command=upload&type=Files&responseType=json&type=Files&CKEditorFuncNum=2'
			}
		} )
		.then( newEditor => {
			editor2 = newEditor;
			//editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
*/

	$(function(){
		CKEDITOR.replace('editor',{
			filebrowserUploadUrl: '/editor_image_upload_action.php?type=Files&CKEditorFuncNum=2',
			extraPlugins: 'image'
		});
		CKEDITOR.config.width = 900;
		CKEDITOR.config.allowedContent = true;
	});

</script>
<script type="text/javascript">

	var tag_index2 = 1;

	function option_tag_add() {
		$("#option_upload_tag").append("<div id='option_tag_index_"+tag_index2+"'><input type='text' name='option_name[]' placeholder='옵션을 임력하세요'/>&nbsp;<a href='javascript:option_tag_delete("+tag_index2+");'>[옵션 삭제]</a><br/></div>");

		tag_index2 = tag_index2 + 1;
	}

	function option_tag_delete(tag_index_set) {
		$("#option_tag_index_"+tag_index_set).remove();
	}

	function option_delete(idx) {
		
		if(confirm("삭제하시겠습니까?")) {
			$.ajax({
				type: 'post',
				url: '/action/write_action.php',
				data: "idx="+idx+"&board_type=option_delete",
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