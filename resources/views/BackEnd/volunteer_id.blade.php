
<!DOCTYPE html>
<html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Id card of {{ $employeeId['name'] }} ({{ $employeeId['reg_no'] }})</title>
    <head>
        <style>

            .card{
                width: 191px;
                height: 320px;
                font-family: sans-serif;
               /* border:2px solid #f26e21;*/
            }

            .logo img{
                position: fixed;
                height: 49px;
                /*top: 8px;
               /* width: 75px;
                width: 180px;
                left: 8px;*/
            }



            .profile-image img{
                position: fixed;
                top: 80px;
                left: 63px;
                width: 80px;
                height: 80px;
                border-radius: 50%;
            }

            .detail-0{
                position: fixed;
                top: 54px;
                left: 11px;
                /* width: 35px; */
                font-size: 6px;
                line-height: 0.8;
            }
            .detail-02{
                    position: fixed;
                    top: 48px;
                    left: 25px;
                    width: 200px;
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
                margin: 15px 0;
                padding: 0;
                font-weight: bold;
                font-size: 12px;
                color: white;
            }
            .detail-0 p{
                margin: 4px 0;
                padding: 0;
                font-weight: bold;
                font-size: 7px;
                color: white;
                margin-left: 10px;
            }

            .detail-1{
                position: fixed;
                top: 165px;
                width: 180px;
            }
            .detail-3{
                position: fixed;
                top: 163px;
                width: 50px;
            }
            .detail-2{
                position: fixed;
                top: 286px;
                width: 180px;
                padding: 0 5px;
            }

            .detail-2 p{
                font-size: 8px;
                color: white;
                padding: 0;
                text-align: justify;
                margin: 0 0 2px 0;
                width: 180px;
                line-height: 10px;
            }

            .data1{
                font-weight: bold;
                font-size: 13px;
                margin: auto;
                text-transform: uppercase;
            }

            .data2{
                font-weight: bold;
                font-size: 8px;
                color: #000;
                margin: auto;
                text-decoration: underline;
                text-transform: uppercase;
            }
            .data3{
                font-weight: bold;
                font-size: 8px;
                color: #000;
                margin: auto;
                margin-bottom: 5px;
                text-decoration: underline;
                text-transform: uppercase;
            }

            .data4{
                font-weight: bold;
                font-size: 8px;
                margin: auto;
                width: 170px;
                padding: 0 12px;
            }

            p{
                width: max-content;
                margin: 0;
            }

            .bgimg{
                position:fixed;
                width: 191px;
                height: 320px;
                margin:2px;
            }
            button{
                padding: 10px 20px;
                background: green;
                color: white;
                font-size:20px;
                margin-top: 20px;
                border-radius: 10px;
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


       .ind1{
            width: 29px!important;
            top: 10px!important;
            left: 10px!important;
       }
   }
        </style>
    </head>
<body>
      <img src="{{ url('/') }}/public/assets/uploads/brj-trust.png" class="bgimg" />
<div class="card">
    <div class="detail-0">
        <p style="font-size:8px; margin:-34px 161px;">R-110</p>
        <!--<h1 class="h1" >Pragativad</h1>-->
        <!--<p>Bhim Rao JI (BRJ) Charitable Trust</p>-->
        <!--<p>Regd. No- R-110</p>-->
    </div>
    <div class="logo">
        <img src="{{ url('/') }}/public/assets/uploads/bha.png" style=" width: 29px;top: 10px;left: 10px;"/>
    </div><!---->
    <div class="detail-0">
      <span style=" left: 11px;top: 53px;font-size: 5px;color: #fff;
}">सत्यमेव जयते<br>भारत सरकार</span>
    </div>
    <div class="logo">
       <img src="{{ url('/') }}/public/assets/site_assets/images/logo.png" style=" width: 145px;top: 10px;left: 23px;"/>
    </div><!--
    <div class="logo">
        <img src="{{ url('/') }}/public/assets/uploads/bha.png" style=" width: 29px;top: 10px;left: 173px;"/>
    </div>-->
    <div class="profile-image">
        <img src="{{asset('public/assets/uploads/website/volunteer/'. $employeeId['photo'])}}" />
    </div>
        <div class="detail-0">
        <!--<h1 class="h1" >Pragativad</h1>-->
        <!--<p>Bhim Rao JI (BRJ) Charitable Trust</p>-->
        <!--<p>Regd. No- R-110</p>-->
    </div>
    <div class="detail-02">

        <p><b>Pragativad Bal Vikash Yojana</b></p>
    </div>
    <div class="detail-1">
        <p class="data1">{{ $employeeId['name'] }}</p>
        <p  class="data2">DESIGNATION: {{ $employeeId['designation'] }}</p>
        <p  class="data3">POSTING AREA: {{ $employeeId['post_area'] }}</p>
        <p  class="data4">ADDRESS: {{ $employeeId['address'] }}</p>
        <p  class="data4">CODE: {{ $employeeId['reg_no'] }}</p>
        <p  class="data4">VALID: {{ date('d-m-Y', strtotime($employeeId->created_at . " +1 year") ); }}</p>
    </div>
     <div class="detail-3">
         <p  class="data4"><img width="70px" height="70px" src="{{ url('/') }}/public/assets/site_assets/images/pwbvystamp.png" style="position: absolute;
    padding-top: 20px;margin-left: 100px;" /></p>
        <p  class="data4"><img src="{{ url('/') }}/public/assets/site_assets/images/sign.png" style="margin-top: 46px;margin-left: 80px;" /></p>
        <p  class="data4" style="margin-left: 91px; margin-top: -4px;">Auth. Signature</p>
    </div>
    <div class="detail-2">
        <p>Reg. Office : Old Court Compound,Kashmere Gate, Delhi-110006</p>
        <!--<p>Head office :pipra road ,Supaul,Bihar-852131</p>-->
        <p>Email- Info@Pwbvyindia.Org <br> Web- www.pwbvyindia.org</p>
    </div>
    <div style="width: 100px;
    position: absolute;
    height: 25px;
    top: 255px;
    left: 37px;" >
        <svg id="barcode"></svg>
    </div>

</div>
<div class="button">
    <button onclick="print();">Print</button>
</div>
<pre>
    </pre>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/JsBarcode.all.min.js" ></script>
<script>
    JsBarcode("#barcode", "{{ $employeeId['reg_no'] }}", {
        width:1,
  height: 15,
  displayValue: true,
  fontSize: 8,
  margin: 1
});
</script>
</body>
</html>

