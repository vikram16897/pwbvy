<?php
function get_place($id)
{
	$obj_db = new Database();
	$place = $obj_db->selectAllData(TB_PREFIX . "place", "id=" . $id, 'desc', 'id');
	return $place[0]['place'];
}
function get_user_name($id)
{
	$obj_db = new Database();
	$place = $obj_db->selectAllData(TB_PREFIX . "user_detail", "id='" . $id . "' or username='" . $id . "'", 'desc', 'id');
	return $place[0]['name'];
}
function create_filename($str = '')
{

	$str = strip_tags($str);

	$str = preg_replace('/[\r\n\t ]+/', ' ', $str);

	$str = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);

	$str = strtolower($str);

	$str = html_entity_decode($str, ENT_QUOTES, "utf-8");

	$str = htmlentities($str, ENT_QUOTES, "utf-8");

	$str = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);

	$str = str_replace(' ', '-', $str);

	$str = rawurlencode($str);

	$str = str_replace('%', '-', $str);

	return $str;
}

function sanitizeArrayData($data)
{

	$correct_data = array();

	foreach ($data as $key => $val)

		$correct_data[$key] = trim(mysqli_real_escape_string($GLOBALS['db'], strip_tags(stripslashes($val))));

	return $correct_data;

}

function sanitizeData($data)
{

	return trim(mysqli_real_escape_string($GLOBALS['db'], strip_tags(stripslashes($data))));

}



function checkData($data)
{
	return trim(mysqli_real_escape_string($GLOBALS['db'], $data));
}



function login_session_check()
{

	if (isset($_SESSION['login']['id']) && $_SESSION['login']['id'] == 1) {
	} else {
		header("location:" . WEB_ADMIN_PATH . "login.php");
		exit();
	}

}



function selectAllChildSponsor($sp_id)
{

	$obj_sp_database = new Database();

	$sp_array = array();

	array_push($sp_array, $sp_id);

	foreach ($sp_array as $sp_new_id) {
		$sql = "select * from mfc_user_detail where sponsor_id='" . $sp_new_id['user_id'] . "' and status='1'";
		$sp_res = mysql_query($sql);
		while ($sp_row = mysql_fetch_assoc($sp_res)) {
			array_push($sp_array, $sp_row);
		}

	}

	return $sp_array;
}

