<html>
<head>
<title>{{ env('APP_NAME') }}</title>
<style>
*{
	padding:0px; margin:0px;
}

.listtable{
	margin-top:20px;
	margin:0 auto;
	background:#FFF;

}
.listtable .nonborder{
	border-bottom:0px solid #CCC;
}
.listtable tr td{
	padding-top:20px;
	padding-left:20px;
	padding-bottom:20px;
	border-bottom:1px solid #CCC;
}


.data_head{
}
.data_value{
	text-align:right;
	padding-right:20px;
}
.uk-badge-success{
	 color:#009a2d;
}
.uk-badge-danger{
	color:#dd4b39;
}


.text_count_action{
	font-size:18px !important;
	font-weight:bold !important;
}
.text_count_task{
	font-size:16px !important;
	font-weight:bold !important;
}


.roundText{
	border-radius: 200px 200px 200px 200px;
	-moz-border-radius: 200px 200px 200px 200px;
	-webkit-border-radius: 200px 200px 200px 200px;
	border: 0px solid #000000;

   background:#1b84e7;
   color:#FFF !important;
   width: 50px;
   height:50px;
   text-align:center;
   display: table-cell;
   vertical-align:middle;
 	color:#FFF;
	font-size:24px;
	font-weight:bold;
}

.roundTextSmall{
	border-radius: 200px 200px 200px 200px;
	-moz-border-radius: 200px 200px 200px 200px;
	-webkit-border-radius: 200px 200px 200px 200px;
	border: 0px solid #000000;

	background:#1b84e7;
	width: 35px;
	height:35px;
	text-align:center;
	display: table-cell;
	vertical-align:middle;
	color:#FFF;
	font-size:18px;
}


.avathar img{
	width:60px !important;
	height:60px !important;
}
.logo{
  text-decoration: none;
  font-size: 2rem;
}
.logCell{

}
.logoLink{

}
</style>
</head>
<body style="margin:0px; padding:0px; background:#000;">

	<table width="100%" cellpadding="0" cellspacing="0" style="background:#000;">
<tr>
	<td style="text-align:center;width:100%">
		<a href="{{ url('/') }}" class="">
			<img
			style="width: 195px;
    padding-top: 16px;"
			src="http://portal.flexsited.com/mawaisnow/logo/FLEXSITED.png"
			 title="{{ config('mawaisnow.title') }}" >
		</a>
	</td>

</tr>
	</table>
<table width="100%" cellpadding="0" cellspacing="0" style="background:#000;">




<tr>
<td style="padding:10px !important; padding-bottom:30px !important;" >

    <table width="95%" class="listtable" cellpadding="0" cellspacing="0" border="0"   >
    	<tr>
        	<td style="padding-right:10px;">
