<?php include("header.php");

	include("menu.php");

	if(isset($_GET['username']) && $_GET['username']!='')

	{

	$epin=$obj_database->selectAllData(TB_PREFIX."user_account","username='".$_GET['username']."'","asc","id");

	}

	else{

	$epin=$obj_database->selectAllData(TB_PREFIX."user_account","username='".$_SESSION['user_detail']['username']."'","asc","id");

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

                <a href="#">Wallet</a>

            </li>

            <li>

                <a href="#">View all Transaction Details</a>

            </li>

        </ul>

    </div>



    <div class="row">

    <div class="box col-md-12 col-lg-12">

    <div class="box-inner">

    <div class="box-header well" data-original-title="">

        <h2><i class="glyphicon glyphicon-user"></i><?php if($_GET['username']!='') { ?>Account Details of User <?php echo $_GET['username']; } else { echo "My Transactions"; }?></h2>



        <div class="box-icon">

            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog" title="Add Job Categories"></i></a>

            <a href="#" class="btn btn-minimize btn-round btn-default"><i

                    class="glyphicon glyphicon-chevron-up"></i></a>

            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>

        </div>

    </div>

    <div class="box-content">

	<?php if($_GET['username']!='' && ($_SESSION['user_type']==1 || $_SESSION['user_type']==2 )) { ?>
	<a class="btn btn-warning" data-toggle="modal" data-target="#payModal" href="#">Pay Now</a><br><br>
	<?php } ?>

		

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">

    <thead>

    <tr>

		<th>#</th>

        <th>Date</th>

        <th>Joined Member</th>

        <th>Transaction Type</th>

		<th>amount</th>

		<th>Remark</th>

		<th>Total</th>

	</tr>

    </thead>



    <tbody>

	<?php $total=0; foreach($epin as $pin) { ?>  

    <tr>

	

		<td><?php echo ++$count; ?></td>

		<td><?php echo date("d-M-Y H:i:s",strtotime($pin['added_on'])); ?></td>

        <td><?php if($pin['transaction_type']==1){$sp=$obj_database->selectAllData(TB_PREFIX."user_detail","id='".$pin['transaction_for']."'","desc","id"); echo $sp[0]['name']." [".$sp[0]['username']."]";} else "withdrawl"; ?></td>

		<td><?php echo ($pin['transaction_type']==1)?"Credited":"Debited" ?></td>

		<td><?php echo $pin['transaction_amount'] ?></td>

		<td><?php echo $pin['remarks'] ?></td>

		<td><?php echo ($pin['transaction_type']==1)$total+=$pin['transaction_amount']:$total-=$pin['transaction_amount']; ?></td>

    </tr>

	<?php } ?>

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



    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"

         aria-hidden="true">



        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">×</button>

                    <h3>Fund Transfer</h3>

                </div>

                <div class="modal-body">

                   <form action="eventmanager/controller.php" method="post">
					<input type="hidden" name="pageaction" value="payout">
				   <input type="text" class="form-control" name="user_id" placeholder="Enter User Id" readonly value="<?php echo $_GET['username'];?>" />
					<br><br><input type="number" class="form-control" placeholder="Please Enter Amount" name="amount" min="1" required max="<?php echo round($total); ?>">
                   

                    

				   

                </div>

                <div class="modal-footer">

                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>

                    <input type="submit" class="btn btn-primary" value="Payment">

					</form>

                </div>

            </div>

        </div>

    </div>

<?php include("footer.php"); ?>



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

</body>

</html>