function commission_system($current_id, $sponsor_id, $amount, $rank)
{
	$obj_db = new Database();
	$res = $obj_db->selectAllData(TB_PREFIX . "user_detail", "sponsor_id='" . $sponsor_id . "'", "asc", "id");
	$parent = $obj_db->selectAllData(TB_PREFIX . "user_detail", "username='" . $sponsor_id . "'", "asc", "id");
	$p = $parent['0'];
	$sponsor = $p['sponsor_id'];
	if (sizeof($res) == 10 && $p['user_type'] == 8) {
		$update_data['user_type'] = 7;
		$obj_db->updateData($update_data, TB_PREFIX . 'user_detail', $sponsor_id, "sponsor_id");
	}
	$noc = $obj_db->selectAllData(TB_PREFIX . "user_detail", "parents like '%" . $sponsor_id . ",%'", "asc", "id");
	if (sizeof($noc) == 200) {
		$update_data['user_type'] = 6;
		$obj_db->updateData($update_data, TB_PREFIX . 'user_detail', $sponsor_id, "sponsor_id");
	} else if (sizeof($noc) == 500) {
		$update_data['user_type'] = 5;
		$obj_db->updateData($update_data, TB_PREFIX . 'user_detail', $sponsor_id, "sponsor_id");
	}
	$rest_amt = $amount;

	if ($rank == 9) {
		$data1['username'] = $sponsor_id;
		$data1['transaction_type'] = 1;
		$data1['transaction_for'] = $current_id;
		$data1['transaction_amount'] = 100;
		$data1['transaction_date'] = date('Y-m-d');
		$data1['status'] = 1;
		$data1['remarks'] = "100 Rupeess Comission for join new member";
		$obj_db->insertData($data1, TB_PREFIX . "user_account");
		$rest_amt = $amount - 100;
	}
	$active = 0;
	$club = 0;
	$senior_club = 0;
	$dpg = 0;
	$mini_unit = 0;
	$unit = 0;
	$head_unit = 0;
	while (1) {
		$parent = $obj_db->selectAllData(TB_PREFIX . "user_detail", "username='" . $sponsor . "'", "asc", "id");
		$p = $parent['0'];
		$sponsor = $p['sponsor_id'];

		if ($p['user_type'] != 9 && $p['user_type'] != 0) {
			if ($p['user_type'] == 7 && $active == 0 && $rank == 9) {
				$active = 1;
				$data1['username'] = $p['username'];
				$data1['transaction_type'] = 1;
				$data1['transaction_for'] = $current_id;
				$data1['transaction_amount'] = 25;
				$data1['transaction_date'] = date('Y-m-d');
				$data1['status'] = 1;
				$data1['remarks'] = "25 Rs. - active Volunteer Commission";
				$obj_db->insertData($data1, TB_PREFIX . "user_account");
				$rest_amt = $rest_amt - 25;

			}
			if ($p['user_type'] == 6 && $club == 0 && $rank == 9) {
				$club = 1;
				$data1['username'] = $p['username'];
				$data1['transaction_type'] = 1;
				$data1['transaction_for'] = $current_id;
				$data1['transaction_amount'] = 50;
				$data1['transaction_date'] = date('Y-m-d');
				$data1['status'] = 1;
				$data1['remarks'] = "50 Rs. Sr. Volunteer Comission";
				$obj_db->insertData($data1, TB_PREFIX . "user_account");
				$rest_amt = $rest_amt - 50;

			}
			if ($p['user_type'] == 5 && $senior_club == 0 && $rank == 9) {
				$senior_club = 1;
				$data1['username'] = $p['username'];
				$data1['transaction_type'] = 1;
				$data1['transaction_for'] = $current_id;
				$data1['transaction_amount'] = 25;
				$data1['transaction_date'] = date('Y-m-d');
				$data1['status'] = 1;
				$data1['remarks'] = "25 Rs. -  club Volunteer Comission";
				$obj_db->insertData($data1, TB_PREFIX . "user_account");
				$rest_amt = $rest_amt - 25;

			}
			if ($p['user_type'] == 4 && $dpg == 0) {
				$dpg = 1;
				if ($rank == 9) {
					$data1['username'] = $p['username'];
					$data1['transaction_type'] = 1;
					$data1['transaction_for'] = $current_id;
					$data1['transaction_amount'] = ($amount - 125) * 10 / 100;
					$data1['transaction_date'] = date('Y-m-d');
					$data1['status'] = 1;
					$data1['remarks'] = (($amount - 125) * 10 / 100) . " Rs. - DPG Commission";
					$obj_db->insertData($data1, TB_PREFIX . "user_account");
					$rest_amt = $rest_amt - (($amount - 125) * 10 / 100);
				} else {
					$data1['username'] = $p['username'];
					$data1['transaction_type'] = 1;
					$data1['transaction_for'] = $current_id;
					$data1['transaction_amount'] = 100;
					$data1['transaction_date'] = date('Y-m-d');
					$data1['status'] = 1;
					$data1['remarks'] = "100 Rs. - DPG Commission for volunteer add";
					$obj_db->insertData($data1, TB_PREFIX . "user_account");
					$rest_amt = $rest_amt - 100;
				}

			}
			if ($p['user_type'] == 3 && $mini_unit == 0) {
				$mini_unit = 1;
				if ($rank == 9) {
					$data1['username'] = $p['username'];
					$data1['transaction_type'] = 1;
					$data1['transaction_for'] = $current_id;
					$data1['transaction_amount'] = ($amount - 125) * 10 / 100;
					$data1['transaction_date'] = date('Y-m-d');
					$data1['status'] = 1;
					$data1['remarks'] = (($amount - 125) * 10 / 100) . " Rs. - Mini Unit Commission";
					$obj_db->insertData($data1, TB_PREFIX . "user_account");
					$rest_amt = $rest_amt - (($amount - 125) * 10 / 100);
				} else {
					$data1['username'] = $p['username'];
					$data1['transaction_type'] = 1;
					$data1['transaction_for'] = $current_id;
					$data1['transaction_amount'] = 100;
					$data1['transaction_date'] = date('Y-m-d');
					$data1['status'] = 1;
					$data1['remarks'] = "100 Rs. -  Mini Unit Commission for volunteer add";
					$obj_db->insertData($data1, TB_PREFIX . "user_account");
					$rest_amt = $rest_amt - 100;
				}
			}
			if ($p['user_type'] == 2 && $unit == 0 && $rank == 9) {
				$unit = 1;
				$data1['username'] = $p['username'];
				$data1['transaction_type'] = 1;
				$data1['transaction_for'] = $current_id;
				$data1['transaction_amount'] = ($amount - 125) * 10 / 100;
				$data1['transaction_date'] = date('Y-m-d');
				$data1['status'] = 1;
				$data1['remarks'] = (($amount - 125) * 10 / 100) . " Rs. - Unit Commission";
				$obj_db->insertData($data1, TB_PREFIX . "user_account");
				$rest_amt = $rest_amt - (($amount - 125) * 10 / 100);
			}

			if ($p['user_type'] == 1) {
				$data1['username'] = $p['username'];
				$data1['transaction_type'] = 1;
				$data1['transaction_for'] = $current_id;
				$data1['transaction_amount'] = $rest_amt;
				$data1['transaction_date'] = date('Y-m-d');
				$data1['status'] = 1;
				$data1['remarks'] = ($amount * 10 / 100) . " - Head Unit Commission";
				$obj_db->insertData($data1, TB_PREFIX . "user_account");
				break;
			}


		} else {
			break;
		}
	}
}
?>