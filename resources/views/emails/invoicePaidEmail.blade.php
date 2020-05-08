@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello {{ $user->name }}</p>
<p>&nbsp;</p>
<p>
  Thank you for your payment. It has been received. We have started processing your order.
</p>
<p>
  Attached is your invoice for your records.
</p>

<p>
If you haven’t completed business information, please login <a href="{{ route('login') }}">here</a> to complete it.  Upon completion, your Project Manager will contact you within 24 business hours to discuss your project in more details and to answer any questions that you may have.
</p>

<p>&nbsp;</p>
<p>Best Regards,<br>
Team Flexsited
</p>



@include('emails.common.footer')
