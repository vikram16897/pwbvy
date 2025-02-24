<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <style>
        p {
            margin-top: -15 !important;
        }

        button {
            padding: 10px 20px;
            background: green;
            color: white;
            font-size: 20px;
            margin-top: auto;
            border-radius: 10px;
            margin-left: 50%;
        }

        @media print {
            button {
                display: none;
            }
        }
    </style>
    <div style="margin-top:120px; margin-left:45px;margin-right:45px; ">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
                <tr>
                    <td style="height: 107px; text-align: justify; border-color: #ffffff; " valign="top">
                        <br>
                        <div style="width: 100%; text-align: center; font-weight: bold; color: #000; font-size: 16px;">
                            <u>Agreement cum Appointment Letter</u>
                        </div>
                        <br>
                        <strong>To</strong>,<br>
                        <div style="float:right; width:22%; display:inline-block; margin-right:25px;margin-left:25px;">
                            <img src="{{ asset('public/assets/uploads/website/volunteer/'.$employeeId['photo'])}}"
                                style="height:100px; width:100px;" />
                        </div>
                        <div class="detail" style="margin-left:25px; width:70%;">
                            <span id="ctl00_LblName" style="font-weight:bold; text-align:left;">Mr./Mrs. :-
                                {{ $employeeId['name'] }}</span><br>
                            <span id="ctl00_LblName" style="font-weight:bold; text-align:left;">Husband/Father Name :-
                                {{ $employeeId['fname'] }}</span><br>
                            <span id="ctl00_LblName" style="font-weight:bold;">Reg. No. :-
                                {{ $employeeId['reg_no'] }}</span><br>
                            <span id="ctl00_LblName" style="font-weight:bold;">Address
                                :-{{ $employeeId['address'] }}</span><br>
                            <span id="ctl00_LblName" style="font-weight:bold;">District
                                :-{{ $employeeId['district'] }}</span><br>
                            <span id="ctl00_LblName" style="font-weight:bold;">State :-{{ $employeeId['state'] }}</span>
                        </div>

                        <strong>Subject:-Agreement cum appointment Letter for the post of
                            {{ $employeeId['designation'] }}</strong>
                        <br><br>

                        <strong>Dear sir/mam</strong>,<br><br>
                        <p style="margin-top: unset!important;">With reference to the captioned matter, we are pleased
                            to confirm your appointment w. e.f {{ date('d-F-Y') }} as {{ date('d-F-Y', strtotime(" +33 month") ); }} in our organization <span
                                style="color: #0583BE; ">Pragativad Bal Vikash Yojana</span>.</p>

                        <div class="detail" style="margin-left:25px; text-align: left; width:100%; margin-right:25px;">
                            <ol>
                                <li>
                                    <p>Your Appointment is effective from {{ date('d-F-Y') }}</p>
                                </li>
                                <li>
                                    <p>You have been assigned for one of the following roles and responsibilities as per
                                        decision of the management of <span style="color: #0583BE;">Pragativad Bal Vikas
                                            Yojna</span>.</p>
                                    <ol style="list-style-type: lower-alpha;">
                                        <li style="margin-left: -22px; margin-right: 45px;">

                                            <p>){{ $employeeId['designation'] }} @if($employeeId['designation'] == "Sahaayika"):- To bring the children from every house to the center of
                                                calling. given by the institution Feeding of Nutrition in a clean manner
                                                and feeding children. The monthly salary of the Sahaayika is Rs 1500 /-
                                                @elseif($employeeId['designation'] == "Sevika"):-
                                                Provide health and nutrition education and counseling motherson feeding theirbabies/infant and dietary processes. Prepare a list of nutrition and inform the Supervisor. the monthly salary of the Sevika is 2500/-
                                                @endif
                                            </p>

                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <p>In case of Separation, the notice period will be 6 months.</p>
                                </li>
                                <li>
                                    <p>The Trust also reserves the right to terminate your agreement with prior notice
                                        of 7 days on the grounds of misconduct including violation of code of conduct or
                                        even in the case of reasonable luscious of misconduct, disloyalty and commission
                                        of any act involving moral turpitude or any act of indiscipline or inefficiency
                                        or loss of confidence.</p>
                                </li>
                                <li>
                                    <p>You are required to follow the guidelines laid down and updated time to time.</p>
                                </li>
                                <li>
                                    <p>You will be bound by rules, regulations and disciplines of the organization
                                        enforced from time to time.</p>
                                </li>
                                <li>
                                    <p>You are required to maintain the highest order of secrecy as regards the work of
                                        the organization and its sister concerns and in case of any breach of trust; the
                                        organization may terminate your employment without any notice.</p>
                                </li>
                                <li>
                                    <p>This agreement is valid for 33 months (Security Period) since your appointment
                                        and will be renewed just after 33 months.</p>
                                </li>
                                <li>
                                    <p>We welcome you to our Organization and hope that your association with us will
                                        prove to be best of mutual benefits.</p>
                                </li>
                                <li>
                                    <p>In case you accept this offer of appointment on the above said terms and
                                        conditions, please submit the following documents at the time of Joining;</p>
                                    <ol style="list-style-type: lower-alpha;">
                                        <li style="margin-left: -22px; margin-right: 45px;">
                                            <p>
                                                Recent Passport Size Photo — 03 Numbers
                                            </p>
                                        </li>
                                        <li style="margin-left: -22px; margin-right: 45px;">
                                            <p>
                                                Certificate of educational/ Technical qualification
                                            </p>
                                        </li>
                                        <li style="margin-left: -22px; margin-right: 45px;">
                                            <p>
                                                Experience certificate
                                            </p>
                                        </li>
                                        <li style="margin-left: -22px; margin-right: 45px;">
                                            <p>
                                                No Objection certificate from previous employer, if any
                                            </p>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                            <p>Please sign the duplicate copy of this appointment letter as a token of your acceptance
                                of the appointment of the above said terms and conditions.</p>
                            <p>I accept the offer appointment on the above term and conditions.</p>
                        </div><br>
                        <strong style="float:right;">
                            Thank You<br><br>
                            <br>
                            <span style="color: #0583BE;">Pragativad Bal Vikash Yojana</span><br> </strong>

                        <br><br>
                        <p class="button">
                            <button onclick="print();">Print</button>
                        </p>
                    </td>
                </tr>
    </div>

</body>

</html>
