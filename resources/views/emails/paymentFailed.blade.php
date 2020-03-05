@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>
<p>
  Your payment method for renewal in the FLEXSITED has failed.
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  To update your payment method, simply login to your portal, click Settings, and then Subscriptions.  A link to the login page is below.
</p>
<p>&nbsp;</p>

<p>
Please note, To continue your membership, you must pay your invoice within 5 calendar days</span>
  Accounts with an outstanding balance beyond 5 days, will automatically be deleted.
</p>
<p>&nbsp;</p>
<p>
  If you have any questions, please do not hesitate to contact us.
</p>

<p>&nbsp;</p>

<p>  Thank you</p>
<p style="text-align:center;">
  <p>&nbsp;</p>
<a href="{{route('login')}}">click here to login</a>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
