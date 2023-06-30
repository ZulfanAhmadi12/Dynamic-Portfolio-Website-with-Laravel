@extends('frontend.main_master')
@section('main')

@section('title')
Portfolio's Project | Zulfan's Portfolio
@endsection

@php
$allMultiImage = App\Models\MultiImage::limit(6)->get();
@endphp

<!-- main-area -->
@if (count($portofolio)!= 0)
            <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">All Portfolio's Project</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Portfolio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__wrap__icon">
                <ul>
                    @foreach($allMultiImage as $image)
                    <li><img src="{{ asset($image->multi_image) }}" alt=""></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
    
        <!-- portfolio-area -->
        <section class="portfolio__inner">
            <div class="container">
                <div class="portfolio__inner__active">
                    @foreach($portofolio as $item)
                    <div class="portfolio__inner__item grid-item cat-two cat-three">
                        <div class="row gx-0 align-items-center">
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__thumb">
                                    <a href="portfolio-details.html">
                                        <img src="{{ asset($item->portofolio_image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-10">
                                <div class="portfolio__inner__content">
                                    <h2 class="title"><a href="portfolio-details.html">{{ $item->portofolio_name }}</a></h2>
                                    <h3 class="sub-title"><a href="portfolio-details.html">{{ $item->portofolio_title }}</a></h3>
                                    <p>{!! Str::limit($item->portofolio_description, 250) !!}</p>
                                    <a href="{{ route('portofolio.details', $item->id) }}" class="link">View Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- portfolio-area-end -->


        <!-- contact-area -->
        @include('frontend.body.contact')
        <!-- contact-area-end -->
    
    </main>
            <!-- main-area-end -->
@endif
<!-- main-area-end -->


@endsection