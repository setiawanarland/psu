@extends('layout.template')

@section('styles')
    <style>
        .image-input {
            text-align: center;
        }

        .input-image {
            display: none;
        }

        .label-image {
            display: inline-block;
            margin: 0 auto;
            color: #FFF;
            background: #000;
            padding: .3rem .6rem;
            font-size: 115%;
            cursor: pointer;
        }

        .i-image {
            font-size: 125%;
            margin-right: .3rem;
        }

        .i-image:hover {
            animation: shake .35s;
        }

        .image-preview {
            width: 50%;
            max-width: 167px;
            display: none
        }

        .change-image {
            display: none;
            text-align: center;
            color: #FFF;
            background: #000;
            padding: .3rem .6rem;
            font-size: 115%;
            cursor: pointer
        }

        @keyframes shake {

            0% {

                transform: rotate(0deg);
            }

            25% {

                transform: rotate(10deg)
            }

            50% {

                transform: rotate(0deg)
            }

            75% {

                transform: rotate(-10deg)
            }

            100% {

                transform: rotate(0deg)
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('lokasi') }}" class="btn d-flex btn-primary mb-3 pull-right">Back</a>
                        <h4 class="header-title">Add Lokasi</h4>
                        <form id="lokasiForm" data-type="submit">
                            @csrf

                            <input class="form-control" type="hidden" name="id" id="id">

                            <div class="form-group" style="margin-bottom: 0px;">
                                <label for="lingkungan" class="col-form-label">Lingkungan</label>
                                <select class="form-control" id="lingkungan" name="lingkungan">
                                    <option value="null">Pilih Lingkungan</option>
                                    @foreach ($lingkungan as $index => $value)
                                        <option value="{{ $value->id }}">
                                            {{ Str::ucfirst($value->lingkungan) }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label for="lokasi" class="col-form-label">Nama Lokasi</label>
                                <input class="form-control" type="text" name="lokasi" id="lokasi">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group" style="margin-bottom: 0px;">
                                <label for="lattitude" class="col-form-label">Lattitude</label>
                                <input class="form-control" type="text" name="lattitude" id="lattitude">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="longitude" class="col-form-label">Longitude</label>
                                <input class="form-control" type="text" name="longitude" id="longitude">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Foto Lokasi</label>
                                <div class="image-input">
                                    <label for="image" class="label-image image-button"><i
                                            class="fa fa-image i-image"></i>
                                        Pilih Foto</label>
                                    <input type="file" class="input-image" accept="image/*" id="image"
                                        name="image">
                                    <img src="" class="image-preview rounded float-center">
                                    <span class="change-image"><i class="fa fa-image i-image"></i>Pilih foto lain</span>
                                </div>
                            </div>

                            <h4 class="header-title mt-5">Penerangan Jalan Umum (PJU)</h4>
                            <p class="font-14 mb-0">Jumlah PJU yang sudah ada</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Baik" name="pju_baik">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak Sedang" name="pju_sedang">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak Berat" name="pju_berat">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Jumlah PJU yang dibutuhkan</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="PJU yang dibutuhkan"
                                    name="pju_dibutuhkan">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Jumlah rumah tangga yang terlayani</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rumah tangga yang terlayani"
                                    name="pju_terlayani">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <h4 class="header-title mt-5">Jalan Lingkungan</h4>
                            <p class="font-14 mb-0">Kondisi jalan lingkungan</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Baik"
                                    name="jalan_lingkungan_baik">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak sedang"
                                    name="jalan_lingkungan_sedang">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak berat"
                                    name="jalan_lingkungan_berat">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Total panjang"
                                    name="jalan_lingkungan_total">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Jalan lingkungan yang dibutuhkan</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="1 Meter"
                                    name="jalan_lingkungan_kebutuhan_1m">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="1.1 - 2 Meter"
                                    name="jalan_lingkungan_kebutuhan_2m">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="2.1 - 3 Meter"
                                    name="jalan_lingkungan_kebutuhan_3m">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="> 3 Meter"
                                    name="jalan_lingkungan_kebutuhan_3m+">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Jumlah rumah tangga yang terlayani</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rumah tangga yang terlayani"
                                    name="jalan_lingkungan_terlayani">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>


                            <h4 class="header-title mt-5">Drainase</h4>
                            <p class="font-14 mb-0">panjang drainase yang sudah dibangun</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Baik" name="drainase_baik">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak sedang"
                                    name="drainase_sedang">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rusak berat"
                                    name="drainase_berat">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Total panjang"
                                    name="drainase_total">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Meter</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Drainase yang dibutuhkan</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="40 CM"
                                    name="drainase_kebutuhan_40cm">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">CM</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="50 CM"
                                    name="drainase_kebutuhan_50cm">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Cm</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="60 CM"
                                    name="drainase_kebutuhan_60cm">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">CM</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <p class="font-14 mb-0">Jumlah rumah tangga yang terlayani</p>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rumah tangga yang terlayani"
                                    name="drainase_terlayani">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Buah</span>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>


                            <div class="form-group" style="margin-bottom: 0px; bottom:0;">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger btn-cancel" type="reset">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // datatable produk list
        var dataRow = function() {
            var init = function() {
                let table = $('#lokasiTable');
                table.DataTable({
                    processing: true,
                    ordering: false,
                    ajax: "{{ route('lokasi-list') }}",
                    columns: [{
                            data: 'nama_kecamatan',
                            render: function(data, type, row) {
                                return data.toUpperCase();

                            }
                        },
                        {
                            data: 'nama_desa_kel',
                            render: function(data, type, row) {
                                return data.toUpperCase();
                            }
                        },
                        {
                            data: 'lingkungan',
                            render: function(data, type, row) {
                                return data.toUpperCase();
                            }
                        },
                        {
                            data: 'nama_lokasi',
                            render: function(data, type, row) {
                                return data.toUpperCase();
                            }
                        },
                        {
                            data: 'coordinat',
                            render: function(data, type, row) {
                                return data;
                            }
                        },
                        {
                            data: 'id'
                        }
                    ],
                    columnDefs: [{
                        targets: -1,
                        title: 'Actions',
                        orderable: false,
                        width: '10rem',
                        class: "wrapok",
                        render: function(data, type, row, full, meta) {
                            return `
                            <a role="button" href="javascript:;" type="button" data-id="${row.id}" class="btn btn-warning btn-sm lingkunganUpdate"><i class="fa fa-edit"></i></a>
                            <button type="button" class="btn btn-danger btn-sm btn-delete lingkunganDelete" data-id="${row.id}"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-primary btn-sm btn-preview lokasiPreviewBtn"  data-toggle="modal" data-target="#lokasiPreviewModal" data-id="${row.id}"><i class="fa fa-eye"></i></button>
                    `;
                        },
                    }],
                });

            };

            var destroy = function() {
                var table = $('#lokasiTable').DataTable();
                table.destroy();
            };

            return {
                init: function() {
                    init();
                },
                destroy: function() {
                    destroy();
                }

            };
        }();


        // axiocall
        var AxiosCall = function() {
            return {
                post: function(_url, _data, _element) {
                    axios.post(_url, _data)
                        .then(function(res) {
                            var data = res.data;
                            if (data.fail) {
                                swal.fire({
                                    text: "Maaf Terjadi Kesalahan",
                                    title: "Error",
                                    timer: 2000,
                                    icon: "danger",
                                    showConfirmButton: false,
                                });
                            } else if (data.invalid) {
                                let first = [];
                                $.each(data.invalid, function(key, value) {
                                    first.push(key);
                                    $("input[name='" + key + "']").addClass('is-invalid').siblings(
                                        '.invalid-feedback').html(value[0]);
                                });
                                $("input[name='" + first[0] + "']").focus();
                            } else if (data.success) {
                                swal.fire({
                                    text: "Data anda berhasil disimpan",
                                    title: "Sukses",
                                    icon: "success",
                                    showConfirmButton: true,
                                    confirmButtonText: "OK, Siip",
                                }).then(function() {
                                    $('.offset-area').toggleClass('show_hide');
                                    $('.settings-btn').toggleClass('active');
                                    var form = $('#lokasiForm');
                                    form[0].reset();
                                    dataRow.destroy();
                                    dataRow.init();
                                    window.location = "{{ route('lokasi') }}";
                                });
                            }
                        }).catch(function(error) {
                            console.log(error);
                            swal.fire({
                                text: "Terjadi Kesalahan Sistem",
                                title: "Error",
                                icon: "error",
                                showConfirmButton: true,
                                confirmButtonText: "OK",
                            })
                        });
                },
                update: function(_url, _data, _element) {
                    console.log(_url);
                    console.log(_data);
                    console.log(_element);
                    axios.post(_url, _data)
                        .then(function(res) {
                            var data = res.data;
                            console.log(data);
                            if (data.failed) {
                                swal.fire({
                                    text: "Maaf Terjadi Kesalahan",
                                    title: "Error",
                                    timer: 2000,
                                    icon: "danger",
                                    showConfirmButton: false,
                                });
                            } else if (data.invalid) {

                                $.each(data.invalid, function(key, value) {
                                    $("input[name='" + key + "']").addClass('is-invalid').siblings(
                                        '.invalid-feedback').html(value[0]);

                                });
                            } else if (data.success) {
                                swal.fire({
                                    text: "Data anda berhasil disimpan",
                                    title: "Sukses",
                                    icon: "success",
                                    showConfirmButton: true,
                                    confirmButtonText: "OK, Siip",
                                }).then(function() {
                                    $('.offset-area').toggleClass('show_hide');
                                    $('.settings-btn').toggleClass('active');
                                    var form = $('#lokasiForm');
                                    form[0].reset();
                                    dataRow.destroy();
                                    dataRow.init();
                                });
                            }
                        }).catch(function(res) {
                            var data = res.data;
                            console.log(data);
                            swal.fire({
                                text: "Terjadi Kesalahan Sistem",
                                title: "Error",
                                icon: "error",
                                showConfirmButton: true,
                                confirmButtonText: "OK",
                            })
                        });
                },
            };
        }();




        $('#image').on('change', function() {
            $input = $(this);
            if ($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function(data) {
                    console.log(data);
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.image-preview').css('margin', '0 auto');
                $('.change-image').css('display', 'inline-block');
                $('.change-image').css('margin', '0 auto');
            }
        });

        $('.change-image').on('click', function() {
            $control = $(this);
            $('#image').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'inline-block');
            $('.image-button').css('margin', '0 auto');
        });

        // create lokasi
        $(document).on('submit', "#lokasiForm[data-type='submit']", function(e) {
            e.preventDefault();

            $("input").removeClass('is-invalid');
            $("select").removeClass('is-invalid');
            $("textarea").removeClass('is-invalid');

            var form = document.querySelector('form');
            var formData = new FormData(this);

            AxiosCall.post("{{ route('lokasi-store') }}", formData,
                "#lokasiForm");
        });



        $(document).ready(function() {
            dataRow.init();

        });
    </script>
@endsection
