@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content p-2">
            <div class="pcoded-inner-content">

                <div class="main-body">
                  @include('common.messagesSupport')

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
                                                <div class="@if($graphicDesign == 0) inActiveProject @endif taskProjectIcon">
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
                                                        Marketing &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                    <div class="card p-2 shadow-sm" onclick="location = '{{ route('orders.index') }}'">
                                        <div class="card-body p-0">
                                            <div class="row m-0">
                                                <div class="@if($marketingCount != 0 || $webDevelopment != 0 || $graphicDesign != 0) @else inActiveProject @endif taskProjectIcon">
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


                                    @if ($clientTaskObj->totalCount)


                                    <div class="card  mt-3">
                                        <div class="card-header">
                                            <div class="row">

                                                <div class="col-6">
                                                    {{ $clientTaskObj->completedCount }} out of {{ $clientTaskObj->totalCount }} Task Completed
                                                </div>
                                                <div class="col-6">
                                                   <div class="progress">
                                                     <div class="progress-bar progress-c-theme" role="progressbar" style="width: {{ $clientTaskObj->percentage }}%;height:11px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body minHeightOfTasks pb-0 pr-0">


                                          @foreach ($clientTaskObj->tasks as $task)

                                            <div class="row mb-2">
                                                <div class="col-lg-8 col-7 ">
                                                    {{ $task->title }}
                                                    <br>
                                                    <div class="clientTaskDue">
                                                        Due Date: {{ $task->dueOn }}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-5 ">
                                                    <a href="{{ route('clientTasks.show',$task->id) }}" class="btn btn-outline-primary">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                          @endforeach


                                          @if ($clientTaskObj->tasks->total() > $clientTaskObj->tasks->perPage())

                                          <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                              <div class="d-flex form-layout-footer justify-content-center submitSection">

                                                  {!! $clientTaskObj->tasks->links() !!}

                                              </div>
                                          </div>
                                          @endif

                                        </div>

                                    </div>
                                    @else
                                      <div class="card  mt-3">
                                          <div class="card-header ">
                                          <div class="row">
                                            <div class="col-12 minHeightForNoTasks">
                                              <div class="d-flex justify-content-center self-align-center">
                                                <h6 class="">No Task Assigned</h6>

                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    @endif


                                </div>


                                <div class="col-xl-3 col-lg-6 col-12">
                                    <div class="row">
                                        <div class="col-12 headingBlack">
                                            Design Services
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <div class="card-body pt-3 pl-3 pb-4 pr-0">
                                            <div class="row pb-1">
                                                <div class="col-12">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/Logo Design icon.png') }}" alt="">
                                                    <span class="ml-1">Logo Design</span>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/flyer Design.png') }}" alt="">
                                                    <span class="ml-1">Flyer Design</span>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/business card icon.png') }}" alt="">
                                                    <span class="ml-1">Business Card Design</span>
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/social media kit icon.png') }}" alt="">
                                                    <span class="ml-1">Social Media Design</span>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/web design icon.png') }}" alt="">
                                                    <span class="ml-1">Website Design</span>
                                                </div>
                                                {{-- <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/sIcon/menu card design icon.png') }}" alt="">
                                                    <span class="ml-1">Price Menu Design</span>
                                                </div> --}}

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
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/brand icon.png') }}" alt="">
                                                    <span class="ml-1">Brand Strategy</span>
                                                </div>

                                                <div class="col-12 mt-2">
                                                  <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/email market icon.png') }}" alt="">
                                                  <span class="ml-1">Email Marketing</span>
                                                </div>

                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/social marketing.png') }}" alt="">
                                                    <span class="ml-1">Social Media Marketing</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/SEO.png') }}" alt="">
                                                    <span class="ml-1">Search Engine Optimization</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/video market icon.png') }}" alt="">
                                                    <span class="ml-1">Video Marketing</span>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/content icon.png') }}" alt="">
                                                    <span class="ml-1">Content Marketing</span>
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
                                  <div class="card  shadow-sm p-4"
                                  @if ($order->project->status != 1)
                                  onclick="location = '{{ route('projects.show',$order->project->id) }}'"
                                  @endif
                                  >
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
                                      @if ($order->project->status != 1)
                                        <a href="{{ route('projects.show',$order->project->id) }}">
                                          {{ $order->title }}
                                        </a>
                                      @else
                                        {{ $order->title }}
                                      @endif

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

<div id="suggestion" class="suggestion  hand">
  <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/brand icon.png') }}" alt="">
  Any Suggestions?
</div>
<form action="{{ route('suggestionStore') }}" method="post">
  @csrf
  <div id="suggestionBox" class="suggestionBox hide">
    <div class="header p-2">
      <img class="img-fluid" src="{{ asset('mawaisnow/sp/dashboard/brand icon.png') }}" alt="">
      Any Suggestions?
      <i id="closeSuggestBox" class="float-right hand mt-2 mr-2 fa fa-minus"></i>
    </div>
    <div class="body p-2">
      <textarea name="suggestion" class="form-control" placeholder="Please type here" rows="8" cols="80"></textarea>
      <br>
      <button type="submit" class="btn btn-primary btn-block btn-sm" name="button">Submit</button>
    </div>
  </div>
</form>

<div class="modal fade" id="support-pop">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header text-center p-5" style= "background-color:black;">
            <img src = "{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" class="w-100">
            </div>
            
            <!-- Modal body -->
            <div class="modal-body pt-5 pl-md-5 pr-md-5 pb-3">
                <div class=" pl-md-4 ">
                <h5 class="text-center mb-4"><strong>Welcome to the Flexsited Client Support Portal</strong></h5>
                <p>Here you can:</p>
                <p>1) View Your Project Status</p>
                <p>2) View Your Tasks</p>
                <p>3) Review and Approve Your Project</p>
                <p>4) Chat With Your Project Manager</p>
                </div>            
            </div>
            
            <!-- Modal footer -->
            <div class="text-center mt-3 mb-4" >
            <button type="button" class="btn pt-2 pb-2 pl-4 pr-4" data-dismiss="modal" style="background-color:#5AC9C6; color:white!important;">Great!</button>
            </div>
            
        </div>
    </div>
</div>

<style media="screen">
  @media (max-width: 767px) {
    .taskprojectTitle {
      padding-left: 10px;
      justify-content: left;
    }
  }
  .suggestion{
    text-align: center;
    width: 180px;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #63C6B4;
    padding: 10px;
    color: white;
    border-radius: 49px;
  }
  .suggestionBox> .header{
    background: #63C6B4;
    color: white;
  }
  .suggestionBox{
    width: 300px;
    color: white;
    position: fixed;
    bottom: 0px;
    right: 20px;
    background: white;
  }

  .hide{
    display: none;
  }
</style>
@endsection

@section('js')
  <script type="text/javascript">
   $( document ).ready(function() {

      if (localStorage.getItem('isModal') === 'true')
        $('#support-pop').modal();
      localStorage.setItem('isModal', 'false');
    });
    $("#suggestion").click(function () {
      $("#suggestionBox").removeClass('hide');
      $(this).removeClass('hide').addClass('hide');
    });

    $("#closeSuggestBox").click(function () {
      $("#suggestion").removeClass('hide');
      $("#suggestionBox").removeClass('hide').addClass('hide');
    });
  </script>
@endsection
