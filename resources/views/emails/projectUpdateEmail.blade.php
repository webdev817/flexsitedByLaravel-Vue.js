@include('emails.common.header')
@php
    $user = $data['user'];
    $description = $data['description'];
  @endphp
<p>Hello {{$user->name}} ! </p>
<p>&nbsp;</p>
<p>
@if($description === " You have a new chat message.")
  We have sent you new message.<br>
@else
  We have an update to your project. {{ $description }} <br>
@endif
	 Please login in your account <a href="{{ route('login') }}">here</a> to review the details.
</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
<p>Best Regards,</p>
<p>&nbsp;</p>

<p>Team Flexsited</p>

@include('emails.common.footer')
