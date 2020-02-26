"use strict";
var KTDatatablesExtensionsKeytable = function() {

	var initTable1 = function() {
		var table = $('#dtticket').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/ticket/edit/`+ data +`"><i class="la la-edit"></i> Edit ticket</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/ticket/delete/`+ data +`')"><i class="la la-trash"></i> Delete ticket</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 7,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable2 = function() {
		var table = $('#dtperformance').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/performance/edit/`+ data +`"><i class="la la-edit"></i> Edit performance</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/performance/delete/`+ data +`')"><i class="la la-trash"></i> Delete performance</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable3 = function() {
		var table = $('#dtsponsor').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/sponsor/edit/`+ data +`"><i class="la la-edit"></i> Edit sponsor</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/sponsor/delete/`+ data +`')"><i class="la la-trash"></i> Delete sponsor</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable4 = function() {
		var table = $('#dtrundown').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/rundown/edit/`+ data +`"><i class="la la-edit"></i> Edit rundown</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/rundown/delete/`+ data +`')"><i class="la la-trash"></i> Delete rundown</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 6,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable5 = function() {
		var table = $('#dtcontact').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/contact/edit/`+ data +`"><i class="la la-edit"></i> Edit contact</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/contact/delete/`+ data +`')"><i class="la la-trash"></i> Delete contact</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 3,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable6 = function() {
		var table = $('#dtuser').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/user/edit/`+ data +`"><i class="la la-edit"></i> Edit user</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/user/delete/`+ data +`')"><i class="la la-trash"></i> Delete user</a>
                        </div>
                    </span>`;
					},
				},
			],
		});
	};

	var initTable7 = function() {
		var table = $('#dtcategory').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/category/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/category/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable8 = function() {
		var table = $('#dtlayoutticket').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/ticket/layout/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/ticket/layout/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable9 = function() {
		var table = $('#dtlogo').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/logo/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/logo/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable10 = function() {
		var table = $('#dttitle').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/title/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/title/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable11 = function() {
		var table = $('#dtdescription').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/description/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/description/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 3,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable12 = function() {
		var table = $('#dtevent').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/event/edit/`+ data +`"><i class="la la-edit"></i> Edit category</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/event/delete/`+ data +`')"><i class="la la-trash"></i> Delete category</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 3,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	var initTable13 = function() {
		var table = $('#dtbanner').DataTable({
			responsive: true,
			select: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return `<span class="dropdown">
                    		<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/admin/banner/edit/`+ data +`"><i class="la la-edit"></i> Edit banner</a>
								<a class="dropdown-item" href="#" onclick="deleteData('/admin/banner/delete/`+ data +`')"><i class="la la-trash"></i> Delete banner</a>
                        </div>
                    </span>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Non Active', 'class': ' kt-badge--danger'},
							1: {'title': 'Active', 'class': 'kt-badge--success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
			initTable2();
			initTable3();
			initTable4();
			initTable5();
			initTable6();
			initTable7();
			initTable8();
			initTable9();
			initTable10();
			initTable11();
			initTable12();
			initTable13();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionsKeytable.init();
});