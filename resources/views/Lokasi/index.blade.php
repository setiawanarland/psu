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
            display: block;
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
            width: 100%;
            max-width: 100%;
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
                        <h4 class="header-title">Data Lokasi</h4>
                        {{-- <button type="button" class="btn d-flex btn-primary mb-3 pull-right tambahData">Tambah Data</button> --}}
                        <a href="{{ route('lokasi-add') }}" class="btn d-flex btn-primary mb-3 pull-right">Tambah Data</a>
                        <div class="data-tables">
                            <table id="lokasiTable" class="text-cente">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th>Desa/Kel.</th>
                                        <th>Lingkungan</th>
                                        <th>Lokasi</th>
                                        <th>Koordinat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- data table end -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="lokasiPreviewModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Foto lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body modalDetail">

                    <img class="lokasiPreview" src="">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('offset-area')
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li>
                <h6 class="active">Tambah Data Lokasi</h6>
            </li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">

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
                                <label for="image" class="label-image image-button"><i class="fa fa-image i-image"></i>
                                    Pilih Foto</label>
                                <input type="file" class="input-image" accept="image/*" id="image" name="image">
                                <img src="" class="image-preview">
                                <span class="change-image"><i class="fa fa-image i-image"></i>Pilih foto lain</span>
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
                            data: 'nama_kec',
                            render: function(data, type, row) {
                                return data.toUpperCase();

                            }
                        },
                        {
                            data: 'nama_deskel',
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
                                console.log(data);
                                $.each(data.invalid, function(key, value) {
                                    console.log(key);
                                    console.log('errorType', typeof error);
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
                        }).catch(function(error) {
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
                                    console.log(key);
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


        // trigger form
        $('.tambahData, .btn-cancel').on('click', function() {
            $('.offset-area').toggleClass('show_hide');
            $('.settings-btn').toggleClass('active');
            $("input").removeClass('is-invalid');
            $("select").removeClass('is-invalid');
            $("textarea").removeClass('is-invalid');
            var form = $('#lokasiForm');
            form.attr('data-type', 'submit');
            form[0].reset();
        });

        // create lingkungan
        $(document).on('submit', "#lokasiForm[data-type='submit']", function(e) {
            e.preventDefault();
            console.log('ok');

            var form = document.querySelector('form');
            var formData = new FormData(this);

            AxiosCall.post("{{ route('lokasi-store') }}", formData,
                "#lokasiForm");
        });

        $(document).on('click', '.lokasiPreviewBtn', function() {
            console.log($(this));

            var key = $(this).data('id');
            axios.get('/lokasi/show/' + key)
                .then(function(res) {
                    let data = res.data;

                    let element = `<img class="lokasiPreview" src="/image/${data.image}" width="100%">`;

                    $('.modalDetail').children().remove();
                    $('.modalDetail').append(element);

                })
                .catch(function(err) {

                });
        });


        // show update lingkungan
        $(document).on('click', '.lingkunganUpdate', function() {
            console.log($(this));
            $('.offset-area').toggleClass('show_hide');
            $('.settings-btn').toggleClass('active');
            var key = $(this).data('id');
            var form = $('#lokasiForm');
            form.attr('data-type', 'update');

            var key = $(this).data('id');
            axios.get('lingkungan/show/' + key)
                .then(function(res) {
                    let data = res.data;
                    // console.log(data);
                    $.map(data.data, function(val, i) {
                        let value = val;
                        if ((i == 'harga_beli') || (i == 'harga_jual') || (i == 'harga_perdos')) {
                            $("input[name=" + i + "]").val(formatRupiah(value.toString()));
                        } else {
                            $("input[name=" + i + "]").val(val);
                            $("input[name=" + i + "]").attr('style', 'text-transform: uppercase');
                        }

                    })
                })
                .catch(function(err) {

                });
        });


        // edit lingkungan
        $(document).on('submit', "#lokasiForm[data-type='update']", function(e) {
            e.preventDefault();
            console.log($(this));

            var _id = $("input[name='id']").val();
            var form = document.querySelector('form');
            var formData = new FormData(this);

            AxiosCall.update("{{ route('lokasi-update') }}", formData,
                "#lokasiForm");
        });


        // delete lingkungan
        $(document).on('click', '.lingkunganDelete', function(e) {
            e.preventDefault()
            let id = $(this).attr('data-id');
            console.log(id);
            Swal.fire({
                title: 'Apakah kamu yakin akan menghapus data ini ?',
                text: "Data akan di hapus permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/lingkungan/delete/${id}`,
                        type: 'POST',
                        data: {
                            '_method': 'DELETE',
                            '_token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.status !== false) {
                                Swal.fire('Deleted!',
                                        'Data berhasil dihapus.',
                                        'success')
                                    .then(function() {
                                        dataRow.destroy();
                                        dataRow.init();
                                    });
                            } else {
                                swal.fire({
                                    title: "Failed!",
                                    text: `${res.message}`,
                                    icon: "warning",
                                });
                            }
                        }
                    })
                }
            })
        });




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
                $('.change-image').css('display', 'block');
            }
        });

        $('.change-image').on('click', function() {
            $control = $(this);
            $('#image').val('');
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'block');
        });



        $(document).ready(function() {
            dataRow.init();

        });
    </script>
@endsection
