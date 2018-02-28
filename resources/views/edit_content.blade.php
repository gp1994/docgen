@extends ('master')

@section('content')
<form action = "./editcontent{{$content->id}}success" method = "post" id="contentform">
	<input type = "hidden" name = "_token" value="<?php echo csrf_token(); ?>">

	<div class="col-sm-6">
	Judul konten: <input type='text' name='judul' value='{{$content->judul}}'/>
	@if ($content->tipe == 'Bernyanyi')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi" selected>Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Doa')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa" selected="">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Epistel')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel" selected>Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Hukum Taurat')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat" selected>Hukum Taurat</option>
        <option value="Pengumuman"> Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Pengumuman')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman" selected>Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Khotbah')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah" selected>Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Koor')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor" selected>Koor</option>
        <option value="Others">Others</option>
</select>
@endif
@if ($content->tipe == 'Others')
	<select name="tipe" class="form control">
        <option value="">Select Type</option>
        <option value="Bernyanyi">Bernyanyi</option>
        <option value="Doa">Doa</option>
        <option value="Epistel">Epistel</option>
        <option value="Hukum Taurat">Hukum Taurat</option>
        <option value="Pengumuman">Pengumuman</option>
        <option value="Khotbah">Khotbah</option>
        <option value="Koor">Koor</option>
        <option value="Others" selected="">Others</option>
</select>
@endif

	</div>@foreach ($errors->all() as $error)
                      <div style="position:relative;top:-80px;right: 400px">{{ $error }}</div>
                  @endforeach<br>
<div style="position: relative; left:-230px;">Gunakan tag  &lt;br&gt; untuk baris baru</div>
	<div class="col-sm-12">
	Isi konten: <br>
	<textarea cols="100" rows="10" form="contentform" name="isiteks">{{$content->isi}}</textarea>
	</div><br>
	<div class="col-sm-1"><input type='submit' value="Save" /></div>
</form>

<form action="./canceleditcontent{{$content->id}}">
<div class="col-sm-1">
	<input type='submit' value="Cancel" /></div>
</form>
@stop