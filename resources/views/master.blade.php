<html>
 <head>
  <title> Document Generator </title>
  @yield('header')
  	 <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>

<body style="background-color:#76b852">
	<h2 align="center">Document Generator</h2> 
 @if ( Request::session()->has('usrn') )
<div id="sess">
Welcome {{session('peng')}}! Click here to <a href="./logout">Logout</a></div>
@endif
	<hr>
	@yield('content')
</body>
  
</html>