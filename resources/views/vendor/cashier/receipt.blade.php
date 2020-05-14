<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice</title>

    <style>
        body {
            background: #fff none;
            font-size: 12px;
        }

        h2 {
            font-size: 28px;
            color: #ccc;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-head td {
            padding: 0 8px;
        }

        .table th {
            vertical-align: bottom;
            font-weight: bold;
            padding: 8px;
            line-height: 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table tr.row td {
            border-bottom: 1px solid #ddd;
        }

        .table td {
            padding: 8px;
            line-height: 20px;
            text-align: left;
            vertical-align: top;
        }
    </style>
</head>
<body>
<div class="container">
    <table style="margin-left: auto; margin-right: auto;" width="550">
        <tr>
            <td width="50%">
              <strong>
                {{ $vendor }}

              </strong>
              <br>

              @if (isset($street))
                  {{ $street }}<br>
              @endif

              @if (isset($location))
                  {{ $location }}<br>
              @endif

              @if (isset($phone))
                  <strong>T</strong> {{ $phone }}<br>
              @endif

              @if (isset($vendorVat))
                  {{ $vendorVat }}<br>
              @endif


                  <a href="https://www.flexsited.com">www.flexsited.com</a>

            </td>

            <!-- Organization Name / Image -->
            <td align="right">
                {{-- <strong>{{ $header ?? $vendor }}</strong> --}}

                <img style="width:200px" src="{{ public_path('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="">
            </td>
        </tr>
        <tr valign="top">
            <td></td>
            <td align="right">
                <br><br>
                <strong>To:</strong> {{ $owner->email ?: $owner->name }}
                <br>
                <strong>Invoice Date:</strong> {{ $invoice->date()->toFormattedDateString() }}
            </td>
        </tr>

    </table>
    <table style="margin-left: auto; margin-right: auto;" width="550" style="padding:0px">
      <tr valign="top">
          <!-- Organization Details -->
          <td colspan="2" align="center" style="padding:0px">
            <br>
            <br>
            <!-- Invoice Info -->
            <p style="margin-bottom:0px;margin-top:12px;">
                {{-- <strong>Product:</strong> {{ $product }}<br> --}}
                <strong>Invoice Number:</strong> {{ $id ?? $invoice->id }}<br>
            </p>

            <!-- Extra / VAT Information -->
            @if (isset($vat))
                <p>
                    {{ $vat }}
                </p>
            @endif
            <br>

          </td>

      </tr>
      
      <tr>
        <td colspan="2">


            <!-- Invoice Table -->
            <table width="100%" class="table" border="0">
                <tr>
                    <th align="left">Description</th>
                    <th align="right">Date</th>
                    <th align="right">Amount</th>
                </tr>

                <!-- Display The Invoice Items -->
                @foreach ($invoice->invoiceItems() as $item)
                    <tr class="row">
                        <td colspan="2">{{ $item->description }}</td>
                        <td>{{ $item->total() }}</td>
                    </tr>
                @endforeach

                <!-- Display The Subscriptions -->
                @foreach ($invoice->subscriptions() as $subscription)
                    <tr class="row">

                        <td>

                          {{ getPlanByStripePlanId($subscription->plan->id)->title }}

                        </td>
                        <td>
                            {{ $subscription->startDateAsCarbon()->formatLocalized('%B %e, %Y') }} -
                            {{ $subscription->endDateAsCarbon()->formatLocalized('%B %e, %Y') }}
                        </td>
                        <td>{{ $subscription->total() }}</td>
                    </tr>
                @endforeach

                <!-- Display The Subtotal -->
                @if ($invoice->hasDiscount() || $invoice->tax_percent || $invoice->hasStartingBalance())
                    <tr>
                        <td colspan="2" style="text-align: right;">Subtotal</td>
                        <td>{{ $invoice->subtotal() }}</td>
                    </tr>
                @endif

                <!-- Display The Discount -->
                @if ($invoice->hasDiscount())
                    <tr>
                        <td colspan="2" style="text-align: right;">
                            @if ($invoice->discountIsPercentage())
                                {{ $invoice->coupon() }} ({{ $invoice->percentOff() }}% Off)
                            @else
                                {{ $invoice->coupon() }} ({{ $invoice->amountOff() }} Off)
                            @endif
                        </td>

                        <td>-{{ $invoice->discount() }}</td>
                    </tr>
                @endif

                <!-- Display The Tax Amount -->
                @if ($invoice->tax_percent)
                    <tr>
                        <td colspan="2" style="text-align: right;">Tax ({{ $invoice->tax_percent }}%)</td>
                        <td>{{ $invoice->tax() }}</td>
                    </tr>
                @endif

                <!-- Starting Balance -->
                @if ($invoice->hasStartingBalance())
                    <tr>
                        <td colspan="2" style="text-align: right;">Customer Balance</td>
                        <td>{{ $invoice->startingBalance() }}</td>
                    </tr>
                @endif

                <!-- Display The Final Total -->
                <tr>
                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                    <td><strong>{{ $invoice->total() }}</strong></td>
                </tr>
            </table>
        </td>
      </tr>

    </table>
    <table style="margin-left: auto; margin-right: auto;" width="550">
      <tr>
        <td width="100%" align="center">
          <strong>Thank you for your business!</strong>
        </td>
      </tr>
    </table>

</div>
</body>
</html>
