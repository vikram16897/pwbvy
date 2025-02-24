@foreach ($DownloadEdit as $DownloadEditData)


<html><head><meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Application Receipt of Runa devi ({{ $DownloadEditData->reg_no }})</title>

        <style>

            .card{
                width: 800px;
                height: 550px;
                font-family: sans-serif;
               /* border:2px solid #f26e21;*/
            }

            .logo img{
                position: fixed;
                height: 49px;
                top: 8px;
                /*width: 75px;*/
                width: 180px;
                left: 8px;
            }



            .profile-image img{
                position: fixed;
                top: 130px;
                left: 331px;
                width: 123px;
                height: 125px;
                border-radius: 39%;
            }

            .detail-0{
                position: fixed;
                top: 10px;
                margin-bottom:5px;
                left: 66px;
                width: 180px;
            }
            .detail-02{
                    position: fixed;
                    top: 21px;
                    left: 292px;
                    width: 343px;
            }

            .detail-0 .h1{
                margin-left: 10px;
               /* margin: 0;*/
                margin-top:0;
                margin-right:0;
                margin-bottom:0px;
                padding: 0;
                font-size: 20px;
                color: white;
            }

            .detail-02 p{
                margin: 0px 0;
                padding: 0;
                font-weight: bold;
                font-size: 27px;
                color: white;
                margin-left:-70px;
            }
            .detail-0 p{
                margin: 4px 0;
                padding: 0;
                font-weight: bold;
                font-size: 10px;
                color: white;
                margin-left: 1px;
            }

            .detail-1{
                position: fixed;
                top: 239px;
                width: 180px;
            }
            .detail-3{
                position: fixed;
                top: 239px;
                width: 50px;
                left: 523px;
            }
            .detail-2{
                position: fixed;
                top: 423px;
                width: 370px;
                /* background: red; */
                padding: 0 5px;
            }

            .detail-5{
                position: fixed;
                top: 435px;
                /* right: 0 !important; */
                left: 420px !important;
                width: 370px;
                /* background: red; */
                padding: 0 5px;
            }

            .detail-2 p{
                font-size: 12px;
                color: white;
                padding: 0;
                text-align: justify;
                margin: 0 0 5px 0;
                width: 554px;
                line-height: 13px;
                width: 370px;
            }

            .data1{
                font-weight: bold;
                font-size: 13px;
                margin: auto;
                text-transform: uppercase;
            }

            .data2{
                font-weight: bold;
                font-size: 11px;
                color: #000;
                margin: auto;
                text-decoration: underline;
                text-transform: uppercase;
            }
            .data3{
                font-weight: bold;
                font-size: 11px;
                color: #000;
                margin: auto;
                margin-bottom: 5px;
                text-decoration: underline;
                text-transform: uppercase;
            }

            .data4{
                font-weight: bold;
                font-size: 14px;
                margin: auto;
                width: 450px;
                padding: 0 12px;
                line-height: 1.4;
            }

            p{
                width: max-content;
                margin: 0;
            }

            .bgimg{
                position: fixed;
                width: 800px;
                height: 550px;
                margin:2px;
            }
            button{
                padding: 10px 20px;
                background: green;
                color: white;
                font-size:20px;
                margin-top: 20px;
                border-radius: 10px;
                margin-left: 25%;
            }
            .detail-1 p, .detail-3 p{
                font-size: 12px;
            }
   body{
       margin:-2px;
   }
   @media print{

       button{
           display: none;
       }
       .detail-0 p, .detail-2 p{
           color: white !important;
           text-shadow: 0 0 0 #fff;
       }
       .h1{
           color: white !important;
           text-shadow: 0 0 #fff;

       }
   }
        </style>
    </head>
<body>
      <img src="{{ url('/') }}/public/assets/uploads/brj-trust.png" class="bgimg">
