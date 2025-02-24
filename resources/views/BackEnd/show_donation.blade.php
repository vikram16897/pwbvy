@extends('BackEnd.layout.main')
@section('main-section')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikash Yojana</a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">Online Donations</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Online Donations</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-11">
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Address</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>DOB</th>
                                                <th>Country</th>
                                                <th>Donation type</th>
                                                <th>Pan</th>
                                                <th>AMOUNT</th>
                                                <th>Payment Id</th>
                                                <th>Donor Id</th>
                                                <th>Addon</th>
                                                <th>Payment Status</th>
                                                {{-- <th>Payment</th> --}}
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $num = 1;
                                            @endphp
                                            @foreach ($donation as $donationData)

                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>
                                                    <a href="#custom-modal"
                                                        class="btn btn-info btn-sm waves-effect waves-light"
                                                        onclick="viewaddress('#address_{{ $donationData->id }}')" data-animation="fadein"
                                                        data-plugin="custommodal" data-overlayspeed="100"
                                                        data-overlaycolor="#36404a">View Address</a>
                                                    <input type="hidden" id="address_{{ $donationData->id }}" value="{{ $donationData->address }}">
                                                </td>
                                                <td>{{ $donationData->name }}</td>
                                                <td>{{ $donationData->email }}</td>
                                                <td>{{ $donationData->txtphone }}</td>
                                                <td>{{ $donationData->dob }}</td>
                                                <td>{{ $donationData->country }}</td>
                                                <td>{{ $donationData->donationtype }}</td>
                                                <td>{{ $donationData->txtpan }}</td>
                                                <td>{{ $donationData->amount }}</td>
                                                <td>{{ $donationData->order_id }}</td>
                                                <td>{{ $donationData->donor_id }}</td>
                                                <td>
                                                    @if(!empty($donationData->addon))
                                                    {{ $donationData->addon }}
                                                    @else
                                                    {{ $donationData->created_at }}
                                                    @endif
                                                </td>
                                                 @if(!empty($donationData->status) == 1)
                                                 <td>
                                                    <span class="badge badge-success">Success</span>
                                                </td>
                                                @else
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td> 
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<!-- Modal -->
<div id="custom-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.modal.close();">
        <span>&times;</span><span class="sr-only">Close</span>
    </button>
    <h4 class="custom-modal-title">User address</h4>
    <div class="custom-modal-text text-muted overflow-y-auto mb-3" id="address_data"></div>
</div>
<style>
    .overflow-y-auto{
        overflow-y: auto;
        max-height: 300px;
    }
</style>
<script type="text/javascript">
    function viewaddress(id) {
        var val = $(id).val();
        $("#address_data").html(val);
    }
</script>

<script type="text/javascript">
	function deletedonation() {
		if (confirm("Are You Sure You Want TO Delete donation ?")) {
            return true;
		}
		return false;
	}
</script>

@endsection("main-section")
