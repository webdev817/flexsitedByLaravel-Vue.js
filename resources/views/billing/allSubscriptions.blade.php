@extends('layouts.master')

@section('css')
<style media="screen">
.table:not([class*=" table-colored"]) tbody tr td {
  border-color: #343a40;
  color: white;
}
.list-group-item {
    background-color: #212529;
    border-color: #343a40;
    color: white;
}
</style>

@endsection
@section('body')
<div class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Subscriptions</li>
        </ol>
        <h6 class="slim-pagetitle">All Subscriptions</h6>
    </div>
    @include('common.messages')

    <div class="card p-4">
        <form method='get' action="{{ route('allSubscriptions') }}">
          {{-- @csrf --}}
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" name="s"
                        @if ($s != null)
                          value="{{ $s }}"
                        @endif
                          class="form-control" placeholder="Search....">
                    </div>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                    @if ($s !== null)
                      <button type="button" name="button" onclick="window.location = '{{ route('allSubscriptions') }}'" class="btn btn-outline-primary btn-sm ml-3">Clear</button>

                    @endif
                </div>
            </div>
            </form>
    </div>
    <div class="m-0 row  mt-4">

          @if ( $users->count())
          <div class="section-wrapper p-0 col-12  m-height-200px">
              <div class="form-layout">
                     <table class="table table-hover">
                      <thead>
                        <tr>
                          {{-- <th>Company</th> --}}
                          <th>Name</th>
                          <th>Subscriptions</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            {{-- @if (superAdmin())
                              <td>
                                <a href="javascript:void(0)" class="companyClick" data-id="{{$user->id}}">{{$user->company->name}}</a>
                              </td>
                            @endif --}}
                            <td>{{$user->name}}</td>
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

                              {{-- <a href="#"  data-toggle="modal" data-target="#delUser{{$user->id}}" class="btn btn-danger btn-sm">Delete Company And Account</a> --}}

                              {{-- <div class="modal fade" id="delUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modal{{$user->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width:900px">
                                  <div class="modal-content">
                                    <div class="modal-header p-2 shadow-sm">
                                      <h5 class="modal-title" id="modal{{$user->id}}">Are you sure you ?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body pt-4 pb-4">
                                      Are you sure you want to delete company account from  <strong>Quality Consortium Services</strong> ?


                                    </div>
                                    <div class="bg-white modal-footer p-2">

                                      <form action="{{ route('users.destroy',$user->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                      </form>

                                    </div>
                                  </div>
                                </div>
                              </div> --}}




                            </td>

                          </tr>

                        @endforeach
                      </tbody>
                    </table>

                  <div class="d-flex form-layout-footer justify-content-center submitSection">

                    @if ($s != null)
                      {!! $users->appends([ 's'=>$s])->links() !!}
                    @else
                      {!! $users->links() !!}
                    @endif
                  </div>
              </div>
          </div>
          @endif



</div>

@endsection
