@include('emails.common.header')
  @php
    $generalOrder = $data['generalOrder'];
  @endphp
<p>Hello </p>
<p>&nbsp;</p>

<p>Your order has been received, please allow up to 24 hours for processing, you will receive an order ticket directly from the lab which you will need to bring to the collection site.</p>
<p>
<h3>Order Details</h3>
</p>

<table border="0">

<tr>
  <td>
    <strong>Employee</strong>
  </td>
  <td>{{ $generalOrder->memberFirstName }}  {{ $generalOrder->memberLastName }}</td>
</tr>
<tr>
  <td>
    <strong>ID / License Number:</strong>
  </td>
  <td>{{ $generalOrder->memberId }}</td>
</tr>
<tr>
  <td>
    <strong>Email:</strong>
  </td>
  <td>{{ $generalOrder->email }}</td>
</tr>
<tr>
  <td>
    <strong>Testing Authority:</strong>
  </td>
  <td>{{$generalOrder->testingAuthority}}</td>
</tr>
<tr>
  <td>
    <strong>Test Type:</strong>
  </td>
  <td>{{ $generalOrder->testType}}</td>
</tr>
<tr>
  <td>
    <strong>Reason For Test:</strong>
  </td>
  <td>{{ $generalOrder->reasonForTest}}</td>
</tr>
<tr>
  <td>
    <strong>Phone Number:</strong>
  </td>
  <td>{{ $generalOrder->phoneNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Zip:</strong>
  </td>
  <td>{{ $generalOrder->zip}}</td>
</tr>

@if ($generalOrder->note != null)
<tr>
  <td>
    <strong>Note:</strong>
  </td>
  <td>{{$generalOrder->note}}</td>
</tr>
@endif


</table>
<p>&nbsp;</p>


<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
