@extends ('master')

@section('content')
	Judul Dokumen: <b>{{ $docs->nama }}</b><br>
	<!-- DIV Table Content -->
	<div class="row">
	<div class="col-sm-6">
	Table of Content:
	@if (count($contents))
	<ol>
	@foreach($contents as $content)
		<a href="#{{$content->id}}"><li>{{$content->judul}}</a></li>
	@endforeach
	</ol>
	@endif
	<a href="./addcontent{{$docs->id}}"> + Add new content </a>
	</div>

	<!-- DIV Urutan -->
	<form action = "./editurutan{{$docs->id}}success" method ="post" id="urutanform">
	<input type = "hidden" name = "_token" value="<?php echo csrf_token(); ?>">
	<div class="col-sm-6">
	Urutan:
	@if (count($contents))
	<ol>
	@foreach($contents as $content)
		<li>{{$content->judul}}
		<select name="urutan{{$content->id}}" value="{{$content->id}}">
			@for ($i=1; $i<$contents->count()+1; $i++)
				@if ($i == $content->urutan) {
					<option value="{{$i}}" selected="selected">{{$i}}</option>
				}
				@else {
					<option value="{{$i}}">{{$i}}</option>
				}
				@endif
			@endfor
		</select>
		</li>
	@endforeach
	</ol>
	@endif
	<input type='submit' value="Save Urutan" />
	</div>
	</form>
	</div>
	
	<hr>
	<a href="./home">My Document(s)</a>
	<div class="col-lg-12">
	<h2 style="text-align:center;">{{$docs->nama}}</h2>
	@if(session('message_doc'))
  		<div class="alert alert-info">{{session('message_doc')}}</div>
	@endif
	@if (count($contents))
	<ol>
	@foreach($contents as $content)
		<li><h3> <a id={{$content->id}}> {{$content->tipe}} : {{$content->judul}} </a></h3></li>
		@if(session('message') && session('alert_id'))
			@if($content->id == session('alert_id'))
  				<div class="alert alert-info">{{session('message')}}</div>
  			@endif
		@endif
		<a href="./editcontent{{$content->id}}">edit</a> |
		<a onclick="deleteContent({{$content->id}}, '{{$content->judul}}')">delete</a>
		<script>
		function deleteContent(id, judul) {
			var result = confirm("Are you sure want to delete \""+judul+"\"?");
			if (result==true) {
				window.location.href="./deletecontent"+id;
			}
		}
		</script>
		<br>
		{!!$content->isi!!}
	@endforeach
	</ol>
	@endif
	</div>
@stop