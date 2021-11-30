@extends('component.layouts.master')

@section('button')
	<a href="{{Route('parameter.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')

<div class="card">
	<div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ Helper::baseLabelPage() }}</h3>
            </div>
            <!-- <div class="col-md-6">
                <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
            </div> -->
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
            @if($param->parent != 0)
                <form action="{{Route('parameter.update_detail', $param->id)}}" method="post" id="form">
            @else
                <form action="{{Route('parameter.update', $param->id)}}" method="post" id="form">
            @endif
            {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Key</label>
                        <input type="text" class="form-control" id="kunci" name="key" onkeyup="ganti_space()" readonly="" value="{{$param->key}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{$param->judul}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Value</label>
                        <input type="text" class="form-control" id="value" name="value" value="{{$param->value}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Parent</label>
                        <select name="parent" id="parent" class="form-control" disabled="">
                            <option value="" selected="">-- Pilih Parent--</option>
                            <option value="0" <?php if($param->parent == 0){ ?> selected="selected" <?php } ?> >Main Parent</option>
                            @foreach($parameter as $params)
                                <option value="{{$params->id}}" <?php if($param->parent == $params->id){ ?> selected="selected" <?php } ?>>{{$params->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection

@section('js')
    <script>
        function ganti_space(){
            var isi = $("#kunci").val()
            var hasil = isi.replace(' ', '_')
            $("#kunci").val(hasil)
        }

        function cek_simpan(){
            if($("#kunci").val() == ""){
                alert('Key Tidak Boleh kosong')
            }else if($("#judul").val() == ""){
                alert('Judul Tidak Boleh kosong')
            }else if($("#value").val() == ""){
                alert('Value Tidak Boleh kosong')
            }else if($("#parent").val() == ""){
                alert('Parent Tidak Boleh kosong')
            }else{
                $("#form").submit()
            }
        }
    </script>
@endsection