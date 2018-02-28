
@extends ('master')
@section('content')
                  <a href="./home">My Document(s)</a>
        @foreach ($docs as $doc)
          @if($doc->id_pengguna == Session('id'))
            <div class="panel-body" style="position:relative;top:10px;">
              <div class="row">
                <div class="col-md-2">

                  <ul><li><a href="./document{{$doc->id}}">{{$doc->nama}}</a></ul>
                </div>
              <div class="col-md-10">
                <!-- DIV Button Edit Document -->
                <button id="editDocButton" data-toggle="modal" data-target="#editDocModal"
                data-id="{{$doc->id}}" data-name="{{$doc->nama}}">Edit</button>

                  <div id="editDocModal" class="modal fade">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">                      
                        <script>
$(function() {
  $('#editDocModal').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    var idd = button.data('id');
    var namadoc = button.data('name');
  $('.modal-body #iddocinput').val(idd);
  $('.modal-body #namadocinput').val(namadoc);
  $('#namadoc').html($(e.relatedTarget).data('nama'));
   });
  });
</script>
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          Edit <span id="nama"></span>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="./editdoc" id="editdoc">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input id="iddocinput" type="hidden" name="iddoc">
                            <input id="namadocinput" type="text" name="nama" required>
                            <input type="submit" value="Save" />
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button onclick="deletedokumen({{$doc->id}})">Delete</button>
                  <a href="./downloadPDF{{$doc->id}}">Download</a>
                  
                </div>
              </div>
            </div>
            @endif
         @endforeach
      <!-- DIV Add Document -->
      <div class="col-md-12 bg-warning text-info" style="position:relative;top:40px;">
        <a id="addDocButton" data-toggle="modal" data-target="#addDocModal">+ Add Document</a>
          <div id="addDocModal" class="modal fade">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <!-- DIV Modal Add Document -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Add Document 
                </div>
                <div class="modal-body">
                  <form method="POST" action="./insertDoc" id="adddoc">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input id="iddoinput" type="hidden" name="iddo">
                    <input id="docinput" type="text" name="namae" required>
                    <input type="submit" value="Save" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @stop

        <script>
 
  function deletedokumen(id) {
    var result = confirm('Are you sure?');
    if(result==true) {
      window.location.href="./deletedoc"+id;
    }
  }

</script>