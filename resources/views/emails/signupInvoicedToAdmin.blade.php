@include('emails.common.header')
  @php
    $user = $data['user'];
  @endphp
<p>Hello, </p>
<p>&nbsp;</p>
<p>
  A new invoiced company is pending your approval
</p>
<p>
  Company:
  <strong>
{{$user->company->name}}
  </strong>
</p>

<p>
  Email:
  <strong>
{{$user->email}}
  </strong>
</p>
<p>&nbsp;</p>



@include('emails.common.footer')
