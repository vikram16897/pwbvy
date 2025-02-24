<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online PRE/POST Scholarship Test 2020-21</title>
    <meta property="og:title" content="Online PRE/POST Scholarship TEST 2020-21">
    <meta property="og:description" content="The objectives of quiz contest and scholarship is to encourage students to look beyond their textual knowledge and establish a relationship between theory and application of the learnt concepts .">
    <meta property="og:image" content="banner.jpg">
    <meta property="og:url" content="https://pbvy.org/scholarship">
    <meta name="keywords" content="Online PRE/POST Scholarship TEST 2020-21"	>
    <link rel="shortcut icon" href="../favicon.ico" type="../image/x-icon" sizes="16x16" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .bg-light {
            background-color: #fef3dd!important;
        }
        body{
            background-image: url('background.jpg');
        }
        nav{
            background-image: url('background.jpg') !important;
        }
        .card{
            box-shadow: 1px 2px 14px 4px black ;
        }
        h4,h3{
            color: #fe9c00;
            text-shadow: 0 0 3px black;
            font-family: cursive;
        }
        #loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: block;
            opacity: 0.7;
            background-color: #fff;
            z-index: 99;
            text-align: center;
        }

        #loading-image {
        position: absolute;
        top: 30%;
        left: 34%;
        z-index: 100;
        }

        #uploadform{
            background: gainsboro;
            border: blueviolet;
            box-shadow: -2px 4px 12px 9px #af9191;
        }
        @media only screen and (max-width: 768px) {
            button{
                margin-top:10px;
            }
            #loading-image {
            position: absolute;
            top: 10%;
            left: -5%;
            z-index: 100;
        }
        .loadingpop-img{
            margin-left: -36%;
        }
        }

    </style>
</head>

<body>
    <div id="loading">
        <img id="loading-image" src="loader.gif" alt="Loading..." />
    </div>
    <nav class="navbar navbar-light bg-light">

    <a class="navbar-brand" href="#"><img src="../img/2017-11-16.png" alt="" width="100px"></a>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#exampleModal">
        Logout
    </button>
   <!-- Button trigger modal -->
    <p class="mt-4"><i class="fas fa-phone-volume"></i> <a href="tel:8797319705">+91 8797319705</a> (8 am to 10 pm)</p>
    </nav>

    <div class="row">
        <div class="col-md-4 p-4">
            <div class="card" data-toggle="modal" data-target="#exampleModal">
            <div class="card-body">
            <h3><i class="fa fa-user"></i>&nbsp;Update Profile</h3>
            </div>
            </div>
        </div>
        <div class="col-md-4 p-4">
            <div class="card" data-toggle="modal" data-target="#exampleModal">
            <div class="card-body">
            <h3><i class="fas fa-file"></i>&nbsp;Update Documents</h3>
            </div>
            </div>
        </div>

        <div class="col-md-4 p-4">
            <div class="card">
            <div class="card-body">
                <h3><i class="fas fa-print"></i>&nbsp;Recipt Download</h3>
            </div>
            </div>
        </div>
    </div>

    </div>

    <footer>
        <p align="center">© 2020-21 All right reserved by <span style="color: #fe9c00;font-weight: bold;">Pragati Bal</span><span style="color: #017f01;font-weight: bold;"> Vikas </span><span style="color: #fe9c00;font-weight: bold;">Yojna</span> | Email us: info@pbvy.org</p>
        <p align="center">Designed & Developed by <a style="color: #017f01;font-weight: bold;" href="http://virawebtech.com/">Vira Web Tech Solutions.</a></p>
    </footer>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="" id="form">
                    <div id='profile' class="p-2">
                    <center><h4 class="mb-2">Update Profile</h4></center>
                    <h5 class="mb-2" style="color:#017f01">Personal Details</h5>
                    <div class="form-group">
                        <label for="name">Student Name <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Father's Name <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Father's Name" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Mother's Name <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Mother's Name" name="mname" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Date of birth <span style="color:red;">*</span></label>
                        <input class="form-control" type="date" placeholder="Enter DOB" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email ID <span style="color:red;">*</span></label>
                        <input class="form-control" type="email" placeholder="Enter Email ID" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Mobile <span style="color:red;">*</span></label>
                        <input class="form-control" type="number" placeholder="Enter Mobile" name="mobile" required id="mobile" >
                    </div>
                    <div class="form-group">
                        <label for="name">Aadhar Number<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Aadhar Number" name="aadhar" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Select Category<span style="color:red;">*</span></label>
                        <select name="category" id="" class="form-control" required>
                            <option value="">Select Category</option>
                            <option>general</option>
                            <option>obc</option>
                            <option>sc/st</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Select Class<span style="color:red;">*</span></label>
                        <select name="class" id="" class="form-control" required>
                            <option value="">Select Class</option>
                            <option>8th</option>
                            <option>9th</option>
                            <option>10th</option>
                            <option>11th</option>
                            <option>12th</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5 class="mb-2 mt-2" style="color:#017f01">Account Details</h5><br>
                        <label for="name">Bank Name<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Bank Name" name="bank" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Account Holder Name <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Account Holder Name" name="accountholder" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Account Number<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Account Number" name="accountno" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Ifsc Code<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Ifsc Code" name="ifsc" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-sm btn-outline-primary" id="submit">Submit</button>
                    </div>
                    </div>
                    </form>
      </div>

<!-- document -->
<div class="modal fade" id="documentform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
                        <label for="name">Account Holder Name <span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Account Holder Name" name="accountholder" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Account Number<span style="color:red;">*</span></label>
                        <input class="form-control" type="text" placeholder="Enter Account Number" name="accountno" required>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='scholarship.js'></script>
</body>
</html>