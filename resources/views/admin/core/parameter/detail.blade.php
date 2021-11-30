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
            <div class="col-md-6">
                <!-- <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button> -->
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
            <div class="row">
                <div class="col-md-6">
                    <label for="">Key</label>
                    <input type="text" class="form-control" id="kunci" name="key" onkeyup="ganti_space()" readonly="" value="{{$parameter->key}}">
                </div>
                <div class="col-md-6">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{$parameter->judul}}">
                </div>
                <div class="col-md-6">
                    <label for="">Value</label>
                    <input type="text" class="form-control" id="value" name="value" value="{{$parameter->value}}">
                </div>
                <div class="col-md-6">
                    <label for="">Parent</label>
                    <input type="text" class="form-control" value="Main Parent" readonly="">
                </div>
            </div>
        </div>
        <hr><hr>
        <div class="row">
            <div class="col-md-12">
                <h3><center>Child</center></h3>
            </div>
        </div>
        <hr><hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover" id="table-responsive">
                    <thead class="m-datatable__head">
                        <tr class="m-datatable__row text-center">
                            <td>No</td>
                            <td>Key</td>
                            <td>Judul</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no =1;?>
                        @foreach($param as $param)
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$param->key}}</td>
                            <td>{{$param->judul}}</td>
                            <td>
                                <a href="{{Route('parameter.edit',$param->id)}}" class="btn btn-sm btn-primary">
                                    <i class="la la-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++?>
                        @endforeach
                    </tbody>
                </table>
            </div>
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