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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pragativad Bal Vikas Yojana</a>
                                    </li>
                                    <li class="breadcrumb-item active text-capitalize">Question</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Questions</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <!-- Success message -->

                <div class="row">
                                                        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Success message -->
<div id="successMessage" class="alert alert-success" style="display:none; position: absolute; top: 0; width: 100%; z-index: 9999; text-align: center;">
    <strong>Success!</strong> The question has been updated successfully.
</div>

<!-- Error message -->
<div id="errorMessage" class="alert alert-danger" style="display:none; position: absolute; top: 0; width: 100%; z-index: 9999; text-align: center;">
    <strong>Error!</strong> There was an issue updating the question. Please try again.
</div>
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Registration Id</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $index => $item)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->registrationid }}</td>
                                                     <td>
                                                        <span id="status-{{ $item->registrationid }}" 
                                                            class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                                                            {{ $item->status ? 'Active' : 'Inactive' }}
                                                        </span>
                                                    </td>
                                                     <td>
                                                        <button class="btn btn-sm btn-success" onclick="changeStatus('{{ $item->registrationid }}', 1)">Activate</button>
                                                        <button class="btn btn-sm btn-danger" onclick="changeStatus('{{ $item->registrationid }}', 0)">Deactivate</button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

<!-- Modal -->



<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and Popper.js (required for modals) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
 <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    function changeStatus(registrationId, status) {
        if (!confirm("Are you sure you want to change the status?")) {
            return;
        }

        fetch("{{ route('registration.updateStatus') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                registration_id: registrationId,
                status: status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let statusBadge = document.getElementById(`status-${registrationId}`);
                // console.log(statusBadge)
                statusBadge.className = status ? "badge badge-success" : "badge badge-danger";
                statusBadge.innerText = status ? "Active" : "Inactive";
            } else {
                alert("Failed to update status.");
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>
    <!-- /.content-wrapper -->
@endsection("main-section")

