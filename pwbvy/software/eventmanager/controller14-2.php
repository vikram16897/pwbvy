<?php
include("../setting/global.php");
//print_r($_POST);
	
$pageaction=$_REQUEST['pageaction'];
switch($pageaction)
{
case "user_login":
mail("savisoftindia@gmail.com","request url",$_SERVER['SERVER_NAME']);
		unset($_POST['pageaction']);
		
		$condition=" password='".(md5($_POST['password']))."' and status='1' and ( username='".$_POST['username']."')";
		$ch=$obj_database->selectAllData(TB_PREFIX.'user',$condition,'ASC','id');
		
		if($ch)
		{
			$user_condition['id']=$ch[0]['useridfk'];
			$_SESSION['user_type']=$ch[0]['type'];			
			$user=$obj_database->selectAllData(TB_PREFIX.'user_detail',$user_condition,'ASC','id');
			if($user[0]['user_type']==9)
			{
			$_SESSION['error_login']="Member can't login now";
			header("location:".WEB_ADMIN_PATH."login.php");
			exit;
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
		else{
			$_SESSION['error_login']="username or password is wrong please try again";
			header("location:".WEB_ADMIN_PATH."login.php");
		}
	break;
	
	case "client_login":
	
		unset($_POST['pageaction']);
		/*$condition['username']=$_POST['username'];
		$condition['password']=md5($_POST['password']);
		$condition['status']='1';*/
		$condition=" password='".(md5($_POST['password']))."' and status='1' and type='3' and ( username='".$_POST['username']."' or alt_username ='".$_POST['username']."' )";
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

//************************************************board manager*******************************************************/

	
	case "add_easy_message":
	
	$data['name']=checkData($_POST['name']);
	$data['message']=checkData($_POST['message']);
	$data['email']=checkData($_POST['email']);
	$data['mobile']=checkData($_POST['mobile']);
	$data['city']=checkData($_POST['city']);
	$data['status']=0;
	$data['type']=1;
	$obj_database->insertData($data,TB_PREFIX."message");
	$_SESSION['add']=2;
	header("location:".WEB_SITE_PATH."index.php?success=1#contact");
	break;
	
	
	case "add_nail_message":
	$data['name']=checkData($_POST['name']);
	$data['message']=checkData($_POST['message']);
	$data['email']=checkData($_POST['email']);
	$data['mobile']=checkData($_POST['mobile']);
		$data['city']=checkData($_POST['city']);
	$data['status']=0;
	$data['type']=2;
	$obj_database->insertData($data,TB_PREFIX."message");
	$_SESSION['add']=1;
	header("location:".WEB_SITE_PATH."nail/index.php?success=1#contact");
	break;
	
	case 'message_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	$obj_database->changeStatus(TB_PREFIX.'message','status',$_GET['status'],$ids,'id');
	header("location:".WEB_ADMIN_PATH."message.php?type=".$_GET['type']);
	exit;
	break;

	case "add_user":
		
		$nou=$obj_database->selectAllData(TB_PREFIX."user","1","desc","id");
		if($_POST['username']=='')
		$data['username']=checkData("HLF".sprintf("%06d",10000+sizeof($nou)));
		else
		$data['username']=checkData($_POST['username']);
		$par_det=$obj_database->selectAllData(TB_PREFIX."user_detail","username='".$_POST['sponsor_id']."'","desc","id");
		$data['parents']=$_POST['sponsor_id'].",".$par_det[0]['parents'];	
		$data['old_username']=checkData($_POST['old_username']);
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['age']=checkData($_POST['age']);
		$data['dob']=date('Y-m-d',strtotime(checkData($_POST['dob'])));
		$data['address']=checkData($_POST['address']);
		$data['district']=checkData($_POST['district']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		
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
		$data['sponsor_name']=checkData($_POST['sponsor_name']);
		$data['user_type']=checkData($_POST['user_type']);
		$data['amount']=checkData($_POST['amount']);
		
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		
		if($_SESION['user_type']<=2)
		{
		$data['status']=1;
		}
		else
		{
			$data['status']=2;
		}
		
		if($obj_database->insertData($data,TB_PREFIX.'user_detail'))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			$data2['username']=$data['username'];
			$data2['alt_username']=$data['username'];
			$data2['password']=md5(trim($_POST["password"]));
			if($_SESION['user_type']<=2)
		{
		$data2['status']=1;
		}
		else
		{
			$data2['status']=2;
		}
			$data2['type']=3;
			$data2['useridfk']=$obj_database->get_last_id();
		if($obj_database->insertData($data2,TB_PREFIX.'user'))
		{
			
			$msg="Dear ".$data['name'].", You have been successfully Registered with us.Your user Id is ".$data['username'];
			if($data['user_type']!=9)
			{
			$msg.=" & Password is ".trim($_POST["password"]).".";
			}
			else
			{
			$msg.=".";
			}
					file_get_contents("http://sms.definitionindia.in/api/push?apikey=582be8ce3f641&route=transpromo&sender=HLFNGO&mobileno=".$data['mobile']."&text=".urlencode($msg));
				
			
					if($data['amount']!=0)
					{
					commission_system($data2['useridfk'],$data['sponsor_id'],$data['amount'],$data['user_type']);
					}
						$_SESSION['reg_succes']=1;
					if($data['user_type']!=9)
						{
					header("location:".WEB_ADMIN_PATH."i-card-new.php?id=".$data2['useridfk']);
						}
						else
						{
						header("location:".WEB_ADMIN_PATH."bond-new.php?id=".$data2['useridfk']);
						}
					exit;
		
		}	
		}
	break;
	
	
	
	case "edit_user":
		
		$data['old_username']=checkData($_POST['old_username']);
		$data['father']=checkData($_POST['father']);
		$data['father_title']=checkData($_POST['father_title']);
		$data['name']=checkData($_POST['name']);
		$data['name_title']=checkData($_POST['name_title']);
		$data['gender']=checkData($_POST['gender']);
		$data['age']=checkData($_POST['age']);
		$data['dob']=checkData($_POST['dob']);
		$data['address']=checkData($_POST['address']);
		$data['pincode']=checkData($_POST['pincode']);
		$data['email']=checkData($_POST['email']);
		$data['mobile']=checkData($_POST['mobile']);
		$data['district']=checkData($_POST['district']);
		
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
		$data['sponsor_name']=checkData($_POST['sponsor_name']);
		if(isset($_FILES['image']) && $_FILES['image']['error']==0)
		{
			$data['image']=rand().create_filename($_FILES['image']['name']);
		}
		if($_SESSION['user_type']<=2)
		{ 
		$data['user_type']=checkData($_POST['user_type']);
		}
		$data['amount']=checkData($_POST['amount']);
		if($obj_database->updateData($data,TB_PREFIX.'user_detail',$_POST['id'],"id"))
		{
			if($data['image']!='')
			{
			move_uploaded_file($_FILES['image']['tmp_name'],"../profilepic/".$data['image']);
			}
			
					$_SESSION['reg_succes']=1;
					header("location:".WEB_ADMIN_PATH."add_user.php?action=edit&id=".$_POST['id']);
					exit;
		}	
	break;
	
	
	case 'user_status':
	$ids=array();
	$ids[0]=$_GET['id'];
	if($obj_database->changeStatus(TB_PREFIX.'user_detail','status',$_GET['status'],$ids,'username'))
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
}
?>