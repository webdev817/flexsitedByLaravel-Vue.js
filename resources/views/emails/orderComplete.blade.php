@include('emails.common.header')
  @php
    $user = $data['user'];
    $order = $data['order'];

  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>

<p>A new test result has been posted to your account for ID {{ $order->employee->employeeIdNumber }}.
</p>
<p>&nbsp;</p>
<p>
Login to your account and click the Orders tab to view the results.
</p>
<p>&nbsp;</p>



<p>
Results will be available to download for the next 30 days. Be sure to save a copy for your records. We are not responsible for records beyond 30 days.
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>Thank you</p>
<p style="text-align:center;">
  <p>&nbsp;</p>
<a href="{{route('login')}}">click here to login</a>
<p>&nbsp;</p>
<p>&nbsp;</p>

</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
