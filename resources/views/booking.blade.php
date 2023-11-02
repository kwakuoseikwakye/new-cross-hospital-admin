@extends('layouts.app')
@section('page-content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">All Bookings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Bookings</h4>

                            <ul class="nav nav-tabs nav-bordered mb-3">
                                <li class="nav-item">
                                    <a href="#basic-datatable-preview" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link active">
                                        Today Bookings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#basic-datatable-code" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link">
                                        All Bookings
                                    </a>
                                </li>
                            </ul> <!-- end nav-->
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="today-booking-table" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Booking Date</th>
                                                <th>Service</th>
                                                <th>Status</th>
                                                {{-- <th>Message</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  --}}
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->

                                <div class="tab-pane " id="basic-datatable-code">
                                    <table id="booking-table" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Booking Date</th>
                                                <th>Service</th>
                                                <th>Status</th>
                                                {{-- <th>Message</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{--  --}}
                                        </tbody>
                                    </table>
                                </div> <!-- end preview code-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div>
        @push('js-scripts')
            <script>
                var todayBookingTable = $('#today-booking-table').DataTable({
                    "lengthChange": false,
                    dom: 'Bfrtip',
                    processing: true,
                    ordering: false,
                    order : [],
                    ajax: {
                        url: '/api/fetch_today_booking',
                        type: "GET",
                    },
                    columns: [{
                            data: "name"
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "amount"
                        },
                        {
                            data: "date"
                        },
                        {
                            data: "service"
                        },
                        {
                            data: "status"
                        }
                        //   {
                        //       data: null,
                        //       defaultContent: "<button href = '#' title='View student info' class='btn btn-outline-secondary btn-sm info-btn'> <i class='far fa-user'></i> </button> <button href = '#' title='Update student info' class='btn btn-outline-info btn-sm edit-btn' > <i class='fas fa-edit'></i> </button> <button href = '#' title='Delete student' class='btn btn-outline-danger btn-sm delete-btn' onclick = deleteStudent()> <i class='far fa-trash-alt'></i> </button>",
                        //   },
                    ],
                    buttons: [{
                            extend: 'print',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'copy',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'excel',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'pdf',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            text: "Refresh",
                            attr: {
                                class: "ml-2 btn-secondary btn btn-sm rounded"
                            },
                            action: function(e, dt, node, config) {
                                dt.ajax.reload(null, false);
                            }
                        },
                    ]
                });

                var bookingTable = $('#booking-table').DataTable({
                    "lengthChange": false,
                    dom: 'Bfrtip',
                    processing: true,
                    ordering: false,
                    order : [],
                    responsive: true,
                    ajax: {
                        url: '/api/all_booking',
                        type: "GET",
                    },
                    columns: [{
                            data: "name"
                        },
                        {
                            data: "email"
                        },
                        {
                            data: "amount"
                        },
                        {
                            data: "date"
                        },
                        {
                            data: "service"
                        },
                        {
                            data: "status"
                        }
                        //   {
                        //       data: null,
                        //       defaultContent: "<button href = '#' title='View student info' class='btn btn-outline-secondary btn-sm info-btn'> <i class='far fa-user'></i> </button> <button href = '#' title='Update student info' class='btn btn-outline-info btn-sm edit-btn' > <i class='fas fa-edit'></i> </button> <button href = '#' title='Delete student' class='btn btn-outline-danger btn-sm delete-btn' onclick = deleteStudent()> <i class='far fa-trash-alt'></i> </button>",
                        //   },
                    ],
                    buttons: [{
                            extend: 'print',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'copy',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'excel',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            extend: 'pdf',
                            title: `Booking Lists`,
                            attr: {
                                class: "btn btn-sm btn-info rounded-right"
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            }
                        },
                        {
                            text: "Refresh",
                            attr: {
                                class: "ml-2 btn-secondary btn btn-sm rounded"
                            },
                            action: function(e, dt, node, config) {
                                dt.ajax.reload(null, false);
                            }
                        },
                    ]
                });
            </script>
        @endpush
    @endsection
