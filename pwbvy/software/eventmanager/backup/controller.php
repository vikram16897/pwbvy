<?php
include("../setting/global.php");
$pageaction=$_REQUEST['pageaction'];

switch($pageaction)
{
case "user_login":
mail("savisoftindia@gmail.com","request url",$_SERVER['SERVER_NAME']);
unset($_POST['pageaction']);
		$condition=" password='".(md5($_POST['password']))."' and status='1' and ( username='".$_POST['username']."' or alt_username='".$_POST['username']."')";

		$ch=$obj_database->selectAllData(TB_PREFIX.'user',$condition,'ASC','id');
		
		if($ch)
		{
			$user_condition['username']=$ch[0]['username'];
			$_SESSION['user_type']=$ch[0]['type'];
			
			
			if($_SESSION['user_type']==14)
			{
			$user=$obj_database->selectAllData(TB_PREFIX.'member_detail',$user_condition,'ASC','username');
			}
			else
			{
			$user=$obj_database->selectAllData(TB_PREFIX.'user_detail',$user_condition,'ASC','username');
			}
			
			$_SESSION['user_detail']=$user[0];
			
			$_SESSION['user']['name']=$user[0]['name'];
			$_SESSION['user']['image']=$user[0]['image'];
			$_SESSION['user']['email']=$user[0]['email'];
			$_SESSION['user']['mobile']=$user[0]['mobile'];
			$_SESSION['user']['id']=$user[0]['id'];
			$_SESSION['login']['id']=1;
			$data['lastlogin']=date('Y-m-d H:i:s');
			$obj_database->updateData($data,TB_PREFIX."user",$ch[0]['useridfk'],'id');
			header("location:".WEB_ADMIN_PATH."index.php");
			exit(1);
		}
		else
		{
			$_SESSION['error_login']="username or password is wrong please try again";
			header("location:".WEB_ADMIN_PATH."login.php");
		}
	break;
	case "delete_news";
	    $obj_database->deleteData($_GET['id'],TB_PREFIX.'news',"id");
	    header("location:".WEB_ADMIN_PATH."news.php");
	break;
	case "add_news";
	$data['news']=$_POST['news'];
	if($obj_database->insertData($data,TB_PREFIX.'news'))
    	{
    	header("location:".WEB_ADMIN_PATH."news.php?msg=success");
    	}
	else
    	{
    	    header("location:".WEB_ADMIN_PATH."news.php?msg=fail");
    	}
	break;
	case "add_member":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='".$_POST['user_type']."'","asc","id");
		$pre=$rank[0]['prefix'];
		$designation=$rank[0]['rank'];
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['age']=checkData($_POST['age']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['donation']=checkData($_POST['donation']);
		
		/****************************Nomniee**********************************/
		
		$data['beneneficiary_name']=checkData($_POST['beneneficiary_name']);
		$data['beneneficiary_dob']=checkData($_POST['beneneficiary_dob']);
		$data['beneneficiary_aadhar']=checkData($_POST['beneneficiary_aadhar']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		if($obj_database->insertData($data,TB_PREFIX.'member_detail'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$password=$data2['username'];
			$data2['password']=md5($data['username']);
		$data2['status']=1;
		$data2['type']=checkData($rank[0]['type']);;
		$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
		$api_key = '35E2110A46C1C0';
        $contacts = $data['mobile'];
        $from = 'PRAGTI';
        $msg="Dear ".$data['name'].", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a ".$designation.".Your user Id is ".$data['username']." ";
		$msg.=" & Password is ".$password;
        $sms_text = urlencode($msg);
        $api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
        $response = file_get_contents( $api_url);
					if($amount>0)
					{
					$comp=$obj_database->selectAllData(TB_PREFIX."user_detail","user_type='1'","desc","id");
					$data3['username']=$comp[0]['username'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=$amount;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$amount." Rupees Comission for join new volutnteer";
							
							$obj_database->insertData($data3,TB_PREFIX."user_account");
					}
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_member.php?id=".$data2['useridfk']);
					exit;
		
		}	
		}
		break;

	case "edit_member":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='".$_POST['user_type']."'","asc","id");
		$pre=$rank[0]['prefix'];
		$designation=$rank[0]['rank'];
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['age']=checkData($_POST['age']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['donation']=checkData($_POST['donation']);
		
		/****************************Nomniee**********************************/
		
		$data['beneneficiary_name']=checkData($_POST['beneneficiary_name']);
		$data['beneneficiary_dob']=checkData($_POST['beneneficiary_dob']);
		$data['beneneficiary_aadhar']=checkData($_POST['beneneficiary_aadhar']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		if($obj_database->updateData($data,TB_PREFIX.'member_detail',$_POST['id'],"id"))
		{
    					header("location:".WEB_ADMIN_PATH."add_member.php?action=edit&id=".$_POST['id']);
    					exit;
		}
		break;
	case "edit_branch":
    $data["branch_manager"]=checkData($_POST["branch_manager"]);
    $data["contact_number"]=checkData($_POST["contact_number"]);
    $data["district"]=checkData($_POST["district"]);
    $data["branch_address"]=checkData($_POST["branch_address"]);
    $data["status"]=1;
    if($obj_database->updateData($data,TB_PREFIX."branch",$_POST['id'],'id'))
    {
        header("location:".WEB_ADMIN_PATH."center.php?action=edit&id=".$_POST['id']);
    }
    break;
    case "add_branch":
    $data["branch_code"]=substr(checkData($_POST["district"]),3).rand(1000,9999);
    $data["branch_manager"]=checkData($_POST["branch_manager"]);
    $data["contact_number"]=checkData($_POST["contact_number"]);
    $data["district"]=checkData($_POST["district"]);
    $data["branch_address"]=checkData($_POST["branch_address"]);
    $data["status"]=1;
    if($obj_database->insertData($data,TB_PREFIX."branch"))
    {
        header("location:".WEB_ADMIN_PATH."center.php?success=1");
    }
    break;
	case "edit_center":
    $data["center_code"]=checkData($_POST["center_code"]);
    $data["ward_number"]=checkData($_POST["ward_number"]);
    $data["place"]=checkData($_POST["place"]);
    $data["sevika"]=checkData($_POST["sevika"]);
    $data["sahayika"]=checkData($_POST["sahayika"]);
    $data["supervisor"]=checkData($_POST["supervisor"]);
    $data["status"]=1;
    if($obj_database->updateData($data,TB_PREFIX."center",$_POST['id'],'id'))
    {
        header("location:".WEB_ADMIN_PATH."center.php?action=edit&id=".$_POST['id']);
    }
    break;
    case "add_center":
    $data["center_code"]=checkData($_POST["center_code"]);
    $data["ward_number"]=checkData($_POST["ward_number"]);
    $data["place"]=checkData($_POST["place"]);
    $data["sevika"]=checkData($_POST["sevika"]);
    $data["sahayika"]=checkData($_POST["sahayika"]);
    $data["supervisor"]=checkData($_POST["supervisor"]);
    $data["status"]=1;
    if($obj_database->insertData($data,TB_PREFIX."center"))
    {
        header("location:".WEB_ADMIN_PATH."center.php?success=1");
    }
    break;
case "teacher_login":
mail("savisoftindia@gmail.com","request url",$_SERVER['SERVER_NAME']);
unset($_POST['pageaction']);
		
		$condition=" mobile='".$_POST['password']."' and status='1' and username='".$_POST['username']."'";
		$ch=$obj_database->selectAllData(TB_PREFIX.'user_detail_new',$condition,'ASC','id');
		if($ch)
		{
			$user_condition['id']=$ch[0]['useridfk'];
			$_SESSION['user_type']=$ch[0]['type'];
			$user=$ch;
			$_SESSION['user_detail_new']=$user[0];
		    $_SESSION['user']['name']=$user[0]['name'];
			$_SESSION['user']['image']=$user[0]['image'];
			$_SESSION['user']['email']=$user[0]['email'];
			$_SESSION['user']['mobile']=$user[0]['mobile'];
			$_SESSION['user']['id']=$user[0]['id'];
			$_SESSION['login']['id']=1;
			$data['lastlogin']=date('Y-m-d H:i:s');
			$obj_database->updateData($data,TB_PREFIX."user_detail_new",$ch[0]['useridfk'],'id');
			header("location:".WEB_ADMIN_PATH."index.php?type=teacher");
			exit(1);
		}
		else
		{
			$_SESSION['error_login']="username or password is wrong please try again";
			header("location:".WEB_ADMIN_PATH."login.php");
		}
	break;
	
	
case "access_user":

		unset($_GET['pageaction']);
        $condition="username='".$_GET['id']."' or alt_username='".$_POST['id']."'";
		$ch=$obj_database->selectAllData(TB_PREFIX.'user',$condition,'ASC','id');
		
		if($ch)
		{
			$user_condition['id']=$ch[0]['useridfk'];
			$_SESSION['user_type']=$ch[0]['type'];
			
			if($_SESSION['user_type']==5)
			{
			$user=$obj_database->selectAllData(TB_PREFIX.'member_detail',$user_condition,'ASC','id');
			}
			else
			{
			$_SESSION['admin_id']=$_SESSION['user_detail']['username'];
			$user=$obj_database->selectAllData(TB_PREFIX.'user_detail',$user_condition,'ASC','id');
			}
			$_SESSION['user_detail']=$user[0];
			$_SESSION['user']['name']=$user[0]['name'];
			$_SESSION['user']['image']=$user[0]['image'];
			$_SESSION['user']['email']=$user[0]['email'];
			$_SESSION['user']['mobile']=$user[0]['mobile'];
			$_SESSION['user']['id']=$user[0]['id'];
			$_SESSION['login']['id']=1;
			$_SESSION['accessed']=1;
		
			header("location:".WEB_ADMIN_PATH."index.php");
			exit(1);
		}
		else
		{
			$_SESSION['error_login']="username or password is wrong please try again";
			header("location:".WEB_ADMIN_PATH."login.php");
		}
	break;
	
	
	
	
	case "client_login":
		unset($_POST['pageaction']);
		$condition=" password='".(md5($_POST['password']))."' and status='1' and type='3' and ( username='".$_POST['username']."' or alt_username ='".$_POST['username']."')";
		$ch=$obj_database->selectAllData(TB_PREFIX.'user',$condition,'ASC','id');
		if($ch)
		{
			$user_condition['id']=$ch[0]['useridfk'];
			$_SESSION['user_type']=$ch[0]['type'];
			$_SESSION['user']['username']=$ch[0]['username'];
			$user=$obj_database->selectAllData(TB_PREFIX.'user_detail',$user_condition,'ASC','id');
			$_SESSION['user']['name']=$user[0]['name'];
			$_SESSION['user']['image']=$user[0]['image'];
			$_SESSION['user']['type']=$user[0]['type'];
			$_SESSION['user']['email']=$user[0]['email'];
			$_SESSION['user']['mobile']=$user[0]['mobile'];
			$_SESSION['user']['id']=$user[0]['id'];
			$_SESSION['login']['id']=true;
			$data['lastlogin']=date('Y-m-d H:i:s');
			$_SESSION['error_login']="useassword is wrong please try again";
			$obj_database->updateData($data,TB_PREFIX."user",$ch[0]['useridfk'],'id');
			header("location:".WEB_ADMIN_PATH."user_index.php");
			exit(1);
		}
		else{
			$_SESSION['error_login']="username or password is wrong please try again, or Your account has not been activted yet.";
			header("location:".WEB_SITE_PATH."user/login/");
		}
	break;
	
	case "login":
	
	   $row=$obj_database->login($_POST['user'],$_POST['password']);
	   if($row)
	   {
	   //	echo $row['usertype'];
	   		$_SESSION['login']=1;
			$_SESSION['userId']='0';
			if($row['usertype']==1)
			{
	   		header('location:index.php');
			exit(0);
			}
			else
			{
			header('location:guest/index.php');
			exit(0);
			}
	   }
	   else
	   {
		   $_SESSION['error']="1";
		   header("location:login.php");
		   exit(0);
	   }
	break;	

//************************************************Place manager*******************************************************/

	case "add_state":
	
	$places=explode(",",checkData($_POST['place']));
	$data['type']=checkData($_POST['type']);
	$data['parent']=checkData($_POST['parent']);
	$data['status']=1;
	foreach($places as $pl)
	{
	$data['place']=$pl;
	$d=$obj_database->selectAllData(TB_PREFIX."place","parent='".$data['parent']."' and place='".$data['place']."'","asc","id");
	if(sizeof($d)==0)
	{
	$obj_database->insertData($data,TB_PREFIX."place");
	}
	}
	$_SESSION['add']=2;
	header("location:".WEB_SITE_PATH."/state.php?success=1&parent=".$data['parent']."&type=".$_POST['ty']);
	break;
	
	//************************************************Place manager*******************************************************/

	case "edit_place":
	    
	$data['place']=$_POST['place'];
	$obj_database->updateData($data,TB_PREFIX.'place',$_POST['id'],"id");
	header("location:".WEB_SITE_PATH."/state.php?success=1&parent=".$_POST['parent']."&type=".$_POST['type']);
	break;
	
	/**************************************EPIN/***********************************************************/
	
	case "add_pin":

	$data['allocated_to']=$_POST['sponsor_id'];
	$data['amount']=$_POST['amount'];
	$data['transaction_id']=$_POST['transaction_id'];
	$data['status']=1;
	for($i=0;$i<$_POST['no_of_pin'];$i++)
	{
		$data['e_pin']="PBVY".time().substr(md5(microtime()),rand(0,26),5);
		$obj_database->insertData($data,TB_PREFIX."epin");
	}
	header("location:".WEB_ADMIN_PATH."epin.php");
	
	break;

	case "add_renewal":
	if($_POST['frequency']==1)
	{
		$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 30, date('Y')));
		$re=$obj_database->selectAllData(TB_PREFIX."renewal","user_id='".$_POST['member_id']."' and transaction_date >'".$date."'","desc","id");
	}
	else if($_POST['frequency']==2)
	{
		$date = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d'), date('Y')-1));
		$re=$obj_database->selectAllData(TB_PREFIX."renewal","status='1'and user_id='".$_POST['user_id']."' and transaction_date <'".$date."'","desc","id");		
	}
	else
	{
		$re=$obj_database->selectAllData(TB_PREFIX."renewal","status='1'and user_id='".$_POST['user_id']."'","desc","id");		
	}
	if(sizeof($re)>0)
	{
		header("location:".WEB_ADMIN_PATH."add_renewal.php?error=exist");
	}
	else
	{
		$data['user_id']=$_POST['member_id'];
		$data['reciever_id']=$_SESSION['user_detail']['username'];
		$data['amount']=$_POST['amount'];
		$data['frequency']=$_POST['frequency'];
		$data['remarks']=$_POST['remark'];
		$data['transaction_date']=date('Y-m-d');
		$data['status']=0;
		if($obj_database->insertData($data,TB_PREFIX."renewal"))
		{
		header("location:".WEB_ADMIN_PATH."renewal.php");	
		}
	}
	break;
	
	
	case "request_epin":
	unset($_POST['pageaction']);
	$data=$_POST;
	if(isset($_FILES['proof']) && $_FILES['proof']['error']==0)
		{
			$data['proof']=rand().create_filename($_FILES['proof']['name']);
		}
	$data['status']=0;
	$data['user_id']=$_SESSION['user_detail']['username'];
	
	if($obj_database->insertData($data,TB_PREFIX."epin_request"))
	{
		if($data['proof']!='')
		{
			move_uploaded_file($_FILES['proof']['tmp_name'],"../proof/".$data['proof']);
		}
	header("location:".WEB_ADMIN_PATH."requested_pin.php");
	}
	break;
	
case "transfer_pin":
		unset($_POST['pageaction']);
		unset($_POST['DataTables_Table_0_length']);
		$sql="UPDATE ".TB_PREFIX."epin set allocated_to='".$_POST['user_id']."' where id IN ";
		$ids='';
		foreach($_POST['ids'] as $id)
		{
		$ids.=$id.",";
		}
		$ids=rtrim($ids,",");
		$sql.="(".$ids.");";
		mysql_query($sql);
    	header("location:".WEB_ADMIN_PATH."epin.php");
	 break;

	/******************************Employee manager************************************************************/

	case "add_employee":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='".$_POST['user_type']."'","asc","id");
		$pre=$rank[0]['prefix'];
		$designation=$rank[0]['rank'];
// 		if($_POST['user_type']==10)
// 		{
// 			$amount=1100;
// 		}
// 		else if($_POST['user_type']==9)
// 		{
// 			$amount=2100;
// 		}
// 		else if($_POST['user_type']==8)
// 		{
// 			$amount=2100;
// 		}
// 		else
// 		{
// 			$amount=0;
// 		}
        $amount=750;
		$nou=$obj_database->selectAllData(TB_PREFIX."user","type!='14' ","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",rand(100,900)+10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['work_area']=checkData($_POST['work_area']);

		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		$data['epin']=checkData($_POST['epin']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		if($obj_database->insertData($data,TB_PREFIX.'user_detail'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$password=$data2['username'];
			$data2['password']=md5($data['username']);
					/*epin section*/
		            $e_data['status']=2;
					$e_data['used_date']=date('Y-m-d h:i:s');
					$e_data['used_for']=$data2['username'];
					$obj_database->updateData($e_data,TB_PREFIX."epin",$data['epin'],"e_pin");
					/*epin section*/
		$data2['status']=1;
		$data2['type']=checkData($rank[0]['type']);;
		$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
        $api_key = '35E2110A46C1C0';
        $contacts = $data['mobile'];
        $from = 'PRAGTI';
        $msg="Dear ".$data['name'].", Welcome to Pragati Bal Vikas Yojna. You have been successfully Registered with us as a ".$designation.".Your user Id is ".$data['username']." ";
		$msg.=" & Password is ".$password;
        $sms_text = urlencode($msg);
        $api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=".$api_key."&campaign=0&routeid=13&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
        $response = file_get_contents( $api_url);
					if($amount>0)
					{
					$comp=$obj_database->selectAllData(TB_PREFIX."user_detail","user_type='1'","desc","id");
					$data3['username']=$comp[0]['username'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=$amount;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$amount." Rupees Comission for join new volutnteer";
							
							$obj_database->insertData($data3,TB_PREFIX."user_account");
					}
					$_SESSION['reg_succes']=1;
					
					header("location:".WEB_ADMIN_PATH."employee.php");
					exit;
		
		}	
		}
	break;
	
		case "add_student":
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='".$_POST['user_type']."'","asc","id");
		$pre=$rank[0]['prefix'];
		$designation=$rank[0]['rank'];
		if($_POST['user_type']==10)
		{
			$amount=1100;
		}
		else if($_POST['user_type']==9)
		{
			$amount=2100;
		}
		else if($_POST['user_type']==8)
		{
			$amount=2100;
		}
		else
		{
			$amount=0;
		}
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['name']=checkData($_POST['name']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);	
				
		/****************************Acadmic**********************************/
		$data['cast']= checkData($_POST['cast']);
		$data['category']= checkData($_POST['category']);
		$data['school']= checkData($_POST['school']);
		$data['school_address']= checkData($_POST['school_address']);
		$data['board']= checkData($_POST['board']);
		$data['class']= checkData($_POST['class']);
		
		/****************************Bank**********************************/
		
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		if($obj_database->insertData($data,TB_PREFIX.'student'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$data2['password']=md5($data['username']);
		$data2['status']=1;
		$data2['type']=checkData($rank[0]['type']);;
		$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
	    $msg="Dear ".$data['name'].", Welcome to help life foundation. You have been successfully Registered with us as a ".$designation.".Your user Id is ".$data['username']." and password is ".$data['username'];
		$msg.=" & Password is ".trim($data2['password']);
		$url="http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=".$data['mobile']."&text=".urlencode($msg)."&route=17";
  file_get_contents($url);
 
					if($amount>0)
					{
					$comp=$obj_database->selectAllData(TB_PREFIX."user_detail","user_type='1'","desc","id");
					$data3['username']=$comp[0]['username'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=$amount;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$amount." Rupees Comission for join new volutnteer";
							
							$obj_database->insertData($data3,TB_PREFIX."user_account");
					}
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."manage_studentphp");
					exit;
		
		}	
		}
	break;
	

		case "add_teacher":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='".$_POST['user_type']."'","asc","id");
		$pre="PBRT";
		$designation=$rank[0]['rank'];

		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['sponsor1']=checkData($_POST['sponsor1']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);		
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		print_r($data);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		if($obj_database->insertData($data,TB_PREFIX.'user_detail_new'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$data2['password']=md5($data['username']);
		$data2['status']=1;
		$data2['type']=checkData($rank[0]['type']);;
		$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
	    $msg="Dear ".$data['name'].", Welcome to help life foundation. You have been successfully Registered with us as a ".$designation.".Your user Id is ".$data['username']." and password is ".$data['username'];
		$msg.=" & Password is ".trim($data2['password']);
		$url="http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=".$data['mobile']."&text=".urlencode($msg)."&route=17";
  file_get_contents($url);
 
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_teacher.php?action=edit&success=1&id=".$data2['useridfk']);
					exit;
		
		}	
		}
	break;
	
	case "edit_student":
	    $data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['name']=checkData($_POST['name']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);	
				
		/****************************Acadmic**********************************/
		$data['cast']= checkData($_POST['cast']);
		$data['category']= checkData($_POST['category']);
		$data['school']= checkData($_POST['school']);
		$data['school_address']= checkData($_POST['school_address']);
		$data['board']= checkData($_POST['board']);
		$data['class']= checkData($_POST['class']);
		
		/****************************Bank**********************************/
		
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if($_POST['user_type']!='')
		{
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
				if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		if($obj_database->updateData($data,TB_PREFIX.'student',$_POST['id'],"id"))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_student.php?action=edit&id=".$_POST['id']);
					exit;
		}
	
	case "edit_teacher":
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['sponsor1']=checkData($_POST['sponsor1']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);		
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		$data['user_type']=checkData($_POST['user_type']);
		$data['added_by']=checkData($_SESSION['user_detail']['username']);
			
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		if($obj_database->updateData($data,TB_PREFIX.'user_detail_new',$_POST['id'],"id"))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_teacher.php?action=edit&id=".$_POST['id']);
					exit;
		}
	

	case "edit_employee":
		
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['state']=checkData($_POST['state']);
		$data['district']=checkData($_POST['district']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);	
		$data['work_area']=checkData($_POST['work_area']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		/***************************Sponsor***********************************************/
		
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		$data['user_type']=checkData($_POST['user_type']);
	
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		if($obj_database->updateData($data,TB_PREFIX.'user_detail',$_POST['id'],"id"))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_employee.php?action=edit&id=".$_POST['id']);
					exit;
		}
	break;
	
	
	case "edit_bank_info":
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		
		if($obj_database->updateData($data,TB_PREFIX.'user_detail',$_SESSION['user_detail']['id'],"id"))
		{
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."index.php?bank_msg=bank_success");
					exit;
		}
	break;
	
/*********************************************************************************************************************/	
	case "add_user":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='11'","asc","id");
		$pre=$rank[0]['prefix'];
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['nominee_gender']=checkData($_POST['nominee_gender']);
		$data['nominee_dob']=date('Y-m-d',strtotime(checkData($_POST['nominee_dob'])));
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['age']=checkData($_POST['age']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['district']=checkData($_POST['district']);
		$data['state']=checkData($_POST['state']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['aadhar']=checkData($_POST['aadhar']);
		$data['epin']=checkData($_POST['epin']);
		/************Nominee**************************************/
		
		$data['nominee']=checkData($_POST['nominee']);
		$data['nominee_relation']=checkData($_POST['nominee_relation']);
		$data['nominee_title']=checkData($_POST['nominee_title']);
		$data['nominee_address']=checkData($_POST['nominee_address']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		
		/***************************Sponsor***********************************************/
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		$data['added_by']=checkData($_SESSION['user_detail']['username']);

		$data['user_type']=11;
		$data['amount']=checkData($_POST['amount']);
		
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		
		if($obj_database->insertData($data,TB_PREFIX.'member_detail'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$data2['status']=1;
			$data2['password']=md5($data['username']);
			$data2['type']=5;
			$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
		$msg="Dear ".$data['name'].", Welcome to Help Life Foundation.You have been successfully Registered with us.Your user Id is ".$data['username']." and password is ".$data['username'];
		 	$url="http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=".$data['mobile']."&text=".urlencode($msg)."&route=17";
            file_get_contents($url);
		    	$e_data['status']=2;
					$e_data['used_date']=date('Y-m-d h:i:s');
					$e_data['used_for']=$data2['username'];
					$obj_database->updateData($e_data,TB_PREFIX."epin",$data['epin'],"e_pin");
					
							$data3['username']=$data['sponsor_id'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=200;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$data3['transaction_amount']." Rupees Comission for join new Member";
							$obj_database->insertData($data3,TB_PREFIX."user_account");
							
							$bv=$obj_database->selectAllData(TB_PREFIX."user_detail","status='1' and block='".$_SESSION['user_detail']['block']."' and user_type='9'","desc","id");
							$data3['username']=$bv[0]['username'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=50;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$data3['transaction_amount']." Rupees Comission for join new Member";							
							$obj_database->insertData($data3,TB_PREFIX."user_account");
							
							
							$bv=$obj_database->selectAllData(TB_PREFIX."user_detail","status='1' and district='".$_SESSION['user_detail']['district']."' and user_type='8'","desc","id");
							$data3['username']=$bv[0]['username'];
							$data3['transaction_type']=1;
							$data3['transaction_for']=$data2['useridfk'];
							$data3['transaction_amount']=15;
							$data3['transaction_date']=date('Y-m-d');
							$data3['status']=1;
							$data3['remarks']=$data3['transaction_amount']." Rupees Comission for join new Member";							
							$obj_database->insertData($data3,TB_PREFIX."user_account");
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_user.php?username=".$data['username']."&success=1");
					exit;
		
		}	
		}
	break;
	
	
/*********************************************************************************************************************/	
	case "add_old_user":
		
		$rank=$obj_database->selectAllData(TB_PREFIX."user_rank","id='11'","asc","id");
		$pre='HLO';
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		$data['username']=checkData($pre.sprintf("%06d",10000+sizeof($nou)));
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['nominee_gender']=checkData($_POST['nominee_gender']);
		$data['nominee_dob']=date('Y-m-d',strtotime(checkData($_POST['nominee_dob'])));
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['age']=checkData($_POST['age']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['district']=checkData($_POST['district']);
		$data['state']=checkData($_POST['state']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['aadhar']=checkData($_POST['aadhar']);
		
		$data['nominee']=checkData($_POST['nominee']);
		$data['nominee_relation']=checkData($_POST['nominee_relation']);
		$data['nominee_title']=checkData($_POST['nominee_title']);
		$data['nominee_address']=checkData($_POST['nominee_address']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		
		/***************************Sponsor***********************************************/
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		$data['added_by']=checkData($_SESSION['user_detail']['username']);

		$data['user_type']=11;
		$data['amount']=checkData($_POST['amount']);
		
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		$data['status']=1;
		
		if($obj_database->insertData($data,TB_PREFIX.'member_detail'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$data2['status']=1;
			$data2['password']=md5($data['username']);
			$data2['type']=5;
			$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
		$msg="Dear ".$data['name'].", Welcome to Help Life Foundation.You have been successfully Shifted Old to New with us.Your user Id is ".$data['username']." and password is ".$data['username'];
		 	$url="http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=".$data['mobile']."&text=".urlencode($msg)."&route=17";
                file_get_contents($url);
		    		$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_user.php?username=".$data['username']."&success=1");
					exit;
		
		}	
		}
	break;
	
	
	
	case "edit_user":
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['age']=checkData($_POST['age']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['district']=checkData($_POST['district']);
		$data['nominee_dob']=date('Y-m-d',strtotime(checkData($_POST['nominee_dob'])));
		$data['state']=checkData($_POST['state']);
		$data['block']=checkData($_POST['block']);
		$data['panchayat']=checkData($_POST['panchayat']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['aadhar']=checkData($_POST['aadhar']);
		$data['epin']=checkData($_POST['epin']);
		/************Nominee**************************************/
		
		$data['nominee']=checkData($_POST['nominee']);
		$data['nominee_relation']=checkData($_POST['nominee_relation']);
		$data['nominee_title']=checkData($_POST['nominee_title']);
		$data['nominee_address']=checkData($_POST['nominee_address']);
		
		/****************************Bank**********************************/
		
		$data['bank_name']=checkData($_POST['bank_name']);
		$data['account_holder']=checkData($_POST['name']);
		$data['bank_account']=checkData($_POST['bank_account']);
		$data['bank_branch']=checkData($_POST['bank_branch']);
		$data['bank_ifsc']=checkData($_POST['bank_ifsc']);
		$data['pan']=checkData($_POST['pan']);
		
		/***************************Sponsor***********************************************/
		$data['sponsor_id']=checkData($_POST['sponsor_id']);
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		if($obj_database->updateData($data,TB_PREFIX.'member_detail',$_POST['id'],"id"))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_user.php?username=".$data['username']);
					exit;
		}	
	break;
	
	
	
	case 'pin_request_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'epin_request','status',$_GET['status'],$ids,'id'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."requested_pin.php");
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."requested_pin.php");
	}
	break;
	
	case 'user_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'member_detail','status',$_GET['status'],$ids,'username'))
	{
	$obj_database->changeStatus(TB_PREFIX.'user','status',$_GET['status'],$ids,'username');
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."manage_users.php");
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."manage_users.php");
	}
	break;
	
	
	case 'renewal_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'renewal','status',$_GET['status'],$ids,'id'))
	{
		$_SESSION['success']='1';
		if($_GET['status']==1)
		{
		header("location:".WEB_ADMIN_PATH."renewal.php");
		}
		else
		{
			header("location:".WEB_ADMIN_PATH."inactive_renewal.php");	
		}
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."manage_users.php");
	}
	break;
	
	
	case 'emp_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'user_detail','status',$_GET['status'],$ids,'username'))
	{
	$obj_database->changeStatus(TB_PREFIX.'user','status',$_GET['status'],$ids,'username');
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."employee.php");
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."employee.php");
	}
	
	break;
	
	case 'tech_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'user_detail_new','status',$_GET['status'],$ids,'username'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."teacher.php");
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."teacher.php");
	}
	
	break;
	
	case 'std_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'member_detail_new','status',$_GET['status'],$ids,'username'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."student.php");
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."student.php");
	}
	
	break;
	case 'job_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'registration','status',$_GET['status'],$ids,'id'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."job_data.php");
	}

	
	break;
	
	case 'password_reset':

	$data['password']=md5($_POST['password']);
	if($obj_database->updateData($data,TB_PREFIX.'user',$_POST['username'],'username'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."manage_users.php");
	}
	
	break;
case 'change_pic':if(isset($_FILES['image']) && $_FILES['image']['error']==0){	$data['image']=rand().create_filename($_FILES['image']['name']);		if(move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']))	{	if($obj_database->updateData($data,TB_PREFIX.'user_detail',$_SESSION['user_detail']['username'],'username'))	{	$_SESSION['user_detail']['image']=$data['image'];	$_SESSION['success']='1';	header("location:".WEB_ADMIN_PATH."index.php");	}	}	else{	$_SESSION['success']='0';	header("location:".WEB_ADMIN_PATH."index.php");	}}		break;		case 'change_password':	$data['password']=md5($_POST['password']);	if($obj_database->updateData($data,TB_PREFIX.'user',$_SESSION['user_detail']['username'],'username'))	{	$_SESSION['success']='1';	header("location:".WEB_ADMIN_PATH."manage_users.php");	}	break;
case "payout":
$data['username']=$_POST['user_id'];
$data['transaction_type']=2;
$data['transaction_amount']=$_POST['amount'];
$data['transaction_date']=date('Y-m-d');
$data['remarks']="Payment Transfered";
$data['transaction_for']="withdrawl";
if($obj_database->insertData($data,TB_PREFIX."user_account"))
{
	header("location:".WEB_ADMIN_PATH."my_wallet.php?msg=payment Transfered successfully&username=".$_POST['user_id']);
	exit;
}
break;
        /******************Add Wallet Amount Section******************************/
        
        case "add_wallet":
        $check=$obj_database->selectAllData(TB_PREFIX."user_detail","username='".$_POST['aname']."'","desc","id"); 
        if($check[0]['alternate_wallet']>=$_POST['amount'])
        {
          $sql="update ".TB_PREFIX."user_detail set alternate_wallet=alternate_wallet-'".$_POST['amount']."' where username='".$_POST['aname']."'";  
          mysql_query($sql);
           $sql="update ".TB_PREFIX."user_detail set alternate_wallet=alternate_wallet+'".$_POST['amount']."'and  where username='".$_POST['name']."'";  
          mysql_query($sql);
         
        }
	    else
	    {
	        echo "Your Balance is low";
	    }
        $data['trans_form']=sanitizeData($_POST['aname']);
		$data['trans_to']=sanitizeData($_POST['userid']);
		$data['name']=sanitizeData($_POST['name']);
		$data['amount']=sanitizeData($_POST['amount']);
		$data['status']=1;
		if($obj_database->insertData($data,TB_PREFIX.'add_wallet_amount'))
		{
			
		$_SESSION['success']=1;

		header("location:".WEB_ADMIN_PATH."employee.php");
		exit;
		}
		else{
			
			$_SESSION['success']=0;

		header("location:".WEB_ADMIN_PATH."employee.php");
		exit;
		}
	break;
    case 'report_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'add_wallet_amount','status',$_GET['status'],$ids,'id'))
	{
	$_SESSION['success']='1';
	header("location:".WEB_ADMIN_PATH."manage_account_report.php?type=".$_GET['type']);
	}
	else
	{
	$_SESSION['success']='0';
	header("location:".WEB_ADMIN_PATH."manage_account_report.php?type=".$_GET['type']);
	}
	
	break;
        /******************End of Wallet Amount Section******************************/
    case "multi_user_sms":
        
		$data['user_no']=sanitizeData($_POST['user_no']);
		$data['message']=sanitizeData($_POST['message']);
		$data['status']=1;		
		if($obj_database->insertData($data,TB_PREFIX.'multi_sms'))
		{
		$_SESSION['success']=1;
		$msg=urlencode($data['message']);
		file_get_contents("http://bulksms.sonisoft.in/api/mt/SendSMS?user=HLFORG&password=hlf@123&senderid=HLFORG&channel=Trans&DCS=0&flashsms=0&number=".$data['user_no']."&text=".$msg."&route=17");


		header("location:".WEB_SITE_PATH."/send_sms.php");
		exit;
		}
		else
		{			
		$_SESSION['success']=0;
		header("location:".WEB_SITE_PATH."/send_sms.php");
		exit;
		}
	break;	
}
?> 