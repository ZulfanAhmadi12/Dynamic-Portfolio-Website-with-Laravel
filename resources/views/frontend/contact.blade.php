@extends('frontend.main_master')
@section('main')

@section('title')
Contact | Zulfan's Portfolio
@endsection

@php
$allMultiImage = App\Models\MultiImage::limit(6)->get();
$allfooter = App\Models\Footer::find(1);
@endphp

    <!-- main-area -->
    <main>

        <!-- breadcrumb-area -->
        <section class="breadcrumb__wrap">
            <div class="container custom-container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10">
                        <div class="breadcrumb__wrap__content">
                            <h2 class="title">Contact us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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

        <!-- contact-map -->
        <div id="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d705.306279446255!2d109.34855557481715!3d-0.07585133114093319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1688098333839!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
        <!-- contact-map-end -->

        <!-- contact-area -->
        <div class="contact-area">
            <div class="container">
                <form method="post" action="{{ route('store.message') }}" class="contact__form">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <input name="name" type="text" placeholder="Enter your name*">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="email" type="email" placeholder="Enter your mail*">
                            @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="subject" type="text" placeholder="Enter your subject*">
                            @error('subject')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input name="phone" type="text" placeholder="Your Phone*">
                            @error('phone')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <textarea name="message" id="message" placeholder="Enter your massage*"></textarea>
                    <button type="submit" class="btn">send massage</button>
                </form>
            </div>
        </div>
        <!-- contact-area-end -->

        <!-- contact-info-area -->
        <section class="contact-info-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">address line</h4>
                                <span>{{ $allfooter->address }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">Phone Number</h4>
                                <span>{{ $allfooter->number }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact__info">
                            <div class="contact__info__icon">
                                <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png') }}" alt="">
                            </div>
                            <div class="contact__info__content">
                                <h4 class="title">Mail Address</h4>
                                <span>{{ $allfooter->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-area-end -->

        <!-- contact-area -->
        @include('frontend.body.contact')
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

@endsection