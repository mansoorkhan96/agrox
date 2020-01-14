@extends('layouts.main')

@section('content')
<div class="section pt-10 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center mb-1 section-pretitle">Get in touch</div>
                <h2 class="text-center section-title mtn-2">HEALTHY AgroX FARM</h2>
                <div class="organik-seperator mb-6 center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact-inner">
                        <h6 class="contact-title"> Address</h6>
                        <div class="contact-content">
                            S.U.E.C.H.S Phase - I
                            <br />
                            Jamshoro, Sindh 76090
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-inner">
                        <h6 class="contact-title"> Phone</h6>
                        <div class="contact-content">
                            0122 333 8889
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div class="contact-inner">
                        <h6 class="contact-title"> Email Contact</h6>
                        <div class="contact-content">
                            agrox@gmail.com
                            <br />
                            contact@agrox.com
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="contact-info">
                    <div class="contact-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="contact-inner">
                        <h6 class="contact-title"> Website</h6>
                        <div class="contact-content">
                            www.agrox.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <hr class="mt-4 mb-7" />
                <div class="text-center mb-1 section-pretitle">Leave us a message!</div>
                <div class="organik-seperator mb-6 center">
                    <span class="sep-holder"><span class="sep-line"></span></span>
                    <div class="sep-icon"><i class="organik-flower"></i></div>
                    <span class="sep-holder"><span class="sep-line"></span></span>
                </div>
                <div class="contact-form-wrapper">
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <label>your name <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="text" name="your-name" value="" size="40" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>your email <span class="required">*</span></label>
                                <div class="form-wrap">
                                    <input type="email" name="your-email" value="" size="40" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>subject</label>
                                <div class="form-wrap">
                                    <input type="text" name="your-subject" value="" size="40" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>message</label>
                                <div class="form-wrap">
                                    <textarea name="your-message" cols="40" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap text-center">
                                    <input type="submit" value="SEND US NOW" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection