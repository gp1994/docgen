@extends ('master')

@section('content')
<form action = "./submitcontent{{$id_doc}}" method = "post" id="contentform">
	<input type = "hidden" name = "_token" value="<?php echo csrf_token(); ?>">

	<div class="col-sm-6">
	Judul konten: <input type='text' name='judul' /> 
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>@foreach ($errors->all() as $error)
                      <div style="position:relative;top:-100px;right: -300px">{{ $error }}</div>
                  @endforeach
	</div> <br>
<div style="position: relative; left:-230px;">Gunakan tag  &lt;br&gt; untuk baris baru</div>
	<div class="col-sm-12">
	Isi konten: <br>
	<textarea class="col-xs-12" rows="10" form="contentform" name="isiteks"></textarea>
	</div><br>
	<div class="col-sm-1"><input type='submit' value="Save" /></div>
</form>

<form action="./document{{$id_doc}}">
<div class="col-sm-1">
	<input type='submit' value="Cancel" /></div>
</form>
@stop