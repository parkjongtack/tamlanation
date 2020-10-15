<?php
    include $_SERVER['DOCUMENT_ROOT']."/inc/init_config.php";

    $write_type = $_POST['board_type'];

    if($write_type == 'join'){
        if($_POST['join_type'] == '1'){
            
			$sql = "insert into as_account set user_id = '".$_POST['user_id']."', user_passwd = '".md5($_POST['user_passwd'])."', user_address_number = '".$_POST['user_address_number']."', user_address = '".$_POST['user_address']."', user_address_detail = '".$_POST['user_address_detail']."', user_phone = '".$_POST['user_phone1']."-".$_POST['user_phone2']."-".$_POST['user_phone3']."', user_email = '".$_POST['user_email1']."@".$_POST['user_email2']."', user_type = '1', user_birthday = '".$_POST['user_birthday']."', user_name = '".$_POST['user_name']."', check_join = 'Y'";
			$result = mysqli_query($link, $sql);

			echo "<script>alert('일반회원 가입이 완료되었습니다.');location.href = '/sub/login.php';</script>";
			exit;

        }else if($_POST['join_type'] == '2'){

			$sql = "insert into as_account set user_id = '".$_POST['user_id']."', user_passwd = '".md5($_POST['user_passwd'])."', user_address_number = '".$_POST['user_address_number']."', user_address = '".$_POST['user_address']."', user_address_detail = '".$_POST['user_address_detail']."', user_phone = '".$_POST['user_phone1']."-".$_POST['user_phone2']."-".$_POST['user_phone3']."', user_email = '".$_POST['user_email1']."@".$_POST['user_email2']."', user_store_name = '".$_POST['user_store_name']."', user_store_call = '".$_POST['user_store_call']."', user_business_number = '".$_POST['user_business_number']."', user_name = '".$_POST['user_name']."', user_bank = '".$_POST['user_bank']."', user_bank_name = '".$_POST['user_bank_name']."', user_bank_info = '".$_POST['user_bank_info']."', user_url = '".$_POST['user_url']."', user_store_opendate = '".$_POST['user_store_opendate']."', user_memo = '".$_POST['user_memo']."', user_sectors = '".$_POST['user_sectors']."', user_type = '2', check_join = 'N'";
			$result = mysqli_query($link, $sql);

			echo "<script>alert('가맹점 회원 가입이 완료되었습니다. 관리자 승인 이후에 정식으로 활동 가능합니다.');location.href = '/sub/login.php';</script>";
			exit;

        }
    }

	if($write_type == "user_modify") {	
		
		$password_change = "";
		if($_POST['user_pass']) {
			$password_change = ", user_passwd = '".md5($_POST['user_pass'])."'";
		}
		
		if($_POST['member_type'] == '1'){
			
			$sql = "update as_account set user_id = '".$_POST['user_id']."'".$password_change.", user_address_number = '".$_POST['user_address_number']."', user_address = '".$_POST['user_address']."', user_address_detail = '".$_POST['user_address_detail']."', user_phone = '".$_POST['user_phone']."', user_email = '".$_POST['user_email']."', user_type = '1', user_birthday = '".$_POST['user_birthday']."', user_name = '".$_POST['user_name']."', check_join = 'Y' where user_id = '".$_POST['user_id']."'";
			$result = mysqli_query($link, $sql);

			echo "<script>alert('일반회원 정보가 수정되었습니다. 리스트로 이동합니다.');location.href = '/as_admin/general_member_list.php';</script>";
			exit;

		}else if($_POST['member_type'] == '2'){

			$sql = "update as_account set user_id = '".$_POST['user_id']."'".$password_change.", user_address_number = '".$_POST['user_address_number']."', user_address = '".$_POST['user_address']."', user_address_detail = '".$_POST['user_address_detail']."', user_phone = '".$_POST['user_phone']."', user_email = '".$_POST['user_email1']."@".$_POST['user_email2']."', user_store_name = '".$_POST['user_store_name']."', user_store_call = '".$_POST['user_store_call']."', user_business_number = '".$_POST['user_business_number']."', user_name = '".$_POST['user_name']."', user_bank = '".$_POST['user_bank']."', user_bank_name = '".$_POST['user_bank_name']."', user_bank_info = '".$_POST['user_bank_info']."', user_url = '".$_POST['user_url']."', user_store_opendate = '".$_POST['user_store_opendate']."', user_memo = '".$_POST['user_memo']."', user_sectors = '".$_POST['user_sectors']."', user_type = '2', check_join = '".$_POST['check_join']."' where user_id = '".$_POST['user_id']."'";
			$result = mysqli_query($link, $sql);

			echo "<script>alert('가맹점 회원 정보가 수정되었습니다. 리스트로 이동합니다.');location.href = '/as_admin/store_member_list.php';</script>";
			exit;

		}
	}

	if($write_type == "shopping_add") {
		
		$sql = "insert into shopping set subject = '".$_POST['subject']."', model_name = '".$_POST['model_name']."', price = '".$_POST['price']."', discount = '".$_POST['discount']."', new_status = '".$_POST['new_status']."', best_status = '".$_POST['best_status']."', contents = '".$_POST['contents']."'";
		$result = mysqli_query($link, $sql);

		$idx = mysqli_insert_id($link);

		foreach($_POST['option_name'] as $key => $value) {
			$option_query = "insert into product_option_list set option_name = '".$value."', product_idx = '".$idx."'";
			$option_result = mysqli_query($link, $option_query);			
		}

		$file_query = "";
		foreach($_FILES['upload_image']['name'] as $key => $value) {

			$file = $_FILES['upload_image'];
			$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/upload/img/';
			$ext_str = "jpg,gif,png,pdf,ppt,pptx";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'][$key], strrpos($file['name'][$key], '.') + 1);
			
			//echo $ext."<br/>";
			
			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				//echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				//exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				//echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				//exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'][$key], $upload_directory.$path)) {
				
				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'][$key];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				//$response = new \StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				//$response->link = "/sample/editor/html/popular/" . $name_save;
				//echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';
				
				//$file1_query = ", attach_file = '".$name_save."', real_file_name = '".$name_orig."'";
				$file_query = "insert into file_list set board_type = 'shopping', file_name = '".$file['name'][$key]."', real_file_name = '".$name_save."', board_idx = '".$idx."'";
				$file_result = mysqli_query($link, $file_query);
			}
			
		}		

		echo "<script>alert('상품 등록이 완료되었습니다.');location.href = '/as_admin/shopping_list.php';</script>";
		exit;

	}

	if($write_type == "shopping_modify") {
		
		$sql = "update shopping set subject = '".$_POST['subject']."', model_name = '".$_POST['model_name']."', price = '".$_POST['price']."', discount = '".$_POST['discount']."', new_status = '".$_POST['new_status']."', best_status = '".$_POST['best_status']."', contents = '".$_POST['contents']."' where idx = '".$_POST['idx']."'";
		$result = mysqli_query($link, $sql);

		//$idx = mysqli_insert_id($link);

		foreach($_POST['option_name'] as $key => $value) {
			$option_query = "insert into product_option_list set option_name = '".$value."', product_idx = '".$_POST['idx']."'";
			$option_result = mysqli_query($link, $option_query);			
		}

		$file_query = "";
		foreach($_FILES['upload_image']['name'] as $key => $value) {

			$file = $_FILES['upload_image'];
			$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/upload/img/';
			$ext_str = "jpg,gif,png,pdf,ppt,pptx";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'][$key], strrpos($file['name'][$key], '.') + 1);
			
			//echo $ext."<br/>";
			
			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				//echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				//exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				//echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				//exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'][$key], $upload_directory.$path)) {
				
				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'][$key];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				//$response = new \StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				//$response->link = "/sample/editor/html/popular/" . $name_save;
				//echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';
				
				//$file1_query = ", attach_file = '".$name_save."', real_file_name = '".$name_orig."'";
				$file_query = "insert into file_list set board_type = 'shopping', file_name = '".$file['name'][$key]."', real_file_name = '".$name_save."', board_idx = '".$_POST['idx']."'";
				$file_result = mysqli_query($link, $file_query);
			}
			
		}		

		echo "<script>alert('상품 수정이 완료되었습니다.');location.href = '/as_admin/shopping_list.php';</script>";
		exit;

	}

	if($write_type == "franchisee_add") {
		
		$sql = "insert into franchisee set user_sectors = '".$_POST['user_sectors']."', user_store_name = '".$_POST['user_store_name']."', user_addr = '".$_POST['user_addr']."', user_url = '".$_POST['user_url']."', user_phone = '".$_POST['user_phone']."', city = '".$_POST['city']."'";
		$result = mysqli_query($link, $sql);

		//$idx = mysqli_insert_id($link);

		$file_query = "";
		foreach($_FILES['upload_image']['name'] as $key => $value) {

			$file = $_FILES['upload_image'];
			$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/upload/img/';
			$ext_str = "jpg,gif,png,pdf,ppt,pptx";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'][$key], strrpos($file['name'][$key], '.') + 1);
			
			//echo $ext."<br/>";
			
			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				//echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				//exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				//echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				//exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'][$key], $upload_directory.$path)) {
				
				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'][$key];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				//$response = new \StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				//$response->link = "/sample/editor/html/popular/" . $name_save;
				//echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';
				
				//$file1_query = ", attach_file = '".$name_save."', real_file_name = '".$name_orig."'";
				$file_query = "insert into file_list set board_type = 'franchisee', file_name = '".$file['name'][$key]."', real_file_name = '".$name_save."', board_idx = '".$idx."'";
				$file_result = mysqli_query($link, $file_query);
			}
			
		}		

		echo "<script>alert('가맹점 등록이 완료되었습니다.');location.href = '/as_admin/franchisee_list.php';</script>";
		exit;

	}

	if($write_type == "franchisee_modify") {
		
		$sql = "update franchisee set user_sectors = '".$_POST['user_sectors']."', user_store_name = '".$_POST['user_store_name']."', user_addr = '".$_POST['user_addr']."', user_url = '".$_POST['user_url']."', user_phone = '".$_POST['user_phone']."', city = '".$_POST['city']."' where idx = '".$_POST['idx']."'";
		$result = mysqli_query($link, $sql);

		//$idx = mysqli_insert_id($link);

		$file_query = "";
		foreach($_FILES['upload_image']['name'] as $key => $value) {

			$file = $_FILES['upload_image'];
			$upload_directory = $_SERVER['DOCUMENT_ROOT'].'/upload/img/';
			$ext_str = "jpg,gif,png,pdf,ppt,pptx";
			$allowed_extensions = explode(',', $ext_str);

			$max_file_size = 5242880000000000;
			$ext = substr($file['name'][$key], strrpos($file['name'][$key], '.') + 1);
			
			//echo $ext."<br/>";
			
			// 확장자 체크
			if(!in_array($ext, $allowed_extensions)) {
				//echo "<script>alert('업로드할 수 없는 확장자 입니다.');history.go(-1);</script>";
				//exit;
			}

			// 파일 크기 체크
			if($file['size'] >= $max_file_size) {
				//echo "<script>alert('5MB 까지만 업로드 가능합니다.');history.go(-1);</script>";
				//exit;
			}

			$path = md5(microtime()) . '.' . $ext;
			if(move_uploaded_file($file['tmp_name'][$key], $upload_directory.$path)) {
				
				//$query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
				$file_id = md5(uniqid(rand(), true));
				$name_orig = $file['name'][$key];
				$name_save = $path;

				//$data['link'] = "http://designwizc.com/sample/editor/html/popular/ce71c16d59422aa4f5f2eb42d02ec6cc.jpg";

				//echo json_encode($data['link']);

				//$response = new \StdClass;
				//$response->link = Director::absoluteBaseURL() . "" . $file->Filename;
				//$response->link = "/sample/editor/html/popular/" . $name_save;
				//echo stripslashes(json_encode($response));

				//$orgin_name = $orgin_name.$name_orig."^|^";
				//$save_name = $save_name.$name_save."^|^";

				//echo"<h3>파일 업로드 성공</h3>";
				//echo '<a href="file_list.php">업로드 파일 목록</a>';
				
				//$file1_query = ", attach_file = '".$name_save."', real_file_name = '".$name_orig."'";
				$file_query = "insert into file_list set board_type = 'franchisee', file_name = '".$file['name'][$key]."', real_file_name = '".$name_save."', board_idx = '".$_POST['idx']."'";
				$file_result = mysqli_query($link, $file_query);
			}
			
		}		

		echo "<script>alert('가맹점 수정이 완료되었습니다.');location.href = '/as_admin/franchisee_list.php';</script>";
		exit;

	}

	if($write_type == "option_delete") {
		
		$sql = "delete from product_option_list where idx = '".$_POST['idx']."'";
		$result = mysqli_query($link, $sql);

	}

	if($write_type == "img_file_delete") {
		
		$sql = "select * from file_list where idx = '".$_POST['idx']."'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result);		

		unlink($_SERVER['DOCUMENT_ROOT']."/upload/img/".$row['real_file_name']);

		$sql = "delete from file_list where idx = '".$_POST['idx']."'";
		$result = mysqli_query($link, $sql);

	}

	if($write_type == "id_dup_check") {
		
		$sql = "select count(*) as cnt from as_account where user_id = '".$_POST['user_id']."'";
		$result = mysqli_query($link, $sql);
		$row_member = mysqli_fetch_array($result);

		if($row_member['cnt'] == 0) {
			echo "Y";
		} else {
			echo "N";
		}

	}

	if($write_type == "delete_member") {
		
		$sql = "delete from as_account where user_id = '".$_POST['user_id']."'";
		$result = mysqli_query($link, $sql);

	}

	if($write_type == "general_login") {
		
		$sql = "select count(*) as cnt from as_account where user_id = '".$_POST['user_id']."' and user_passwd = '".md5($_POST['user_pass'])."' and user_type = '1'";
		$result = mysqli_query($link, $sql);
		$row_member = mysqli_fetch_array($result);

		if($row_member['cnt'] == 0) {
			echo "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');history.go(-1);</script>";
			exit;
		} else {

			$sql = "select * from as_account where user_id = '".$_POST['user_id']."' and user_passwd = '".md5($_POST['user_pass'])."' and user_type = '1'";
			$result = mysqli_query($link, $sql);
			$row_member = mysqli_fetch_array($result);

			$_SESSION['user_id'] = $row_member['user_id'];
			$_SESSION['user_type'] = 1;

			echo "<script>alert('일반회원 로그인이 완료되었습니다.');location.href= '/';</script>";
			exit;

		}

	}

	if($write_type == "store_login") {
		
		$sql = "select count(*) as cnt from as_account where user_id = '".$_POST['user_id2']."' and user_passwd = '".md5($_POST['user_pass2'])."' and user_type = '2'";
		$result = mysqli_query($link, $sql);
		$row_member = mysqli_fetch_array($result);

		if($row_member['cnt'] == 0) {
			echo "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');history.go(-1);</script>";
			exit;
		} else {

			$sql = "select * from as_account where user_id = '".$_POST['user_id2']."' and user_passwd = '".md5($_POST['user_pass2'])."' and user_type = '2'";
			$result = mysqli_query($link, $sql);
			$row_member = mysqli_fetch_array($result);

			if($row_member['check_join'] == "N") {
				echo "<script>alert('미승인 가맹점입니다. 관리자에게 문의해주세요.');history.go(-1);</script>";
				exit;
			}

			$_SESSION['user_id'] = $row_member['user_id'];
			$_SESSION['user_type'] = 2;

			echo "<script>alert('가맹점 회원 로그인이 완료되었습니다.');location.href= '/';</script>";
			exit;

		}

	}


?>