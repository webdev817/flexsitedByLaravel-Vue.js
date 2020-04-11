@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                        <div class="row">
                          <div class="col-8 card">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th><h6>Project Name</h6>  </th>
                                  <th><h6>Due On</h6>        </th>
                                  <th> <h6>Total Amount</h6> </th>
                                  <th> <h6>Status</h6>       </th>
                                </tr>
                              </thead>
                              <thead>
                                <tr>
                                  <td>{{ $project->title }}</td>
                                  <td>--</td>

                                  <td>
                                    {{ $project->order->price }} USD
                                  </td>
                                  <td>
                                    @if ($project->status == 1)
                                      Initializing
                                    @endif
                                  </td>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>

















                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
