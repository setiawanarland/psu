<!DOCTYPE html>
<html>

<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

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
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div id="map"></div>

    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li>
                <h5 class="text-uppercase">
                    survey penyediaan psu
                </h5>
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
                                <td>1 Buah</td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td>1 Buah</td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td>1 Buah</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah PJU yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>1 Buah</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>1 Buah</td>
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
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Total panjang</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jalan lingkungan yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>1 meter</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>1,1 - 2 Meter</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>2,1 - 3 Meter</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>> 3 Meter</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <td>1 Buah</td>
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
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Rusak Sedang</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Rusak Berat</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                            <tr>
                                <td>Total panjang</td>
                                <td>:</td>
                                <td>1 Meter</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Drainase yang dibutuhkan</span>
                        <table width="100%" class="table table-borderless p-0 m-0">
                            <tr>
                                <td>40 CM</td>
                                <td>:</td>
                                <td>1 CM</td>
                            </tr>
                            <tr>
                                <td>50 CM</td>
                                <td>:</td>
                                <td>1 CM</td>
                            </tr>
                            <tr>
                                <td>60 CM</td>
                                <td>:</td>
                                <td>1 CM</td>
                            </tr>
                        </table>
                        <span class="font-weight-bold">Jumlah rumah tangga yang terlayani</span>
                        <table width="100%" class="table table-borderless">
                            <tr>
                                <td>1 Buah</td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="timeline-task">
                        <div class="tm-title">
                            <h4 class="title-item text-uppercase">Foto lokasi</h4>
                        </div>
                        <img src="{{ asset('images/psu/lorong1.jpg') }}" alt="" width="100%">
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/mapsJavaScriptAPI.js') }}" async defer></script>

    <script>
        var map;

        function initMap() {
            var locations = [
                ['Sunggu Manai 1', -5.678660, 119.759909, 5],
                ['Sunggu Manai 2', -5.673901, 119.753433, 4],
                ['Jl. Pahlawan Lr. 1', -5.674109, 119.755991, 3],
                ['Jl. Pahlawan Lr. 2', -5.674016, 119.755959, 2],
                ['Jl. Pahlawan Lr. 3', -5.677559, 119.758969, 1]
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(-5.63333000, 119.73333000),
                mapTypeId: google.maps.MapTypeId.SATELLITE
            });

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    title: locations[i][0],
                    animation: google.maps.Animation.DROP,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        // infowindow.setContent(
                        //     '<div id="content">' +
                        //     '<div id="siteNotice">' +
                        //     "</div>" +
                        //     '<h1 id="firstHeading" class="firstHeading">' + locations[i][0] + '</h1>' +
                        //     '<div id="bodyContent">' +
                        //     "<p><b>" + locations[i][0] + "</b>, about marker.</p>" +
                        //     "<ul>" +
                        //     "<li>list</li>" +
                        //     "<li>list</li>" +
                        //     "<li>list</li>" +
                        //     "</ul>" +
                        //     "</div>" +
                        //     "</div>"
                        // );
                        // infowindow.open(map, marker);

                        $('.offset-area').removeClass('show_hide');
                        setTimeout(() => {
                            $('.offset-area').addClass('show_hide');
                            $('h6.active').html(locations[i][0] + ", pastur, empoang, binamu");
                        }, 500);


                    }
                })(marker, i));
            }
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



</body>

</html>
