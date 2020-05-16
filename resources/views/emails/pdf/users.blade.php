<link href="https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style media="screen">
  body{
    width: 100% !important;
    margin: 0 auto !important;
    /* background: #ccc; */
  }
  .signature{
    font-family: 'Herr Von Muellerhoff', cursive;
    font-size: 18px;
  }
  .bg1{
      background: #63C6B4 !important;
      color: white;
  }
</style>

<table width="100%">
<tr>
	<td width="20%" valign="top" align="center">
                <img style="width:200px" src="{{ public_path('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="">
    </td>
</tr>
<tr height="20px">
  <td></td>
</tr>


</table>
<table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable" width="100%" style="margin-top: 25px;">
  <tr class="bg1">
    <th>Name</th>
    <th>Email</th>
    <th>Business Name</th>
  </tr>
  @foreach ($users as $user)
    <tr>
      <td>
        <a target="_blank" href="{{ route('clientOnBoarding',$user->id) }}">{{ $user->name }}</a>
      </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->businessName }}</td>
    </tr>
  @endforeach

</table>
