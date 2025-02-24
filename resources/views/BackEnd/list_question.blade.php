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
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class Name</th>
                                                <th>Question</th>
                                                <th>Option 1</th>
                                                <th>Option 2</th>
                                                <th>Option 3</th>
                                                <th>Option 4</th>
                                                <th>Answer</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($questions as $index => $question)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $question->class_name }}</td>
                                                    <td>{{ $question->question }}</td>
                                                    <td>{{ $question->option_1 }}</td>
                                                    <td>{{ $question->option_2 }}</td>
                                                    <td>{{ $question->option_3 }}</td>
                                                    <td>{{ $question->option_4 }}</td>
                                                    <td>{{ $question->answer }}</td>
                                                    <td class="text-center">
                                                        <div class="row">
                                                            <div class="col-sm-12 mb-1">
                                                            <button 
                                                                class="btn btn-xs btn-success edit-btn" 
                                                                data-id="{{ $question->id }}" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editModal" 
                                                                onclick="getdata($(this).data('id'))">
                                                                Edit
                                                            </button>

                                                               <!-- Delete Button -->
                                                            <button 
                                                                class="btn btn-xs btn-danger delete-btn" 
                                                                data-id="{{ $question->id }}" onclick="getDelete($(this).data('id'))">
                                                                Delete
                                                            </button>
                                                            </div>
                                                        </div>
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

<!-- Edit Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Apply modal-lg for a larger size -->
        <div class="modal-content">
            <form id="editForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Question field in one row -->
                    <div class="mb-3">
                        <label for="question" class="form-label">Question</label>
                        <textarea class="form-control" id="question" name="question" rows="3"></textarea>
                    </div>

                    <!-- Two fields per row layout -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="option_1" class="form-label">Option 1</label>
                                <input type="hidden" class="form-control" id="id" name="id">
                                <input type="text" class="form-control" id="option_1" name="option_1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="option_2" class="form-label">Option 2</label>
                                <input type="text" class="form-control" id="option_2" name="option_2">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="option_3" class="form-label">Option 3</label>
                                <input type="text" class="form-control" id="option_3" name="option_3">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="option_4" class="form-label">Option 4</label>
                                <input type="text" class="form-control" id="option_4" name="option_4">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="answer" class="form-label">Answer</label>
                        <input type="text" class="form-control" id="answer" name="answer">
                    </div>

                    <div class="mb-3">
                        <label for="class_id" class="form-label">Class Name</label>
                        <select class="form-select" id="class_id" name="class_id"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateData(event)">Update</button>
                </div>
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
<script>

    // Fetch data when the "Edit" button is clicked
    function getdata(id) {
        // Perform an AJAX request to fetch the data
        $.ajax({
            url: '{{ route("questions.edit") }}',  // Ensure this URL is correct   register
            type: 'GET',
            data: { "id": id },
            cache: false,
            success: function(response) {
                // Populate the modal with the question data
                const question = response.question;
                const classes = response.classes;


                // Populate the class dropdown
                let classOptions = '';
                classes.forEach(function(classItem) {
                    classOptions += `<option value="${classItem.id}" ${classItem.id === question.class_id ? 'selected' : ''}>${classItem.class_name}</option>`;
                });
                $('#class_id').html(classOptions);  // Append options to the class dropdown

                // Populate the other fields
                $('#question').val(question.question);
                $('#id').val(question.id);
                $('#option_1').val(question.option_1);
                $('#option_2').val(question.option_2);
                $('#option_3').val(question.option_3);
                $('#option_4').val(question.option_4);
                $('#answer').val(question.answer);

                // Show the modal
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle error if the request fails
                console.error('AJAX Error: ' + status + error);
            }
        });
    }

    function getDelete(id){
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            
            if (result.value==true) {
                
                // If confirmed, proceed with AJAX request to delete the item
                $.ajax({
                    url: "{{route('questions.delete')}}",  // Adjust URL to your delete route
                    method: 'post',  // Use DELETE method for deleting the item
                    data: {
                        _token: '{{ csrf_token() }}',
                        id:id,  // Include CSRF token for security
                    },
                    success: function(response) {
                        // Handle the successful deletion
                        Swal.fire(
                            'Deleted!',
                            'The item has been deleted.',
                            'success'
                        );
                        // Optionally, remove the row from the table
                        $('button[data-id="' + id + '"]').closest('tr').remove();
                    },
                    error: function(xhr, status, error) {
                        // Handle any error
                        Swal.fire(
                            'Error!',
                            'Something went wrong. Please try again.',
                            'error'
                        );
                    }
                });
            }
        });
        
    }
    
    function updateData(event){
        event.preventDefault();  // Prevent form from submitting normally
        
        // Get values from the form fields
        var question = $('#question').val();
        var option_1 = $('#option_1').val();
        var option_2 = $('#option_2').val();
        var option_3 = $('#option_3').val();
        var option_4 = $('#option_4').val();
        var answer = $('#answer').val();
        var class_id = $('#class_id').val();
        var id = $('#id').val(); // Get the hidden ID field
        
        // Log the form data to check if it's correct

        // Example: Send the form data via AJAX
        $.ajax({
            url: "{{route('questions.update')}}",  // The form action (URL to send the request to)
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // Include the CSRF token
                question: question,
                option_1: option_1,
                option_2: option_2,
                option_3: option_3,
                option_4: option_4,
                answer: answer,
                class_id: class_id,
                id: id
            },
            success: function(response) {
                // Handle success (e.g., show success message)
                console.log('Success:', response);
                $('#editModal').modal('hide');  // Hide the modal after successful update
                $('#successMessage').fadeIn().delay(30000).fadeOut();
            },
            error: function(xhr, status, error) {
                // Handle error (e.g., show error message)
                $('#errorMessage').fadeIn().delay(30000).fadeOut();
                console.log('Error:', error);
            }
        });
    
    }

</script>


    <!-- /.content-wrapper -->
@endsection("main-section")

