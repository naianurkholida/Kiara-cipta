@extends('component.layouts.master')

@section('button')
	<a href="{{Route('posting.index')}}" class="btn btn-info">
		<i class="flaticon-reply"></i>
		<span>{{ Helper::baseLabelPage() }}</span>
	</a>
@endsection

@section('content')
<script>

    function cek_bahasa(){
        var trigger = $("#all_id:checked").length
        if (trigger > 0) {
            $("#hasil_all_id").val(1)
        }else{
            $("#hasil_all_id").val(0)
        }
    }

    var cek = []

    function mark(e){
        if(e.checked){
            cek.push(e.value)
            // alert(cek)
            $("#id_posting_related").val(cek)
        }else{
            cek.forEach((element, index) => {
                if(e.value == element){
                    cek.splice(index, 1)
                    // alert(cek)
                    $("#id_posting_related").val(cek)
                }
            });
        }
    }

    function cek_simpan(){
        var kategori = $("#kategori").val()

        var data = {
            id_transaksi: JSON.stringify(cek)
        }

        

        <?php foreach($language as $key => $lang){ ?>
            var judul_<?=$key?> = $("#judul[<?=$key?>]").val()
            var content_<?=$key?> = $("#content[<?=$key?>]").val()
        <?php } ?>

        if(kategori == ""){
            alert('kategori harus diisi')
        }
        <?php foreach($language as $key => $lang){ ?>
            else if(judul_<?=$key?> == ""){
                alert('Judul <?=$lang->judul_language?> Harus Diisi')
            }else if(content_<?=$key?> == ""){
                alert('Content <?=$lang->judul_language?> Harus Diisi')
            }
        <?php } ?>
        else {
            $("#form").submit()
        }
    }
</script>

<div class="card">
	<div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h3>Posting</h3>
            </div>
            <!-- <div class="col-md-6">
                <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
            </div> -->
        </div>
	</div>
	<div class="card-body">
		<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
			<form action="{{Route('posting.post')}}" method="post" id="form" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="hidden" name="id_posting_related" id="id_posting_related">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required="">
                            <option value="" selected="selected">-- Pilih Kategori--</option>
                            @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-lg-12">
                        <label>Cover</label><br>
                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="width: 300px; height:300px; background-image: url({{ asset('public/image/default/placeholder.png') }})"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <label for="">Related Post</label>
                        </center>
                        <table class="table table-striped table-bordered table-hover" id="table-responsive">
                            <thead class="m-datatable__head">
                                <tr class="m-datatable__row text-center">
                                    <td>No</td>
                                    <td>judul</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                @foreach($posting as $post)
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$post->judul}}</td>
                                    <td><input type="checkbox" onchange="mark(this)" value="{{$post->id}}"></td>
                                </tr>
                                <?php $no++?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <input type="checkbox" onchange="cek_bahasa()" id="all_id"> Bahasa Indonesia Semua
                <input type="hidden" name="trigger" id="hasil_all_id">
                <hr>
                @foreach($language as $key => $lang)
                    <div class="row" id="field[<?=$key?>]">
                        <div class="col-md-12">
                            <center><h3>{{$lang->judul_language}}</h3></center>
                            <input type="hidden" id="language[<?=$key?>]" name="language[]" class="form-control" readonly="" value="{{$lang->id}}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Title</label>
                            <input type="text" id="judul[<?=$key?>]" name="judul[]" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="">content</label>
                            <textarea id="content[<?=$key?>]" name="content[]" class="summernote" id="kt_summernote_1"></textarea>
                        </div>
                    </div>
                    <hr>
                @endforeach
                
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <button type="button" class="btn btn-primary pull-right" onclick="cek_simpan()">Simpan</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection

@section('js')

@endsection