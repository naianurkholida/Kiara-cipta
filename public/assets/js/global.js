@if(!empty($graph))

    <script>

    "use strict";
    var KTMorrisChartsDemo = function() {
        
        var demo1 = function() {
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            Morris.Line({
                element: 'kt_morris_1',
                data: [{!! $data !!}],
                xkey: 'm',
                ykeys: 'a',
                labels: ['guest: '],
                xLabelFormat: function(x) {
                    var month = months[x.getMonth()];
                    return month;
                },
                dateFormat: function(x) {
                    var month = months[new Date(x).getMonth()];
                    return month;
                },
            });
        }

        return {
            init: function() {
                demo1();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTMorrisChartsDemo.init();
    });

    </script>

@endif

@if(!empty($performances))
<script>
    function formatRows2() {
        return '<div class="row" style="margin-top: 5px"><div class="col-3"><select class="form-control" name="status[]"><option value="1">Active</option><option value="0">Non Active</option></select></div>' +
                '<div class="col-3"><input type="text" class="form-control editable" name="description[]" placeholder="Description"/></div>' +
                '<div class="col-3"><select class="form-control" name="performance[]">@foreach($performances as $row)<option value="{{ $row->id }}">{{ $row->name }}</option>@endforeach</select></div>' +
                '<div class="col-2"><input type="text" class="form-control editable" name="time[]" /></div>' +
                '<div class="col-1 text-center"><button onClick="deleteRow(this)" class="btn btn-danger">' +
                '<i class="la la-trash" aria-hidden="true"></i></button></div></div>';
	}
	
	function deleteRow(trash) {
        $(trash).closest('div.row').remove();
    };

    function addRow() {
        $(formatRows2()).insertAfter('#addRowData'); 
    }
</script>
@endif

@if(!empty($contact))
<script>
    function formatRows2() {
        return '<div class="row" style="margin-top: 5px"><div class="col-3"><select class="form-control" name="status[]"><option value="1">Active</option><option value="0">Non Active</option></select></div>' +
                '<div class="col-3"><input type="text" class="form-control editable" name="description[]" placeholder="Social Media"/></div>' +
                '<div class="col-3"><i class="la la-facebook-official" aria-hidden="true" style="font-size: 35px"></i> facebook<br></div>' +
                '<div class="col-3"><input type="text" class="form-control editable" name="time[]" /></div>';
                // '<div class="col-1 text-center"><button onClick="deleteRow(this)" class="btn btn-danger">' +
                // '<i class="la la-trash" aria-hidden="true"></i></button></div></div>';
	}
	
	function deleteRow(trash) {
        $(trash).closest('div.row').remove();
    };

    function addRow() {
        $(formatRows2()).insertAfter('#addRowData'); 
    }
</script>
@endif

<script>
    $(document).ready(function() {
        $("#global-alert").fadeTo(2000, 1000).slideUp(1000, function() {
    		$("#global-alert").slideUp(1000);
        });
        @if(isset($gallery))
            @if($gallery->embed == NULL)
                $('#link').hide();
            @else
                $('#image').hide();
            @endif
        @else
            $('#link').hide();
        @endif
    });

    function deleteData(url) {
        // swal("Apakah Anda Yakin Untuk Melepas Kunci Data Ini?", {
        //         buttons: {
        //             cancel: "Tidak",
        //             catch: {
        //                 text: "Ya",
        //                 value: "Ya",
        //             }
        //         },
        //     })
        //     .then((value) => {
        //     switch (value) {
            
        //     	case "Ya":
        //     	window.location.href = "{{URL('fatwa-backend/lock')}}"+"/"+$(this).val()
        //     	break;
        //     }
        // });
        window.location.href = url
    }
</script>

<script type="text/javascript">	
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split       = number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
	}
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$("#tanggal").datepicker({
				dateFormat : "Y/m/d",
				todayHighlight: true,
				autoclose: true,
				pickerPosition: 'bottom-left'
			});
		});
		var DatatablesBasicHeaders = function() {

			var initTable1 = function() {
				var table = $('#table-responsive');

				table.DataTable({
					responsive: true,
				});
			};
			return {
				init: function() {
					initTable1();
				},
			};
		}();
		jQuery(document).ready(function() {
			DatatablesBasicHeaders.init();
		});	
		
		var DatatablesBasicHeaders2 = function() {

			var initTable2 = function() {
				var table = $('#table-responsive2');

				table.DataTable({
					responsive: true,
					"order": [[ 5, "desc" ]]
				});
			};
			return {
				init: function() {
					initTable2();
				},
			};
		}();
		jQuery(document).ready(function() {
			DatatablesBasicHeaders2.init();
		});	
    </script>
    
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('media.store') }}',
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function () {
            @if(isset($data))
                var files = {!! json_encode($data) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, "/storage/" + file.id + "/" + file.file_name);
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
            @endif
            }
        }
    </script>

    <script>
        function changeType(type)
        {
            if (type == 'image') {
                $('#image').show();
                $('#link').hide();
            } else {
                $('#image').hide();
                $('#link').show();
            }
        }
    </script>