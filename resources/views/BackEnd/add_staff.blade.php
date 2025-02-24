@extends("BackEnd.layout.main")
@section("main-section")
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page"><!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana</a></li>
                                <li class="breadcrumb-item active text-capitalize">Staff Add</li>
                            </ol>
                        </div>
                        <h4 class="page-title text-uppercase">Staff Add</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" action="https://www.pwbvyindia.org/master/staff/add" method="post" enctype="multipart/form-data">

                                  <div class="row">
                                     <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Staff Name <span class="text-danger">*</span></label>
                                                <input name="full_name"  type="text" id="mcat_id" required="" class="form-control" >

                                            </div>
                                        </div>

                                     <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Email <span class="text-danger">*</span></label>
                                                <input name="email"  type="text" id="email" required="" class="form-control" >

                                            </div>
                                        </div>

                                     <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Mobile <span class="text-danger">*</span></label>
                                                <input name="phone"  type="text" id="phone" required="" class="form-control" >

                                            </div>
                                        </div>

                                         <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Password <span class="text-danger">*</span></label>
                                                <input name="password" type="text" id="password" required="" class="form-control" >

                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Photo </label>
                                                <input type="file" name="photo"  id="mcat_id" class="form-control" >

                                            </div>
                                        </div>


                                         <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Aadhar No </label>
                                                <input name="aadhar" type="text" id="aadhar" class="form-control" >

                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">Pan No </label>
                                                <input name="pan" type="text" id="pan"  class="form-control" >

                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">GST No </label>
                                                <input name="gst" type="text" id="gst" class="form-control" >

                                            </div>
                                        </div>


                                         <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">A/C No </label>
                                                <input name="acc" type="text" id="acc" class="form-control" >

                                            </div>
                                        </div>


                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">A/C Holder Name </label>
                                                <input name="acc_name" type="text" id="acc_name" class="form-control" >

                                            </div>
                                        </div>


                                         <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mcat_id">IFSC Code </label>
                                                <input name="ifsc" type="text" id="ifsc" class="form-control" >

                                            </div>
                                        </div>





                                         <div class="col-sm-4">
                                    <div class="form-group" style="margin-top:20px;">
                                        <button type="submit"  class="btn btn-success  my-2" >Submit</button>
                                    </div>
                                    </div>

                                 </div>


                                </form>
					        </div>
					    </div>
					    </div>
					</div>
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection("main-section")
<script>
    $('#tcat_id').change(function(){
        var tcat_id = $(this).val();
        $.post("https://www.pwbvyindia.org/master/product/get_mid_category",
          {
              tcat_id: tcat_id
          },
          function(data){
            $('#mcat_id').html(data);
          });
    });

    $('#mcat_id').change(function(){
        var mcat_id = $(this).val();
        $.post("https://www.pwbvyindia.org/master/product/get_end_category",
          {
              mcat_id: mcat_id
          },
          function(data){
            $('#ecat_id').html(data);
          });
    });
</script>

<script>
    $("#btnAddSize").click(function () {
        var col = $("#size1").html();
        // var col2 = $("#color1").html();
        var count = $('.parent').find('.row').length;
        var col2 = '<label for="size">Product Color<span class="text-danger">*</span></label><select name="color['+count+'][]" class="form-control" multiple="multiple" id="color_more_'+count+'" data-placeholder="Select Product Color"></select>';

        var col3 = $("#price1").html();
        var col4 = $("#price2").html();
        var col5 = $("#stock1").html();
        var col6 = $("#stock2").html();

        var a  = '<div class="row bg-light py-2 border-bottom mb-2" id="ss'+count+'">';
        var a1 = '<div class="col-sm-12">';
        var a2 = '<a href="javascript:void()" onclick="rem('+count+')" class="Delete2 btn btn-danger btn-xs float-right">X</a>';
        var a3 = '</div>';
        var a4 = '<div class="col-sm-4">'+col+'</div>';
        var a5 = '<div class="col-sm-8">'+col2+'</div>';
        var a6 = '<div class="col-sm-3">'+col3+'</div>';
        var a7 = '<div class="col-sm-3">'+col4+'</div>';
        var a8 = '<div class="col-sm-3">'+col5+'</div>';
        var a9 = '<div class="col-sm-3">'+col6+'</div>';
        var a10 = '</div>';

        var row = a+a1+a2+a3+a4+a5+a6+a7+a8+a9+a10;

        $("#valueadd").append(row);
        multicolor(count);

    });

   /* $('#valueadd').delegate('a.Delete2', 'click', function () {
        $('.Delete2').closest('.parent').find('.row').not(':first').last().fadeOut("slow").remove();
    return false;
    });
    */

function rem(id)
{
  $("#ss"+id).fadeOut("slow").remove();
}
</script>

<script>
$("#statusTodaysActive").click(function(){
    if ($("#statusTodaysActive").is(":checked")) {
        $("#statusFeaturedBlock").prop('checked','true');
    }
});
$("#statusFeaturedActive").click(function(){
    if ($("#statusFeaturedActive").is(":checked")) {
        $("#statusTodaysBlock").prop('checked','true');
    }
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){
          $(this).parents(".control-group").remove();
      });
    });
</script>

<script>
    function multicolor(id){
            var width = $("#color1").width();
        $("#color_more_"+id).multiselect({
                buttonWidth: width+'px'
            });
    }
</script>

<script>
        $(function() {
            var width = $("#color1").width();
            $("#multi_color_new").multiselect({
                buttonWidth: width+'px'
            });
        });
</script>
