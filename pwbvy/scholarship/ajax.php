<?php
require('../software/setting/global.php');
if (isset($_FILES["screenshotafterpop"])) {
    $check = mysqli_query($GLOBALS['db'], 'SELECT screenshot from ngo_onlinetestregistration where registrationid="' . $_POST['registration_id'] . '" ');
    $row = mysqli_fetch_assoc($check);
    if ($row['screenshot'] != '') {
        unlink('screenshot/' . $row['screenshot'] . '');
    }
    $tmp_name = $_FILES["screenshotafterpop"]["tmp_name"];
    $newname = ("screenshot" . rand(10000, 99999)) . ".jpg";
    if (move_uploaded_file($tmp_name, "screenshot/" . $newname)) {
        $sql = 'UPDATE ngo_onlinetestregistration SET screenshot="' . $newname . '" where registrationid="' . $_POST['registration_id'] . '" ';
        $res = mysqli_query($GLOBALS['db'], $sql);
        echo "1";
    } else {
        echo "0";
    }
}

if (isset($_FILES["screenshotpop"])) {
    $check = mysqli_query($GLOBALS['db'], 'SELECT screenshot from ngo_onlinetestregistration where registrationid="' . $_POST['registrationid'] . '" ');
    $row = mysqli_fetch_assoc($check);
    if ($row['screenshot'] != '') {
        unlink('screenshot/' . $row['screenshot'] . '');
    }
    $tmp_name = $_FILES["screenshotpop"]["tmp_name"];
    $newname = ("screenshot" . rand(10000, 99999)) . ".jpg";
    if (move_uploaded_file($tmp_name, "screenshot/" . $newname)) {
        $sql = 'UPDATE ngo_onlinetestregistration SET screenshot="' . $newname . '" where registrationid="' . $_POST['registrationid'] . '" ';
        $res = mysqli_query($GLOBALS['db'], $sql);
        $response['status'] = 1;
        $response['message'] = "Registration successful.";
        $response['registration_id'] = $data['registrationid'];
    } else {
        $response['error'] = "Database insertion failed.";
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;

}

if (isset($_POST['phone'])) {
    $check = $obj_database->GetCount('SELECT count(*) as count FROM ngo_onlinetestregistration where mobile="' . $_POST['phone'] . '" ');
    if ($check > 0) {
        echo "0";
        die;
    }
    $otp = rand(100000, 999999);
    setcookie('otp', $otp);
    setcookie('mobile', $_POST['phone']);
    $api_key = '35E2110A46C1C0';
    $contacts = $_POST['phone'];
    $from = 'PRAGTI';
    $msg = "Dear Candidate , Your one time verification code for Online PRE/POST scholarship Test 2020-21 is " . $otp . " ";
    $sms_text = urlencode($msg);
    $api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text;
    $response = file_get_contents($api_url);
    echo $otp;
}
if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    if ($otp == $_COOKIE['otp']) {
        echo 1;
    } else {
        echo 0;
    }
}
if (isset($_POST['fname'])) {
    $data = array();
    $nou = $obj_database->GetCount("SELECT count(*) as count FROM ngo_onlinetestregistration");
    $data['registrationid'] = "PWST" . sprintf("%06d", (100000 + $nou));
    $data['name'] = $_POST['name'];
    $data['fname'] = $_POST['fname'];
    $data['mname'] = $_POST['mname'];
    $data['email'] = $_POST['email'];
    $data['mobile'] = $_POST['mobile1'];
    $data['aadhar'] = $_POST['aadhar'];
    $data['dob'] = date('Y-m-d', strtotime($_POST['dob']));
    $data['category'] = $_POST['category'];
    $data['class'] = $_POST['class'];
    $data['bank'] = $_POST['bank'];
    $data['accountholder'] = $_POST['accountholder'];
    $data['accountno'] = $_POST['accountno'];
    $data['ifsc'] = $_POST['ifsc'];
    $data['status'] = 0;
    // Attempt to insert data into the database
    if ($obj_database->insertSimple($data, 'ngo_onlinetestregistration')) {
        $response['status'] = 1;
        $response['message'] = "Registration successful.";
        $response['registration_id'] = $data['registrationid'];
        $response['name'] = $data['name'];
    } else {
        $response['error'] = "Database insertion failed.";
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
    // if ($obj_database->insertSimple($data, 'ngo_onlinetestregistration')) {
    //     // $_SESSION['registrationid'] = $data['registrationid'];
    //     // $api_key = '35E2110A46C1C0';
    //     // $contacts = $data['mobile'];
    //     // $from = 'PRAGTI';
    //     // $msg = "Dear " . $data['name'] . " , Your registration for Online PRE/POST scholarship Test 2020-21 is done successfully . Your account will be activated after your payment . Your registration id is " . $data['registrationid'] . " and password is " . $data['mobile'] . " . For more details visit to our website https://pbvy.org/scholarship . Thanks team PBVY .";
    //     // $sms_text = urlencode($msg);
    //     // $api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text;
    //     // $response = file_get_contents($api_url);
    //     // $to = $data['email'];
    //     // $subject = "Registration Successfull";
    //     // $message = "
    //     // <html>
    //     // <head>
    //     // <title>Online PRE/POST scholarship Test 2020-21</title>
    //     // </head>
    //     // <body>
    //     // <table>
    //     // <tr>
    //     // <td><p>" . $msg . "</p></td>
    //     // </tr>
    //     // <tr>
    //     // <td><img src='banner.jpg' width='100%'/></td>
    //     // </tr>
    //     // </table>
    //     // </body>
    //     // </html>
    //     // ";
    //     // $headers = "MIME-Version: 1.0" . "\r\n";
    //     // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    //     // $headers .= 'From: <pbvyorg@gmail.com>' . "\r\n";
    //     // $headers .= 'Cc: pbvyorg@gmail.com' . "\r\n";
    //     // mail($to, $subject, $message, $headers);
    //     echo "1";
    // } else {
    //     echo "0";
    // }
}
?>