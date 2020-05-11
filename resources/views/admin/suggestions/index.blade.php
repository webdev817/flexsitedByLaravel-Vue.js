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
                                        <h5>Suggestions</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>By</th>
                                                        <th>Suggestions</th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($suggestions as $suggestion)

                                                    <tr>
                                                        <td>
                                                          <a href="{{ route('clientOnBoarding',$suggestion->user->id) }}">
                                                              {{ $suggestion->user->name }}
                                                          </a>
                                                        </td>
                                                        <td>
                                                            {{ $suggestion->suggestion }}
                                                        </td>

                                                    </tr>
                                                  @endforeach
                                                  @if ($suggestions->count() < 1)
                                                  <tr>
                                                  <td colspan="2" class="text-center">
                                                      <h3>No Records</h3>
                                                  </td>
                                                  </tr>
                                                  @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    @if ($suggestions->total() > $suggestions->perPage())
                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">
                                            {!! $suggestions->links() !!}
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
