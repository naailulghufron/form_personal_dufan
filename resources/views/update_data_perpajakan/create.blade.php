@extends('layouts.master-user')

@section('header')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ url('/plugins/datatables/DataTables-1.10.21/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables/Buttons-1.6.3/css/buttons.dataTables.css') }}">
    <link rel="stylesheet" href="{{ url('/plugins/datatables/Responsive-2.2.5/css/responsive.bootstrap4.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('plugins/select2/css/select2-modify.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('/plugins/flatpickr/css/flatpickr.css') }}">

    <style>
        label.required:after {
            content: '*';
            color: red;
        }

        .lds-spinner {
            position: fixed;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            align-items: center;
            opacity: 0.7;
            background-color: black;
            z-index: 9999999;
            top: 0;
            left: 0;
            /* width: 80px;
                                                                                                                                                                    height: 80px; */
        }

        .lds-spinner div {
            transform-origin: 40px 40px;
            animation: lds-spinner 1.2s linear infinite;
        }

        .lds-spinner div:after {
            content: " ";
            display: block;
            position: absolute;
            top: 3px;
            left: 37px;
            width: 6px;
            height: 18px;
            border-radius: 20%;
            background: red;
        }

        .lds-spinner div:nth-child(1) {
            transform: rotate(0deg);
            animation-delay: -1.1s;
        }

        .lds-spinner div:nth-child(2) {
            transform: rotate(30deg);
            animation-delay: -1s;
        }

        .lds-spinner div:nth-child(3) {
            transform: rotate(60deg);
            animation-delay: -0.9s;
        }

        .lds-spinner div:nth-child(4) {
            transform: rotate(90deg);
            animation-delay: -0.8s;
        }

        .lds-spinner div:nth-child(5) {
            transform: rotate(120deg);
            animation-delay: -0.7s;
        }

        .lds-spinner div:nth-child(6) {
            transform: rotate(150deg);
            animation-delay: -0.6s;
        }

        .lds-spinner div:nth-child(7) {
            transform: rotate(180deg);
            animation-delay: -0.5s;
        }

        .lds-spinner div:nth-child(8) {
            transform: rotate(210deg);
            animation-delay: -0.4s;
        }

        .lds-spinner div:nth-child(9) {
            transform: rotate(240deg);
            animation-delay: -0.3s;
        }

        .lds-spinner div:nth-child(10) {
            transform: rotate(270deg);
            animation-delay: -0.2s;
        }

        .lds-spinner div:nth-child(11) {
            transform: rotate(300deg);
            animation-delay: -0.1s;
        }

        .lds-spinner div:nth-child(12) {
            transform: rotate(330deg);
            animation-delay: 0s;
        }

        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .logo {
            width: 300px;
            height: 300px;
            background-image: url('{{ asset('image/logo.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.4;
        }
    </style>
@endsection

@section('content')
    <div class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="card">
        @include('sweetalert::alert')
        <div class="logo"></div>
        <div class="card-body">
            <div class="text-center">
                <h3><u>UPDATE DATA PERPAJAKAN</u></h3>
                <h3>PT. CABININDO PUTRA</h3>
                <h6><I>Kuesioner ini dilakukan untuk update data karyawan yang dilakukan setiap tahun.</I></h6>
            </div>
            <hr>
            <form id="submitDataPerpajakan" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-3 required">NIK Karyawan </label>
                            <div class="col-3 col-md-3 col-sm-3">
                                <input type="number" id="nik" name="nik"
                                    class="form-control form-control-sm text-uppercase" min="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Nama Lengkap </label>
                            <div class="col-9 col-md-9 col-sm-9">
                                <input type="text" id="namaLengkap" name="namaLengkap"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">NPWP 15 </label>
                            <div class="col-7 col-md-7 col-sm-7">
                                <input type="npwp_15" id="npwp_15" name="npwp_15" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">NPWP 16 </label>
                            <div class="col-7 col-md-7 col-sm-7">
                                <input type="npwp_16" id="npwp_16" name="npwp_16" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Upload NPWP </label>
                            <div class="col-9">
                                <input name="file_npwp" id="file_npwp" value="{{ old('file_npwp') }}" type="file"
                                    accept='application/pdf, image/jpeg, image/png, image/jpg'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('footer')
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body .lds-spinner').css('display', 'none')
        })

        function changeSesuai(e) {
            console.log(e.value);
            var setID = e.id;
            var targetBox = $("." + e.value);
            $(".selectts").not(targetBox).hide();
            $(targetBox).show();
        }
        $('#submitDataPerpajakan').submit(function(e) {
            $('.error_message').each(function(k, v) {
                v.remove()
            })
            e.preventDefault();
            try {
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('form_update_data_perpajakan_store') }}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('body .lds-spinner').css('display', 'flex')
                    },
                    success: function(d) {
                        $('body .lds-spinner').css('display', 'none')
                        logDisplay(d)

                    }
                })

            } catch (error) {
                $('body .lds-spinner').css('display', 'none')
                alert(error)
            }
        })

        function logDisplay(data) {
            $('.error_message').each(function(k, v) {
                v.remove()
            })
            switch (data.res) {
                case 200:
                    Swal.fire({
                        title: "Good job",
                        text: "Terima kasih sudah melakukan submit data NPWP dengan benar!",
                        type: "success",
                        icon: "success",
                    }).then(function() {
                        location.reload();
                    });
                case 409:

                default:
                    break;
            }

            if (data.errors) {
                $.map(data.errors, (v, k) => {
                    let log = '<small style="color: red" class="error_message">' + v[0] + '</small>'
                    $('#' + k).parent().append(log)
                })
                Swal.fire(
                    'Warning',
                    'Submit Gagal',
                    'warning'
                )

            }


        }

        @if ($message = Session::get('sukses'))
            Swal.fire(
                'Terima Kasih!',
                '{{ $message }}',
                'success'
            )
        @endif
    </script>
@endsection
