@extends('layouts.master')

@section('header')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ url('/plugins/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables/Buttons-1.6.3/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables/Responsive-2.2.5/css/responsive.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/flatpickr/css/flatpickr.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Data Perpajakan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Update Data Perpajakan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                @include('components.filter')
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12 col-12 table-responsive">
                        <table class="table nowrap table-sm" id="table">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Lengkap</th>
                                    <th>NPWP 15</th>
                                    <th>NPWP 16</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{-- @include('plant.form') --}}
@endsection


@section('footer')
    <!-- Datatables -->
    <script src="{{ asset('plugins/datatables/DataTables-1.10.21/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/DataTables-1.10.21/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Buttons-1.6.3/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Buttons-1.6.3/js/buttons.flash.js') }}"></script>
    <script src="{{ asset('plugins/datatables/JSZip-2.5.0/jszip.js') }}"></script>
    <script src="{{ asset('plugins/datatables/pdfmake-0.1.36/pdfmake.js') }}"></script>
    <script src="{{ asset('plugins/datatables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Buttons-1.6.3/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Buttons-1.6.3/js/buttons.print.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Responsive-2.2.5/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Responsive-2.2.5/js/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datatables/Buttons-1.6.3/js/buttons.colVis.js') }}"></script>

    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/js/flatpickr.js') }}"></script>

    <script>
        var formStatus, idEdit, method, url
        const urlIndex = "{{ route('update_data_perpajakan.index') }}"

        $(document).ready(function() {
            $.fn.dataTable.ext.classes.sLengthSelect = 'select_2';

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }); // Ajax Setup

            $('#table tbody').on('click', '.delete', function() {
                let _id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    $.ajax({
                        url: urlIndex + '/' + _id,
                        method: "DELETE",
                        data: {
                            id: _id
                        },
                        // processData: false,
                        // contentType: false,
                        success: function(data) {
                            if (data.s == true) {
                                Swal.fire(
                                    'Submit!',
                                    'Submit data success.',
                                    'success'
                                ).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    $('#table').DataTable().clear().destroy();
                                    load_data()
                                })
                            } else {
                                Swal.fire(
                                    'Submit!',
                                    data.m,
                                    'error'
                                )
                            }

                        }
                    })
                })

            })

            // Load datatables
            load_data();

            // date range
            $('#date').flatpickr({
                mode: "range",
                dateFormat: "d/m/Y",
                defaultDate: ["{{ date('1/m/Y') }}", "{{ date('d/m/Y') }}"],
            })

        })
    </script>

    <script>
        // Load dataTables
        function load_data() {
            $('#table').dataTable({
                responsive: true,
                dom: 'Bfrtip',
                // order: [[ 2, "desc" ]],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    ['10', '25', '50', '100', 'All']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'pdf',
                        text: '<i class="fas fa-file-pdf fa-1z"></i> PDF',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                if (node.innerHTML == "Action")
                                    return false;
                                return true;
                            }
                        },
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fas fa-file-csv fa-1z"></i> CSV',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                if (node.innerHTML == "Action")
                                    return false;
                                return true;
                            }
                        },
                    },
                    {
                        extend: 'excel',
                        text: '<i class="fas fa-file-excel fa-1z"></i> XLXS',
                        footer: false,
                        exportOptions: {
                            columns: function(idx, data, node) {
                                if (node.innerHTML == "Action")
                                    return false;
                                return true;
                            }
                        },
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print fa-1z"></i> Print',
                        footer: false,
                        exportOptions: {
                            columns: function(idx, data, node) {
                                if (node.innerHTML == "Action")
                                    return false;
                                return true;
                            }
                        },
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns fa-1z"></i> Select Column',
                        columnText: function(dt, idx, title) {
                            return (idx + 1) + ': ' + title;
                        }
                    },
                    {
                        text: '<i class="fas fa-plus fa-1z"></i> Create',
                        //className: 'fas fa-file',
                        action: function(e, dt, button, config) {
                            window.location.href = "{{ route('form_update_data_perpajakan_create') }}";
                        }
                    },
                ],

                processing: true,
                language: {
                    //processing: "<img src='images/Cube-1.3s-71px.gif'>"
                },
                serverSide: true,
                ajax: {
                    url: urlIndex,
                    data: {
                        date: $('#date').val(),
                        status: $('#status').is(':checked')
                    }
                },
                columns: [{
                    data: 'nik',
                    name: 'nik',
                }, {
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'npwp_15',
                    name: 'npwp_15',
                }, {
                    data: 'npwp_16',
                    name: 'npwp_16',
                }, {
                    data: 'link_npwp',
                    name: 'link_npwp',
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }, ],
            });
        }


        // Filter
        $('#formFilter').submit(function(e) {
            let form = new FormData(this);
            // form.append( 'file', input.files[0] );
            e.preventDefault();
            $('#table').DataTable().clear().destroy();
            load_data();
        })

        // Submit Create
        $('#form').submit(function(e) {
            let form = new FormData(this);
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: url,
                data: form,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.s == true) {
                        Swal.fire(
                            'Submit!',
                            'Submit data success.',
                            'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            $('#table').DataTable().clear().destroy();
                            load_data()
                            reset_form($('#form'))
                            $('#modalForm').modal('hide')
                        })
                    } else {
                        Swal.fire(
                            'Submit!',
                            data.m,
                            'error'
                        )
                    }

                    if (data.errors) {
                        errors(data.errors);
                    }
                }
            });
        });

        // Alert
        const errors = (data) => {
            Swal.fire(
                'Create!',
                'Submit data failed.',
                'error'
            )

            if (data) {
                $.each(data, function(k, v) {
                    let m = '<small class="text-danger error-message">' + v + '</small>'
                    $("input[name=" + k + "]").parent().find('small').remove()
                    $("input[name=" + k + "]").parent().append(m);
                });
            }
        }

        // reset form
        const reset_form = (a) => {
            a[0].reset();

            $('.error-message').each((k, v) => {
                $(v).remove()
            });
        }
    </script>
@endsection
