@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                {{-- <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                      <h5 class="m-b-10">Sample Page</h5>
                                  </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item">Subscriptions</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">



                            <div class="col-md-12">
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Subscriptions</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>User Name</th>
                                                        <th>Email</th>

                                                        <th>Subscriptions</th>


                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)

                                                    <tr>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                          @if ($user->subscriptions->count())
                                                            <button type="button"  data-toggle="modal" data-target="#model{{$user->id}}"  class="btn btn-primary btn-sm" name="button">View</button>
                                                            <div class="subscription_{{$user->id}} row">

                                                              @include('billing.include.allSubscription', [
                                                                'user'=>$user
                                                              ])

                                                          </div>
                                                          @else
                                                            No Subscriptions
                                                          @endif
                                                        </td>

                                                        <td>


                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  @if ($users->count() < 1)
                                                  <tr>
                                                  <td colspan="7" class="text-center">
                                                      <h3>No Records</h3>
                                                  </td>
                                                  </tr>
                                                  @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($users->total() > $users->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $users->links() !!}

                                        </div>
                                    </div>
                                    @endif


                                </div>
                            </div>


                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
