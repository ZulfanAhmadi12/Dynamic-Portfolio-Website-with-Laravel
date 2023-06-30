@extends('frontend.main_master')
@section('main')

@section('title')
Project's Detail | Zulfan's Portfolio
@endsection

@php

$allfooter = App\Models\Footer::find(1);
$allblogs = App\Models\Blog::latest()->limit(3)->get();

@endphp

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
<div class="container custom-container">
<div class="row justify-content-center">
    <div class="col-xl-6 col-lg-8 col-md-10">
        <div class="breadcrumb__wrap__content">
            <h2 class="title">{{ $portofolio->portofolio_name }}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $portofolio->portofolio_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
</div>
<div class="breadcrumb__wrap__icon">
<ul>
    {{-- Create Dynamic Multi Image Page to Control these Image --}}
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon01.png') }}" alt=""></li>
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon02.png') }}" alt=""></li>
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon03.png') }}" alt=""></li>
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon04.png') }}" alt=""></li>
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon05.png') }}" alt=""></li>
    <li><img src="{{ asset('frontend/assets/img/icons/breadcrumb_icon06.png') }}" alt=""></li>
</ul>
</div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-details-area -->
<section class="services__details">
<div class="container">
<div class="row">
    <div class="col-lg-8">
        <div class="services__details__thumb">
            <img src="{{ asset($portofolio->portofolio_image) }}" alt="">
        </div>
        <div class="services__details__content">
            <h2 class="title">{{ $portofolio->portofolio_title }}</h2>
            <p>{!! $portofolio->portofolio_description !!}</p>
        </div>
    </div>
    <div class="col-lg-4">
        <aside class="services__sidebar">
            <div class="widget">
                <h4 class="widget-title">Recent Blog</h4>
                <ul class="rc__post">
                    @foreach($allblogs as $item)
                    <li class="rc__post__item">
                        <div class="rc__post__thumb">
                            <a href="{{ route('blog.details', $item->id) }}"><img src="{{ asset($item->blog_image) }}" alt="Recent Blog Image"></a>
                        </div>
                        <div class="rc__post__content">
                            <h5 class="sub-title"><a href="{{ route('blog.details', $item->id) }}">{{ $item->blog_title }}</a></h5>
                            <span class="post-date"><i class="fal fa-calendar-alt">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</i></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="widget">
                <h5 class="title">Project Information</h5>
                <ul class="sidebar__contact__info">
                    <li><span>Date :</span> January, 2021</li>
                    <li><span>Location :</span> East Meadow NY 11554</li>
                    <li><span>Client :</span> American</li>
                    <li class="cagegory"><span>Category :</span>
                        <a href="portfolio.html">Photo,</a>
                        <a href="portfolio.html">UI/UX</a>
                    </li>
                    <li><span>Project Link :</span> <a href="portfolio-details.html">https://www.yournews.com/</a></li>
                </ul>
            </div>
            <div class="widget">
                <h5 class="title">Contact Information</h5>
                <ul class="sidebar__contact__info">
                    <li><span>Address :</span>{{ $allfooter->address }}</li>
                    <li><span>Mail :</span>{{ $allfooter->email }}</li>
                    <li><span>Phone :</span>{{ $allfooter->number }}</li>
                </ul>
                <ul class="sidebar__contact__social">
                       <li><a href="{{ $allfooter->github }}" target="_blank"><i class="fab fa-github"></i></a></li>
                        <li><a href="{{ $allfooter->linkedin }}"target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="{{ $allfooter->instagram }}"target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>
</div>
</section>
<!-- portfolio-details-area-end -->


<!-- contact-area -->
@include('frontend.body.contact')
<!-- contact-area-end -->

@endsection