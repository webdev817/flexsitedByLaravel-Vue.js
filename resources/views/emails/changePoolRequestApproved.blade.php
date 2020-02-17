@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>
<p>
Your request to change pool has been approved.
</p>
<p>&nbsp;</p>


<p>
  If you have any questions, please do not hesitate to contact our office.
</p>

<p>&nbsp;</p>

<p>  Thank you</p>

<p>&nbsp;</p>
<p style="text-align:center;">
  <p>&nbsp;</p>
  <a href="{{route('login')}}">click here to login</a>
</p>
<p>&nbsp;</p>

@include('emails.common.footer')
