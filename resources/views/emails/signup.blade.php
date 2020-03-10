@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->name }}</p>
<p>&nbsp;</p>
<p>
Thank you for joining Flexsited.
</p>

<p>&nbsp;</p>

@if (isset($user->rawPassword) && $user->rawPassword != null)
<p>
We’re glad you’re here!
</p>
<p>&nbsp;</p>
<p>Following are your account details:</p>
<p>&nbsp;</p>
<p>
Email: <strong>{{ $user->email }}</strong>
</p>
<p>
Password: <strong>{{ $user->rawPassword }}</strong>
</p>
<p>&nbsp;</p>
<p>
You may login by clicking <a href="{{ route('login') }}">Here</a> to complete your order if you haven’t already
done so.
</p>
<p>&nbsp;</p>
@endif


<p>&nbsp;</p>
<p>
We look forward to working with you.
</p>
<p>&nbsp;</p>
<p>
If you have any questions, please don’t hesitate to contact us.
</p>

<p>&nbsp;</p>
<p>Best Regards,</p>
<p>&nbsp;</p>

<p>Team Flexsited</p>

@include('emails.common.footer')
