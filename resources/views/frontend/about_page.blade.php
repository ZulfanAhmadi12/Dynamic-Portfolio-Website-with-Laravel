@extends('frontend.main_master')
@section('main')

@section('title')
About | Zulfan's Portfolio
@endsection

@php
$allMultiImage = App\Models\MultiImage::limit(6)->get();
$blogs = App\Models\Blog::latest()->limit(3)->get();
@endphp


<!-- main-area -->
<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">About me</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Me</li>
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

<!-- about-area -->
<section class="about about__style__two">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__image">
                    <img src="{{ $aboutpage->about_image }}" alt="A Photo of Me">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About me</span>
                        <h2 class="title">{{ $aboutpage->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p><span>{{ $aboutpage->short_title }}</span></p>
                        </div>
                    </div>
                    <p class="desc">{{ $aboutpage->short_description }}</p>
                    <a href="https://drive.google.com/drive/folders/12ziNVrJqdIiteYCmnuLhLM3h84tq9VhN?usp=sharing" class="btn">Download my resume</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="about__info__wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button"
                                role="tab" aria-controls="about" aria-selected="true">About</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills" type="button"
                                role="tab" aria-controls="skills" aria-selected="false">Skills</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education" type="button"
                                role="tab" aria-controls="education" aria-selected="false">education</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <p class="desc">{!! $aboutpage->long_description !!}</p>
                        </div>
                        <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <div class="about__skill__wrap">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">English</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="percentage">85%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Problem Solving</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="percentage">75%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Math</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><span class="percentage">60%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Machine Learning</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"><span class="percentage">60%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Data Science</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="percentage">65%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Web Programming</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span class="percentage">70%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Mobile Programming</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"><span class="percentage">70%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__skill__item">
                                            <h5 class="title">Japanese</h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"><span class="percentage">45%</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <div class="about__education__wrap">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="about__education__item">
                                            <h3 class="title">Informatics Engineering Pontianak Muhammadiyah University</h3>
                                            <span class="date">2018 – 2023</span>
                                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour,There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                            alteration in some form, by injected humour.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__education__item">
                                            <h3 class="title">Big Data using Python FGA</h3>
                                            <span class="date">2023</span>
                                            <p>Program Fresh Graduate Academy (FGA) adalah salah satu Akademi yang ditawarkan dari program
                                                beasiswa Digital Talent Scholarship, Kementerian Komunikasi dan Informatika.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__education__item">
                                            <h3 class="title">Data Science Professional IBM</h3>
                                            <span class="date">2023 - 2024</span>
                                            <p>I am currently working towards obtaining my Professional Certification for Data Science from IBM through Coursera.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="about__education__item">
                                            <h3 class="title">Machine Learning & Data Science Bootcamp Udemy</h3>
                                            <span class="date">2022 - 2023</span>
                                            <p>I started this bootcamp in late 2022 and finished it in early 2023.</p>
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
</section>
<!-- about-area-end -->

<!-- blog-area -->
<section class="blog blog__style__two">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{ asset($blog->blog_image) }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">{{ $blog['category']['blog_category'] }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                        <h3 class="title"><a href="{{ route('blog.details', $blog->id) }}">{{ $blog->blog_title }}</a></h3>
                        <a href="{{ route('blog.details', $blog->id) }}" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="blog__button text-center">
            <a href="{{ route('home.blog') }}" class="btn">more blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->

<!-- contact-area -->
@include('frontend.body.contact')
<!-- contact-area-end -->

</main>
<!-- main-area-end -->

@endsection