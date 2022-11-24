@extends('layout.template')

@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Data Lingkungan</h4>
                        <button type="button" class="btn d-flex btn-primary mb-3 pull-right tambahData">Tambah Data</button>
                        <div class="data-tables">
                            <table id="lingkunganTable" class="text-cente">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Kecamatan</th>
                                        <th>Desa/Kel.</th>
                                        <th>Lingkungan</th>
                                        <th>Nama Kepala</th>
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
@endsection

@section('offset-area')
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li>
                <h6 class="active">Tambah Data Lingkungan</h6>
            </li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">

                    <form id="lingkunganForm" data-type="submit">
                        @csrf

                        <input class="form-control" type="hidden" name="id" id="id">

                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="kecamatan" class="col-form-label">Kecamatan</label>
                            <select class="form-control" id="kecamatan" name="kecamatan">

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="desa_kel" class="col-form-label">Desa/Kel.</label>
                            <select class="form-control" id="desa_kel" name="desa_kel">
                                <option value="null">Pilih Lingkungan</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <label for="lingkungan" class="col-form-label">Lingkungan</label>
                            <input class="form-control" type="text" name="lingkungan" id="lingkungan">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="nama_kepala" class="col-form-label">Nama Kepala</label>
                            <input class="form-control" type="text" name="nama_kepala" id="nama_kepala">
                            <div class="invalid-feedback"></div>
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
                let table = $('#lingkunganTable');
                table.DataTable({
                    processing: true,
                    ordering: false,
                    ajax: "{{ route('lingkungan-list') }}",
                    columns: [{
                            data: 'nama_kecamatan',
                            render: function(data, type, row) {
                                return data;

                            }
                        },
                        {
                            data: 'nama_desa_kel',
                            render: function(data, type, row) {
                                return data;
                            }
                        },
                        {
                            data: 'lingkungan',
                            render: function(data, type, row) {
                                return data.toUpperCase();
                            }
                        },
                        {
                            data: 'nama_kepala',
                            render: function(data, type, row) {
                                return data.toUpperCase();
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
                    `;
                        },
                    }],
                });

            };

            var destroy = function() {
                var table = $('#lingkunganTable').DataTable();
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
                                    var form = $('#lingkunganForm');
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
                                    var form = $('#lingkunganForm');
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
            var form = $('#lingkunganForm');
            form.attr('data-type', 'submit');
            form[0].reset();
        });

        // create lingkungan
        $(document).on('submit', "#lingkunganForm[data-type='submit']", function(e) {
            e.preventDefault();
            console.log('ok');

            var form = document.querySelector('form');
            var formData = new FormData(this);

            AxiosCall.post("{{ route('lingkungan-store') }}", formData,
                "#lingkunganForm");
        });


        // show update lingkungan
        $(document).on('click', '.lingkunganUpdate', function() {
            console.log($(this));
            $('.offset-area').toggleClass('show_hide');
            $('.settings-btn').toggleClass('active');
            var key = $(this).data('id');
            var form = $('#lingkunganForm');
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
        $(document).on('submit', "#lingkunganForm[data-type='update']", function(e) {
            e.preventDefault();
            console.log($(this));

            var _id = $("input[name='id']").val();
            var form = document.querySelector('form');
            var formData = new FormData(this);

            AxiosCall.update("{{ route('lingkungan-update') }}", formData,
                "#lingkunganForm");
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




        // format npwp
        $('#npwp').on('keyup', function() {
            $(this).val(formatNpwp($(this).val()));


        });

        function formatNpwp(value) {
            if (typeof value === 'string') {
                return value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/, '$1.$2.$3.$4-$5.$6');
            }
        };

        $('#kecamatan').on('change', function() {
            lingkungan($(this).val());
        });

        function kecamatan() {
            fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/7304.json`)
                .then(response => response.json())
                .then(districs => {
                    let html = '<option value="null">Pilih Kecamatan</option>';
                    for (var i = 0; i < districs.length; i++) {
                        html += "<option value=" + districs[i].id + ">" + districs[i].name +
                            "</option>"
                    }
                    document.getElementById("kecamatan").innerHTML = html;
                });
        }

        function lingkungan(districId) {
            fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/${districId}.json`)
                .then(response => response.json())
                .then(villages => {
                    let html = '';
                    for (var i = 0; i < villages.length; i++) {
                        html += "<option value=" + villages[i].id + ">" + villages[i].name +
                            "</option>"
                    }
                    document.getElementById("desa_kel").innerHTML = html;
                });
        }



        $(document).ready(function() {
            dataRow.init();

            kecamatan();

        });
    </script>
@endsection
