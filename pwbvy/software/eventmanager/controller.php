<?php
include("../setting/global.php");
include("commission.php");
$pageaction = $_REQUEST['pageaction'];
$commissionDistributor = new CommissionDistributor($obj_database);
switch ($pageaction) {
	case "user_login":
		//mail("savisoftindia@gmail.com","request url",$_SERVER['SERVER_NAME']);
		unset($_POST['pageaction']);
		$condition = " password='" . (md5($_POST['password'])) . "' and status='1' and ( username='" . $_POST['username'] . "' or alt_username='" . $_POST['username'] . "')";

		$ch = $obj_database->selectAllData(TB_PREFIX . 'user', $condition, 'ASC', 'id');

		if ($ch) {
			$user_condition['username'] = $ch[0]['username'];
			$_SESSION['user_type'] = $ch[0]['type'];


			if ($_SESSION['user_type'] == 14) {
				$user = $obj_database->selectAllData(TB_PREFIX . 'member_detail', $user_condition, 'ASC', 'username');
				$wallet = $obj_database->GetDataByQuery('SELECT SUM(amount) as wallet	FROM ngo_renewal WHERE user_id="' . $user[0]['username'] . '" ');
				$wallet = 2 * $wallet[0]['wallet'];
			} else {
				$user = $obj_database->selectAllData(TB_PREFIX . 'user_detail', $user_condition, 'ASC', 'username');
				//$wallet=$obj_database->GetDataByQuery('SELECT SUM(amount) as wallet	FROM ngo_wallet WHERE userid="'.$user[0]['id'].'" ');	
				//$wallet=$wallet[0]['wallet'];
			}
			$userWallet = $obj_database->GetDataByQuery('SELECT SUM(CASE WHEN transaction_type = 7 THEN transaction_amount ELSE 0 END) - SUM(CASE WHEN transaction_type = 8 THEN transaction_amount ELSE 0 END) AS balance FROM ngo_user_account WHERE username = "' . $user[0]['username'] . '"');
			$_SESSION['wallet'] = $userWallet[0]["balance"];

			$_SESSION['user_detail'] = $user[0];

			$_SESSION['user']['name'] = $user[0]['name'];
			$_SESSION['user']['image'] = $user[0]['image'];
			$_SESSION['user']['email'] = $user[0]['email'];
			$_SESSION['user']['mobile'] = $user[0]['mobile'];
			$_SESSION['user']['id'] = $user[0]['id'];
			$_SESSION['login']['id'] = 1;
			$data['lastlogin'] = date('Y-m-d H:i:s');
			$obj_database->updateData($data, TB_PREFIX . "user", $ch[0]['useridfk'], 'id');
			header("location:" . WEB_ADMIN_PATH . "index.php");
			exit(1);
		} else {
			$_SESSION['error_login'] = "username or password is wrong please try again";
			header("location:" . WEB_ADMIN_PATH . "login.php");
		}
		break;

	/*17-10-2020*/
	case "add_phfemi":
		$data["username"] = checkData($_POST["username"]);
		$data["amount"] = checkData($_POST["amount"]);
		if ($obj_database->insertData($data, TB_PREFIX . 'phfemi')) {
			$_SESSION['message']['msg'] = "EMI has been added successfully .";
			header("location:" . WEB_ADMIN_PATH . "manage_phf.php");
			exit;
		}
		break;

	case "edit_phfemi":
		$data["username"] = checkData($_POST["username"]);
		$data["amount"] = checkData($_POST["amount"]);
		if ($obj_database->updateData($data, TB_PREFIX . 'phfemi', $_POST['id'], "id")) {
			$_SESSION['message']['msg'] = "EMI has been updated successfully .";
			header("location:" . WEB_ADMIN_PATH . "phfemi.php?username=" . $data["username"] . " ");
			exit;
		}
		break;

	case "add_phf":
		$nou = $obj_database->GetCount("SELECT count(*) as count FROM ngo_phf");
		$data['username'] = checkData("PHF" . sprintf("%06d", (100000 + $nou)));
		$data["name"] = checkData($_POST["name"]);
		$data["father"] = checkData($_POST["father"]);
		$data["mobile"] = checkData($_POST["mobile"]);
		$data["landmark"] = checkData($_POST["landmark"]);
		$data["epin"] = checkData($_POST["epin"]);
		$data["address"] = checkData($_POST["address"]);
		$data["gname"] = checkData($_POST["gname"]);
		$data["gaddress"] = checkData($_POST["gaddress"]);
		$data["gmobile"] = checkData($_POST["gmobile"]);
		$data["phfamount"] = checkData($_POST["phfamount"]);
		$data["emitype"] = checkData($_POST["emitype"]);
		$data["emiamount"] = checkData($_POST["emiamount"]);
		$data["timeperiod"] = checkData($_POST["timeperiod"]);
		$data["latefine"] = checkData($_POST["latefine"]);
		$data["accountholdername"] = checkData($_POST["accountholdername"]);
		$data["accountnumber"] = checkData($_POST["accountnumber"]);
		$data["ifsccode"] = checkData($_POST["ifsccode"]);
		$data["branch"] = checkData($_POST["branch"]);
		$data["status"] = 0;
		if ($_FILES['aadhar']['name'] != "") {
			$tmp_name = $_FILES["aadhar"]["tmp_name"];
			$image = imagecreatefromjpeg($tmp_name);
			$newname = ($data['username'] . "aadhar.jpg");
			var_dump($image);
			$res = imagejpeg($image, "../phfmemberdocs/aadhar/" . $newname, 60);
			$data["aadhar"] = checkData($newname);
		}
		if ($_FILES['pan']['name'] != "") {
			$tmp_name = $_FILES["pan"]["tmp_name"];
			$image = imagecreatefromjpeg($tmp_name);
			$newname = ($data['username'] . "pan.jpg");
			$res = imagejpeg($image, "../phfmemberdocs/pan/" . $newname, 60);
			$data["pan"] = checkData($newname);
		}
		if ($_FILES['cheque']['name'] != "") {
			$tmp_name = $_FILES["cheque"]["tmp_name"];
			$image = imagecreatefromjpeg($tmp_name);
			$newname = ($data['username'] . "cheque.jpg");
			$res = imagejpeg($image, "../phfmemberdocs/cheque/" . $newname, 60);
			$data["cheque"] = checkData($newname);
		}
		if ($_FILES['photo']['name'] != "") {
			$tmp_name = $_FILES["photo"]["tmp_name"];
			$image = imagecreatefromjpeg($tmp_name);
			$newname = ($data['username'] . "photo.jpg");
			$res = imagejpeg($image, "../phfmemberdocs/photo/" . $newname, 60);
			$data["photo"] = checkData($newname);
		}
		if ($_FILES['agreement']['name'] != "") {
			if (file_exists("../phfmemberdocs/agreement/" . $_FILES['agreement']['name'])) {
				unlink("../phfmemberdocs/agreement/" . $_FILES['agreement']['name']);
				move_uploaded_file($_FILES['agreement']['tmp_name'], "../phfmemberdocs/agreement/" . $_FILES['agreement']['name']);
				$data["agreement"] = checkData($_FILES['agreement']['name']);
			} else {
				move_uploaded_file($_FILES['agreement']['tmp_name'], "../phfmemberdocs/agreement/" . $_FILES['agreement']['name']);
				$data["agreement"] = checkData($_FILES['agreement']['name']);
			}
		}

		if ($obj_database->insertData($data, TB_PREFIX . 'phf')) {
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['useridfk'] = $obj_database->get_last_id();
			$password = $data2['username'];
			$data2['password'] = md5($data['username']);
			/*epin section*/
			$e_data['status'] = 2;
			$e_data['used_date'] = date('Y-m-d h:i:s');
			$e_data['used_for'] = $data2['username'];
			$obj_database->updateData($e_data, TB_PREFIX . "epin", $data['epin'], "e_pin");
			/*epin section*/
			$data2['status'] = 1;
			$data2['type'] = "phf";
			if ($data2['useridfk']) {
				if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
					$api_key = '45E1F4CCA63D63';
					$contacts = $data['mobile'];
					$from = 'PBVYTM';
					$msg = "Dear " . $data['name'] . ", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a PHF member .Your user Id is " . $data['username'] . " ";
					$msg .= " & Password is " . $data['username'];
					$sms_text = urlencode($msg);
					$api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2';
					$response = file_get_contents($api_url);
					$_SESSION['message']['msg'] = "Member has been added successfully .";
					header("location:" . WEB_ADMIN_PATH . "manage_phf.php");
					exit;
				}
			}
		}
		break;

	case "edit_phf":
		$data["name"] = checkData($_POST["name"]);
		$data["father"] = checkData($_POST["father"]);
		$data["mobile"] = checkData($_POST["mobile"]);
		$data["landmark"] = checkData($_POST["landmark"]);
		$data["epin"] = checkData($_POST["epin"]);
		$data["address"] = checkData($_POST["address"]);
		$data["gname"] = checkData($_POST["gname"]);
		$data["gaddress"] = checkData($_POST["gaddress"]);
		$data["gmobile"] = checkData($_POST["gmobile"]);
		$data["phfamount"] = checkData($_POST["phfamount"]);
		$data["emitype"] = checkData($_POST["emitype"]);
		$data["emiamount"] = checkData($_POST["emiamount"]);
		$data["timeperiod"] = checkData($_POST["timeperiod"]);
		$data["latefine"] = checkData($_POST["latefine"]);
		$data["accountholdername"] = checkData($_POST["accountholdername"]);
		$data["accountnumber"] = checkData($_POST["accountnumber"]);
		$data["ifsccode"] = checkData($_POST["ifsccode"]);
		$data["branch"] = checkData($_POST["branch"]);
		$data["status"] = 0;
		$check = $obj_database->GetDataByQuery('SELECT aadhar,pan,cheque,agreement,photo FROM ngo_phf WHERE id="' . $_POST['id'] . '" ');
		$check = $check[0];
		if ($_FILES['aadhar']['name'] != "") {
			if (file_exists("../phfmemberdocs/aadhar/" . $check['aadhar'])) {
				unlink("../phfmemberdocs/aadhar/" . $check['aadhar']);
				$tmp_name = $_FILES["aadhar"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "aadhar.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/aadhar/" . $newname, 60);
				$data["aadhar"] = checkData($newname);
			} else {
				$tmp_name = $_FILES["aadhar"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "aadhar.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/aadhar/" . $newname, 60);
				$data["aadhar"] = checkData($newname);
			}
		}
		if ($_FILES['pan']['name'] != "") {
			if (file_exists("../phfmemberdocs/pan/" . $check['pan'])) {
				unlink("../phfmemberdocs/pan/" . $check['pan']);
				$tmp_name = $_FILES["pan"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "pan.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/pan/" . $newname, 60);
				$data["pan"] = checkData($newname);
			} else {
				$tmp_name = $_FILES["pan"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "pan.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/pan/" . $newname, 60);
				$data["pan"] = checkData($newname);
			}
		}
		if ($_FILES['cheque']['name'] != "") {
			if (file_exists("../phfmemberdocs/cheque/" . $check['cheque'])) {
				unlink("../phfmemberdocs/cheque/" . $check['cheque']);
				$tmp_name = $_FILES["photo"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "cheque.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/cheque/" . $newname, 60);
				$data["cheque"] = checkData($newname);
			} else {
				$tmp_name = $_FILES["cheque"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "cheque.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/cheque/" . $newname, 60);
				$data["cheque"] = checkData($newname);
			}
		}
		if ($_FILES['photo']['name'] != "") {
			if (file_exists("../phfmemberdocs/photo/" . $check['photo'])) {
				unlink("../phfmemberdocs/photo/" . $check['photo']);
				$tmp_name = $_FILES["photo"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "photo.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/photo/" . $newname, 60);
				$data["photo"] = checkData($newname);
			} else {
				$tmp_name = $_FILES["photo"]["tmp_name"];
				$image = imagecreatefromjpeg($tmp_name);
				$newname = ($_POST['username'] . "photo.jpg");
				$res = imagejpeg($image, "../phfmemberdocs/photo/" . $newname, 60);
				$data["photo"] = checkData($newname);
			}
		}
		if ($_FILES['agreement']['name'] != "") {
			if (file_exists("../phfmemberdocs/agreement/" . $check['agreement'])) {
				unlink("../phfmemberdocs/agreement/" . $check['agreement']);
				move_uploaded_file($_FILES['agreement']['tmp_name'], "../phfmemberdocs/agreement/" . $_FILES['agreement']['name']);
				$data["agreement"] = checkData($_FILES['agreement']['name']);
			} else {
				move_uploaded_file($_FILES['agreement']['tmp_name'], "../phfmemberdocs/agreement/" . $_FILES['agreement']['name']);
				$data["agreement"] = checkData($_FILES['agreement']['name']);
			}
		}

		if ($obj_database->updateData($data, TB_PREFIX . 'phf', $_POST['id'], "id")) {
			$_SESSION['message']['msg'] = "Member has been updated successfully .";
			header("location:" . WEB_ADMIN_PATH . "add_phf.php?action=edit&id=" . $_POST['id']);
			exit;
		}
		break;

	case 'phf_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'phf', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['message']['msg'] = "Member Status has been updated successfully .";
			header("location:" . WEB_ADMIN_PATH . "manage_phf.php");
		}
		break;
	/*17-10-2020*/
	case "add_gallery":
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($data['image'] != '') {
			move_uploaded_file($_FILES['image']['tmp_name'], "../gallery/" . $data['image']);
		}
		$data["type"] = checkData($_POST["type"]);
		$data["caption"] = checkData($_POST["caption"]);
		$data["status"] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . "gallery")) {
			header("location:" . WEB_ADMIN_PATH . "gallery.php");
		}
		break;

	case "edit_gallery";
		$filename = '../gallery/' . $_POST['oldimage'];
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
			if (file_exists($filename)) {
				unlink($filename);
			}
		}
		if ($data['image'] != '') {
			move_uploaded_file($_FILES['image']['tmp_name'], "../gallery/" . $data['image']);
		}
		$data["id"] = checkData($_POST["id"]);
		$data["type"] = checkData($_POST["type"]);
		$data["caption"] = checkData($_POST["caption"]);
		$data["status"] = 1;
		if ($obj_database->updateData($data, TB_PREFIX . "gallery", $_POST["id"], "id")) {
			header("location:" . WEB_ADMIN_PATH . "gallery.php?msg=success");
		} else {
			header("location:" . WEB_ADMIN_PATH . "gallery.php?msg=fail");
		}
		break;

	case "add_docs":
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($data['image'] != '') {
			move_uploaded_file($_FILES['image']['tmp_name'], "../docs/" . $data['image']);
		}
		$data["type"] = checkData($_POST["type"]);
		$data["caption"] = checkData($_POST["caption"]);
		$data["status"] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . "gallery")) {
			header("location:" . WEB_ADMIN_PATH . "show_docs.php");
		}
		break;

	case "edit_docs";
		$filename = '../gallery/' . $_POST['oldimage'];
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			if (file_exists($filename)) {
				unlink($filename);
			}
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($data['image'] != '') {
			move_uploaded_file($_FILES['image']['tmp_name'], "../docs/" . $data['image']);
		}
		$data["id"] = checkData($_POST["id"]);
		$data["type"] = checkData($_POST["type"]);
		$data["caption"] = checkData($_POST["caption"]);
		$data["status"] = 1;
		if ($obj_database->updateData($data, TB_PREFIX . "gallery", $_POST["id"], "id")) {
			header("location:" . WEB_ADMIN_PATH . "show_docs.php?msg=success");
		} else {
			header("location:" . WEB_ADMIN_PATH . "show_docs.php?msg=fail");
		}
		break;

	case 'b_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'gallery', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "gallery.php");
		}
		break;

	case "add_recipt":
		$data["name"] = checkData($_POST["name"]);
		$data["date"] = date('Y-m-d', strtotime(checkData($_POST["date"])));
		$data["address"] = checkData($_POST["address"]);
		$data["mobile"] = checkData($_POST["mobile"]);
		$data["donation_amount"] = checkData($_POST["donation_amount"]);
		$data["donation_type"] = checkData($_POST["donation_type"]);
		$data["comment"] = checkData($_POST["comment"]);
		$data["added_by"] = $_SESSION['user_detail']['username'];
		$data["district"] = $_SESSION['user_detail']['district'];
		if ($obj_database->insertData($data, TB_PREFIX . "recipt")) {
			$api_key = '45E1F4CCA63D63';
			$contacts = $data['mobile'];
			$from = 'PBVYTM';
			$msg = "Dear " . $data['name'] . ", Welcome to Pragati Bal Vikas Yojna. Your Rs " . $data["donation_amount"] . " has been paid successfully . Thank you . For more information Visit to our website www.pbvy.org .";
			$sms_text = urlencode($msg);
			$api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2';
			$response = file_get_contents($api_url);
			$response = file_get_contents($api_url);
			header("location:" . WEB_ADMIN_PATH . "recipt_manager.php?success=1");
		}
		break;

	case "edit_recipt":
		$data["name"] = checkData($_POST["name"]);
		$data["date"] = date('Y-m-d', strtotime(checkData($_POST["date"])));
		$data["address"] = checkData($_POST["address"]);
		$data["mobile"] = checkData($_POST["mobile"]);
		$data["donation_amount"] = checkData($_POST["donation_amount"]);
		$data["donation_type"] = checkData($_POST["donation_type"]);
		$data["comment"] = checkData($_POST["comment"]);
		if ($obj_database->updateData($data, TB_PREFIX . 'recipt', $_POST['id'], "id")) {
			header("location:" . WEB_ADMIN_PATH . "recipt_manager.php?success=1");
		}
		break;

	case "updateadmitcard";
		$from = date('Y-m-d', strtotime($_POST['from']));
		$to = date('Y-m-d', strtotime($_POST['to']));
		$venue = $_POST['venue'];
		$controller = $_POST['controller'];
		$examdate = date("Y-m-d", strtotime($_POST['examdate']));
		$time = $_POST['hour'] . ":" . $_POST['minute'] . " " . $_POST['ampm'];
		$count = 1;
		$sql = 'UPDATE ngo_registration SET venue="' . $venue . '",controller="' . $controller . '",examdate="' . $examdate . '",time="' . $time . '" WHERE added_on BETWEEN "' . $from . '" AND "' . $to . '" AND status="1" AND position IN (' . implode(",", $_POST['rank']) . ') ';
		$res = mysqli_query($GLOBALS['db'], $sql);
		if ($res) {
			header("location:" . WEB_ADMIN_PATH . "admitcardupdate.php?success");
		} else {
			header("location:" . WEB_ADMIN_PATH . "admitcardupdate.php?error");
		}
		//$obj_database->deleteData($_GET['id'],TB_PREFIX.'news',"id");
		//header("location:".WEB_ADMIN_PATH."news.php");
		break;
	case "delete_news";
		$obj_database->deleteData($_GET['id'], TB_PREFIX . 'news', "id");
		header("location:" . WEB_ADMIN_PATH . "news.php");
		break;
	case "add_news";
		$data['news'] = $_POST['news'];
		$data['type'] = $_POST['type'];
		if ($obj_database->insertData($data, TB_PREFIX . 'news')) {
			header("location:" . WEB_ADMIN_PATH . "news.php?msg=success");
		} else {
			header("location:" . WEB_ADMIN_PATH . "news.php?msg=fail");
		}
		break;

	case "add_member":

		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='" . $_POST['user_type'] . "'", "asc", "id");
		$pre = $rank[0]['prefix'];
		$designation = $rank[0]['rank'];
		$data['epin'] = checkData($_POST['epin']);
		if (!$obj_database->checkEpin($data['epin'])) {
			header("location:" . WEB_ADMIN_PATH . "add_member.php?error=epin");
			die;
		}
		$nou = $obj_database->GetCount("SELECT count(*) as count FROM ngo_member_detail");
		$data['username'] = checkData($pre . sprintf("%06d", (10000 + $nou)));
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['age'] = checkData($_POST['age']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['donation'] = checkData($_POST['donation']);

		/****************************Nomniee**********************************/

		$data['beneneficiary_name'] = checkData($_POST['beneneficiary_name']);
		$data['beneneficiary_dob'] = checkData($_POST['beneneficiary_dob']);
		$data['beneneficiary_aadhar'] = checkData($_POST['beneneficiary_aadhar']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;

		if ($obj_database->insertData($data, TB_PREFIX . 'member_detail')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['useridfk'] = $obj_database->get_last_id();
			$renew = array();
			$renew['user_id'] = $data['username'];
			$renew['amount'] = 500.00;
			$renew['transaction_date'] = date('Y-m-d');
			$renew['remarks'] = 'First Time';
			$renew['frequency'] = 1;
			$renew['status'] = 1;
			$renew['reciever_id'] = $_SESSION['user_detail']['username'];
			$obj_database->insertData($renew, TB_PREFIX . 'renewal');
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$password = $data2['username'];
			$data2['password'] = md5($data['username']);
			$data2['status'] = 1;
			$data2['type'] = checkData($rank[0]['id']);
			/*epin section*/
			$e_data['status'] = 2;
			$e_data['used_date'] = date('Y-m-d h:i:s');
			$e_data['used_for'] = $data2['username'];
			$obj_database->updateData($e_data, TB_PREFIX . "epin", $data['epin'], "e_pin");
			/*epin section*/
			if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
				if ($data2['useridfk']) {
					$api_key = '45E1F4CCA63D63';
					$contacts = $data['mobile'];
					$from = 'PBVYTM';
					$msg = "Dear " . $data['name'] . ", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a " . $designation . ".Your user Id is " . $data['username'] . " ";
					$msg .= " & Password is " . $password;
					$sms_text = urlencode($msg);
					$api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2';
					$response = file_get_contents($api_url);
					$commissionDistributor->distributeCommission($data['sponsor_id'], $data['username']);
					header("location:" . WEB_ADMIN_PATH . "member_manager.php?add=true");
					exit;

				}
			}
		}
		break;

	case "edit_member":

		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='" . $_POST['user_type'] . "'", "asc", "id");
		$pre = $rank[0]['prefix'];
		$designation = $rank[0]['rank'];
		$nou = $obj_database->selectAllData(TB_PREFIX . "user", "1", "desc", "id");
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['age'] = checkData($_POST['age']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['donation'] = checkData($_POST['donation']);

		/****************************Nomniee**********************************/

		$data['beneneficiary_name'] = checkData($_POST['beneneficiary_name']);
		$data['beneneficiary_dob'] = checkData($_POST['beneneficiary_dob']);
		$data['beneneficiary_aadhar'] = checkData($_POST['beneneficiary_aadhar']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}

		//$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
			if (file_exists($filename)) {
				unlink($filename);
			}
		}
		if ($data['image'] != '') {
			move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
		}

		if ($obj_database->updateData($data, TB_PREFIX . 'member_detail', $_POST['id'], "id")) {
			header("location:" . WEB_ADMIN_PATH . "member_manager.php?update=true");
			exit;
		}
		break;


	case "add_anudan":

		if (isset($_FILES['passbook']) && $_FILES['passbook']['error'] == 0) {
			$data['passbook'] = rand() . create_filename($_FILES['passbook']['name']);
			if (file_exists($filename)) {
				unlink($filename);
			}
		}
		if ($data['passbook'] != '') {
			move_uploaded_file($_FILES['passbook']['tmp_name'], "../profilepic/" . $data['passbook']);
		}

		if (isset($_FILES['sadicard']) && $_FILES['sadicard']['error'] == 0) {
			$data['sadicard'] = rand() . create_filename($_FILES['sadicard']['name']);
			if (file_exists($filename)) {
				unlink($filename);
			}
		}
		if ($data['sadicard'] != '') {
			move_uploaded_file($_FILES['sadicard']['tmp_name'], "../profilepic/" . $data['sadicard']);
		}

		if ($obj_database->updateData($data, TB_PREFIX . 'member_detail', $_POST['id'], "id")) {
			header("location:" . WEB_ADMIN_PATH . "anudan.php?update=true");
			exit;
		}
		break;

	case 'branch_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'branch', 'status', $_GET['status'], $ids, 'id')) {
			header("location:" . WEB_ADMIN_PATH . "manage_branch.php");
		} else {
			header("location:" . WEB_ADMIN_PATH . "manage_branch.php");
		}
		break;
	case "edit_branch":
		$data["branch_manager"] = checkData($_POST["branch_manager"]);
		$data["contact_number"] = checkData($_POST["contact_number"]);
		$data["district"] = checkData($_POST["district"]);
		$data["branch_address"] = checkData($_POST["branch_address"]);
		if ($obj_database->updateData($data, TB_PREFIX . "branch", $_POST['id'], 'id')) {
			header("location:" . WEB_ADMIN_PATH . "manage_branch.php?action=edit&id=" . $_POST['id']);
		}
		break;
	case "add_branch":
		$data["branch_code"] = strtoupper(checkData($_POST["branch_code"]));
		$data["branch_manager"] = checkData($_POST["branch_manager"]);
		$data["contact_number"] = checkData($_POST["contact_number"]);
		$data["district"] = checkData($_POST["district"]);
		$data["branch_address"] = checkData($_POST["branch_address"]);
		$data["status"] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . "branch")) {
			header("location:" . WEB_ADMIN_PATH . "manage_branch.php?success=1");
		}
		break;
	case "edit_center":
		$data["center_code"] = checkData($_POST["center_code"]);
		$data["ward_number"] = checkData($_POST["ward_number"]);
		$data["place"] = checkData($_POST["place"]);
		$data["sevika"] = checkData($_POST["sevika"]);
		$data["sahayika"] = checkData($_POST["sahayika"]);
		$data["supervisor"] = checkData($_POST["supervisor"]);
		$data["status"] = 1;
		if ($obj_database->updateData($data, TB_PREFIX . "center", $_POST['id'], 'id')) {
			header("location:" . WEB_ADMIN_PATH . "center.php?action=edit&id=" . $_POST['id']);
		}
		break;
	case "add_center":
		$data["center_code"] = checkData($_POST["center_code"]);
		$data["ward_number"] = checkData($_POST["ward_number"]);
		$data["place"] = checkData($_POST["place"]);
		$data["sevika"] = checkData($_POST["sevika"]);
		$data["sahayika"] = checkData($_POST["sahayika"]);
		$data["supervisor"] = checkData($_POST["supervisor"]);
		$data["status"] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . "center")) {
			header("location:" . WEB_ADMIN_PATH . "center.php?success=1");
		}
		break;
	case "teacher_login":
		mail("savisoftindia@gmail.com", "request url", $_SERVER['SERVER_NAME']);
		unset($_POST['pageaction']);

		$condition = " mobile='" . $_POST['password'] . "' and status='1' and username='" . $_POST['username'] . "'";
		$ch = $obj_database->selectAllData(TB_PREFIX . 'user_detail_new', $condition, 'ASC', 'id');
		if ($ch) {
			$user_condition['id'] = $ch[0]['useridfk'];
			$_SESSION['user_type'] = $ch[0]['type'];
			$user = $ch;
			$_SESSION['user_detail_new'] = $user[0];
			$_SESSION['user']['name'] = $user[0]['name'];
			$_SESSION['user']['image'] = $user[0]['image'];
			$_SESSION['user']['email'] = $user[0]['email'];
			$_SESSION['user']['mobile'] = $user[0]['mobile'];
			$_SESSION['user']['id'] = $user[0]['id'];
			$_SESSION['login']['id'] = 1;
			$data['lastlogin'] = date('Y-m-d H:i:s');
			$obj_database->updateData($data, TB_PREFIX . "user_detail_new", $ch[0]['useridfk'], 'id');
			header("location:" . WEB_ADMIN_PATH . "index.php?type=teacher");
			exit(1);
		} else {
			$_SESSION['error_login'] = "username or password is wrong please try again";
			header("location:" . WEB_ADMIN_PATH . "login.php");
		}
		break;


	case "access_user":

		unset($_GET['pageaction']);
		$condition = "username='" . $_GET['id'] . "' or alt_username='" . $_POST['id'] . "'";
		$ch = $obj_database->selectAllData(TB_PREFIX . 'user', $condition, 'ASC', 'id');
		$res = $obj_database->GetDataByQuery("SELECT user_type,district,block,panchayat from ngo_user_detail WHERE username='" . $_GET['id'] . "' ");
		$_SESSION['position'] = $res[0]['user_type'];
		$_SESSION['district'] = $res[0]['district'];
		$_SESSION['block'] = $res[0]['block'];
		$_SESSION['panchayat'] = $res[0]['panchayat'];

		if ($ch) {
			if ($ch[0]['useridfk'] == 0) {
				$res = $obj_database->GetDataByQuery("SELECT id from ngo_user_detail WHERE username='" . $_GET['id'] . "' ");
				$user_condition['id'] = $res[0]['id'];
			} else {
				$user_condition['id'] = $ch[0]['useridfk'];
			}

			$_SESSION['user_type'] = $ch[0]['type'];
			if ($_SESSION['user_type'] == 14) {
				$user = $obj_database->selectAllData(TB_PREFIX . 'member_detail', $user_condition, 'ASC', 'id');
			} else {
				$_SESSION['admin_id'] = $_SESSION['user_detail']['username'];
				$user = $obj_database->selectAllData(TB_PREFIX . 'user_detail', $user_condition, 'ASC', 'id');
			}
			$_SESSION['user_detail'] = $user[0];
			$_SESSION['user']['name'] = $user[0]['name'];
			$_SESSION['user']['image'] = $user[0]['image'];
			$_SESSION['user']['email'] = $user[0]['email'];
			$_SESSION['user']['mobile'] = $user[0]['mobile'];
			$_SESSION['user']['id'] = $user[0]['id'];
			$_SESSION['login']['id'] = 1;
			$_SESSION['accessed'] = 1;
			header("location:" . WEB_ADMIN_PATH . "index.php");
			exit(1);
		} else {
			$_SESSION['error_login'] = "username or password is wrong please try again";
			header("location:" . WEB_ADMIN_PATH . "login.php");
		}
		break;




	case "client_login":
		unset($_POST['pageaction']);
		$condition = " password='" . (md5($_POST['password'])) . "' and status='1' and type='3' and ( username='" . $_POST['username'] . "' or alt_username ='" . $_POST['username'] . "')";
		$ch = $obj_database->selectAllData(TB_PREFIX . 'user', $condition, 'ASC', 'id');
		if ($ch) {
			$user_condition['id'] = $ch[0]['useridfk'];
			$_SESSION['user_type'] = $ch[0]['type'];
			$_SESSION['user']['username'] = $ch[0]['username'];
			$user = $obj_database->selectAllData(TB_PREFIX . 'user_detail', $user_condition, 'ASC', 'id');
			$_SESSION['user']['name'] = $user[0]['name'];
			$_SESSION['user']['image'] = $user[0]['image'];
			$_SESSION['user']['type'] = $user[0]['type'];
			$_SESSION['user']['email'] = $user[0]['email'];
			$_SESSION['user']['mobile'] = $user[0]['mobile'];
			$_SESSION['user']['id'] = $user[0]['id'];
			$_SESSION['login']['id'] = true;
			$data['lastlogin'] = date('Y-m-d H:i:s');
			$_SESSION['error_login'] = "useassword is wrong please try again";
			$obj_database->updateData($data, TB_PREFIX . "user", $ch[0]['useridfk'], 'id');
			header("location:" . WEB_ADMIN_PATH . "user_index.php");
			exit(1);
		} else {
			$_SESSION['error_login'] = "username or password is wrong please try again, or Your account has not been activted yet.";
			header("location:" . WEB_SITE_PATH . "user/login/");
		}
		break;

	case "login":

		$row = $obj_database->login($_POST['user'], $_POST['password']);
		if ($row) {
			//	echo $row['usertype'];
			$_SESSION['login'] = 1;
			$_SESSION['userId'] = '0';
			if ($row['usertype'] == 1) {
				header('location:index.php');
				exit(0);
			} else {
				header('location:guest/index.php');
				exit(0);
			}
		} else {
			$_SESSION['error'] = "1";
			header("location:login.php");
			exit(0);
		}
		break;

	//************************************************Place manager*******************************************************/

	case "add_state":

		$places = explode(",", checkData($_POST['place']));
		$data['type'] = checkData($_POST['type']);
		$data['parent'] = checkData($_POST['parent']);
		$data['status'] = 1;
		foreach ($places as $pl) {
			$data['place'] = $pl;
			$d = $obj_database->selectAllData(TB_PREFIX . "place", "parent='" . $data['parent'] . "' and place='" . $data['place'] . "'", "asc", "id");
			if (sizeof($d) == 0) {
				$obj_database->insertData($data, TB_PREFIX . "place");
			}
		}
		$_SESSION['add'] = 2;
		header("location:" . WEB_SITE_PATH . "/state.php?success=1&parent=" . $data['parent'] . "&type=" . $_POST['ty']);
		break;

	//************************************************Place manager*******************************************************/

	case "edit_place":

		$data['place'] = $_POST['place'];
		$obj_database->updateData($data, TB_PREFIX . 'place', $_POST['id'], "id");
		header("location:" . WEB_SITE_PATH . "/state.php?success=1&parent=" . $_POST['parent'] . "&type=" . $_POST['type']);
		break;

	/**************************************EPIN/***********************************************************/

	case "add_pin":

		$data['allocated_to'] = $_POST['sponsor_id'];
		$data['amount'] = $_POST['amount'];
		$data['transaction_id'] = $_POST['transaction_id'];
		$data['status'] = 1;
		$data['for_rank'] = implode(',', $_POST['rank']);
		for ($i = 0; $i < $_POST['no_of_pin']; $i++) {
			$data['e_pin'] = "PBVY" . time() . substr(md5(microtime()), rand(0, 26), 5);
			$obj_database->insertData($data, TB_PREFIX . "epin");
		}
		header("location:" . WEB_ADMIN_PATH . "epin.php");

		break;

	case "update_pin":

		$data['for_rank'] = implode(',', $_POST['rank']);
		$data['amount'] = ($_POST['new_amount'] != '' ? $_POST['new_amount'] : $_POST['amount']);

		$obj_database->updateData($data, TB_PREFIX . 'epin', $_POST['amount'], "amount");
		header("location:" . WEB_ADMIN_PATH . "epin.php");

		break;

	case "add_renewal":
		switch ($_POST['frequency']) {
			case 1:
				$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 7, date('Y')));
				$re = $obj_database->selectAllData(TB_PREFIX . "renewal", "status='1' and user_id='" . $_POST['user_id'] . "' and transaction_date <'" . $date . "'", "desc", "id");
				break;

			case 2:
				$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 30, date('Y')));
				$re = $obj_database->selectAllData(TB_PREFIX . "renewal", "user_id='" . $_POST['member_id'] . "' and transaction_date >'" . $date . "'", "desc", "id");
				break;

			case 3:
				$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
				$re = $obj_database->selectAllData(TB_PREFIX . "renewal", "status='1' and user_id='" . $_POST['user_id'] . "' and transaction_date <'" . $date . "'", "desc", "id");
				break;

			default:
				$re = $obj_database->selectAllData(TB_PREFIX . "renewal", "status='1' and user_id='" . $_POST['user_id'] . "'", "desc", "id");
				break;
		}
		if (sizeof($re) > 0) {
			header("location:" . WEB_ADMIN_PATH . "add_renewal.php?error=exist");
			exit;
		} else if ($_POST['amount'] > $_SESSION['wallet']) {
			header("location:" . WEB_ADMIN_PATH . "add_renewal.php?error=more");
			exit;
		} else {
			$data['user_id'] = $_POST['member_id'];
			$data['reciever_id'] = $_SESSION['user_detail']['username'];
			$data['amount'] = $_POST['amount'];
			$data['frequency'] = $_POST['frequency'];
			$data['remarks'] = $_POST['remark'];
			$data['transaction_date'] = date('Y-m-d');
			$data['status'] = 1;
			if ($obj_database->insertData($data, TB_PREFIX . "renewal")) {
				$data3['username'] = $_SESSION['user_detail']['username'];
				$data3['transaction_type'] = 8;
				$data3['transaction_for'] = $data['user_id'];
				$data3['transaction_amount'] = $data['amount'];
				$data3['transaction_date'] = date('Y-m-d');
				$data3['status'] = 1;
				$data3['remarks'] = $data['amount'] . "Renewal Done for " . $data['user_id'];
				$obj_database->insertData($data3, TB_PREFIX . "user_account");

				header("location:" . WEB_ADMIN_PATH . "renewal.php");
				exit;
			}
		}
		break;


	case "request_epin":
		unset($_POST['pageaction']);
		$data = $_POST;
		if (isset($_FILES['proof']) && $_FILES['proof']['error'] == 0) {
			$data['proof'] = rand() . create_filename($_FILES['proof']['name']);
		}
		$data['status'] = 0;
		$data['user_id'] = $_SESSION['user_detail']['username'];

		if ($obj_database->insertData($data, TB_PREFIX . "epin_request")) {
			if ($data['proof'] != '') {
				move_uploaded_file($_FILES['proof']['tmp_name'], "../proof/" . $data['proof']);
			}
			header("location:" . WEB_ADMIN_PATH . "requested_pin.php");
		}
		break;

	case "transfer_pin":
		$sql = "UPDATE " . TB_PREFIX . "epin set allocated_to='" . $_POST['user_id'] . "' where id IN ";
		$ids = '';
		print_r($_POST['ids']);
		foreach ($_POST['ids'] as $id) {
			$ids .= $id . ",";
		}
		$ids = rtrim($ids, ",");
		$sql .= "(" . $ids . ");";
		echo $sql;
		$GLOBALS['db']->query($sql);
		header("location:" . WEB_ADMIN_PATH . "epin.php");
		break;

	/******************************Employee manager************************************************************/

	case "add_employee":
		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='" . $_POST['user_type'] . "'", "asc", "id");
		$pre = $rank[0]['prefix'];
		$designation = $rank[0]['rank'];
		$amount = 750;
		$data['epin'] = checkData($_POST['epin']);
		if (!$obj_database->checkEpin($data['epin'])) {
			header("location:" . WEB_ADMIN_PATH . "add_employee.php?error=epin");
			die;
		}
		$nou = $obj_database->selectAllData(TB_PREFIX . "user_detail", "1", "desc", "id");
		$data['username'] = checkData($pre . sprintf("%06d", 10000 + sizeof($nou)));
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		if ($obj_database->GetCount("SELECT count(mobile) as count FROM ngo_user_detail where mobile='" . $data['mobile'] . "' ") > 0) {
			header("location:" . WEB_ADMIN_PATH . "add_employee.php?error=already");
			die;
		}
		$data['work_area'] = checkData($_POST['work_area']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);
		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;
		// echo "<pre>";
		// print_r($data);
		// die;
		if ($obj_database->insertData($data, TB_PREFIX . 'user_detail')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['useridfk'] = $obj_database->get_last_id();
			$password = $data2['username'];
			$data2['password'] = md5($data['username']);
			/*epin section*/
			$e_data['status'] = 2;
			$e_data['used_date'] = date('Y-m-d h:i:s');
			$e_data['used_for'] = $data2['username'];
			$obj_database->updateData($e_data, TB_PREFIX . "epin", $data['epin'], "e_pin");
			/*epin section*/
			$data2['status'] = 1;
			$data2['type'] = checkData($rank[0]['type']);
			if ($data2['useridfk']) {
				if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
					$api_key = '45E1F4CCA63D63';
					$contacts = $data['mobile'];
					$from = 'PBVYTM';
					$msg = "Dear " . $data['name'] . ", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a " . $designation . ".Your user Id is " . $data['username'] . " ";
					$msg .= " & Password is " . $password;
					$sms_text = urlencode($msg);
					$api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2;';
					$response = file_get_contents($api_url);

					// if ($amount > 0) {
					// 	$comp = $obj_database->selectAllData(TB_PREFIX . "user_detail", "user_type='1'", "desc", "id");
					// 	$data3['username'] = $comp[0]['username'];
					// 	$data3['transaction_type'] = 1;
					// 	$data3['transaction_for'] = $data2['useridfk'];
					// 	$data3['transaction_amount'] = $amount;
					// 	$data3['transaction_date'] = date('Y-m-d');
					// 	$data3['status'] = 1;
					// 	$data3['remarks'] = $amount . " Rupees Comission for join new volutnteer";

					// 	$obj_database->insertData($data3, TB_PREFIX . "user_account");
					// }
					$_SESSION['reg_succes'] = 1;

					header("location:" . WEB_ADMIN_PATH . "employee.php");
					exit;


				}
			}
		}
		break;

	case "add_student":
		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='" . $_POST['user_type'] . "'", "asc", "id");
		$pre = $rank[0]['prefix'];
		$designation = $rank[0]['rank'];
		if ($_POST['user_type'] == 10) {
			$amount = 1100;
		} else if ($_POST['user_type'] == 9) {
			$amount = 2100;
		} else if ($_POST['user_type'] == 8) {
			$amount = 2100;
		} else {
			$amount = 0;
		}
		$nou = $obj_database->selectAllData(TB_PREFIX . "student_new", "1", "desc", "id");
		$data['username'] = checkData($pre . sprintf("%06d", 10000 + sizeof($nou)));
		$data['father'] = checkData($_POST['father']);
		$data['name'] = checkData($_POST['name']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['epin'] = checkData($_POST['epin']);
		$data['mobile'] = checkData($_POST['mobile']);

		/****************************Acadmic**********************************/
		$data['cast'] = checkData($_POST['cast']);
		$data['category'] = checkData($_POST['category']);
		$data['school'] = checkData($_POST['school']);
		$data['school_address'] = checkData($_POST['school_address']);
		$data['board'] = checkData($_POST['board']);
		$data['class'] = checkData($_POST['class']);

		/****************************Bank**********************************/


		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;
		$teachers = $obj_database->GetDataByQuery('SELECT sponsor_id FROM ngo_student_new WHERE panchayat="' . $data['panchayat'] . '" ORDER BY sponsor_id DESC');
		$teahcerlist = array();
		$attach = 0;
		if (count($teachers)) {
			foreach ($teachers as $teacher) {
				$teahcerlist[] = $teacher['sponsor_id'];
			}
			if (array_search($data['sponsor_id'], $teahcerlist)) {
				$attach = array_search($data['sponsor_id'], $teahcerlist) + 1;
			} else {
				$attach = count($teahcerlist) + 1;
			}
		} else {
			$attach = 1;
		}
		$studentcount = $obj_database->GetCount('SELECT COUNT(*) as count FROM ngo_student_new WHERE sponsor_id="' . $data['sponsor_id'] . '" AND panchayat="' . $data['panchayat'] . '" ');
		$bactch = strtoupper(get_place($data['panchayat']));
		$set = array(array('1' => 'A', '2' => 'B', '3' => 'C', '4' => 'D'));
		$studentcount = ($studentcount / 10);
		if ($studentcount <= 2) {
			$attach = $bactch . $set[0][1] . $attach;
		} elseif ($studentcount > 2 && $studentcount <= 4) {
			$attach = $bactch . $set[0][2] . $attach;
		} elseif ($studentcount > 4 && $studentcount <= 6) {
			$attach = $bactch . $set[0][3] . $attach;
		} elseif ($studentcount > 6 && $studentcount <= 8) {
			$attach = $bactch . $set[0][4] . $attach;
		}
		$data['batch'] = $attach;
		if ($obj_database->insertData($data, TB_PREFIX . 'student_new')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['password'] = md5($data['username']);
			$data2['status'] = 1;
			$data2['type'] = checkData($rank[0]['type']);
			;
			$data2['useridfk'] = $obj_database->get_last_id();
			/*epin section*/
			$e_data['status'] = 2;
			$e_data['used_date'] = date('Y-m-d h:i:s');
			$e_data['used_for'] = $data2['username'];
			$obj_database->updateData($e_data, TB_PREFIX . "epin", $data['epin'], "e_pin");
			/*epin section*/
			if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
				$api_key = '45E1F4CCA63D63';
				$contacts = $data['mobile'];
				$from = 'PBVYTM';
				$msg = "Dear " . $data['name'] . ", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a " . $designation . " . Your user Id is " . $data['username'] . " ";
				$msg .= " & Password is " . $data2['password'];
				$sms_text = urlencode($msg);
				$api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2';
				$response = file_get_contents($api_url);

				if ($amount > 0) {
					$comp = $obj_database->selectAllData(TB_PREFIX . "user_detail", "user_type='1'", "desc", "id");
					$data3['username'] = $comp[0]['username'];
					$data3['transaction_type'] = 1;
					$data3['transaction_for'] = $data2['useridfk'];
					$data3['transaction_amount'] = $amount;
					$data3['transaction_date'] = date('Y-m-d');
					$data3['status'] = 1;
					$data3['remarks'] = $amount . " Rupees Comission for join new volutnteer";

					$obj_database->insertData($data3, TB_PREFIX . "user_account");
				}
				$_SESSION['reg_succes'] = 1;
				header("location:" . WEB_ADMIN_PATH . "manage_student_new.php");
				exit;

			}
		}
		break;


	case "add_teacher":

		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='" . $_POST['user_type'] . "'", "asc", "id");
		$pre = "PBRT";
		$designation = $rank[0]['rank'];

		$nou = $obj_database->selectAllData(TB_PREFIX . "user", "1", "desc", "id");
		$data['username'] = checkData($pre . sprintf("%06d", 10000 + sizeof($nou)));
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['sponsor1'] = checkData($_POST['sponsor1']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		print_r($data);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . 'user_detail_new')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['password'] = md5($data['username']);
			$data2['status'] = 1;
			$data2['type'] = checkData($rank[0]['type']);
			;
			$data2['useridfk'] = $obj_database->get_last_id();
			if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
				$msg = "Dear " . $data['name'] . ", Welcome to help life foundation. You have been successfully Registered with us as a " . $designation . ".Your user Id is " . $data['username'] . " and password is " . $data['username'];
				$msg .= " & Password is " . trim($data2['password']);
				$url = "http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=" . $data['mobile'] . "&text=" . urlencode($msg) . "&route=17";
				file_get_contents($url);

				$_SESSION['reg_succes'] = 1;
				header("location:" . WEB_ADMIN_PATH . "add_teacher.php?action=edit&success=1&id=" . $data2['useridfk']);
				exit;

			}
		}
		break;

	case "edit_student":
		$data['father'] = checkData($_POST['father']);
		$data['name'] = checkData($_POST['name']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);

		/****************************Acadmic**********************************/
		$data['cast'] = checkData($_POST['cast']);
		$data['category'] = checkData($_POST['category']);
		$data['school'] = checkData($_POST['school']);
		$data['school_address'] = checkData($_POST['school_address']);
		$data['board'] = checkData($_POST['board']);
		$data['class'] = checkData($_POST['class']);

		/****************************Bank**********************************/


		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if ($_POST['user_type'] != '') {
			$data['user_type'] = checkData($_POST['user_type']);
		}
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($obj_database->updateData($data, TB_PREFIX . 'student_new', $_POST['id'], "id")) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$_SESSION['reg_succes'] = 1;
			header("location:" . WEB_ADMIN_PATH . "add_student.php?action=edit&id=" . $_POST['id']);
			exit;
		}

	case "edit_teacher":
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['sponsor1'] = checkData($_POST['sponsor1']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		$data['user_type'] = checkData($_POST['user_type']);
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($obj_database->updateData($data, TB_PREFIX . 'user_detail_new', $_POST['id'], "id")) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$_SESSION['reg_succes'] = 1;
			header("location:" . WEB_ADMIN_PATH . "add_teacher.php?action=edit&id=" . $_POST['id']);
			exit;
		}


	case "edit_employee":

		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['state'] = checkData($_POST['state']);
		$data['district'] = checkData($_POST['district']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['work_area'] = checkData($_POST['work_area']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		/***************************Sponsor***********************************************/

		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		$data['user_type'] = checkData($_POST['user_type']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($obj_database->updateData($data, TB_PREFIX . 'user_detail', $_POST['id'], "id")) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$_SESSION['reg_succes'] = 1;
			header("location:" . WEB_ADMIN_PATH . "add_employee.php?action=edit&id=" . $_POST['id']);
			exit;
		}
		break;


	case "edit_bank_info":
		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		if (isset($_FILES['passbook']) && $_FILES['passbook']['error'] == 0) {
			$data['passbook'] = rand() . create_filename($_FILES['passbook']['name']);
		}
		if ($data['passbook'] != '') {
			move_uploaded_file($_FILES['passbook']['tmp_name'], "../passbook/" . $data['passbook']);
		}
		if ($obj_database->updateData($data, TB_PREFIX . 'user_detail', $_SESSION['user_detail']['id'], "id")) {
			$_SESSION['reg_succes'] = 1;
			header("location:" . WEB_ADMIN_PATH . "index.php?bank_msg=bank_success");
			exit;
		}
		break;

	/*********************************************************************************************************************/
	case "add_user":

		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='11'", "asc", "id");
		$pre = $rank[0]['prefix'];
		$nou = $obj_database->selectAllData(TB_PREFIX . "user", "1", "desc", "id");
		$data['username'] = checkData($pre . sprintf("%06d", 10000 + sizeof($nou)));
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['nominee_gender'] = checkData($_POST['nominee_gender']);
		$data['nominee_dob'] = date('Y-m-d', strtotime(checkData($_POST['nominee_dob'])));
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['age'] = checkData($_POST['age']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['district'] = checkData($_POST['district']);
		$data['state'] = checkData($_POST['state']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['aadhar'] = checkData($_POST['aadhar']);
		$data['epin'] = checkData($_POST['epin']);
		/************Nominee**************************************/

		$data['nominee'] = checkData($_POST['nominee']);
		$data['nominee_relation'] = checkData($_POST['nominee_relation']);
		$data['nominee_title'] = checkData($_POST['nominee_title']);
		$data['nominee_address'] = checkData($_POST['nominee_address']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);

		/***************************Sponsor***********************************************/
		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		$data['user_type'] = 11;
		$data['amount'] = checkData($_POST['amount']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;

		if ($obj_database->insertData($data, TB_PREFIX . 'member_detail')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['status'] = 1;
			$data2['password'] = md5($data['username']);
			$data2['type'] = 5;
			$data2['useridfk'] = $obj_database->get_last_id();
			if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
				$msg = "Dear " . $data['name'] . ", Welcome to Help Life Foundation.You have been successfully Registered with us.Your user Id is " . $data['username'] . " and password is " . $data['username'];
				$url = "http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=" . $data['mobile'] . "&text=" . urlencode($msg) . "&route=17";
				file_get_contents($url);
				$e_data['status'] = 2;
				$e_data['used_date'] = date('Y-m-d h:i:s');
				$e_data['used_for'] = $data2['username'];
				$obj_database->updateData($e_data, TB_PREFIX . "epin", $data['epin'], "e_pin");

				$data3['username'] = $data['sponsor_id'];
				$data3['transaction_type'] = 1;
				$data3['transaction_for'] = $data2['useridfk'];
				$data3['transaction_amount'] = 200;
				$data3['transaction_date'] = date('Y-m-d');
				$data3['status'] = 1;
				$data3['remarks'] = $data3['transaction_amount'] . " Rupees Comission for join new Member";
				$obj_database->insertData($data3, TB_PREFIX . "user_account");

				$bv = $obj_database->selectAllData(TB_PREFIX . "user_detail", "status='1' and block='" . $_SESSION['user_detail']['block'] . "' and user_type='9'", "desc", "id");
				$data3['username'] = $bv[0]['username'];
				$data3['transaction_type'] = 1;
				$data3['transaction_for'] = $data2['useridfk'];
				$data3['transaction_amount'] = 50;
				$data3['transaction_date'] = date('Y-m-d');
				$data3['status'] = 1;
				$data3['remarks'] = $data3['transaction_amount'] . " Rupees Comission for join new Member";
				$obj_database->insertData($data3, TB_PREFIX . "user_account");


				$bv = $obj_database->selectAllData(TB_PREFIX . "user_detail", "status='1' and district='" . $_SESSION['user_detail']['district'] . "' and user_type='8'", "desc", "id");
				$data3['username'] = $bv[0]['username'];
				$data3['transaction_type'] = 1;
				$data3['transaction_for'] = $data2['useridfk'];
				$data3['transaction_amount'] = 15;
				$data3['transaction_date'] = date('Y-m-d');
				$data3['status'] = 1;
				$data3['remarks'] = $data3['transaction_amount'] . " Rupees Comission for join new Member";
				$obj_database->insertData($data3, TB_PREFIX . "user_account");
				$_SESSION['reg_succes'] = 1;
				header("location:" . WEB_ADMIN_PATH . "add_user.php?username=" . $data['username'] . "&success=1");
				exit;

			}
		}
		break;


	/*********************************************************************************************************************/
	case "add_old_user":

		$rank = $obj_database->selectAllData(TB_PREFIX . "user_rank", "id='11'", "asc", "id");
		$pre = 'HLO';
		$nou = $obj_database->selectAllData(TB_PREFIX . "user", "1", "desc", "id");
		$data['username'] = checkData($pre . sprintf("%06d", 10000 + sizeof($nou)));
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['nominee_gender'] = checkData($_POST['nominee_gender']);
		$data['nominee_dob'] = date('Y-m-d', strtotime(checkData($_POST['nominee_dob'])));
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['age'] = checkData($_POST['age']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['district'] = checkData($_POST['district']);
		$data['state'] = checkData($_POST['state']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['aadhar'] = checkData($_POST['aadhar']);

		$data['nominee'] = checkData($_POST['nominee']);
		$data['nominee_relation'] = checkData($_POST['nominee_relation']);
		$data['nominee_title'] = checkData($_POST['nominee_title']);
		$data['nominee_address'] = checkData($_POST['nominee_address']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);

		/***************************Sponsor***********************************************/
		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		$data['added_by'] = checkData($_SESSION['user_detail']['username']);

		$data['user_type'] = 11;
		$data['amount'] = checkData($_POST['amount']);

		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}

		$data['status'] = 1;

		if ($obj_database->insertData($data, TB_PREFIX . 'member_detail')) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$data2['username'] = $data['username'];
			$data2['alt_username'] = $data['username'];
			$data2['status'] = 1;
			$data2['password'] = md5($data['username']);
			$data2['type'] = 5;
			$data2['useridfk'] = $obj_database->get_last_id();
			if ($obj_database->insertData($data2, TB_PREFIX . 'user')) {
				$msg = "Dear " . $data['name'] . ", Welcome to Help Life Foundation.You have been successfully Shifted Old to New with us.Your user Id is " . $data['username'] . " and password is " . $data['username'];
				$url = "http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=" . $data['mobile'] . "&text=" . urlencode($msg) . "&route=17";
				file_get_contents($url);
				$_SESSION['reg_succes'] = 1;
				header("location:" . WEB_ADMIN_PATH . "add_user.php?username=" . $data['username'] . "&success=1");
				exit;

			}
		}
		break;



	case "edit_user":
		$data['father'] = checkData($_POST['father']);
		$data['father_title'] = checkData($_POST['father_title']);
		$data['name'] = checkData($_POST['name']);
		$data['name_title'] = checkData($_POST['name_title']);
		$data['gender'] = checkData($_POST['gender']);
		$data['age'] = checkData($_POST['age']);
		$data['dob'] = date('Y-m-d', strtotime(checkData($_POST['dob'])));
		$data['address'] = checkData($_POST['address']);
		$data['district'] = checkData($_POST['district']);
		$data['nominee_dob'] = date('Y-m-d', strtotime(checkData($_POST['nominee_dob'])));
		$data['state'] = checkData($_POST['state']);
		$data['block'] = checkData($_POST['block']);
		$data['panchayat'] = checkData($_POST['panchayat']);
		$data['pincode'] = checkData($_POST['pincode']);
		$data['email'] = checkData($_POST['email']);
		$data['mobile'] = checkData($_POST['mobile']);
		$data['aadhar'] = checkData($_POST['aadhar']);
		$data['epin'] = checkData($_POST['epin']);
		/************Nominee**************************************/

		$data['nominee'] = checkData($_POST['nominee']);
		$data['nominee_relation'] = checkData($_POST['nominee_relation']);
		$data['nominee_title'] = checkData($_POST['nominee_title']);
		$data['nominee_address'] = checkData($_POST['nominee_address']);

		/****************************Bank**********************************/

		$data['bank_name'] = checkData($_POST['bank_name']);
		$data['account_holder'] = checkData($_POST['name']);
		$data['bank_account'] = checkData($_POST['bank_account']);
		$data['bank_branch'] = checkData($_POST['bank_branch']);
		$data['bank_ifsc'] = checkData($_POST['bank_ifsc']);
		$data['pan'] = checkData($_POST['pan']);

		/***************************Sponsor***********************************************/
		$data['sponsor_id'] = checkData($_POST['sponsor_id']);
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
		}
		if ($obj_database->updateData($data, TB_PREFIX . 'member_detail', $_POST['id'], "id")) {
			if ($data['image'] != '') {
				move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image']);
			}
			$_SESSION['reg_succes'] = 1;
			header("location:" . WEB_ADMIN_PATH . "add_user.php?username=" . $data['username']);
			exit;
		}
		break;



	case 'pin_request_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'epin_request', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "requested_pin.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "requested_pin.php");
		}
		break;

	case 'recipt_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'recipt', 'status', $_GET['status'], $ids, 'id')) {
			header("location:" . WEB_ADMIN_PATH . "recipt_manager.php");
		} else {
			header("location:" . WEB_ADMIN_PATH . "recipt_manager.php");
		}
		break;

	case 'user_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'member_detail', 'status', $_GET['status'], $ids, 'username')) {
			$obj_database->changeStatus(TB_PREFIX . 'user', 'status', $_GET['status'], $ids, 'username');
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "manage_users.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "manage_users.php");
		}
		break;


	case 'renewal_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'renewal', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			if ($_GET['status'] == 1) {
				header("location:" . WEB_ADMIN_PATH . "renewal.php");
			} else {
				header("location:" . WEB_ADMIN_PATH . "inactive_renewal.php");
			}
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "manage_users.php");
		}
		break;


	case 'emp_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'user_detail', 'status', $_GET['status'], $ids, 'username')) {
			$obj_database->changeStatus(TB_PREFIX . 'user', 'status', $_GET['status'], $ids, 'username');
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "employee.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "employee.php");
		}

		break;

	case 'std_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'student_new', 'status', $_GET['status'], $ids, 'username')) {
			$obj_database->changeStatus(TB_PREFIX . 'user', 'status', $_GET['status'], $ids, 'username');
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "manage_student_new.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "manage_student_new.php");
		}

		break;

	case 'tech_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'user_detail_new', 'status', $_GET['status'], $ids, 'username')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "teacher.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "teacher.php");
		}

		break;

	case 'std_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'member_detail_new', 'status', $_GET['status'], $ids, 'username')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "student.php");
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "student.php");
		}

		break;
	case 'job_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'registration', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "job_data.php");
		}
		break;

	case 'online':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'onlinetestregistration', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "reg.php");
		}
		break;

	case 'test_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'onlinetestregistration', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "alltestregistration.php");
		}
		break;

	case 'password_reset':

		$data['password'] = md5($_POST['password']);
		if ($obj_database->updateData($data, TB_PREFIX . 'user', $_POST['username'], 'username')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "manage_users.php");
		}

		break;
	case 'change_pic':
		if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
			$data['image'] = rand() . create_filename($_FILES['image']['name']);
			if (move_uploaded_file($_FILES['image']['tmp_name'], "../profilepic/" . $data['image'])) {
				if ($obj_database->updateData($data, TB_PREFIX . 'user_detail', $_SESSION['user_detail']['username'], 'username')) {
					$_SESSION['user_detail']['image'] = $data['image'];
					$_SESSION['success'] = '1';
					header("location:" . WEB_ADMIN_PATH . "index.php");
				}
			} else {
				$_SESSION['success'] = '0';
				header("location:" . WEB_ADMIN_PATH . "index.php");
			}
		}
		break;
	case 'change_password':
		$data['password'] = md5($_POST['password']);
		if ($obj_database->updateData($data, TB_PREFIX . 'user', $_SESSION['user_detail']['username'], 'username')) {
			$_SESSION['success'] = '1';
			session_destroy();
			header("location:" . WEB_ADMIN_PATH . "login.php");
		}
		break;
	case "payout":
		$data['username'] = $_POST['user_id'];
		$data['transaction_type'] = $_POST['type'];
		$data['transaction_amount'] = $_POST['amount'];
		$data['transaction_date'] = date('Y-m-d');
		$data['remarks'] = $_POST['remark'];
		;
		$data['transaction_for'] = "withdrawl";
		if ($obj_database->insertData($data, TB_PREFIX . "user_account")) {
			header("location:" . WEB_ADMIN_PATH . "my_wallet.php?msg=payment Transfered successfully&username=" . $_POST['user_id']);
			exit;
		}
		break;
	/******************Add Wallet Amount Section******************************/

	case "add_wallet":
		$check = $obj_database->selectAllData(TB_PREFIX . "user_detail", "username='" . $_POST['aname'] . "'", "desc", "id");
		if ($check[0]['alternate_wallet'] >= $_POST['amount']) {
			$sql = "update " . TB_PREFIX . "user_detail set alternate_wallet=alternate_wallet-'" . $_POST['amount'] . "' where username='" . $_POST['aname'] . "'";
			mysqli_query($GLOBALS['db'], $sql);
			$sql = "update " . TB_PREFIX . "user_detail set alternate_wallet=alternate_wallet+'" . $_POST['amount'] . "'and  where username='" . $_POST['username'] . "'";
			mysqli_query($GLOBALS['db'], $sql);

		} else {
			echo "Your Balance is low";
		}
		$data['trans_form'] = sanitizeData($_POST['aname']);
		$data['trans_to'] = sanitizeData($_POST['username']);
		$data['name'] = sanitizeData($_POST['name']);
		$data['amount'] = sanitizeData($_POST['amount']);
		$data['status'] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . 'add_wallet_amount')) {

			$_SESSION['success'] = 1;

			header("location:" . WEB_ADMIN_PATH . "employee.php");
			exit;
		} else {

			$_SESSION['success'] = 0;

			header("location:" . WEB_ADMIN_PATH . "employee.php");
			exit;
		}
		break;
	case 'report_status':
		$ids = array();
		$ids[0] = $_GET['id'];
		if ($obj_database->changeStatus(TB_PREFIX . 'add_wallet_amount', 'status', $_GET['status'], $ids, 'id')) {
			$_SESSION['success'] = '1';
			header("location:" . WEB_ADMIN_PATH . "manage_account_report.php?type=" . $_GET['type']);
		} else {
			$_SESSION['success'] = '0';
			header("location:" . WEB_ADMIN_PATH . "manage_account_report.php?type=" . $_GET['type']);
		}

		break;
	/******************End of Wallet Amount Section******************************/
	case "multi_user_sms":

		$data['user_no'] = sanitizeData($_POST['user_no']);
		$data['message'] = sanitizeData($_POST['message']);
		$data['status'] = 1;
		if ($obj_database->insertData($data, TB_PREFIX . 'multi_sms')) {
			$_SESSION['success'] = 1;
			$msg = urlencode($data['message']);
			file_get_contents("http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=" . $data['user_no'] . "&text=" . $msg . "&route=17");


			header("location:" . WEB_SITE_PATH . "/send_sms.php");
			exit;
		} else {
			$_SESSION['success'] = 0;
			header("location:" . WEB_SITE_PATH . "/send_sms.php");
			exit;
		}
		break;
}
?>