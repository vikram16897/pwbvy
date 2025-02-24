@extends('FrontEnd.layout.main')
@section('main-section')

<style>
    .container div .heading-title{
        text-align: center;
        font: 600;
        font-size: 20px;
        font-family: sans-serif;
    }

    .container div .heading-title::before{
        content: "";
position: absolute;
text-align: center;
bottom: -2px;
height: 3px;
width: 125px;
border-radius: 8px;
background-color: #4070f4;
    }

    .container .details-donation{
        text-align: center;
    }

</style>

<section class="donation-form">
    <div class="donation-box">
		<div class="container">
			<div><h3 class="heading-title">Donation Now</h3></div>

            <div class="details-donation">
                <img style="border-radius: 10px" width="500px" src="{{ url('/') }}/public/assets/images/documents/qrcodeBank.png" >
            </div>


		</div>
    </div>
</section>


	@endsection("main-section")
