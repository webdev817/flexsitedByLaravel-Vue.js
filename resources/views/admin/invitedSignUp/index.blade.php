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
                                        <h5>Requests</h5>

                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Invited By</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone #</th>
                                                        <th>Logo</th>
                                                        <th>Business Card</th>
                                                        <th>Flayer</th>
                                                        <th>Website</th>
                                                        <th>Marketing</th>

                                                </thead>
                                                <tbody>
                                                    @foreach ($referals as $referal)

                                                    <tr>
                                                        <td>
                                                          <a href="{{ route('clientOnBoarding',$referal->user->id) }}">
                                                              {{ $referal->user->name }}
                                                          </a>
                                                        </td>
                                                        <td>
                                                            {{ $referal->name }}
                                                        </td>
                                                        <td>
                                                            {{ $referal->email }}
                                                        </td>
                                                        <td>
                                                            {{ $referal->businessPhoneNumber }}
                                                        </td>
                                                        <td>
                                                          @if ($referal->logoDesign == 1)
                                                            Yes
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($referal->businessCardDesign == 1)
                                                            Yes
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($referal->flayerDesign == 1)
                                                            Yes
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($referal->Website == 1)
                                                            Yes
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($referal->marketing == 1)
                                                            Yes
                                                          @endif
                                                        </td>

                                                    </tr>
                                                  @endforeach
                                                  @if ($referals->count() < 1)
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
                                    @if ($referals->total() > $referals->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $referals->links() !!}

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


@section('jsCommon')
  @include('common.js')
@endsection
