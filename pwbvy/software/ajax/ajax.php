<?php
include("../setting/global.php");
$option=$_REQUEST['action'];
switch($option)
{
	
	case "get_subcat":
		$con['category_status']='1';
		$con['category_parent_id']=$_POST['id'];
		if($row=$obj_database->selectAllData(TB_PREFIX.'categories',$con,'ASC','category_id'))
		{
			foreach($row as $row)
			{
				echo "<option value='".$row['category_name']."'>".$row['category_name']."</option>";
			}
		}
		else
		{
				echo '<option value="0">none</option>';
		}
		break;
		
		case "get_code":
		$con['company_status']='1';
		$con['company_name']=$_POST['id'];
		if($row=$obj_database->selectAllData(TB_PREFIX.'companies',$con,'ASC','company_name'))
		{
			
				echo $row[0]['company_code'];
			
		}
		else
		{
				echo '0';
		}
		break;
		
		
		
		
}
?>
