@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content p-2">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper m-0 p-0">

                        <div class="container fontSizeGeneralControl pl-0 pl-sm-1 pl-md-2 pr-0 pr-sm-1 pr-md-2">
                            <div class="row nleftrightm">

                                <div class="col-12 headingBlack">
                                    Task Projects
                                </div>

                            </div>


                            <div class="row nleftrightm mt-4">

                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="card p-2 shadow-sm">
                                        <div class="card-body p-0">
                                            <div class="row m-0">
                                                <div class="@if($graphicDesing == 0) inActiveProject @endif taskProjectIcon">
                                                    <i class="align-self-center fa-paint-brush fas"></i>
                                                </div>
                                                <div class="taskprojectTitle">
                                                    <div class="align-self-center fontSizeGeneralControl">
                                                        Graphic Design
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="card p-2 shadow-sm">
                                        <div class="card-body p-0">
                                            <div class="row m-0">
                                                <div class="@if($webDevelopment == 0) inActiveProject @endif taskProjectIcon">
                                                    <i class="align-self-center fas fa-code"></i>
                                                </div>
                                                <div class="taskprojectTitle">
                                                    <div class="align-self-center">
                                                        Web Development
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="card p-2 shadow-sm">
                                        <div class="card-body p-0">
                                            <div class="row m-0">
                                                <div class="@if($marketingCount == 0) inActiveProject @endif taskProjectIcon">
                                                    <i class="align-self-center fas fa-bullhorn"></i>
                                                </div>
                                                <div class="taskprojectTitle">
                                                    <div class="align-self-center">
                                                        Marketing
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="card p-2 shadow-sm">
                                        <div class="card-body p-0">
                                            <div class="row m-0">
                                                <div class="@if($marketingCount != 0 || $webDevelopment != 0 || $graphicDesing != 0) @else inActiveProject @endif taskProjectIcon">
                                                    <i class="align-self-center fas fa-plus-square"></i>
                                                </div>
                                                <div class="taskprojectTitle">
                                                    <div class="align-self-center">
                                                        <a href="{{ route('orders.index') }}">Add New Project</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="row nleftrightm mt-4">
                                <div class="col-xl-6 col-lg-12">
                                    <div class="row">
                                        <div class="col-12 headingBlack">
                                            Client Task Overview
                                        </div>
                                    </div>
                                    <div class="card  mt-3">
                                        <div class="card-header">
                                            <div class="row">

                                                <div class="col-6">
                                                    2 out of 4 Task Completed
                                                </div>
                                                <div class="col-6">
                                                   <div class="progress">
                                                     <div class="progress-bar progress-c-theme" role="progressbar" style="width:50%;height:11px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pb-0 pr-0">


                                            <div class="row">
                                                <div class="col-lg-8 col-7 ">
                                                    Design a Prototype of Landing Page
                                                    <br>
                                                    <div class="clientTaskDue">
                                                        Due Date: 12 June 2020
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-5 ">
                                                    <a href="#" class="btn btn-outline-primary">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-8 col-7 ">
                                                    Design a Prototype of Landing Page
                                                    <br>
                                                    <div class="clientTaskDue">
                                                        Due Date: 12 June 2020
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-5 ">
                                                    <a href="#" class="btn btn-outline-primary">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-12 text-center">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="row">
                                        <div class="col-12 headingBlack">
                                            Design Services
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-body pt-3 pl-3 pb-3 pr-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/Logo Design icon.png') }}" alt="">
                                                    <span class="ml-1">Logo Designing</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/business card icon.png') }}" alt="">
                                                    <span class="ml-1">Business Card Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/flyer Design.png') }}" alt="">
                                                    <span class="ml-1">Flayer Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/web design icon.png') }}" alt="">
                                                    <span class="ml-1">Website Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/menu card design icon.png') }}" alt="">
                                                    <span class="ml-1">Price Menu Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/social media kit icon.png') }}" alt="">
                                                    <span class="ml-1">Social Media Kit Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 col-12 ">
                                    <div class="row">
                                        <div class="col-12 headingBlack">
                                            Marketing Services
                                        </div>
                                    </div>
                                    <div class="card  mt-3">
                                        <div class="card-body  pt-3 pl-3 pb-3 pr-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/Logo Design icon.png') }}" alt="">
                                                    <span class="ml-1">Logo Designing</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/business card icon.png') }}" alt="">
                                                    <span class="ml-1">Business Card Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/flyer Design.png') }}" alt="">
                                                    <span class="ml-1">Flayer Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/web design icon.png') }}" alt="">
                                                    <span class="ml-1">Website Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/menu card design icon.png') }}" alt="">
                                                    <span class="ml-1">Price Menu Design</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/social media kit icon.png') }}" alt="">
                                                    <span class="ml-1">Social Media Kit Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row nleftrightm mt-4 mb-5">
                              <div class="col-12 headingBlack">
                                  Active Projects
                              </div>

                              @foreach ($orders as $order)

                                <div class="col-lg-3 positionReltive col-md-4 col-sm-6 col-12">
                                  <div class="card  shadow-sm p-4">
                                    <div class="projectActiveDashboarddown align-self-center">

                                    @if ($order->type == 0)
                                      <i class="align-self-center fa-paint-brush fas"></i>
                                    @elseif ($order->type == 1)
                                      <i class="align-self-center fas fa-book"></i>
                                    @elseif ($order->type == 2)
                                      <i class="align-self-center fas fa-address-card"></i>
                                    @elseif ($order->type == 3)
                                      <i class="align-self-center fas fa-bullhorn"></i>
                                    @elseif ($order->type == 4)
                                      <i class="align-self-center fas fa-code"></i>
                                    @endif
                                  </div>




                                    <div class="activeProjecttitle mt-3">
                                      {{ $order->title }}
                                    </div>


                                    <div class="w-100 text-center mb-1 mt-1">

                                      @if ($order->project->status == 1)
                                      <div class="text-center">
                                          Status: Initializing
                                      </div>
                                    @elseif ($order->project->status == 2)
                                      <div class="text-center">
                                          Status: In Progress
                                      </div>
                                    @elseif ($order->project->status == 3)
                                      <div class="text-center">
                                          Status: In Review
                                      </div>
                                    @elseif ($order->project->status == 10)
                                      <div class="text-center">
                                          Status: Completed
                                      </div>
                                    @elseif ($order->project->status == 20)
                                      <div class="text-center">
                                          Status: Cancelled
                                      </div>
                                      @else
                                      Unknown
                                      @endif
                                    </div>


                                    <div class="align-self-center mt-1">
                                      Last Updated: {{ $order->project->updated_at->format('d M, Y') }}
                                    </div>
                                  </div>




                                </div>
                              @endforeach


                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
