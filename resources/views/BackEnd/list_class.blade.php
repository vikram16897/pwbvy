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
                                    <li class="breadcrumb-item active text-capitalize">Class</li>
                                </ol>
                            </div>
                            <h4 class="page-title text-uppercase">Class</h4>
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
<button class="btn btn-primary float-end my-3" data-bs-toggle="modal" data-bs-target="#addClassModal">Add Class</button>
                                    <table id="key-table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Class Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($className as $index => $class)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $class->class_name }}</td>
                                                    <td class="text-center">
                                                        <div class="row">
                                                            <div class="col-sm-12 mb-1">
                                                            <button 
                                                                class="btn btn-xs btn-success edit-btn" 
                                                                data-id="{{ $class->id }}" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#editModal" 
                                                                onclick="getdataclss($(this).data('id'))">
                                                                Edit
                                                            </button>

                                                               <!-- Delete Button -->
                                                            <button 
                                                                class="btn btn-xs btn-danger delete-btn" 
                                                                data-id="{{ $class->id }}" onclick="getclassDelete($(this).data('id'))">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateclassData(event)">Update</button>
                </div>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="addClassData(event)">Save</button>
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
    function getdataclss(id) {
        // Perform an AJAX request to fetch the data
        $.ajax({
            url: '{{ route("class.edit") }}',  // Ensure this URL is correct   register
            type: 'GET',
            data: { "id": id },
            cache: false,
            success: function(response) {
                // Populate the modal with the question data
                // const question = response.question;
                const classes = response.classes;


                $('#class').val(classes.class_name);
                $('#id').val(classes.id);

                // Show the modal
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle error if the request fails
                console.error('AJAX Error: ' + status + error);
            }
        });
    }

    function getclassDelete(id){
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
                    url: "{{route('class.delete')}}",  // Adjust URL to your delete route
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
    
    function updateclassData(event){
        event.preventDefault();  // Prevent form from submitting normally
        
        // Get values from the form fields
        var class_name = $('#class').val();
        var id = $('#id').val(); // Get the hidden ID field
        
        // Log the form data to check if it's correct

        // Example: Send the form data via AJAX
        $.ajax({
            url: "{{route('class.update')}}",  // The form action (URL to send the request to)
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // Include the CSRF token
                class_name: class_name,
                id: id
            },
            success: function(response) {
                // Handle success (e.g., show success message)
                console.log('Success:', response);
                $('#editModal').modal('hide');  // Hide the modal after successful update
                $('#successMessage').fadeIn().delay(30000).fadeOut();
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error (e.g., show error message)
                $('#errorMessage').fadeIn().delay(30000).fadeOut();
                console.log('Error:', error);
            }
        });
    
    }

    // Handle Add Class form submission
function addClassData(event) {
    event.preventDefault();  // Prevent form from submitting normally

    var class_name = $('#class_name').val();  // Get the class name input value

    // Send AJAX request to add class
    $.ajax({
        url: "{{route('class.store')}}",  // Add the correct route for storing the class
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',  // Include CSRF token for security
            class_name: class_name
        },
        success: function(response) {
            // Handle success (e.g., show success message)
            $('#addClassModal').modal('hide');  // Hide the modal after successful addition
            $('#successMessage').fadeIn().delay(30000).fadeOut();  // Show success message
            location.reload();  // Reload the page to reflect the changes
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

