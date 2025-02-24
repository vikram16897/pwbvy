<?php

function create_filename($str = '')

{

    $str = strip_tags($str); 

    $str = preg_replace('/[\r\n\t ]+/', ' ', $str);

    $str = preg_replace('/[\"\*\/\:\<\>\?\'\|]+/', ' ', $str);

    $str = strtolower($str);

    $str = html_entity_decode( $str, ENT_QUOTES, "utf-8" );

    $str = htmlentities($str, ENT_QUOTES, "utf-8");

    $str = preg_replace("/(&)([a-z])([a-z]+;)/i", '$2', $str);

    $str = str_replace(' ', '-', $str);

    $str = rawurlencode($str);

    $str = str_replace('%', '-', $str);

    return $str;

}





function sanitizeArrayData($data)

{

$correct_data=array();

foreach($data as $key => $val)

$correct_data[$key]=trim(mysql_real_escape_string(strip_tags(stripslashes($val))));

return $correct_data;

}

function sanitizeData($data)

{

return trim(mysql_real_escape_string(strip_tags(stripslashes($data))));

}



function showActionMessage($data)

{

if($data==1)

{

echo '<div class="form-group">

            <label style="color:green;font-size:18px;float:left;" class="control-label col-md-6" for="first-name">Your Data has been Successfully Saved </label>

	   </div>';

}

else if($data==2)

{

echo '<div class="form-group">

            <label style="color:red;font-size:18px;float:left;" class="control-label col-md-6" for="first-name">Your Data has not been Saved </label>

      </div>';

}

else

{



}

}





function checkData($data)

{

return trim(mysql_real_escape_string($data));

}

function get_current_date($data)

{



}



function get_current_date_time($data)

{



}



function upload_featured_image($data)

{



}







function sendsmsGET($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)

{



    $getData='mobileNos='.$mobileNumber.'&message='.urlencode($message).'&senderId='.$senderId.'&routeId='.$routeId;



    //API URL

    $url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey."&".$getData;





    // init the resource

    $ch = curl_init();

    curl_setopt_array($ch, array(

        CURLOPT_URL => $url,

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_SSL_VERIFYHOST => 0,

        CURLOPT_SSL_VERIFYPEER => 0



    ));





    //get response

    $output = curl_exec($ch);



    //Print error if any

    if(curl_errno($ch))

    {

        echo 'error:' . curl_error($ch);

    }



    curl_close($ch);



    return $output;

}

function login_session_check() {

if(isset($_SESSION['login']['id']) && $_SESSION['login']['id']==1)

{

	

}

else

{

header("location:".WEB_ADMIN_PATH."login.php");

exit();

}

}



function selectAllChildSponsor($sp_id)

{

$obj_sp_database=new Database();

$sp_array=array();

array_push($sp_array,$sp_id);

foreach($sp_array as $sp_new_id)

{

$sql="select * from mfc_user_detail where sponsor_id='".$sp_new_id['user_id']."' and status='1'";

$sp_res=mysql_query($sql);

while($sp_row=mysql_fetch_assoc($sp_res))

{

array_push($sp_array,$sp_row);

}

}

return $sp_array;

}


?>