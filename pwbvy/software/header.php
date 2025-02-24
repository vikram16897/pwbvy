<?php
include('setting/global.php');
login_session_check();
$userWallet = $obj_database->GetDataByQuery('SELECT SUM(CASE WHEN transaction_type = 7 THEN transaction_amount ELSE 0 END) - SUM(CASE WHEN transaction_type = 8 THEN transaction_amount ELSE 0 END) AS balance FROM ngo_user_account WHERE username = "' . $_SESSION['user_detail']['username'] . '"');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-7369610400255246",
            enable_page_level_ads: true
        });
    </script>
    <meta charset="utf-8">
    <title><?php echo PANEL_MASTER ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/custom.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <link href='css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- jQuery -->

    <script src="bower_components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="webcam/webcam.min.js"></script>
    <script src="ajax.js"></script>
    <script src='js/jquery-customselect.js'></script>
    <link href='css/jquery-customselect.css' rel='stylesheet' />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.multiselect').select2();
        });
    </script>
    <link rel="shortcut icon" href="../favicon.ico">
    <style>
        thead {
            background-color: #40ace9 !important;
            color: white !important;
        }

        .boldtd {
            color: #40ace9 !important;
        }
    </style>

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <span
                    style="width:400px;"><?php echo PANEL_MASTER ?><!--img src="http://helplifefoundation.org.in/images/helplifefoundation-logo-2.png" width="80"--></span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <?php if ($_SESSION['user_detail']['user_type'] == 8) {
                        echo "<img src='https://www.insideredbox.com/images/ball_red.png'>";
                    } else {
                        echo "<img src='https://www.insideredbox.com/images/ball_green.png'>";
                    } ?><span class="hidden-sm hidden-xs"> <?php echo $_SESSION['user_detail']['name']; ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="edit_bank_info.php?action=edit">Bank account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span class="hidden-sm hidden-xs"> Change Theme /
                        Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu" style="margin-left:200px">
                <?php if ($_SESSION['accessed'] == '1') {
                    ?>
                    <li><a href="eventmanager/controller.php?pageaction=access_user&id=<?php echo $_SESSION['admin_id']; ?>"
                            target="_blank"><i class="fa fa-arrow-left"></i> Back To Panel</a></li>
                    <?php
                }
                ?>
                <li>
                    <form class="navbar-search pull-left">
                        <button type="submit" class="btn btn-success ">Wallet <i class="fa fa-inr"></i>
                            <?php echo $userWallet[0]['balance']; ?></button>
                    </form>
                </li>
            </ul>

        </div>
    </div>