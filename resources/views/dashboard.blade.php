@extends('layouts.app')
@section('page-content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light"
                                    id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Analytics</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class='uil uil-users-alt float-end'></i>
                        <h6 class="text-uppercase mt-0">today Bookings</h6>
                        <h3 class="my-2">{{$todayBooking}}</h3>
                        
                    </div> <!-- end card-body-->
                </div>
                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class='uil uil-users-alt float-end'></i>
                        <h6 class="text-uppercase mt-0">All Bookings</h6>
                        <h3 class="my-2">{{$allBooking}}</h3>
                       
                    </div> <!-- end card-body-->
                </div>
                <!--end card-->

                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class='uil uil-window-restore float-end'></i>
                        <h6 class="text-uppercase mt-0 text-success">Successful transactions</h6>
                        <h3 class="my-2">{{$successTrans}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold">Amount (GHS):</span>
                                {{$sumTransSuccess}}</span>
                        </p>
                    </div> <!-- end card-body-->
                </div>

                <div class="card tilebox-one">
                    <div class="card-body">
                        <i class='uil uil-window-restore float-end'></i>
                        <h6 class="text-uppercase mt-0 text-danger">Failed transactions</h6>
                        <h3 class="my-2">{{$failedTrans}}</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold">Amount (GHS):</span>
                                {{$sumTrans}}</span>
                            {{-- <span class="text-nowrap">Since previous week</span> --}}
                        </p>
                    </div> <!-- end card-body-->
                </div>
                <!--end card-->

                {{-- <div class="card cta-box overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h3 class="m-0 fw-normal cta-box-title">Enhance your <b>Campaign</b> for
                                    better outreach <i class="mdi mdi-arrow-right"></i></h3>
                            </div>
                            <img class="ms-3" src="assets/images/svg/email-campaign.svg" width="92"
                                alt="Generic placeholder image">
                        </div>
                    </div>
                    <!-- end card-body -->
                </div> --}}
            </div> <!-- end col -->

            <div class="col-xl-9 col-lg-8">
                <div class="card card-h-100">
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            Property HY1xx is not receiving hits. Either your site is not receiving any
                            sessions or it is not tagged correctly.
                        </div>
                        <ul class="nav float-end d-none d-lg-flex">
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">7d</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">15d</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">1m</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted" href="#">1y</a>
                            </li>
                        </ul>
                        <h4 class="header-title mb-3">Sessions Overview</h4>

                        <div dir="ltr">
                            <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97">
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
        </div>

        <!-- end row -->

    </div>
    <!-- container -->

</div>
@endsection