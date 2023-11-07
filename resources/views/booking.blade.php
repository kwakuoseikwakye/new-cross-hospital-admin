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
                                                {{-- <th>Email</th> --}}
                                                <th>Amount</th>
                                                <th>Booking Date</th>
                                                <th>Service</th>
                                                <th>Status</th>
                                                <th>Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->

                                <div class="tab-pane " id="basic-datatable-code">
                                    <form id="today-form-filter">
                                        @csrf
                                        <div class="row g-3 align-items-center mb-3">
                                            <div class="col-auto">
                                                <label for="inputPassword6" class="col-form-label">From</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="date" id="today-from-date" class="form-control"
                                                    aria-describedby="passwordHelpInline" required>
                                            </div>
                                            <div class="col-auto">
                                                <label for="inputPassword6" class="col-form-label">To</label>
                                            </div>
                                            <div class="col-auto">
                                                <input type="date" id="today-to-date" class="form-control"
                                                    aria-describedby="passwordHelpInline" required>
                                            </div>
                                            <div class="col-auto">
                                                <span id="passwordHelpInline" class="form-text">
                                                    <button type="submit" class="btn btn-primary" id="today-submit-button"
                                                        form="today-form-filter">Filter</button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <table id="booking-table" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                {{-- <th>Email</th> --}}
                                                <th>Amount</th>
                                                <th>Booking Date</th>
                                                <th>Service</th>
                                                <th>Status</th>
                                                <th>Visited</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div> <!-- end preview code-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div>
        @include('info')
        @include('send_sms')
        @push('js-scripts')
            <script>
                var todayBookingTable = $('#today-booking-table').DataTable({
                    "lengthChange": false,
                    dom: 'Bfrtip',
                    processing: true,
                    ordering: false,
                    order: [],
                    ajax: {
                        url: '/api/fetch_today_booking',
                        type: "GET",
                    },
                    columns: [{
                            data: "name"
                        },
                        // {
                        //     data: "email"
                        // },
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
                        },
                        {
                            data: "visit"
                        },
                        {
                            data: "action"
                        },
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
                    order: [],
                    responsive: true,
                    ajax: {
                        url: '/api/all_booking',
                        type: "GET",
                    },
                    columns: [{
                            data: "name"
                        },
                        // {
                        //     data: "email"
                        // },
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
                        },
                        {
                            data: "visit"
                        },
                        {
                            data: "action"
                        },
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

                //View booking info
                $("#booking-table").on("click", ".booking-info-btn", function() {
                    let data = bookingTable.row($(this).parents('tr')).data();

                    $("#booking-info-modal").modal("show");
                    $("#full-details-status").html(data.status);
                    $("#full-details-name").html(data.name);
                    $("#full-details-email").html(data.email);
                    $("#full-details-phone").html(data.phone);
                    $("#full-details-date").html(data.date);
                    $("#full-details-message").html(data.message);
                    $("#full-details-service").html(data.service);
                    $("#full-details-amount").html(data.amount);

                });

                //update status
                $("#booking-table").on("click", ".update-status-btn", function() {
                    let data = bookingTable.row($(this).parents('tr')).data();

                    Swal.fire({
                        title: 'Has the patient visited the hospital?',
                        text: "Click 'Yes' to approve",
                        icon: 'info',
                        showCancelButton: false,
                        cancelButtonText: 'No',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'

                    }).then((result) => {

                        if (result.value) {
                            Swal.fire({
                                text: "Processing please wait...",
                                showConfirmButton: false,
                                allowEscapeKey: false,
                                allowOutsideClick: false
                            });
                            fetch(`/api/has_visited/${data.id}`, {
                                method: "GET",
                            }).then(function(res) {
                                return res.json()
                            }).then(function(data) {
                                if (!data.status) {
                                    Swal.fire({
                                        text: "An internal error ocurred",
                                        icon: "error"
                                    });
                                    return;
                                }
                                Swal.fire({
                                    text: "Visited status updated  successfully",
                                    icon: "success"
                                });

                                bookingTable.ajax.reload(null, false);

                            }).catch(function(err) {
                                if (err) {
                                    Swal.fire({
                                        text: "An error has ocurred"
                                    });
                                }
                            })
                        }
                    })
                });

                //send reminders msg
                $("#booking-table").on("click", ".send-reminder-btn", function() {
                    let data = bookingTable.row($(this).parents('tr')).data();

                    $("#send-msg-modal").modal("show");
                    $("#message-recipient-phone").val(data.phone);
                    $("#message-recipient-code").val(data.id);
                });

                /*
                 *FOR TODAY BOOKING SCRIPT
                 */
                //send reminders msg
                $("#today-booking-table").on("click", ".send-reminder-btn", function() {
                    let data = todayBookingTable.row($(this).parents('tr')).data();

                    $("#send-msg-modal").modal("show");
                    $("#message-recipient-phone").val(data.phone);
                    $("#message-recipient-code").val(data.id);
                });

                //update status
                $("#today-booking-table").on("click", ".update-status-btn", function() {
                    let data = todayBookingTable.row($(this).parents('tr')).data();

                    Swal.fire({
                        title: 'Has the patient visited the hospital?',
                        text: "Click 'Yes' to approve",
                        icon: 'info',
                        showCancelButton: false,
                        cancelButtonText: 'No',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'

                    }).then((result) => {

                        if (result.value) {
                            Swal.fire({
                                text: "Processing please wait...",
                                showConfirmButton: false,
                                allowEscapeKey: false,
                                allowOutsideClick: false
                            });
                            fetch(`/api/has_visited/${data.id}`, {
                                method: "GET",
                            }).then(function(res) {
                                return res.json()
                            }).then(function(data) {
                                if (!data.status) {
                                    Swal.fire({
                                        text: "An internal error ocurred",
                                        icon: "error"
                                    });
                                    return;
                                }
                                Swal.fire({
                                    text: "Visited status updated  successfully",
                                    icon: "success"
                                });

                                todayBookingTable.ajax.reload(null, false);

                            }).catch(function(err) {
                                if (err) {
                                    Swal.fire({
                                        text: "An error has ocurred"
                                    });
                                }
                            })
                        }
                    })
                });

                $("#today-booking-table").on("click", ".booking-info-btn", function() {
                    let data = todayBookingTable.row($(this).parents('tr')).data();

                    $("#booking-info-modal").modal("show");
                    $("#full-details-status").html(data.status);
                    $("#full-details-name").html(data.name);
                    $("#full-details-email").html(data.email);
                    $("#full-details-phone").html(data.phone);
                    $("#full-details-date").html(data.date);
                    $("#full-details-message").html(data.message);
                    $("#full-details-service").html(data.service);
                    $("#full-details-amount").html(data.amount);

                });

                let todayFormFilter = document.getElementById('today-form-filter');
                let todayFrom = document.getElementById("today-from-date");
                let todayTo = document.getElementById("today-to-date");
                let todaySubmitBtn = document.getElementById("today-submit-button");

                todayFormFilter.addEventListener("submit", function(e) {
                    e.preventDefault();

                    let from = todayFrom.value;
                    let to = todayTo.value;

                    bookingTable.ajax.url(`/api/filter_all_booking/${from}/${to}`).load();
                });
            </script>
        @endpush
    @endsection
