<html>
 <head>
  <title> Document Generator </title>
  @yield('header')
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/app.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head><body><h2 align="center">Document Generator</h2> 
<div class="login-page">
  <div class="form">
<form method="post" class="login-form" action="{{action('PenggunaController@cekLogin')}}" id="loginModal">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div id="err"></div><br>
<label>Username</label>
<input type="text" name="usrn" maxlength="32"><br>
<label>Password</label>
<input type="password" name="pwd" \" maxlength="64"><br>
<button type="submit">Login</button>
</form>
</div></div>
</body>
<script type="text/javascript">
@if((count($errors) > 0 ) || (session('status') == 'salah'))
document.getElementById("err").innerHTML ="Maaf, Password atau Username salah!";
@endif
</script></html>