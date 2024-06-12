<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <title>Form Famday | PT. Cabinindo Putra</title>
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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Masukan Kode</h5>
                        <form action="{{ route('form_data_personal_post_code') }}" method="POST">
                            @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                            <div class="form-group">
                                <label for="kode" class="sr-only">Kode:</label>
                                <input type="text" class="form-control text-center" id="code" name="code"
                                    placeholder="Input kode">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('themes/admin-lte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script>
        @if ($message = Session::get('sukses'))
            Swal.fire(
                'Terima Kasih!',
                '{{ $message }}',
                'success'
            )
        @endif
    </script>
    <script>
        $(document).ready(function() {
            var countRow = 0
            $('body .lds-spinner').css('display', 'none')

            $('#tambahKeluarga').click(function() {



                var newKeluarga = $('<div class="col-md-4 mb-4">' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '<div class="form-group">' +
                    '<label class="required">Status Hubungan</label>' +
                    '<select class="form-control form-control-sm text-uppercase" id="status_relation_' +
                    countRow + '" name="status_relation[]">' +
                    '<option value="">--- PILIH ---</option>' +
                    '<option value="Pasangan">Pasangan</option>' +
                    '<option value="Anak 1">Anak 1</option>' +
                    '<option value="Anak 2">Anak 2</option>' +
                    '<option value="Anak 3">Anak 3</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group">' +

                    '<label class="required">Nama Lengkap</label>' +
                    '<input type="text" id="family_fullname_' + countRow +
                    '" name="family_fullname[]" class="form-control form-control-sm text-uppercase">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label>Kode Anuall Pass Dufan</label>' +
                    '<input type="text" id="family_no_card_' + countRow +
                    '" name="family_no_card[]" class="form-control form-control-sm text-uppercase">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label>Upload Kartu Dufan</label>' +
                    '<input type="file" id="family_upload_file_' + countRow +
                    '" accept=".pdf, .png, .jpg" name="family_upload_file[]" class="form-control form-control-sm text-uppercase">' +
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
                    $(this).closest('.col-md-4')
                .remove(); // Hapus kartu keluarga saat tombol hapus diklik
                });


                $('.row-family').append(newKeluarga); // Tambahkan elemen baru ke dalam container

                countRow = $('.row-family').children().length;
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
                    $('#' + gantiTitik(k)).parent().append(log)

                })
                Swal.fire(
                    'Warning',
                    'Submit Gagal',
                    'warning'
                )
            } else {
                Swal.fire(
                    'Terima Kasih!',
                    'Submit data berhasil',
                    'success'
                )
            }


        }

        function gantiTitik(str) {
            // Memeriksa apakah string mengandung titik
            if (/\./.test(str)) {
                // Jika mengandung titik, mengganti titik dengan _
                return str.replace(/\./g, "_");
            } else {
                // Jika tidak mengandung titik, mengembalikan string tanpa perubahan
                return str;
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
