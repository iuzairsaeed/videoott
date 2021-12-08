@extends('front.layout.master')
@section('content')
<!-- slider-area -->
<section class="breadcrumb-area breadcrumb-bg" data-background="{{asset('public/frontend-assets/assets/img/slider/slider7.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2>About Our Story</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<section class="contact-area pt-100 pb-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="contact-wrap">
                                <div class="section-title title-style-three mb-30">
                                    <span class="sub-title">Contact Us Now</span>
                                    <h2 class="title">Write a Message</h2>
                                </div>
                                <form action="#" class="contact-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Your Name *">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Your Email *">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Your Phone">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Subject">
                                        </div>
                                    </div>
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7">
                            <aside class="contact-sidebar">
                                
                                <div class="widget">
                                    <div class="contact-info-wrap text-center">
                                        <h2>Let's Chat</h2>
                                        <h5>Take your first step towards your health and fitness</h5>
                                    </div>

                                    <div id="contact-map"></div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
@endsection