<div class="card">
    <div class="detail-0">
        <!--<h1 class="h1" >PragatiWad</h1>-->
        <!--<p>Bhim Rao JI (BRJ) Charitable Trust</p>-->
        <p>Regd. No - 110</p>
    </div>
    <div class="logo">
       <img src="{{ url('/') }}/public/assets/site_assets/images/logo.png">
    </div>
    <div class="profile-image">
        <img src="{{ url('/') }}/public/assets/uploads/website/volunteer/{{ $DownloadEditData->photo }}">
    </div>

    <div class="detail-02">
        <!--<p style="margin-left:47px; font-size:8px">Regd. No-110</p>-->
        <p><b>Pragativad Bal Vikas Yojana</b></p>
    </div>
        <div class="detail-1" style="margin-top: 14px">
        <!--<p  class="data2">DESIGNATION: </p>
        <p  class="data3">POSTING AREA: </p>-->
        <p class="data4">Registration No.: <span style="color:green; font-weight:bold;">{{ $DownloadEditData->reg_no }}</span></p>
        <p class="data4">Name: {{ $DownloadEditData->name }}</p>
        <p class="data4">Father's / Husband Name: {{ $DownloadEditData->fname }}</p>
        <p class="data4">DOB: {{ \Carbon\Carbon::parse($DownloadEditData->dob)->format('d-M-Y')  }}</p>
        <p class="data4">Gender: {{ $DownloadEditData->gender }}</p>
        <p class="data4">Adhar No.: {{ $DownloadEditData->adhar }}</p>
        <p class="data4">Mobile No: {{ $DownloadEditData->mob1 }}</p>
        <p class="data4">Email ID: {{ $DownloadEditData->email }}</p>
        <p class="data4">Address: {{ $DownloadEditData->address }}</p>
        <p class="data4">Category: {{ $DownloadEditData->caste }}</p>

    </div>
     <div class="detail-3" style="margin-top: 14px">
        <!--<p  class="data4"><img src="https://www.pwbvyindia.org/site_assets/images/sign.png" style="margin-top: 31px;margin-left: 281px;
}" /></p>-->
<p class="data4">Qualification: {{ $DownloadEditData->qualification }}</p>
        <p class="data4">panchayat : {{ $DownloadEditData->panchayat  }}</p>
        <p class="data4">Ward No: {{ $DownloadEditData->ward  }}</p>
        <p class="data4">Experiance: {{ $DownloadEditData->work_experience }}</p>
        <p class="data4">Block: {{ $DownloadEditData->block }}</p>
        <p class="data4">District: {{ $DownloadEditData->district }}</p>
        <p class="data4">State: {{ $DownloadEditData->state }}</p>
        <p class="data4">Pin Code: {{ $DownloadEditData->pincode }}</p>
        <p class="data4">Post Applied: {{ $DownloadEditData->designation }}</p>
        <p class="data4">Application Status: <span style="color:green; font-weight:bold;">Completed</span></p>
    </div>
     <div class="profile-image">
        <img width="150px" height="150px" src="{{ url('/') }}/public/assets/site_assets/images/pwbvystamp.png" style="margin-top: 10%;"  alt="pwbvystamp.png" >
    </div>
         <div class="detail-2" style="margin-top:10px">
        <p>Head Office : Supaul Near Supaul Block, Bihar 852131</p>
        <p>Reg. Office : Old Court Compound,Kashmere Gate, Delhi-110006</p>
        <p>Corporate Office : 309 3Rd Floor Aadarsh Complex Wazirpur Indisturial Area Delhi 110052</p>
        <p>Email- Info@Pwbvyindia.Org <br> Web- www.pwbvyindia.org</p>

        <div class="detail-5">
        <p>CSR NO: 00027651</p>
        <p>NITI AAYOG ID: DL/2020/0251982</p>
        <p>PAN NO: AAETP3469J</p>
        <p>section-80G UNIQUE REGISTRATION NO: AAETP3469JF20220</p>
        <P>Section-12A UNIQUE REGISTRATION NO: AAETP3469JE20214</P>
    </div>
    </div>

    <div style="width: 100px;
    position: fixed;
    height: 25px;
    top: 255px;
    left: 37px;">
        <svg id="barcode"></svg>
    </div>

</div>
<div class="button">
    <button onclick="print();">Print</button>
</div>
<pre>    </pre>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/JsBarcode.all.min.js"></script>
<script>
    JsBarcode("#barcode", "", {
        width:1,
  height: 15,
  displayValue: true,
  fontSize: 8,
  margin: 1
});
</script>
</body>
</html>
@endforeach
