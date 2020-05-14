@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->name }}</p>
<p>&nbsp;</p>
<p>
  Your payment method for renewal for your FLEXSITED account has failed.
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
  To update your payment method, simply login to the portal, click Settings, and then Profile.
</p>
<p>&nbsp;</p>
<p>
  A link to the login page is below.
</p>
<p></p>
<p>
<a href="{{ route('login') }}">Click here to login</a>
</p>
<p>
  Please note, to continue your subscription,
  you must pay your invoice within 5 calendar days.
  Accounts with an outstanding balance beyond 5 days, will automatically be deleted.
</p>
<p>&nbsp;</p>
<p>
  If you have any questions, please do not hesitate to contact us.
</p>

<p>&nbsp;</p>

<p>Best Regards,</p>
<p>
Team Flexsited
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

@include('emails.common.footer')
