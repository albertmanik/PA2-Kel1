<x-app-layout title="Detail Toko">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Detail Toko</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Toko</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    <div class="ltn__blog-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title section-title-border">{{ $toko->nama_toko }}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Blog Item -->
                @foreach ($toko->products as $item)
                    @if ($item->category_id == 2)
                        <div class="col-lg-4 col-sm-6">
                            <div class="ltn__blog-item">
                                <div class="ltn__blog-img">
                                    <a href="{{ route('bouquet.show', $item->id) }}"><img
                                            src="{{ asset('bouquets/' . $item->gambar) }}" style="width: 900%"
                                            alt="#"></a>
                                </div>
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-author d-none">
                                                <a href="#">by: Admin</a>
                                            </li>
                                            <li>
                                                <span> Nov 18, 2020</span>
                                            </li>
                                            <li class="ltn__blog-comment">
                                                <a href="#"><i class="icon-speech"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title blog-title-line"><a
                                            href="blog-details.html">{{ $item->deskripsi }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-sm-6">
                            <div class="ltn__blog-item">
                                <div class="ltn__blog-img">
                                    <a href="{{ route('bouquet.show', $item->id) }}"><img
                                            src="{{ asset('bungapapan/' . $item->gambar) }}" style="width: 900%"
                                            alt="#"></a>
                                </div>
                                <div class="ltn__blog-brief">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-author d-none">
                                                <a href="#">by: Admin</a>
                                            </li>
                                            <li>
                                                <span> Nov 18, 2020</span>
                                            </li>
                                            <li class="ltn__blog-comment">
                                                <a href="#"><i class="icon-speech"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="ltn__blog-title blog-title-line"><a
                                            href="blog-details.html">{{ $item->deskripsi }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- BLOG AREA END -->
</x-app-layout>
