<!DOCTYPE html>
<html>

<head>
    <title>Sipasauki Disperkimtan Jeneponto</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/author/jpt_logo.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="{{ asset('css/amchart.css') }}" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <!-- Start datepicker css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <!-- Start select2 css -->
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <style>
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .offset-area {
            z-index: 99999;
        }

        #preview {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 9999;
            height: 15%;
            width: 100%;
            background: rgb(184, 189, 38);
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        #close_preview {
            margin: 5px;
            padding: 5px;
            font-size: 40px;
            animation: popin 1.5s linear infinite 0s;
        }

        .navbar {
            background-color: rgb(184, 189, 38);
        }

        .navbar-brand:hover {
            text-shadow: 1px 1px 2px #000;
        }

        .image-on {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #map {
            height: 100%;
        }

        @keyframes popin {
            0% {
                opacity: 1;
                transform: scale(0);
            }

            1% {
                opacity: 0.1;
                transform: scale(0);
            }

            99% {
                opacity: 1;
                transform: scale(1);
            }

            100% {
                opacity: 1;
                transform: scale(0);
            }
        }
    </style>
</head>

<body>


    <div id="preloader">
        <div class="loader"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <img src="{{ asset('images/author/pu_logo.png') }}" class="image-on" alt="" width="7%">
            <img src="{{ asset('images/author/jpt_logo.png') }}" class="image-on" alt="" width="7%">
        </div>
    </nav>


    <div id="map"></div>

    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li>
                <h5 class="text-uppercase">
                    survey penyediaan psu
                </h5>
                {{-- <hr> --}}
                <h6 class="text-capitalize active">

                </h6>
            </li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="tm-title">
                            <h4 class="title-item text-uppercase">Penerangan Jalan Umum</h4>
                        </div>
                        <span class="font-weight-bold">Jumlah PJU yang sudah ada</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>Baik</td>
                                <td>:</td>
                                <td class="pju_baik"></td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td class="pju_sedang"></td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td class="pju_berat"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah PJU yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td class="pju_kebutuhan"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td class="pju_terlayani"></td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="timeline-task">
                        <div class="tm-title">
                            <h4 class="title-item text-uppercase">Jalan Lingkungan</h4>
                        </div>
                        <span class="font-weight-bold">Kondisi</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>Baik</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_baik"></td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_sedang"></td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_berat"></td>
                            </tr>
                            <tr>
                                <td>Total panjang</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_total"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jalan lingkungan yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>1 meter</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_kebutuhan_1m"></td>
                            </tr>
                            <tr>
                                <td>1,1 - 2 Meter</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_kebutuhan_2m"></td>
                            </tr>
                            <tr>
                                <td>2,1 - 3 Meter</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_kebutuhan_3m"></td>
                            </tr>
                            <tr>
                                <td>> 3 Meter</td>
                                <td>:</td>
                                <td class="jalan_lingkungan_kebutuhan_4m"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <td class="jalan_lingkungan_terlayani"></td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="timeline-task">
                        <div class="tm-title">
                            <h4 class="title-item text-uppercase">Drainase</h4>
                        </div>
                        <span class="font-weight-bold">Panjang drainase yang sudah dibangun</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>Baik</td>
                                <td>:</td>
                                <td class="drainase_baik"></td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td class="drainase_sedang"></td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td class="drainase_berat"></td>
                            </tr>
                            <tr>
                                <td>Total panjang</td>
                                <td>:</td>
                                <td class="drainase_total"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Drainase yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>40 CM</td>
                                <td>:</td>
                                <td class="drainase_kebutuhan_40cm"></td>
                            </tr>
                            <tr>
                                <td>50 CM</td>
                                <td>:</td>
                                <td class="drainase_kebutuhan_50cm"></td>
                            </tr>
                            <tr>
                                <td>60 CM</td>
                                <td>:</td>
                                <td class="drainase_kebutuhan_60cm"></td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <td class="drainase_terlayani"></td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="timeline-task">
                        <div class="tm-title">
                            <h4 class="title-item text-uppercase">Foto lokasi</h4>
                        </div>
                        <img src="" alt="" width="100%" class="mb-1 foto_lokasi">
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/mapsJavaScriptAPI.js') }}" async defer></script>

    <script>
        var data = {!! $data !!}
        console.log(data);
        var map;

        function initMap() {
            // var locations = [
            //     ['Sunggu Manai 1', -5.678660, 119.759909, 5],
            //     ['Sunggu Manai 2', -5.673901, 119.753433, 4],
            //     ['Jl. Pahlawan Lr. 1', -5.674109, 119.755991, 3],
            //     ['Jl. Pahlawan Lr. 2', -5.674016, 119.755959, 2],
            //     ['Jl. Pahlawan Lr. 3', -5.677559, 119.758969, 1]
            // ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(-5.63333000, 119.73333000),
                mapTypeId: google.maps.MapTypeId.SATELLITE
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            $.each(data, function(key, value) {

                console.log(key);

                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(value.lattitude, value.longitude),
                    map: map,
                    title: value.nama_lokasi,
                    animation: google.maps.Animation.DROP,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {

                        $('.offset-area').removeClass('show_hide');
                        setTimeout(() => {
                            $('.offset-area').addClass('show_hide');
                            $('h6.active').html(value.nama_lokasi +
                                ", " + value.lingkungan + ", " + value.nama_desa_kel +
                                ", " + value.nama_kecamatan + "");

                            $('.pju_baik').html(value.pju_baik + " Buah");
                            $('.pju_sedang').html(value.pju_sedang + " Buah");
                            $('.pju_berat').html(value.pju_berat + " Buah");
                            $('.pju_kebutuhan').html(value.pju_kebutuhan + " Buah");
                            $('.pju_terlayani').html(value.pju_terlayani + " Buah");

                            $('.jalan_lingkungan_baik').html(value.jalan_lingkungan_baik +
                                " Meter");
                            $('.jalan_lingkungan_sedang').html(value
                                .jalan_lingkungan_sedang + " Meter");
                            $('.jalan_lingkungan_berat').html(value.jalan_lingkungan_berat +
                                " Meter");
                            $('.jalan_lingkungan_total').html(value.jalan_lingkungan_total +
                                " Meter");
                            $('.jalan_lingkungan_kebutuhan_1m').html(value
                                .jalan_lingkungan_kebutuhan_1m +
                                " Meter");
                            $('.jalan_lingkungan_kebutuhan_2m').html(value
                                .jalan_lingkungan_kebutuhan_2m +
                                " Meter");
                            $('.jalan_lingkungan_kebutuhan_3m').html(value
                                .jalan_lingkungan_kebutuhan_3m +
                                " Meter");
                            $('.jalan_lingkungan_kebutuhan_4m').html(value
                                .jalan_lingkungan_kebutuhan_4m +
                                " Meter");
                            $('.jalan_lingkungan_terlayani').html(value
                                .jalan_lingkungan_terlayani +
                                " Buah");

                            $('.drainase_baik').html(value.drainase_baik +
                                " CM");
                            $('.drainase_sedang').html(value
                                .drainase_sedang + " CM");
                            $('.drainase_berat').html(value.drainase_berat +
                                " CM");
                            $('.drainase_total').html(value.drainase_total +
                                " CM");
                            $('.drainase_kebutuhan_40cm').html(value
                                .drainase_kebutuhan_40cm +
                                " CM");
                            $('.drainase_kebutuhan_50cm').html(value
                                .drainase_kebutuhan_50cm +
                                " CM");
                            $('.drainase_kebutuhan_60cm').html(value
                                .drainase_kebutuhan_60cm +
                                " CM");
                            $('.drainase_terlayani').html(value
                                .drainase_terlayani +
                                " Buah");

                            $('.foto_lokasi').attr("src", '/image/' + value.image + '');
                            $('.foto_lokasi').attr("width", '100%');
                        }, 500);


                    }
                })(marker, i));
            });

            // for (i = 0; i < locations.length; i++) {
            //     marker = new google.maps.Marker({
            //         position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            //         map: map,
            //         title: locations[i][0],
            //         animation: google.maps.Animation.DROP,
            //     });

            //     // infowindow.setContent(
            //     //     "<p><b>" + locations[i][0] + "</b>, about marker.</p>"
            //     // );
            //     // infowindow.open(map, marker);

            //     google.maps.event.addListener(marker, 'click', (function(marker, i) {
            //         return function() {
            //             // infowindow.setContent(
            //             //     '<div id="content">' +
            //             //     '<div id="siteNotice">' +
            //             //     "</div>" +
            //             //     '<h1 id="firstHeading" class="firstHeading">' + locations[i][0] + '</h1>' +
            //             //     '<div id="bodyContent">' +
            //             //     "<p><b>" + locations[i][0] + "</b>, about marker.</p>" +
            //             //     "<ul>" +
            //             //     "<li>list</li>" +
            //             //     "<li>list</li>" +
            //             //     "<li>list</li>" +
            //             //     "</ul>" +
            //             //     "</div>" +
            //             //     "</div>"
            //             // );
            //             // infowindow.open(map, marker);

            //             $('.offset-area').removeClass('show_hide');
            //             setTimeout(() => {
            //                 $('.offset-area').addClass('show_hide');
            //                 $('h6.active').html(locations[i][0] + ", pastur, empoang, binamu");
            //             }, 500);


            //         }
            //     })(marker, i));
            // }
        }
    </script>

    <!-- jquery latest version -->
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

    <!-- Start axios -->
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <!-- Start datatable js -->
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('js/datatables.fixedheader.min.js') }}"></script>
    <!-- Start datepicker js -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Start select2 js -->
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Start Format Rupiah js -->
    <script src="{{ asset('js/rupiahFormat.js') }}"></script>

    <!-- start chart js -->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <!-- start highcharts js -->
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/exporting.js') }}"></script>
    <script src="{{ asset('js/export-data.js') }}"></script>
    <!-- start amcharts -->
    <script src="{{ asset('js/amcharts.js') }}"></script>
    <script src="{{ asset('js/ammap.js') }}"></script>
    <script src="{{ asset('js/worldLow.js') }}"></script>
    <script src="{{ asset('js/serial.js') }}"></script>
    <script src="{{ asset('js/export.min.js') }}"></script>
    <script src="{{ asset('js/light.js') }}"></script>
    <!-- all line chart activation -->
    <script src="{{ asset('js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('js/pie-chart.js') }}"></script>
    <!-- all bar chart -->
    <script src="{{ asset('js/bar-chart.js') }}"></script>
    <!-- all map chart -->
    <script src="{{ asset('js/maps.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>


    <script>
        var close_preview = $('#close_preview');
        close_preview.on('click', function() {
            $('#preview').fadeOut('slow', function() {
                $('#preview').remove();
            });
        });
    </script>



</body>

</html>
