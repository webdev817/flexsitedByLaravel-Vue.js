@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>
<p>
Your request has been submitted, you will be notified when it is approved.
</p>
<p>&nbsp;</p>


<p>
  If you have any questions, please do not hesitate to contact our office.
</p>

<p>&nbsp;</p>

<p>  Thank you</p>

<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
