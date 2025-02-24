<?php
include("../setting/global.php");
$option=$_REQUEST['action'];
switch($option)
{
	case "gallery_del":
		if($obj_database->delete(TB_PREFIX.'gallery',$_POST['id'],'status','image_id'))
		{
			echo "succes";
		}
		else
		{
			echo "sorry";
		}
		
	break;
	case "get_subcat":
		$con['category_status']='1';
		$con['category_parent_id']=$_POST['id'];
		if($row=$obj_database->selectAllData(TB_PREFIX.'categories',$con,'ASC','category_id'))
		{
			foreach($row as $row)
			{
				echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
			}
		}
		else
		{
				echo '<option value="0">none</option>';
		}
		break;
		
		
		
		
		/************************produc *********************************
		case "get_product":
$total=$obj_database->getRowCount(TB_PREFIX.'data','product_status');	
$limit=$_POST['limit'];
$offset=$_POST['offset'];	
$page=ceil($total/$limit);
$from=$offset*$limit;
$predis="inline";
$nexdis="inline";
if($offset>=($page-1))
{
	$next=$offset-1;
	$pre=$offset-1;
	$offset=$offset-1;
	$nexdis='none';
}
else if($offset<=0)
{
	if($page==1)
	{
	$next=0;
	$nexdis='none';
	}
	else
	{
	$next=1;
	}

	$pre=0;
	$offset=0;
	$predis='none';
}
else
{
	$next=$offset+1;
	$pre=$offset-1;
}
if($offset==($page-1))
{
	$to=$total;
}
else if($offset<($page-1)){
	$to=$from+$limit;
	
}
	
			if($row=$obj_database->selectLimitedData(TB_PREFIX.'data',0,'DESC','product_id',$limit,$from))
		{
			echo"<thead><tr class='headings'><th>
                                                    <input type='checkbox' class='tableflat'>
                                                </th>
                                                <th>#</th>
                                                <th>Product name <img src='images/' </th>
                                                <th>Product Code </th>
                                                <th>Product Brand </th>
                                                <th>Tags </th>
                                                <th>Category</th>
												<th>Status</th>
                                                <th class=' no-link last'><span class='nobr'>Action</span>
                                                </th>
                                            </tr>
                                        </thead><tbody>";
			$i=1;
			$even='even';
			$odd='odd';
			foreach($row as $row)
			{
			$data=($i%2==0)?'even':'odd';
			$i++;
				echo '<tr class="'.$data.' pointer"><td class="a-center "><input type="checkbox" name="ids[]" value="'.$row['product_id'].'" class="tableflat"></td><td>'.($i-1).'</td><td class=" ">'.$row['product_name'].'</td><td class=" ">'.$row['product_code'].'</td><td class=" ">'.get_brand($row['product_brand']).'</td> <td class=" ">'.$row['product_tags'].'</td><td class=" ">'.get_category($row['product_category']).'</td><td class="a-right a-right ">'.get_product_status($row['product_status']).'</td> <td class=" last"><a href="product_view.php?product='.$row['product_id'].'"><img src="icons/user.png" /></a> &nbsp;<a href="add_product.php?action=edit&product='.$row['product_id'].'"><img src="icons/page_white_edit.png" /></a> &nbsp;<a href="manage_product_gallery.php?product='.$row['product_id'].'"><img src="icons/bricks.png" /></a></td> </tr>';
			}
			echo "<tr><td colspan='9'><span>Total No. of Page : ".$page." founds ".$from." - ".$to." of </span><strong>".$total."</strong><span> is showing</span> <span style='float:right;'><button type='button' id='".$pre."' class='btn btn-primary previousproduct' style='display:".$predis."'>Previous</button><button type='button' id='".$next."' class='btn btn-primary nextproduct' style='display:".$nexdis."'>Next</button></span></td></tr>";
			echo"</tbody>";	
		}
		else
		{
				echo '<option value="0">none</option>';
		}
			
		*/	
			break;
			
}
?>
