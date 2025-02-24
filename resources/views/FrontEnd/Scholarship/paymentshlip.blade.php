<!doctype html>
<html lang="en">
    <head>
        <title>Pragativad Bal Vikas Yojana</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ url('/') }}/public/assets/uploads/website/favicon/favicon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <style>
            table, th, td {
                border: 1px solid black;
                color: #6c8ad4;
                font-size: 12px;
            }

            @media print {
                #print {
                    display: none;
                }
            }

            .logo {
                width: 250px;
            }
        </style>
    </head>
    <body>
        <div class="container d-flex justify-content-center">
            <div class="row w-100">
                <div class="col-6 text-center">
                    <img class="logo img-fluid" src="{{ url('/') }}/public/assets/uploads/master/logo/logo.png" alt="Trust Logo">
                </div>
                <div class="col-6 text-center">
                    <h3>Registration Number: 110</h3>
                </div>
                <div class="col-12 text-center">
                    <h3>Pragativad Bal Vikas Yojana Trust</h3>
                    <p>NITI AAYOG DARPAN Registered: DL/2020/0251982</p>
                    <p>Phone: <a href="tel:+91 7667264045">+91 7667264045</a>, <a href="tel:+91 7255965354">+91 7255965354</a></p>
                    <p><a href="https://www.pwbvyindia.org/">www.pwbvyindia.org</a></p>
                </div>
                <div class="col-12 text-center">
                    <h2 class="text-success">Donation Receipt</h2>
                </div>
                <div class="col-12">
                    <p>Received with thanks from:</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>TransactionId</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $donerData->name }}</td>
                                <td>{{ $donerData->mobile }}</td>
                                <td>{{ $donerData->email }}</td>
                                <td>{{ $donerData->transaction_id }}</td>
                                <td>{{ $donerData->amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 text-center">
                    <button id="print" class="btn btn-primary" onclick="window.print()">Print</button>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    </body>
</html>
