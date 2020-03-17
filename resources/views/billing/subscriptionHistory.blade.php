@extends('layouts.admin')

@section('css')
<style media="screen">
    .table-bordered tbody tr:last-child td {
    border-bottom-color: #343a40;
    color: white;
}
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
            <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Billing Detail</li>
        </ol>
        <h6 class="slim-pagetitle">Billing Detail</h6>
    </div>
    @include('common.messages')





    @if ($subscription->onGracePeriod())
    <div class="alert alert-danger text-center">
        You have cancelled your subscription.<br>
        You have access until {{ $subscription->ends_at->format('F d, Y') }}.
        If you want to continue using {{ config('mawaisnow.title') }} please resume your subscription now.
        <br>
        <form action="{{ route('resumeSubscription') }}" method="post">
            @csrf
            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
            <button type="submit" class="btn btn-success btn-sm" name="button">Resume</button>
        </form>

    </div>
    @endif
    @if ($subscription->ended())
    <div class="bg-dark jumbotron text-center text-white">
        <p>Subscription was cancelled.</p>
        {{-- <a href="/subscribe" class="btn btn-success btn-lg">Subscribe Here</a> --}}
    </div>

    @endif
    <div class="row">


        <div class="col-12 @if($upcomingInvoice)  col-md-7 @else col-md-12 @endif">

            @if (count($invoices) > 0)
            <table class="table table-bordered table-striped table-hover m-0 m-0 p-0 shadow-sm">
                <tr>

                    <th>Date</th>
                    <th>Amount</th>
                    <th>Invoice Id</th>
                    <th>Action</th>
                </tr>
                @foreach ($invoices as $key => $invoice)

                <tr>

                    <td>{{ $invoice->date()->toFormattedDateString() }}</td>

                    <td>{{ $invoice->total() }}</td>
                    <td>{{ $invoice->id }}</td>
                    <td class="col-xs-2 ">
                        <a href="{{ route('invoiceDownload',[$invoice->id,
                              'userId'=>$subscription->user->id
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
        @if ($upcomingInvoice != null)

        <div class="col-12 col-md-5">
            <div class=" list-group list-group-flush">

                <li class="list-group-item">
                    <h3 class="">Details</h3>
                </li>
                <li class="list-group-item">
                    Amount: <span class="float-right">{{ $upcomingInvoice->total() }}</span>
                </li>
                <li class="list-group-item">
                    Term: <span class="float-right">
                        Yearly
                    </span>
                </li>
                <li class="list-group-item">
                    Start Date: <span class="float-right">
                        {{ unixtoDate($upcomingInvoice->period_start) }}
                    </span>
                </li>


                <li class="list-group-item">
                    Next Billing Date: <span class="float-right">
                        {{ $upcomingInvoice->date()->toFormattedDateString() }}

                    </span>
                </li>
                <li class="list-group-item">
                    Subscription Id: <span class="float-right">
                        {{ $upcomingInvoice->subscription }}
                    </span>
                </li>
                <li class="list-group-item">
                    Customer Id: <span class="float-right">
                        {{ $upcomingInvoice->customer }}
                    </span>
                </li>



              @if ($subscription->active())

                <li class="list-group-item">
                        Cancel Subscription:
                        <div class="float-right">
                          <form action="{{ route('cancelSubscription') }}" method="post">
                            @csrf
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                            <input type="hidden" name="cancelNow" value="1">
                            <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel Now</button>
                          </form>
                        </div>
                </span>
                </li>
              @endif


            </div>

        </div>
        @endif




    </div>








</div>

@endsection
