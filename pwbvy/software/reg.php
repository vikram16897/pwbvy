<?php
include("header.php");
include("menu.php");
if (isset($_POST) && isset($_POST['message'])) {
    $msg = $_POST['message'];
    $api_key = '45E1F4CCA63D63';
    $from = 'PBVYTM';
    $sms_text = urlencode($msg);
    $phones = explode(",", $_POST['phones'][0]);
    foreach ($phones as $phone) {
        $api_url = "https://sms.textmysms.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=13&type=text&contacts=" . $phone . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=2';
        $response = file_get_contents($api_url);
    }
}
if ($_GET['page'] == '') {
    $start = 0;
    $nex = 1;
    $pre = -1;
} else {
    $start = $_GET['page'] * 100;
    $nex = $_GET['page'] + 1;
    $pre = $_GET['page'] - 1;
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $epin = $obj_database->GetDataByQuery("SELECT `id`,`name`,`phone`,`place`,`father`,`email`,`appllied_for`,`position`,`added_on`,application_no,status FROM `ngo_registration`  Where (name like '%" . $_GET['query'] . "%' or phone like '%" . $_GET['query'] . "%') ");
    if (isset($_GET['status']) && $_GET['status'] != "") {
        $epin = $obj_database->GetDataByQuery("SELECT `id`,`name`,`phone`,`place`,`father`,`email`,`appllied_for`,`position`,`added_on`,application_no,status FROM `ngo_registration`  Where (status ='" . $_GET['status'] . "') order by id desc ");
    }

} else {
    $epin = $obj_database->GetDataByQuery("SELECT `id`,`registrationid`,`name`,`email`,`mobile`,`dob`,`screenshot`,`added_on`,status FROM `ngo_onlinetestregistration` ORDER BY id DESC LIMIT $start,100");
}

?>
<script>
</script>
<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">All job data</a>
            </li>
            <li>
                <a href="#">job data</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12 col-lg-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i>All Registration
                        (<?php echo $total = $obj_database->GetCount("SELECT count(*) as count from ngo_onlinetestregistration"); ?>)
                    </h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"
                                title="Add Job Categories"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php if (isset($_SESSION['add']) && $_SESSION['add'] == 1) { ?>
                        <?php unset($_SESSION['add']);
                    } ?>
                    <div class="container">

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <form class="form-group" action="" method="get" enctype="multipart/form-data">
                                <input type="text" placeholder="Name or Mobile no." name="query">
                                <?php if ($_SESSION['user_detail']['user_type'] == 1) { ?>
                                    <select name="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                <?php } ?>
                                <input type="submit" Value="search" name="Search" />
                                <a href="job_data.php?page=<?php echo $nex ?>" class="btn btn-primary">Next 100</a>
                                &nbsp;
                                <?php if ($pre != -1) { ?>
                                    <a class="btn btn-primary" href="job_data.php?page=<?php echo $pre ?>">Pre 100</a>
                                <?php } ?>

                                <!--<button type="submit" class="btn btn-primary">Print ID</button><br />-->

                            </form>
                        </div>
                        <div class="col-md-4">
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Message
                            </button> -->
                            <!-- <input class="btn btn-primary"
                                onclick="window.open('admitcardupdate.php','swindow','statusbar=1,scrollbars=1')"
                                visible="false" type="button" class="button" value="Update Admit Card Details"> -->
                        </div>
                    </div>
                    <form class="form-group" action="eventmanager/controller.php" method="post">
                        <input type="hidden" name="pageaction" value="transfer_pin">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>screenshot</th>
                                    <th>Joining Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $count = 1;

                                foreach ($epin as $pin) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        </td>
                                        <td><?php echo $pin['registrationid'] ?></td>
                                        <td><?php echo $pin['name'] ?></td>
                                        <td><?php echo $pin['email'] ?> </td>
                                        <td><?php echo $pin['mobile'] ?> </td>
                                        <td><a href="../scholarship/screenshot/<?php echo $pin['screenshot']; ?>"><img
                                                    style="width: 100px;"
                                                    src="../scholarship/screenshot/<?php echo $pin['screenshot']; ?>" /></a>
                                        </td>
                                        <td><?php echo date('d-m-Y', strtotime($pin['added_on'])) ?></td>
                                        <td class="center">
                                            <?php if ($GLOBALS['usertype'] == 1) { ?>
                                                <span
                                                    class="label label-default label-<?php echo ($pin['status'] == 1) ? "success" : "danger"; ?>"
                                                    label label-default"><a style="color:white"
                                                        href=" <?php if ($_SESSION['user_type'] <= 2) { ?>eventmanager/controller.php?pageaction=online&id=<?php echo $pin['id']; ?>&status=<?php echo ($pin['status'] == 1) ? "0" : "1";
                                                        } else
                                                            "#"; ?>"><?php echo ($pin['status'] == 1) ? "Active" : "Inactive"; ?></a></span>
                                                <br />
                                            <?php } ?>
                                            <a href="tel:<?php echo $pin['phone'] ?>">Call</a>
                                        </td>
                                    </tr>
                                    <?php $count++;
                                } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->


    <!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->



<hr>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Transfer Pin</h3>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" name="user_id" placeholder="Enter User Id">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-primary" value="Transfer Pin">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Messages</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Message :</label>
                        <textarea id="message" class="form-control" name="message"
                            placeholder="Write Your message here ......"></textarea>
                        <input type="hidden" name="phones[]" id="pnumbers">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
            </form>
        </div>
    </div>
</div>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace("description");
</script>
<script>
    $(document).ready(function () {
        $("#message").click(function () {
            var phonenumbers = [];
            $.each($("input[name='phones[]']:checked"), function () {
                phonenumbers.push($(this).val());
            });
            $("#pnumbers").val(phonenumbers);
        })
    })
</script>

</body>

</html>