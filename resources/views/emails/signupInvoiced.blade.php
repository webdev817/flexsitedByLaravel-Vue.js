@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>
<p>
  Thank you for your application.
  Please allow up to 24 hours for review. Once your account has been activated,
  you will be notified and can begin using your portal
</p>
<p>
  Company:
  <strong>
{{$user->company->name}}
  </strong>
</p>

<p>
  Email:
  <strong>
{{$user->email}}
  </strong>
</p>
<p>&nbsp;</p>



@include('emails.common.footer')
