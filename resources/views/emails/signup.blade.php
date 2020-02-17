@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->name }}</p>
<p>&nbsp;</p>
<p>
Thank you for joining FlexSited.
</p>

<p>&nbsp;</p>

@if (isset($user->rawPassword) && $user->rawPassword != null)
<p>
We’re glad you’re here! Following are your account details:
</p>
<p>&nbsp;</p>
<p>
Email: <strong>{{ $user->email }}</strong>
</p>
<p>
Password: <strong>{{ $user->rawPassword }}</strong>
</p>
<p>&nbsp;</p>
<p>
You can Login by clicking <a href="{{ route('login') }}">Here</a>
</p>
<p>&nbsp;</p>
@endif


<p>&nbsp;</p>
<p>If you have any questions whatsoever, please don’t hesitate to reach out and contact us.
</p>
<p>&nbsp;</p>

<p>Team FlexSited</p>

@include('emails.common.footer')
