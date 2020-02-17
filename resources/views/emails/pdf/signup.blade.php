<style media="screen">
  body{
    width: 80% !important;
    margin: 0 auto !important;
    /* background: #ccc; */
  }
</style>
{{-- <h1 style="color:#000;">Sign Up</h1> --}}

<table width="100%">
<tr>
	<td width="20%" valign="top" align="right">
    <img src="{{ asset( config('mawaisnow.logo') ) }}" style="width:80px;" alt="">
    </td>

    <td width="70%" valign="top">
      <strong>Quality Consortium Services</strong>
        <br>2414 e 117th St
		<br>Burnsville, MN 55337
        <br>612-227-2746

    </td>

</tr>
<tr height="20px">
  <td></td>
</tr>
<tr>
  <td width="10%">
  </td>
  <td width="60%">
    <h3>Proof of Enrollment</h3>
  </td>
</tr>


</table>
<table width="100%">
  <tr>
    <td></td>
    <td width="100%">
      Thank you for joining our consortium. This service renews annually until cancelled by the
  user. You will receive your Certificate of Membership shortly.
    </td>
  </tr>


</table>
<table width="100%" border="0" cellpadding="5" cellspacing="0" style="margin-top:40px;" >
<tr>
	<td width="20%" style="font-weight:bold;">Enrollment Date</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ date('Y-m-d') }}</td>
</tr>
<tr>
	<td width="20%" style="font-weight:bold;">Full Name</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->firstName }} {{ $user->lastName }}</td>
</tr>
<tr>
	<td width="20%" style="font-weight:bold;">Email</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->email }}</td>
</tr>

<tr>
	<td width="20%" style="font-weight:bold;">Phone</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->phoneNumber }}</td>
</tr>
@if ($user->fax)
<tr>
	<td width="20%" style="font-weight:bold;">Fax</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->fax }}</td>
</tr>
@endif
<tr>
  <td width="20%" style="font-weight:bold;">Company</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->name }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">Company Dot Number</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->dotNumber }}</td>
</tr>

<tr>
  <td width="20%" style="font-weight:bold;">Testing Authority</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->testingAuthority }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">Company Type</td>

  <td width="60%" style="font-weight:bold;" align="right">
    @if ($user->company->singleOrMulti == 1)
      Single Member
    @else
      Multi. Member
    @endif
  </td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">Street</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->street }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">Suite</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->suite }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">City</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->city }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">State</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->state }}</td>
</tr>
<tr>
  <td width="20%" style="font-weight:bold;">Zip</td>

  <td width="60%" style="font-weight:bold;" align="right">{{ $user->company->zip }}</td>
</tr>
@if ($user->serviceAgentOrContact)
  <tr>
    <td width="20%" style="font-weight:bold;">Agent Name</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->agentName }}</td>
  </tr>
  <tr>
    <td width="20%" style="font-weight:bold;">Agent Email</td>

    <td width="60%" style="font-weight:bold;" align="right">{{ $user->agentEmail }}</td>
  </tr>

@endif

</table>



<table width="100%" border="0" cellpadding="5" cellspacing="0" style="margin-top:40px;" >

  <tr>
    <td width="90%" style="font-weight:normal;font-size:12px">
        I have read the
        <a href="{{ route('termsofService') }}">
          Terms of Service
        </a>
         and I am authorized to act on behalf of my company
    </td>

    <td width="10%" style="font-weight:normal;" align="right">I agree</td>
  </tr>

  <tr>
    <td width="90%" style="font-weight:normal;font-size:12px">
      I acknowledge that membership in the program will automatically renew until I cancel service
    </td>

    <td width="10%" style="font-weight:normal;" align="right">I agree</td>
  </tr>


</table>


<table width="100%" border="0" cellpadding="5" cellspacing="0" style="margin-top:40px;" >
  <tr border="0">
    <td width="40%" style="font-weight:bold;" align="right">Thanks for joining!</td>
  </tr>

</table>
