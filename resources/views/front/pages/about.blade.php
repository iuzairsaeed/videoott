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


           

            <section class="choose-area">
               
                <div class="choose-bg">
                    <img src="{{asset('public/frontend-assets/assets/img/slider/slide5.jpg')}}" style="padding: 15%;">
                </div>
                 <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="choose-wrap">
                                <p><i>"I created this website to reach more people and to share my knowledge beyond just “working out”. I believe I can make a positive impact, even if very small, by sharing my life hacks with the world." </i></p>
                                <div class="section-title title-style-three mb-30">
                                    <span class="sub-title">why CHOOSE us</span>
                                    <h2 class="title">About Us</h2>
                                </div>
                                <div class="choose-content">
                                    <p>I want to make everyone feel good about themselves. The fitness world can be so intimidating that most people don’t know how or where to start which usually leads to no movement at all.</p>
                                    <p>Most of us don’t have time or the means to go to the gym everyday or take a workout class multiple times per week. I created this platform to share with everyone how I make it work for myself and manage to achieve incredible results physically and mentally.</p>
                                    <p>Proper movement and great nutrition will allow you to be the best version of yourself while enhancing all your capabilities.</p>
                                    <p>Taking care of your machine is so crucial to live a long a healthy life.</p>
                                    <p>
                                        My workouts can be done anywhere with very little use of props and under 30 mins. As a mom of 2 kids under 2 years old, I understand how hard it can be to think of yourself. I’m sharing my method with everyone so I could encourage you to feel extremely confident and beautiful in your skin
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

           


@endsection