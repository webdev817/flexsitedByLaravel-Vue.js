@include('emails.common.header')
  @php
    $user = $data['user'];
    $order = $data['order'];
    $oldOrder = null;
    if ( isset($data['oldOrder']) ) {
      $oldOrder = $data['oldOrder'];
    }
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>

<p>Your order has been received.</p>
<p>
<h3>Order Details</h3>
</p>

<table border="0">
<tr>
  <td>
    <strong>Email:</strong>
  </td>
  <td>{{$user->email}}</td>
</tr>
<tr>
  <td>
    <strong>Company:</strong>
  </td>
  <td>{{$user->company->name}}</td>
</tr>
<tr>
  <td>
    <strong>Employee</strong>
  </td>
  <td>{{$order->employee->firstName }}  {{ $order->employee->lastName }}</td>
</tr>
<tr>
  <td>
    <strong>ID / License Number:</strong>
  </td>
  <td>{{$order->employee->employeeIdNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Testing Authority:</strong>
  </td>
  <td>{{$order->testingAuthority}}</td>
</tr>
<tr>
  <td>
    <strong>Test Type:</strong>
  </td>
  <td>{{$order->testType}}</td>
</tr>
<tr>
  <td>
    <strong>Reason For Test:</strong>
  </td>
  <td>{{$order->reasonForTest}}</td>
</tr>
<tr>
  <td>
    <strong>Phone Number:</strong>
  </td>
  <td>{{$order->phoneNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Zip:</strong>
  </td>
  <td>{{$order->zip}}</td>
</tr>

@if ($order->note != null)
<tr>
  <td>
    <strong>Note:</strong>
  </td>
  <td>{{$order->note}}</td>
</tr>
@endif
@if ($order->allowQuery == "yes")
  <tr>
    <td>
      <strong>Allow Consortium to query FMCSA Clearinghouse for this driver?</strong>
    </td>
    <td>Yes</td>
  </tr>
@else
  <tr>
    <td>
      <strong>Allow Consortium to query FMCSA Clearinghouse for this driver?</strong>
    </td>
    <td>No</td>
  </tr>
@endif

@if ($order->allowQuery == "yes")

  @if ($order->cdlNumber != null)
    <tr>
      <td>
        <strong>CDL #:</strong>
      </td>
      <td>{{$order->cdlNumber}}</td>
    </tr>
  @endif
  @if ($order->stateOfIssue != null)
    <tr>
      <td>
        <strong>State Of Issue:</strong>
      </td>
      <td>{{$order->stateOfIssue}}</td>
    </tr>
  @endif
  @if ($order->dob != null)
    <tr>
      <td>
        <strong>Date Of Birth:</strong>
      </td>
      <td>{{$order->dob}}</td>
    </tr>
  @endif
@endif


</table>
<p>&nbsp;</p>


@if ($oldOrder)

<p>&nbsp;</p>
<table border="0">
<tr>
  <td colspan="2">
    <strong>Old Order Details:</strong>
  </td>

</tr>

<tr>
  <td>
    <strong>Employee</strong>
  </td>
  <td>{{$oldOrder->employee->firstName }}  {{ $oldOrder->employee->lastName }}</td>
</tr>
<tr>
  <td>
    <strong>ID / License Number:</strong>
  </td>
  <td>{{$oldOrder->employee->employeeIdNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Testing Authority:</strong>
  </td>
  <td>{{$oldOrder->testingAuthority}}</td>
</tr>
<tr>
  <td>
    <strong>Test Type:</strong>
  </td>
  <td>{{$oldOrder->testType}}</td>
</tr>
<tr>
  <td>
    <strong>Reason For Test:</strong>
  </td>
  <td>{{$oldOrder->reasonForTest}}</td>
</tr>
<tr>
  <td>
    <strong>Phone Number:</strong>
  </td>
  <td>{{$oldOrder->phoneNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Zip:</strong>
  </td>
  <td>{{$oldOrder->zip}}</td>
</tr>

@if ($oldOrder->note != null)
<tr>
  <td>
    <strong>Note:</strong>
  </td>
  <td>{{$oldOrder->note}}</td>
</tr>
@endif






@if ($oldOrder->allowQuery == "yes")
  <tr>
    <td>
      <strong>Allow Consortium to query FMCSA Clearinghouse for this driver?</strong>
    </td>
    <td>Yes</td>
  </tr>
@else
  <tr>
    <td>
      <strong>Allow Consortium to query FMCSA Clearinghouse for this driver?</strong>
    </td>
    <td>No</td>
  </tr>
@endif

@if ($oldOrder->allowQuery == "yes")

  @if ($oldOrder->cdlNumber != null)
    <tr>
      <td>
        <strong>CDL #:</strong>
      </td>
      <td>{{$oldOrder->cdlNumber}}</td>
    </tr>
  @endif
  @if ($oldOrder->stateOfIssue != null)
    <tr>
      <td>
        <strong>State Of Issue:</strong>
      </td>
      <td>{{$oldOrder->stateOfIssue}}</td>
    </tr>
  @endif
  @if ($oldOrder->dob != null)
    <tr>
      <td>
        <strong>Date Of Birth:</strong>
      </td>
      <td>{{$oldOrder->dob}}</td>
    </tr>
  @endif
@endif


</table>
<p>&nbsp;</p>
@endif

<p>We do our best to process every order within a few hours.  However, in some instances it is possible to take between 12 - 24 hours.</p>

<p>&nbsp;</p>
<p>
<span style="font-weight: bolder;font-family:arial,sans-serif">What happens next?</span>  You will receive an email directly from the lab with an order ticket and a collection site location.
</p>
<p> Simply bring that order ticket (either printed, or digitally), along with your photo ID to the collection site, prior to the expiration date displayed on the order.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
