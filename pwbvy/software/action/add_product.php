<?php 
include_once("header.php");
?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3>Add or Edit Product</h3>
                        </div>
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>General Information<small>manage</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
									<form action="eventmanager/controller.php" method="post" enctype="multipart/form-data">
									<input type="hidden" name="pageaction" value="add_product">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Title  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="product_title" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Product Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="last-name" name="product_name" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Code</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="product_code">
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Product Brand</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input list="brand" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="product_brand">
                                            </div>
											<datalist id="brand">
											<option>xyz</option>
											<option>xyz</option>
											<option>xyz</option>
											<option>xyz</option>
											
											
											
											</datalist>
                                        </div>
                                        
                                        
                                        <div class="ln_solid"></div>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Product Description<small>Sessions</small></h2>
                              
                                

                             
                                
                                <div class="form-group">
                                  
                                    
                                        <textarea class="resizable_textarea form-control" name="product_desc" style="width: 100%; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 87px;"></textarea>
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#birthday').daterangepicker({
                                singleDatePicker: true,
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>


                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Design <small>different form elements</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div class="form-horizontal form-label-left input_mask">

                                                               

                                        

                                     

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Default Price</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="default_price" class="form-control" placeholder="Default Price">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Selling Price</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="selling_price" class="form-control" placeholder="Selling Price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Item in Stock </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" name="item_in_stock" class="form-control"  placeholder="Item In Stock">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Limit of Order</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="number" name="limit_of_order" class="form-control"  placeholder="Limit Of Order">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Enable order on out of stock <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                               <select class="form-control" name="order_out_of_stock">
											   <option value="0">No</option>
											   <option value="1">Yes</option>
											   </select>
                                            </div>
                                        </div>
                                       

                                    </div>
                                </div>
                            </div>

                            


                            


                        </div>

                        <div class="col-md-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Basic Elements <small>different form elements</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <div class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" name="product_category">
                                                    <option>Choose option</option>
                                                    <option>Option one</option>
                                                    <option>Option two</option>
                                                    <option>Option three</option>
                                                    <option>Option four</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Category</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" name="product_subcategory">
                                                    <option>Choose option</option>
                                                    <option>Option one</option>
                                                    <option>Option two</option>
                                                    <option>Option three</option>
                                                    <option>Option four</option>
                                                </select>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Tags</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input id="tags_3" type="text" name="product_tags" class="tags form-control" value="tag" />
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Size</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input id="tags_2" type="text" name="product_size" class="tags form-control" value="30,32" />
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                        </div>
										<div class="control-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">colour</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input id="tags_1" type="text" name="product_color" class="tags form-control" value="red,blue" />
                                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                            </div>
                                        </div>
										
                                        
                                        
                                        
                                                                        
                                        
                                        

                                        
                                        

                                        
                                        


                                        
                                        

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Extra Attributes <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            

                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">Attributes</button>
                                        </span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">Value!</button> 
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                    </div>

                                </div>
                            </div>
                        </div>
						<div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Status <small>Sessions</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            
                                     
												<input type="radio" class="flat" name="product_status" id="genderM" value="1" checked="" required /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Publish<br><br>
                                            <input type="radio" class="flat" name="product_status" id="genderF" value="0" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Draft
                                        </div>
                                        

                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    


                    


                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Featured Images & Gallary <small>different form elements</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
						<div class="form-group">
                                            

                                            <div class="form-group">
                                            

                                            <div class="col-sm-9">
											<label>Upload Fetured Image</label>
											
                                                <div class="input-group">
                                                
                                                    <input type="file" class="form-control" name="product_image">
                                                </div>
												<label>Upload Gallary Images</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" name="product_gallery[]" multiple>
                                               
                                                </div>
                                            </div>
											<div class="form-group">
                                            

                                            <div class="col-sm-3">
                                               
                                                
                                                    <img src="images/img.jpg" hieght="150" width="150">
													
												
                                               
                                                
                                            </div>
											<div class="col-sm-12">
												<div class="form-group">
                                            
                                                <button type="submit" class="btn btn-primary">Cancel</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            
                                        </div>
										</form>
										</div>
                                        </div>
                                        </div>
                                        </div>
                          
                            </div>

                        </div>
						
                    </div>
					
                </div>
                <!-- /page content -->

    
                <?php include("footer.php"); ?>