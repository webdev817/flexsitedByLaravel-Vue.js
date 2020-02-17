@include('emails.common.header')
  @php

    $gEmployee = $data['generalEmployee'];
  @endphp
<p>Hello {{ $gEmployee->personName }}</p>
<p>&nbsp;</p>

<p>Employee has been added.</p>
<p>
<h3>Details</h3>
</p>

<table border="0">
<tr>
  <td>
    <strong>Email:</strong>
  </td>
  <td>{{ $gEmployee->email}}</td>
</tr>
<tr>
  <td>
    <strong>Company:</strong>
  </td>
  <td>{{ $gEmployee->companyName }}</td>
</tr>
<tr>
  <td>
    <strong>Employee</strong>
  </td>
  <td>{{ $gEmployee->memberFirstName }}  {{ $gEmployee->memberLastName }}</td>
</tr>
<tr>
  <td>
    <strong>ID / License Number:</strong>
  </td>
  <td>{{ $gEmployee->memberId }}</td>
</tr>
<tr>
  <td>
    <strong>Drug Test Requirements:</strong>
  </td>
  <td>{{ $gEmployee->drugTestRequirement }}</td>
</tr>
<tr>
  <td>
    <strong>Type of pool employee/member enrolled in:</strong>
  </td>
  <td>{{ ucfirst($gEmployee->typeOfPoolMemberEnrolledIn) }}</td>
</tr>
<tr>
  <td>
    <strong>Pre-Employment drug Test:</strong>
  </td>
  <td>{{ ucfirst($gEmployee->orderPreEmploymentDrugTest) }}</td>
</tr>
<tr>
  <td>
    <strong>Phone Number:</strong>
  </td>
  <td>{{ $gEmployee->phoneNumber}}</td>
</tr>
<tr>
  <td>
    <strong>Zip:</strong>
  </td>
  <td>{{ $gEmployee->zip }}</td>
</tr>




</table>
<p>&nbsp;</p>

@if ($gEmployee->orderPreEmploymentDrugTest == "yes")
  <p>
    A drug test order will be generated and sent to you within 24 hours. You will need to bring this order in to the collection site which will be listed on the order sheet.
  </p>
@endif

{{-- <p>We do our best to process every order within a few hours.  However, in some instances it is possible to take between 12 - 24 hours.</p> --}}

<p>&nbsp;</p>
{{-- <p>
<span style="font-weight: bolder;font-family:arial,sans-serif">What happens next?</span>  You will receive an email directly from the lab with an order ticket and a collection site location.
</p> --}}
{{-- <p> Simply bring that order ticket (either printed, or digitally), along with your photo ID to the collection site, prior to the expiration date displayed on the order.</p> --}}
<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
