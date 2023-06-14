<x-app-layout title="Home">
    <!-- SLIDER AREA START (slider-6) -->
    <div class="ltn__slider-area ltn__slider-3 ltn__slider-6 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__slide-two-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white--">
                        <!-- ltn__slide-item  -->
                        <div class="ltn__slide-item ltn__slide-item-8 ltn__slide-item-9 text-color-white---- bg-image bg-overlay-theme-black-80---"
                            data-bs-bg="{{ asset('assets/img/slider/slider.png') }}">
                            <div class="ltn__slide-item-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ltn__slide-animation">
                                                    <div class="slide-item-info">
                                                        <div class="slide-item-info-inner ltn__slide-animation">
                                                            <h6
                                                                class="slide-sub-title ltn__secondary-color slide-title-line-2 animated">
                                                                Blooms Florist</h6>
                                                            <h1 class="slide-title animated ">Get Up To 75%</h1>
                                                            <div class="slide-brief animated">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore.
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrapper animated">
                                                                <a href="{{ route('papanbunga.index') }}"
                                                                    class="theme-btn-1 btn btn-round">Shop Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="slide-item-img">
                                                <img src="img/slider/41-1.png" alt="#">
                                                <span class="call-to-circle-1"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__slide-item  -->
                        <div class="ltn__slide-item ltn__slide-item-8 ltn__slide-item-9 text-color-white---- bg-image bg-overlay-theme-black-80---"
                            data-bs-bg="{{ asset('assets/img/slider/slider2.png') }}">
                            <div class="ltn__slide-item-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ltn__slide-animation">
                                                    <div class="slide-item-info">
                                                        <div class="slide-item-info-inner ltn__slide-animation">
                                                            <h6
                                                                class="slide-sub-title ltn__secondary-color slide-title-line-2 animated">
                                                                Blooms Florist</h6>
                                                            <h1 class="slide-title animated ">Get Up To 75%</h1>
                                                            <div class="slide-brief animated">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore.
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrapper animated">
                                                                <a href="service.html"
                                                                    class="theme-btn-1 btn btn-round">Shop Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="slide-item-img">
                                                <img src="img/slider/41-1.png" alt="#">
                                                <span class="call-to-circle-1"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- BANNER AREA START -->
    <!-- BANNER AREA END -->

    {{-- Modal QuickView --}}

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <!-- PRODUCT TAB AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div id="container"></div>
    <div class="ltn__feature-area mb-100">

    </div>
    <!-- FEATURE AREA END -->
    {{-- @section('custom_js')
    <script>
        @if (session()->has('success'))
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session()->get('success') }}");
        @endif
    </script>
@endsection --}}
    @yield('customs_js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- <script>
        // Menggunakan data yang diperoleh dari PHP
        const data = <?php echo json_encode($seriesData); ?>;

        // Mendapatkan daftar toko
        const tokos = <?php echo json_encode($tokos); ?>;

        // Menggambar diagram batang menggunakan Highcharts
        Highcharts.chart('container', {
            chart: {
                type: 'column',
            },
            title: {
                text: 'Jumlah Pesanan berdasarkan Status dan Toko',
            },
            xAxis: {
                categories: tokos,
                title: {
                    text: 'Toko ID',
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Pesanan',
                },
            },
            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical',
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                },
            },
            series: data,
        });
    </script> --}}
    <script>
        // Menggunakan data yang diperoleh dari PHP
        const data = {!! json_encode($seriesData) !!};
        const tokos = {!! json_encode($tokos) !!};
        const weeks = {!! json_encode($weeks) !!};

        if (tokos.length > 0 && weeks.length > 0) {
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jumlah Pesanan per Minggu'
                },
                xAxis: {
                    categories: weeks,
                    title: {
                        text: 'Rentang Tanggal'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Pesanan'
                    }
                },
                legend: {
                    align: 'right',
                    verticalAlign: 'middle',
                    layout: 'vertical'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },
                series: data
            });
        } else {
            document.getElementById('container').innerHTML = '';
        }
    </script>



</x-app-layout>
