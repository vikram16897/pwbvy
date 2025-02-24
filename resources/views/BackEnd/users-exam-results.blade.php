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
                                    <li class="breadcrumb-item active text-capitalize">Users Exam List</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Users Exam List</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <!-- Success message -->
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

                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-12">
                                                    <!-- Add Button to open modal -->
<!-- <button class="btn btn-primary float-end my-3" data-bs-toggle="modal" data-bs-target="#addClassModal">Add Class</button> -->
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Total Questions</th>
                                            <th>Correct Answers</th>
                                            <th>Wrong Answers</th>
                                            <th>Percentage</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usersResults as $index => $result)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $result['name'] }}</td>
                                                    <td>{{ $result['total_questions'] }}</td>
                                                    <td class="text-success">{{ $result['correct_answers'] }}</td>
                                                    <td class="text-danger">{{ $result['wrong_answers'] }}</td>
                                                    <td class="fw-bold">{{ $result['percentage'] }}%</td>
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

<!-- Edit Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Apply modal-lg for a larger size -->
        <div class="modal-content">
            <form id="editForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Question field in one row -->
                    <div class="mb-3">
                        <label for="question" class="form-label">class</label>
                        <input class="form-control" id="class" name="class">
                        <input type="hidden" id="id" class="id">
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateclassData(event)">Update</button>
                </div> -->
            </form>
        </div>
    </div>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Larger size -->
        <div class="modal-content">
            <form id="addClassForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addClassModalLabel">Add Class</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Class Name input field -->
                    <div class="mb-3">
                        <label for="class_name" class="form-label">Class Name</label>
                        <input class="form-control" id="class_name" name="class_name" required>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="addClassData(event)">Save</button>
                </div> -->
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS and Popper.js (required for modals) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
 <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>



    <!-- /.content-wrapper -->
@endsection("main-section")

