@include('emails.common.header')

<p>Hello </p>
<p>&nbsp;</p>
<p>
 {{count($data)}} new users registered today. Find the attached PDF Report...
</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
<p>Best Regards,</p>
<p>&nbsp;</p>

<p>Team Flexsited</p>

@include('emails.common.footer')
