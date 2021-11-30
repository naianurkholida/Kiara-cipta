<table class="table table-striped table-bordered table-hover" id="table-responsive">
    <thead class="m-datatable__head">
        <tr class="m-datatable__row text-center">
            <td>No</td>
            <td>Nama</td>
            <td>Jabatan</td>
            <td>Foto</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php $no =1;?>
        @foreach($sejarah as $sjrh)
        <tr>
            <td>{{$no}}</td>
            <td>{{$sjrh->nama}}</td>
            <td>{{$sjrh->jabatan}}</td>
            <td><img src="{{asset('admin/assets/media/foto_kepegawaian/')}}{{$sjrh->foto}}" alt=""></td>
            <td>
            <td>
                <a href="{{Route('sejarah.edit',$sjrh->id)}}" class="btn btn-sm btn-primary">
                    <i class="la la-edit"></i>
                </a>
                <a href="{{Route('sejarah.delete',$sjrh->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ? ')">
                    <i class="la la-trash"></i>
                </a>
            </td>
        </tr>
        <?php $no++?>
        @endforeach
    </tbody>
</table>