<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <title>Form Personal | PT. Cabinindo Putra</title>
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
</head>

<body>
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
                <h3>Tiket Annual Pass Dufan - PT. Cabinindo Putra</h3>
                <h6>Kuesioner ini ditujukan untuk mengumpulkan tiket annual pass dufan 2023.</h6>
            </div>
            <hr>
            <form id="submitPersonal" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="card">
                    <div class="p-3">
                        <h5 style="margin: 0px;">Kartu Dufan Karyawan</h5>
                    </div>
                    {{-- <hr> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="required">NIK</label>
                                        <input type="number" id="nik" name="nik" class="form-control form-control-sm text-uppercase">
                                </div>
                                <div class="form-group">
                                    <label class="required">Nama Lengkap</label>
                                        <input type="text" id="namaLengkap" name="namaLengkap" class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="">Contoh :</label>
                                    <img src="{{ asset('image/example_annual_pass.jpg') }}" width="300px;" alt="">
                                </div>
                                
                                <div class="form-group">
                                    <label class=" required">Kode Annual Pass Dufan</label>
                                        <input type="text" id="no_dufan_card" name="no_dufan_card" class="form-control form-control-sm text-uppercase">
                                </div>
                                <div class="form-group">
                                    <label class="required">Upload Kartu Annual Pass Dufan</label>
                                        <input name="dufan_card" id="dufan_card" value="{{ old('dufan_card') }}" type="file" accept='application/pdf, image/jpeg, image/png, image/jpg' class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
                
                <hr>

                <button class="btn btn-primary d-block" type="button" id="tambahKeluarga">+ Tambah Keluarga</button>
                <br> 
                <br> 
                <div class="family-container">
                    <div id="label-family" style="display: none";>
                        <h5>Kartu Dufan Keluarga</h5>
                    </div>
                    <div class="row row-family"></div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body .lds-spinner').css('display', 'none')

            $('#tambahKeluarga').click(function() {
                
        var newKeluarga = $('<div class="col-md-4 mb-4">' +
                                '<div class="card">' +
                                    '<div class="card-body">' +
                                        '<div class="form-group">' +
                                            '<label>Status Hubungan</label>' +
                                            '<select class="form-control form-control-sm text-uppercase" id="status_relation" name="status_relation[]">' +
                                                '<option value="">--- PILIH ---</option>' +
                                                '<option value="Pasangan">Pasangan</option>' +
                                                '<option value="Anak">Anak</option>' +
                                            '</select>' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Nama Lengkap</label>' +
                                            '<input type="text" id="family_fullname" name="family_fullname[]" class="form-control form-control-sm text-uppercase">' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Kode Anuall Pass Dufan</label>' +
                                            '<input type="text" id="family_no_card" name="family_no_card[]" class="form-control form-control-sm text-uppercase">' +
                                        '</div>' +
                                        '<div class="form-group">' +
                                            '<label>Upload Kartu Dufan</label>' +
                                            '<input type="file" id="family_upload_file" name="family_upload_file[]" class="form-control form-control-sm text-uppercase">' +
                                        '</div>' +
                                        '<button class="btn btn-danger btn-sm btn-delete">Hapus</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>');

        // Tambahkan event handler untuk tombol hapus
        newKeluarga.find('.btn-delete').click(function() {
            var length = $('.row-family').children().length;
        if (length > 0) {
            $('#label-family').show();
            } else {
            $('#label-family').hide();
        }
            $(this).closest('.col-md-4').remove(); // Hapus kartu keluarga saat tombol hapus diklik
        });
        
        
        $('.row-family').append(newKeluarga); // Tambahkan elemen baru ke dalam container

        var length = $('.row-family').children().length;
        if (length > 0) {
            $('#label-family').show();
            } else {
            $('#label-family').hide();

        }
    });

   
        })

        function changeSesuai(e) {
            console.log(e.value);
            var setID = e.id;
            var targetBox = $("." + e.value);
            $(".selectts").not(targetBox).hide();
            $(targetBox).show();
        }
        $('#submitPersonal').submit(function(e) {
            $('.error_message').each(function(k, v) {
                v.remove()
            })
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: "{{ route('submit-personal') }}",
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
        })

        function logDisplay(data) {
            $('.error_message').each(function(k, v) {
                v.remove()
            })
            switch (data.res) {
                case 200:
                    window.location.href = "{{ route('index') }}";
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
</body>

</html>
