@include('emails.common.header')
@php
    $user = $data['user'];
  @endphp
<p>Hello {{$user->name}} ! </p>
<p>&nbsp;</p>
<p>
	Your account just was updated following as :
</p>
<p>Your Name: <strong>{{ $user->name }}</strong></p>
<p>Your Business Name: <strong>{{ $user->businessName }}</strong></p>
<p>Your Phone: <strong>{{ $user->phone }}</strong></p>
<p>Your Status: <strong>{{ $user->status? "Active" : "Deactive"}}</strong></p>
<p>&nbsp;</p>

<p>&nbsp;</p>
<p>Best Regards,</p>
<p>&nbsp;</p>

<p>Team Flexsited</p>

@include('emails.common.footer')
