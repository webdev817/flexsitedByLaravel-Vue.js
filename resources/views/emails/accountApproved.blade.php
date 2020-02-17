@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->firstName }} {{ $user->lastName }}</p>
<p>&nbsp;</p>
<strong>Your account is approved</strong>
<p>&nbsp;</p>
<strong>You can start using portal by clicking this link <a href="{{ route('login') }}">Login</a> </strong>
<p>&nbsp;</p>
<p>
  Thank you for joining our Random Testing Program!
</p>
<p>&nbsp;</p>
<p>
  Please read this email very carefully.
  Included with this email is a copy of your application.  Be sure to save a copy for your files, this is your proof of enrollment.
</p>
<p>&nbsp;</p>
<p>Once we finish processing your application, you will receive your Certificate of Membership via email.  You can expect this to be delivered within 12 hours.
</p>
<p>&nbsp;</p>
<p>I would encourage you to bookmark the portal login page in your web browser.  This is where you will add other members, order testing and update any contact and payment information.</p>
<p>&nbsp;</p>
<p>Since we deliver the random notifications via email, it is very important that our emails are not filtered as junk or spam.  The best way to ensure this is to add our email addresses as Contacts in your email program.  These addresses will be provided in the email that contains your Certificate.  Be sure to check your junk or spam folder if you do not receive your certificate after 24 hours.</p>
<p>&nbsp;</p>
<p>In the next few days, you will receive a short series of emails walking you through the Portal features, and the mandatory compliance aspects depending on your agency requirements.  I would highly recommend you look through these brief emails, since it will help you become familiar with the random selection and testing process.</p>
<p>&nbsp;</p>
<p>Don’t worry, after this short series of initial emails, you will only receive official notification emails from us!
</p>
<p>&nbsp;</p>
<p>If you have any questions whatsoever, please don’t hesitate to reach out and contact us.
</p>
<p>&nbsp;</p>
<p>Thank you again for your membership,</p>
<p>&nbsp;</p>
<p>Dan</p>



@include('emails.common.footer')
