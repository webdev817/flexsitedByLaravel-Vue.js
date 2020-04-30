@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper p-3">

                        @include('common.messagesSupport')
                        <div class="row">
                          <div class="col-xl-4 col-lg-12 col-md-12 bg-white orderBoxes d-xl-none">

                              <div class="text-center project-main pb-0">
                                  <a href="{{ route('profileEditSp') }}">
                                      <img
                                      @if ($user->image != null)
                                        src="{{ asset(Storage::url($user->image)) }}"
                                       class="img-fluid "
                                      @else
                                       class="img-radius img-fluid rounded-circle"
                                        src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}"
                                      @endif
                                      alt="User-Profile-Image">
                                      <br>
                                      <i class="fas fa-pencil-alt"></i>
                                  </a>

                                  <h6 class="mt-4">{{ $user->name }}</h6>

                                  <div class="row mt-3">
                                      <div class="col-12 pl-0 pr-0 profileSPBusinessName">
                                          Business Name
                                          <br>
                                          @if ($user->businessName != null)
                                          {{ $user->businessName }}

                                          @endif

                                      </div>
                                  </div>

                              </div>

                              <div class="w-100 mt-4">
                                  <h6 class="float-left text-dark bold">Personal Information</h6>
                                  <a href="{{ route('profileEditSp') }}" class="float-right ">Edit Info.</a>
                              </div>
                              <div class="w-100 row mt-2">


                                  <table class="table">

                                      <tr>
                                          <td align="center">
                                              <div class="roundForIcon">
                                                  <i class="fa fa-phone"></i>
                                              </div>
                                          </td>
                                          <td class="fontSize14px">
                                              {{ $user->phone }}
                                              <br>
                                              Phone No
                                          </td>
                                      </tr>

                                      <tr>
                                          <td align="center">
                                              <div class="roundForIcon">
                                                  <i class="fa fa-envelope"></i>
                                              </div>
                                          </td>
                                          <td class="fontSize14px">
                                              {{ $user->email }}
                                              <br>
                                              Email Address
                                          </td>
                                      </tr>
                                      <tr>
                                          <td align="center">
                                              {{-- <div class="roundForIcon">
                                                  <i class="fa fa-envelope"></i>
                                              </div> --}}
                                          </td>
                                          <td class="fontSize14px">
                                              <a  href="javascript:void(0)"
                                              data-toggle="modal" data-target="#closeAccount"
                                               class="btn btn-danger">Close Account</a>
                                          </td>
                                      </tr>


                                  </table>




                              </div>



                          </div>

                            <div class="col-xl-8 col-lg-12 col-md-12 pl-0 mb-3">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-6">
                                        <h5 class="headingColor">
                                            <a class="linkspCPassword @if(requestIsFromArray(['changePasswordSP'])) border-bottom-0 @endif" href="{{ route('profile') }}">Billing History</a>
                                        </h5>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                        <h5 class="headingColor">
                                            <a class="linkspCPassword @if(requestIsFromArray(['profile'])) border-bottom-0 @endif" href="{{ route('changePasswordSP') }}">Security</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row bg-white orderBoxes ml-0 mr-0 mt-4 table-responsive">


                                  @if (count($invoices) > 0)
                                  <table class="table  table-bordered m-0 m-0 p-0">

                                      <tr>

                                          <th>Date</th>
                                          <th>Detail</th>
                                          <th>Amount</th>
                                          <th>Invoice Id</th>
                                          <th>Action</th>
                                      </tr>
                                      @foreach ($invoices as $key => $invoice)

                                      <tr>

                                          <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                          <th>
                                            @include('supportPortal.users.detailCalc',['invoice'=> $invoice])
                                          </th>
                                          <td>{{ $invoice->total() }}</td>
                                          <td>{{ $invoice->id }}</td>
                                          <td class="col-xs-2 ">
                                              <a href="{{ route('invoiceDownload',[$invoice->id,
                                                    'userId'=>Auth::id()
                                                    ]) }}" class="btn btn-primary btn-sm">Download</a>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </table>
                                  @else
                                  <div class="jumbotron text-center">
                                      <p>No billing history</p>
                                  </div>
                                  @endif
                                </div>
                            </div>


                            <div class="col-xl-4 col-lg-12 col-md-12 bg-white orderBoxes d-none d-xl-block">

                                <div class="text-center project-main pb-0">
                                    <a href="{{ route('profileEditSp') }}">
                                        <img
                                        @if ($user->image != null)
                                          src="{{ asset(Storage::url($user->image)) }}"
                                         class="img-fluid "
                                        @else
                                         class="img-radius img-fluid rounded-circle"
                                          src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}"
                                        @endif
                                        alt="User-Profile-Image">
                                    </a>

                                    <h6 class="mt-4">{{ $user->name }}</h6>

                                    <div class="row mt-3">
                                        <div class="col-12 pl-0 pr-0 profileSPBusinessName">
                                            Business Name
                                            <br>
                                            @if ($user->businessName != null)
                                            {{ $user->businessName }}

                                            @endif

                                        </div>
                                    </div>

                                </div>

                                <div class="w-100 mt-4">
                                    <h6 class="float-left text-dark bold">Personal Information</h6>
                                    <a href="{{ route('profileEditSp') }}" class="float-right ">Edit Info.</a>
                                </div>
                                <div class="w-100 row mt-2">


                                    <table class="table">

                                        <tr>
                                            <td align="center">
                                                <div class="roundForIcon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            </td>
                                            <td class="fontSize14px">
                                                {{ $user->phone }}
                                                <br>
                                                Phone No
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="center">
                                                <div class="roundForIcon">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                            </td>
                                            <td class="fontSize14px">
                                                {{ $user->email }}
                                                <br>
                                                Email Address
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                {{-- <div class="roundForIcon">
                                                    <i class="fa fa-envelope"></i>
                                                </div> --}}
                                            </td>
                                            <td class="fontSize14px">
                                                <a  href="javascript:void(0)"
                                                data-toggle="modal" data-target="#closeAccount"
                                                 class="btn btn-danger">Close Account</a>
                                            </td>
                                        </tr>


                                    </table>




                                </div>



                            </div>


                        </div>








                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="closeAccount" tabindex="-1" role="dialog" aria-labelledby="closeAccount" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modelcloseAccount" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form   action="{{ route('closeAccountSp') }}" method="post">

        <div class="row">

          <div class="col-12 text-center mt-1">
            <img src="{{ asset('mawaisnow\sp\closeAccount.png') }}" class="img-fluid" alt="">
          </div>
          <div class="col-12 mt-4">

          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <input class="form-control" required  placeholder="Enter new Password" type="password" id="model-password" name="password" value="">
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <input class="form-control"  required placeholder="Re-Enter new Password" type="password" id="model-confirm_password" name="password_confirm" value="">
              </div>
          </div>
          <div class="col-lg-12">
              <div class="form-group">
                  <textarea name="reasontoclose" required rows="4" class="form-control" placeholder="Let us know the reason why you are closing account" cols="80"></textarea>
              </div>
          </div>

          <div class="col-12">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="terms">
                <label class="custom-control-label" for="terms" required>I agree with Terms & Conditions of closing account</label>
            </div>
          </div>

          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block" name="button">Close Account</button>
          </div>

        </div>
      </form>




      </div>


    </div>
  </div>
</div>


@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
<script type="text/javascript">
    $("#marketingService").select2({
        minimumResultsForSearch: -1,
        placeholder: "Which Service are you interested in?"
    }).val(null).change();

</script>
@endsection
