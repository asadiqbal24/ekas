@extends('admin.layouts.app')
@push('title')
    <title>EKAS | All Courses </title>
@endpush
@section('head-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

    <style>
        .dt-buttons,
        .dt-search {
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success : </strong> {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Courses</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <form>
                                <div class="col-md-10" style="width:20%; display:flex; gap:5px; float:right;">
                                    <select class="form-control" name="location" id="location_filter">
                                        <option value="All" selected>All Locations</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Finland">Finland</option>
                                        <option value="Belgium">Belgium</option>
                                    </select>
                                </div>
                            </form>
                            <form id="bulk-delete-form" method="post" action="{{route('move.to.trash')}}">
                                @csrf
                                <div class="col-md-10" style="width:20%; display:flex; gap:5px;">
                                    <select class="form-control" name="bulk_action" id="bulk_action">
                                        <option value="" selected disabled> slect option </option>
                                        <option value="all">Select Bulk</option>
                                        <option value="delete_selected">Move to Trash</option>
                                    </select>
                                    <input type="hidden" name="selected_course_ids" id="selected_course_ids"
                                        value="">
                                    {{-- <button type="button" id="submit-button" class="btn btn-primary">Submit</button> --}}
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table" id="course_details">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col">University Name</th>
                                            <th scope="col">Program Name</th>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Actions</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr data-courseid="{{ $course->id }}">
                                                <td>

                                                </td>
                                                <td>{{ $course->universityname }}</td>
                                                <td>{{ $course->programmename }}</td>
                                                <td>{{ $course->ranking }}</td>
                                                <td>{{ $course->location }}</td>
                                                <td>
                                                    <a href="delete/admin/course/{{ $course->id }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                                    <a href="edit/admin/course/{{ $course->id }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="course-checkbox"
                                                        value="{{ $course->id }}">
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
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" />
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
    <script>
        $(document).ready(function() {

            var detailRows = [];

            var table = $('#course_details').DataTable({
                select: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':not(:first-child, :last-child)' // Excludes the first and last columns
                        }
                    },
                    {
                        extend: 'excel',
                        action: function(e, dt, button, config) {
                            window.location.href =
                                "{{ route('admin.data.export') }}"; // Use the route for the export
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':not(:first-child, :last-child)' // Adjust the selector as needed
                        }
                    },
                    // Your 'Delete Selected' button and other configuration
                ],
                initComplete: function() {
                    $('.dt-button').removeClass('dt-button buttons-pdf buttons-html5').addClass(
                        'btn btn-primary btn-sm');
                },
                "columnDefs": [{
                        "targets": 0,
                        "orderable": false,
                        "className": 'details-control',
                        "data": null,
                        "defaultContent": '<span style="display: inline-block; width: 20px; height: 20px; line-height: 20px; text-align: center; border: 1px solid black; background-color: #0275D8; color: white; cursor: pointer;border-radius:50%;">+</span>',
                        "width": "10%",
                    },
                    // {
                    //     targets: 1, // Adjust this index based on where you want the checkbox column
                    //     searchable: false,
                    //     orderable: false,
                    //     className: 'select-checkbox',
                    //     render: function(data, type, full, meta) {
                    //         return '<input type="checkbox" class="row-checkbox" name="id[]" value="' +
                    //             $('<div/>').text(data).html() + '">';
                    //     }
                    // }
                ],
                "order": [
                    [1, 'asc']
                ],
            });

            // Add event listener for opening and closing details
            $('#course_details tbody').on('click', 'td.details-control> span', function() {
                var tr = $(this).closest('tr');
                var courseId = tr.data('courseid'); // Now correctly accessing the data-courseid attribute
                // console.log(courseId);
                var row = $('#course_details').DataTable().row(tr);
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    $(this).html(
                        '<span style="display: inline-block; width: 20px; height: 20px; line-height: 20px; text-align: center; border: 1px solid black; background-color: #0275D8; color: white; cursor: pointer;border-radius:50%;">+</span>'
                    );
                } else {
                    $(this).html(
                        '<span style="display: inline-block; width: 20px; height: 20px; line-height: 20px; text-align: center; border: 1px solid black; background-color: #D33333; color: white; cursor: pointer;border-radius:50%;">-</span>'
                    );
                    $.ajax({
                        type: "get",
                        url: "admin/get/course/details/" + courseId,
                        success: function(rowData) {
                            var details = `
                        <table cellpadding="5" cellspacing="0" border="0">
                            <tr>
                                <td>Curse title:</td>
                                <td>${rowData.data.title}</td>
                            </tr>
                            <tr>
                                <td>Name & location:</td>
                                <td>${rowData.data.namelocation}</td>
                            </tr>
                            <tr>
                                <td>Study mode:</td>
                                <td>${rowData.data.studymode}</td>
                            </tr>
                            <tr>
                                <td>Level:</td>
                                <td>${rowData.data.level}</td>
                            </tr>
                            <tr>
                                <td>Course ranking:</td>
                                <td>${rowData.data.ranking}</td>
                            </tr>
                            <tr>
                                <td>Tuition fee:</td>
                                <td>${rowData.data.tuitionfee}</td>
                            </tr>
                            <tr>
                                <td>location:</td>
                                <td>${rowData.data.location}</td>
                            </tr>
                            <tr>
                                <td>Entry requirement:</td>
                                <td>${rowData.data.EntryRequirement}</td>
                            </tr>
                            <tr>
                                <td>IELTS/TOFEL requirement:</td>
                                <td>${rowData.data.IELTSTOFELRequirement}</td>
                            </tr>
                            <tr>
                                <td>GREGMATSAT requirement:</td>
                                <td>${rowData.data.GREGMATSATRequirement}</td>
                            </tr>
                            <tr>
                                <td>Application open:</td>
                                <td>${rowData.data.Applicationopen}</td>
                            </tr>
                            <tr>
                                <td>Application deadline:</td>
                                <td>${rowData.data.ApplicationDeadline}</td>
                            </tr>
                            <tr>
                                <td>URL:</td>
                                <td>${rowData.data.URL}</td>
                            </tr>
                            
                            <!-- Add more details here -->
                        </table>
                    `;
                            row.child(details).show();
                            tr.addClass('shown');
                        },
                        error: function(response) {
                            // console.log(response);
                        }
                    });
                    // Open this row (You should customize this part to show the details you want)

                }
            });
            $('#location_filter').on('change', function() {
                var searchTerm = this.value;

                // Programmatically filter the DataTable based on the select dropdown
                table.search(searchTerm).draw();

                // Optionally clear the visible search input to hide the programmatically set value
                // This is assuming you have a visible search input for the DataTable
                $('#dt-search-1').val('');
            })
        });
        $(document).ready(function() {
            let selectedCourseIds = [];
            $('#bulk_action').change(function() {
                if ($(this).val() === 'all') {
                    $('.course-checkbox').prop('checked', true);
                } else {
                    $('#bulk-delete-form').submit();
                }
                updateSelectedCourseIds();
            });

            $('.course-checkbox').change(function() {
                updateSelectedCourseIds();
            });

            function updateSelectedCourseIds() {
                
                $('.course-checkbox:checked').each(function() {
                    selectedCourseIds.push($(this).val());
                });
                $('#selected_course_ids').val(selectedCourseIds.join(','));
            }

            // $('#bulkActionForm').submit(function(e) {
            //     if ($('#bulk_action').val() === 'delete_selected' && !$('#selected_course_ids').val()) {
            //         e.preventDefault();
            //         alert('Please select at least one course.');
            //     }
            // });

            $('#bulk_action').on('change', function(){
                if($(this).val() == 'delete_selected') {
                   
                }
            })
        });
    </script>
@endsection
