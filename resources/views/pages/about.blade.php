@extends('layouts.main')

@section('content')
<div class="section pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Welcome to AgroX!</div>
                <h2 class="text-center section-title mtn-2">A little story about us</h2>
                <div class="organik-seperator mb-9 center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="about-main-img col-lg-6">
                <img src="{{ asset('images/about_1.jpg') }}" alt="" />
            </div>
            <div class="about-content col-lg-6">
                <div class="about-content-title">
                    <h4>A family owned farm</h4>
                    <div class="about-content-title-line"></div>
                </div>
                <div class="about-content-text">
                    <p>Our farm is a second-generation organic farm that was our parents, Mark &amp; Renée Elliott’s dream to offer the best and healthiest range of organic foods available, promote health in the community and bring a sense of discovery and adventure into food shopping.</p>
                    <p>Visit our site for a complete list of fresh, organic fruit and vegetables we are offering.<br></p>
                </div>
                <div class="about-carousel" data-auto-play="true" data-desktop="4" data-laptop="4" data-tablet="4" data-mobile="2">
                    <a href="images/carousel/img_large_1.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_1.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                    <a href="images/carousel/img_large_2.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_2.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                    <a href="images/carousel/img_large_3.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_3.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                    <a href="images/carousel/img_large_4.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_4.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                    <a href="images/carousel/img_large_5.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_5.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                    <a href="images/carousel/img_large_6.jpg" data-rel="prettyPhoto[gallery]">
                        <img src="{{ asset('images/carousel/img_6.jpg') }}" alt="" /> 
                        <span class="ion-plus-round"></span> 
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section bg-light pt-16 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Why choose our healthy store?</div>
                <div class="organik-seperator mb-9 center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="icon-boxes">
                    <div class="icon-boxes-icon"><i class="ion-android-star-outline"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> Eat More Healthfully.</h6>
                        <p>Obtaining the recommended daily fruits and vegetables.</p>
                    </div>
                </div>
                <div class="icon-boxes">
                    <div class="icon-boxes-icon"><i class="organik-lemon"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> We Have Reputation.</h6>
                        <p>We have been growing organic produce for customers since 1976.</p>
                    </div>
                </div>
                <div class="icon-boxes">
                    <div class="icon-boxes-icon"><i class="organik-cucumber"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> Fresh &amp; Pesticide Free.</h6>
                        <p>We deliver organic pesticide-free and sustainably-grown produce.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="text-center">
                    <img src="{{ asset('images/about_pic.png') }}" alt="" />
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="icon-boxes right">
                    <div class="icon-boxes-icon"><i class="organik-broccoli"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> No Commitment Required.</h6>
                        <p>We requires no commitment and allows you to cancel or suspend deliveries.</p>
                    </div>
                </div>
                <div class="icon-boxes right">
                    <div class="icon-boxes-icon"><i class="organik-carrot"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> Flexibility.</h6>
                        <p>Choose the delivery frequency that best fits your needs.</p>
                    </div>
                </div>
                <div class="icon-boxes right">
                    <div class="icon-boxes-icon"><i class="organik-tomato"></i></div>
                    <div class="icon-boxes-inner">
                        <h6 class="icon-boxes-title"> Customization.</h6>
                        <p>Customize your standard delivery to exclude items you do not want.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section border-bottom pt-11 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Our farmers</div>
                <h2 class="text-center section-title mtn-2">We are brilliant farmers</h2>
                <div class="organik-seperator center mb-8">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="team-member">
                    <div class="image">
                        <img src="{{ asset('images/testimonial/picture_3.jpg') }}" alt="Michael Andrews" />
                    </div>
                    <div class="team-info">
                        <h5 class="name">Michael Andrews</h5>
                        <p class="bio">Born on the farm in Capay, Michael showed an early proficiency in the machine shop and is responsible for designing tools used on the farm today.</p>
                        <ul class="social-list">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="team-member">
                    <div class="image">
                        <img src="{{ asset('images/testimonial/picture_4.jpg') }}" alt="Kathleen Barsotti" />
                    </div>
                    <div class="team-info">
                        <h5 class="name">Kathleen Barsotti</h5>
                        <p class="bio">Born in Belmont, CA, Kathleen attended UC Riverside where she earned her B.S. in Agriculture. She is sole proprietor and manager of the farm.</p>
                        <ul class="social-list">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="team-member">
                    <div class="image">
                        <img src="{{ asset('images/testimonial/picture_2.jpg') }}" alt="Mark Ronson" />
                    </div>
                    <div class="team-info">
                        <h5 class="name">Mark Ronson</h5>
                        <p class="bio">He has commitment to build a strong financial model for farmers to connect produce directly to consumers by strategically managing our current programs.</p>
                        <ul class="social-list">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section pt-2 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="client-carousel" data-auto-play="true" data-desktop="5" data-laptop="3" data-tablet="3" data-mobile="2">
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_1.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_2.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_3.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_4.png') }}" alt="" />
                        </a>
                    </div>
                    <div class="client-item">
                        <a href="#" target="_blank">
                            <img src="{{ asset('images/client/client_5.png') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection