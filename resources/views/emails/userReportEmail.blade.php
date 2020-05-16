@include('emails.common.header')

<p>Hello </p>
<p>&nbsp;</p>
<p>
 There are {{ $users->count() }} new users. Find the attached PDF Report...
</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
<p>Best Regards,</p>
<p>&nbsp;</p>

<p>Team Flexsited</p>

@include('emails.common.footer')
