@extends('front.layout.master')
@section('content')
<!-- slider-area -->
            <section class="home-five-banner">
                <div class="container custom-container-two">
                    <div class="banner-five-wrap" data-background="{{asset('public/frontend-assets/assets/img/slider/slide.jpg')}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-content">
                                    
                                    <h2 class="title wow fadeInUp" data-wow-delay=".4s">Healthy Mind & Healthy Body</h2>
                                    <p class="wow fadeInUp" data-wow-delay=".6s">Fitness and INN health Coach</p>
                                    <a href="shop-sidebar.html" class="btn wow fadeInUp" data-wow-delay=".8s">Subscribe</a>
                                </div>
                            </div>
                        </div>
                        <div class="banner-five-img">
                            <img src="" alt="" class="main-img">
                            <img src="" alt="" class="img-shape">
                        </div>
                    </div>
                </div>
            </section>
            <section class="choose-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="choose-wrap">
                                <div class="section-title title-style-three mb-30">
                                    <h2 class="title">Join the Vbod Lifestyle community today!</h2>
                                    <h4 class="">Membership includes:</h4>

                                </div>
                                <div class="choose-content">
                                    <div class="progress-list">
                                        <div class="progress-item">
                                            <h6>- 2 new Vbod Lifestyle workouts every week</h6>
                                            <h6>- Unlimited access to over 200+ videos </h6>
                                            <h6>- Access to all Vbod exclusive recipes </h6>
                                            <h6>- workouts for every stage of life ( beginner, advanced, pregnant, postpartum)</h6>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="cat-banner-item banner-animation mb-20">
                                        <div class="thumb">
                                            <a href="shop-sidebar.html"> <video autoplay="autoplay" autobuffer="" loop="loop" style="width: 500px !important">
								    <source src="{{asset('public/frontend-assets/assets/videos/Welcome-to-VBodlife.com_.mp4')}}" type="video/mp4" />
								  </video></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
            <!-- discount-area -->
            <section class="discount-area discount-bg jarallax parallax-img" data-background="{{asset('public/frontend-assets/assets/img/slider/slide4.jpg')}}">
                <div class="container">
                    <div class="row justify-content-center justify-content-lg-start">
                        <div class="col-lg-12 col-md-12">
                            <div class="discount-content text-center">
                                <div class="icon mb-15"><img src="img/icon/discount_icon.png" alt=""></div>
                                
                                <p style="font-size: 30px; color:white;line-height: 50px">Vbod is more than just working out. The Vbod lifestyle is about taking the right steps every day towards your best self. Using a careful blend of Vbod style movement, Vanessa’s Nutrition Code, and self-care moments Vanessa is here to transform your time into a truly beautiful lifestyle.</p>
                                <div class="" >
                            	    <h3 style="color:white">3 of my core values</h3>
                                    <div class="progress-item" >
                                        <h6 style="color:white">- Progress VS perfection </h6>
                                        <h6 style="color:white">- Take time for you  </h6>
                                        <h6 style="color:white">- Positive mindset </h6>
                                    </div>
                                </div>
                                <a href="shop-sidebar.html" class="btn">Join our Newsletter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

             <section class="choose-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="choose-wrap">
                                <div class="section-title title-style-three mb-30">
                                    <h2 class="title">Our Mission</h2>

                                </div>
                                <div class="choose-content">
                                    <div class="progress-list">
                                        <div class="progress-item">
                                            <p style="color: black">My mission has always been to guide and support you in whatever stage of life you are in by promoting movement in your everyday life combined with nutrient dense eating for the whole family and taking time out for yourself so you can live a more meaningful, fulfilled and happy life.</p>
                                        </div>
                                        <a href="shop-sidebar.html" class="btn">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="row">
                            	<div class="col-md-12">
                                    <div class="cat-banner-item banner-animation mb-20">
                                        <div class="thumb">
                                            <a href="shop-sidebar.html"><img src="{{asset('public/frontend-assets/assets/img/slider/slide6.jpg')}}" alt=""></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
            <!-- discount-area-end -->
            <!-- slider-area-end -->
            
            
@endsection