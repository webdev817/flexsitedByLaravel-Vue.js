@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->name }}</p>
<p>&nbsp;</p>
<p>
  We successfully authorized your credit card for your usage charges.
  Please find invoice in attachments.


</p>


<p>&nbsp;</p>
<p>Thanks</p>



@include('emails.common.footer')
