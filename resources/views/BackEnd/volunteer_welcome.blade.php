<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Pragativad Bal Vikash Yojana</title>
</head>
<body>

<style>
    button{
                padding: 10px 20px;
                background: green;
                color: white;
                font-size:20px;
                margin-top: auto;
                border-radius: 10px;
                margin-left: 50%;
            }

   @media print{

       button{
           display: none;
       }
    }
</style>
<div style="margin-top:200px">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                        <td style="height: 107px; text-align: left;    font-size: 12px;
    background: #eee;">
                            <div>
                                <div style="float: left; line-height: 19px;">
                                    <strong>Portfolio ID:</strong>
                                    <span id="ctl00_LblTrackID" style="font-weight:bold;">{{ $employeeId['reg_no'] }}</span>
                                    <br>
                                    <span id="ctl00_LblName" style="font-weight:bold;">{{ $employeeId['name'] }}</span><br>
                                    <span id="ctl00_LblAddress" style="font-weight:bold;">{{ $employeeId['address'] }}                                                                       <!-- </span>,
                                     <span id="ctl00_lblState" style="font-weight:bold;"> -->
                                    </span><br>
                                    <strong>Contact No :</strong>
                                    <span id="ctl00_LblContact" style="font-weight:bold;">{{ $employeeId['mob1'] }}</span>
                                    <br>
                                    <strong>Joining Date :</strong>
                                    <span id="ctl00_LblJoinDate" style="font-weight:bold;">{{ date('d-m-Y') }}</span>
                                    <br>
                                    <!---->
                                    <strong>Donation Amount:</strong>
                                    <span id="ctl00_LblTrackID" style="font-weight:bold;">750</span><br>
                                    <!--<strong>Introducer:</strong>
                                    <span id="ctl00_LblTrackID" style="font-weight:bold;"></span><br>-->
                                </div>
                                <div style="float: right; margin-right: 90px;">
                                    <strong>Designation :</strong>
                                    <span id="ctl00_lblRank" style="font-weight:bold;">{{ $employeeId['designation'] }}</span></div>
                            </div>
                        </td>
                    </tr>
<tr>
                        <td style="height: 107px; text-align: justify; border-color: #ffffff; " valign="top">
                            <br>
                            <strong>Dear</strong>
                            <span id="ctl00_LblName" style="font-weight:bold;">{{ $employeeId['name'] }}</span>,
                            <br>
                            <br>
                            <div style="width: 100%; text-align: center; font-weight: bold; color: #0583BE; font-size: 16px;">
                                    Pragativad Bal Vikash Yojana Warm Welcome You
                            </div>
                            <br>
                            <p>
                              We <span style="color: #0583BE; ">Pragativad Bal Vikash Yojana</span> family would like to Warm Welcome you for being Member of our Organisation. It's an exciting time for our Organisation as we continue to grow, we strive to remain as adaptable,motivated and responsive to our new members.
                                <br>
                                </p><p>
                                 Our Organization is confronting a time of many changes and we are meeting these changes during a time of larger nation-wide. We are continuously transforming the way we operate to continuously improve our ability to achieve our goals & objectives. Our employees and senior motivators have continued to meet the challenges of our field. We are very proud of where we are today and excited about where we are headed.
                                 <br>
                                </p>We are excited that you as part of our team is most important and greatest asset, we could not accomplish what we do every day without our members. We are very pleased to welcome you to <span style="color: #0583BE">Pragativad Bal Vikash Yojana</span> and look forward to working with you. </p>
                            <p><br><br>
                                <strong style="float:right;">Regards
                                        <br>
                                    <br>
                                    <br>

                                        <span style="color: #0583BE;">Pragativad Bal Vikash Yojana</span></strong>
                            </p>
                            <br><br>
                            <p class="button">
                                <button onclick="print();">Print</button>
                            </p>
                        </td>
                    </tr>
</div>

</body>
</html>
