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
                <h3>Update Data Personal PT. Cabinindo Putra</h3>
                <h6>Kuesioner ini dilakukan untuk update data karyawan yang dilakukan setiap tahun.</h6>
            </div>
            <hr>
            <form id="submitPersonal" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-3 required">NIK</label>
                            <div class="col-9">
                                <input type="number" id="nik" name="nik" min="5" max="5"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Nama Lengkap</label>
                            <div class="col-9">
                                <input type="text" id="namaLengkap" name="namaLengkap"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Email</label>
                            <div class="col-9">
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Nomor Telepon</label>
                            <div class="col-9">
                                <input type="number" id="telepon" name="telepon"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Kontak Darurat</label>
                            <div class="col-9">
                                <input type="number" id="darurat" name="darurat"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Hubungan dengan Kontak Darurat</label>
                            <div class="col-9">
                                <select class="form-control form-control-sm text-uppercase" id="hubungan"
                                    name="hubungan">
                                    <option value="">--- PILIH ---</option>
                                    <option value="AYAH">AYAH</option>
                                    <option value="IBU">IBU</option>
                                    <option value="SUAMI">SUAMI</option>
                                    <option value="ISTRI">ISTRI</option>
                                    <option value="ANAK">ANAK</option>
                                    <option value="KAKAK">KAKAK</option>
                                    <option value="ADIK">ADIK</option>
                                    <option value="SAUDARA">SAUDARA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-3 required">Upload Kartu Keluarga</label>
                            <div class="col-9">
                                <input name="kartuKeluarga" id="kartuKeluarga" value="{{ old('kartuKeluarga') }}"
                                    type="file" accept='application/pdf, image/jpeg, image/png, image/jpg'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Upload KTP</label>
                            <div class="col-9">
                                <input name="ktp" id="ktp" value="{{ old('ktp') }}" type="file"
                                    accept='application/pdf, image/jpeg, image/png, image/jpg'>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Pendidikan Terakhir</label>
                            <div class="col-9">
                                <select class="form-control form-control-sm text-uppercase" id="pendidikan"
                                    name="pendidikan">
                                    <option value="">--- PILIH ---</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Jurusan</label>
                            <div class="col-9">
                                <input type="text" id="jurusan" name="jurusan"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Tahun Kelulusan</label>
                            <div class="col-9">
                                <input type="number" id="tahunKelulusan" name="tahunKelulusan"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Alamat KTP</h5>
                        <hr>
                        <div class="form-group row">
                            <label class="col-3 required">Alamat Lengkap</label>
                            <div class="col-9">
                                <textarea id="alamatKTP" name="alamatKTP" class="form-control form-control-sm text-uppercase text-uppercase"
                                    rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">RT</label>
                            <div class="col-3">
                                <input type="number" id="rtKtp" name="rtKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                            <label class="col-3 required">RW</label>
                            <div class="col-3">
                                <input type="number" id="rwKtp" name="rwKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Kelurahan</label>
                            <div class="col-9">
                                <input type="text" id="kelurahanKtp" name="kelurahanKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Kecamatan</label>
                            <div class="col-9">
                                <input type="text" id="kecamatanKtp" name="kecamatanKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Kabupaten/Kota</label>
                            <div class="col-9">
                                <input type="text" id="kotaKtp" name="kotaKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Provinsi</label>
                            <div class="col-9">
                                <input type="text" id="provinsiKtp" name="provinsiKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 required">Kode Pos</label>
                            <div class="col-9">
                                <input type="number" id="kodePosKtp" name="kodePosKtp"
                                    class="form-control form-control-sm text-uppercase">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Alamat Domisili</h5>
                        <hr>
                        <div class="form-group text-center">
                            <label>Apakah alamat domisili sesuai dengan alamat KTP?</label>
                            <div class="pilihdomisili row text-center">
                                <div class="col-md-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="alamatSesuai1"
                                            name="alamatSesuai" onclick="changeSesuai(this)" value="Sesuai" />
                                        <label for="alamatSesuai1" class="custom-control-label">Sesuai</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="alamatSesuai2"
                                            name="alamatSesuai" onclick="changeSesuai(this)" value="Tidak" checked>
                                        <label for="alamatSesuai2" class="custom-control-label">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Tidak selectts">
                            <div class="form-group row">
                                <label class="col-3 required">Alamat Lengkap</label>
                                <div class="col-9">
                                    <textarea id="alamatDomisili" name="alamatDomisili"
                                        class="form-control form-control-sm text-uppercase text-uppercase" rows="3" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">RT</label>
                                <div class="col-3">
                                    <input type="number" id="rtDomisili" name="rtDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                                <label class="col-3 required">RW</label>
                                <div class="col-3">
                                    <input type="number" id="rwDomisili" name="rwDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">Kelurahan</label>
                                <div class="col-9">
                                    <input type="text" id="kelurahanDomisili" name="kelurahanDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">Kecamatan</label>
                                <div class="col-9">
                                    <input type="text" id="kecamatanDomisili" name="kecamatanDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">Kabupaten/Kota</label>
                                <div class="col-9">
                                    <input type="text" id="kotaDomisili" name="kotaDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">Provinsi</label>
                                <div class="col-9">
                                    <input type="text" id="provinsiDomisili" name="provinsiDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 required">Kode Pos</label>
                                <div class="col-9">
                                    <input type="number" id="kodePosDomisili" name="kodePosDomisili"
                                        class="form-control form-control-sm text-uppercase">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="">Upload Surat Domisili (Apabila anda
                                    kost/kontrakan)</label>
                                <input name="uploadDomisili" id="uploadDomisili" value="{{ old('uploadDomisili') }}"
                                    type="file" accept='application/pdf, image/jpeg, image/png, image/jpg'>
                            </div>
                        </div>
                    </div>
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
