@php 

$allfooter = App\Models\Footer::find(1);


@endphp

<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>Thank you for visiting my portfolio website. I am delighted to have you here. 
                        Whether you have any questions, feedback, or would like to discuss a potential project, 
                        I am here to assist you. Feel free to reach out to me with any inquiries or concerns you may have.</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">{{ $allfooter->email }}</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="post" action="{{ route('store.message') }}">
                            @csrf
                            <input name="name" type="text" placeholder="Enter name*">
                            @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <input name="email" type="email" placeholder="Enter mail*">
                            @error('email')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <input name="subject" type="text" placeholder="Enter subject*">
                            @error('subject')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <input name="number" type="number" placeholder="Enter phone number*">
                            @error('number')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                            <textarea name="message" placeholder="Enter Massage"></textarea>
                            <button type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>