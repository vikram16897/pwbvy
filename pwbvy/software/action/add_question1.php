<?php include("header.php");
include("menu.php");
$board=$obj_database->selectAllData(TB_PREFIX."board","status='1'",'asc','name');
if(isset($_GET['id']) && $_GET['id']!='')
{
	$subject=$obj_database->selectAllData(TB_PREFIX."chapter","id='".$_GET['id']."' and status>'-1'","asc","id");
	$sub=$subject[0];
	$classes=$obj_database->selectAllData(TB_PREFIX."class","status='1' and board='".$sub['board']."'",'asc','name');

}

?>
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Question Manager </a>
        </li>
         <li>
            <a href="#"><?php if(isset($_GET['id']) && $_GET['id']!='') { ?>Update<?php } else {echo "Add"; } ?> Subject</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Question Information</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <br />
            <?php if(isset($_SESSION['add']) && $_SESSION['add']==1) { ?>
	 
	 <div class="alert alert-success" ><a href="javascript:void(0)">New Question has Been added Successfully.</a></div>
	
	<?php unset($_SESSION['add']); } else if(isset($_SESSION['update']) && $_SESSION['update']==1) { ?>
	 
	 <div class="alert alert-success" ><a href="javascript:void(0)">Question has Been Updated Successfully.</a></div>
	
	<?php unset($_SESSION['update']); } ?>
	
            <style >
			.cke_button__about
			{
				display:none!important;
			}
			</style>
            <div class="box-content">
                <form role="form" action="eventmanager/controller.php" method="post" enctype="multipart/form-data">
				<div class="form-group ">
               <?php if(isset($_GET['id']) && $_GET['id']!='') { ?>
                 
				 <input type="hidden" name="pageaction" value="update_question" />
				<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
			   <?php } else { ?>
			   <input type="hidden" name="pageaction" value="add_question" />
			   <?php } ?>
                        <label for="exampleInputEmail1">Question</label>
                        <input type="text" class="form-control" id="text" value="<?php echo (isset($sub['question'] ))?$sub['question']:""; ?>" placeholder="Name Of question" name="name" >
                    </div>   
                   
					<div class="form-group">
                        <label for="exampleInputEmail1">Answer</label>
                        <textarea class="form-control" id="description" placeholder="Description" name="answer"><?php echo (isset($sub['answer'] ))?$sub['answer']:""; ?></textarea>
						
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Question Type</label>
                       <select class="form-control" name="type">
					   <option  <?php echo (isset($sub['type'])&&$sub['type']==1)?"selected":""; ?> value='1'>Objective Question</option>
					   <option <?php echo (isset($sub['type'])&&$sub['type']==2)?"selected":""; ?> value='2'>Short Term Question</option>
					   <option <?php echo (isset($sub['type'])&&$sub['type']==3)?"selected":""; ?> value='3'>Long Term Question</option>
					   </select>
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Board</label>
                       <select class="form-control" name="board">
					   <option value=''>Select Board</option>
					   <?php foreach($board as $b) { ?>
					   <option value='<?php echo $b['id'] ?>' <?php echo (isset($sub['board'])&&$sub['board']==$b['id'])?"selected":""; ?>><?php echo $b['name'] ?></option>
					   <?php } ?>
					   </select>
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Class</label>
                       <select class="form-control" name="class">
					   <option value=''>Select Class</option>
					   <?php foreach($board as $b) { ?>
					   <option value='<?php echo $b['id'] ?>'><?php echo $b['name'] ?></option>
					   <?php } ?>
					   </select>
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Subject</label>
                       <select class="form-control" name="class">
					   <option value=''>Select Subject</option>
					   <?php foreach($board as $b) { ?>
					   <option value='<?php echo $b['id'] ?>'><?php echo $b['name'] ?></option>
					   <?php } ?>
					   </select>
                    </div>
					
				 <br><br><br><center>	
				 <?php if(isset($_GET['id']) && $_GET['id']!='') { ?>
                    <button type="submit" class="btn btn-primary">Update Chapter</button></center>
				 <? } else {?>
				  <button type="submit" class="btn btn-primary">Add Chapter</button></center>
				 <?php } ?>
					
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
   
    <!-- Ad ends -->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
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
CKEDITOR.replace( 'description',
    {
        filebrowserBrowseUrl : 'browse.php',
        filebrowserUploadUrl : 'upload.php'
    });
</script>

</body>
</html>

