@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Alamat Toko </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.pengaturan.updatealamat',['id' => $id ]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label>Kabupaten</label>
                                <select required name="kabupaten_id" id="kabupaten_id" class="form-control">
                                    @foreach($kabupaten as $x)
                                        <option value="{{ $x->kabupaten_id }}">{{ $x->title }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-grup">
                                    <label for="">Kecamatan</label>
                                    <select name="kecamatan_id" id="kecamatan_id" class="form-control" required>
                                      @foreach($kecamatan as $x)
                                        <option value="{{ $x->kecamatan_id }}">{{ $x->title }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                <label>Detail Alamat</label>
                                <input type="text" class="form-control" name="detail" required>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('js')
<script type="text/javascript">
var toHtml = (tag, value) => {
	$(tag).html(value);
	}
 $(document).ready(function() {
    //  $('#kabupaten_id').select2();
    //  $('#cities_id').select2();
     $('#kabupaten_id').on('change',function(){
     var id = $('#kabupaten_id').val();
     var url = window.location.href;
     var urlNya = url.substring(0, url.lastIndexOf('/ubahalamat/'));   
     $.ajax({
         type:'GET',
         url:urlNya + '/alamat/getcity/' + id,
         dataType:'json',
         success:function(data){
            var op = '<option value="">Pilih Kecamatan</option>';
            if(data.length > 0) {
			var i = 0;
			for(i = 0; i < data.length; i++) {
				op += `<option value="${data[i].kecamatan_id}">${data[i].title}</option>`
			}
		    }
            toHtml('[name="kecamatan_id"]', op);
         }
     })
     })
 });
</script>
@endsection