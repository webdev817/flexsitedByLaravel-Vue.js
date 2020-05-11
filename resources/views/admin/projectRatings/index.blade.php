@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">



                            <div class="col-md-12">
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Project Reviews</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>By</th>
                                                        <th>Name</th>
                                                        <th>Rating</th>
                                                        <th>Message</th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $project)

                                                    <tr>
                                                        <td>
                                                          <a href="{{ route('clientOnBoarding',$project->user->id) }}">
                                                              {{ $project->user->name }}
                                                          </a>
                                                        </td>
                                                        <td>
                                                            {{ $project->title }}
                                                        </td>
                                                        <td>
                                                          <div class="txt1">
                                                            @if ($project->stars == 1)
                                                              <i class="fa fa-star"></i>
                                                            @elseif ($project->stars == 2)
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                            @elseif ($project->stars == 3)
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                            @elseif ($project->stars == 4)
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                            @elseif ($project->stars == 5)
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                              <i class="fa fa-star"></i>
                                                            @endif

                                                          </div>
                                                        </td>
                                                        <td>
                                                          {{ $project->improveMessage }}
                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  @if ($projects->count() < 1)
                                                  <tr>
                                                  <td colspan="4" class="text-center">
                                                      <h3>No Records</h3>
                                                  </td>
                                                  </tr>
                                                  @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($projects->total() > $projects->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $projects->links() !!}

                                        </div>
                                    </div>
                                    @endif


                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsCommon')
  @include('common.js')
@endsection
