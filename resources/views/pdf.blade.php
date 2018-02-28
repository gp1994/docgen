@extends('master')
@section('content')
<html>
  <head>
    <meta charset="utf-8">
    <title>{{$docname->nama}}</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">  
  </head>
<body>
<h4 align="center">{{$docname->nama}}</h4>
<hr>
@foreach($content as $con)
	@if ($con->deleted == '0')
		@if ($con->tipe == 'Bernyanyi' || $con->tipe == 'Epistel' || $con->tipe == Khotbah')
		<b>{{$con->urutan}}. {{$con->tipe}}: {{$con->judul}}</b><br>
		{!!$con->isi!!}<br><br>
		@else
		<b>{{$con->urutan}}. {{$con->judul}}</b><br>
		{!!$con->isi!!}<br>
		@endif
	@endif
@endforeach
</body>
</html>
