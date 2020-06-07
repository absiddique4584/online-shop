
@extends('site.components.layout')

@section('title')
    Online Shop | Contact Us
@endsection

@section('content')

<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-contain">
                    <div>
                        <h2 class="text-center"><strong>CONTACT US</strong></h2>
                           <h4 class="text-center"><a href="#"><b>HOME  >>  CONTACT</b></a> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
<!-- breadcrumb End -->

<!--section start-->
<section class="contact-page section-big-py-space bg-light">
    <div class="custom-container">
        <div class="row section-big-pb-space">
            <div class="col-xl-6 offset-xl-3">
                <h3 class="text-center mb-3">Get in touch</h3>


                <form class="theme-form" action="https://www.ebugs.com.bd/website/contactMessage" method="post">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="name" placeholder="Enter Your name" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last-name" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="review">Phone number</label>
                                <input type="text" class="form-control" name="mobile" pattern="01[1|3|5|6|7|8|9][0-9]{8}" id="review" placeholder="Enter your number" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div>
                                <label for="message">Write Your Message</label>
                                <textarea class="form-control" name="message" placeholder="Write Your Message" id="message" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12"><br><br>
                            <button class="btn btn-normal btn-block btn btn-primary" type="submit">Send Your Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-lg-12 map">
                <div  class="theme-card">
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1824.4679052984254!2d90.40308300000001!3d23.856413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c69d354d8577%3A0xaa0c7e6302ab0cf!2sBlock-E%2C%201%20Road-04%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1573551964341!5m2!1sen!2sbd"
                            allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br><br>
<!--Section ends-->


<!--footer start-->
<div class="footer-3">
    <div class="container">
        <div class="sosiyal-footer">
            <div class="row sosiyal-contain">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="app-link-group">
                        <div class="app-item">
                            <img src="https://www.ebugs.com.bd/assets/website/images/pay/1.png" class="img-fluid" alt="pay">
                        </div>
                        <div class="app-item">
                            <img src="https://www.ebugs.com.bd/assets/website/images/pay/2.png" class="img-fluid" alt="pay">
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-12">
                    <div class="subscribe-section">
                        <div class="subscribe-block">
                            <h4>Subscribe to Newsletter</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                                <input type="email" class="form-control" id="subscribe" name="email" placeholder="your email">
                                <div class="input-group-prepend">
                                            <span onclick="subscribe()" class="input-group-text telly pointer">
                                                <i class="fa fa-telegram"></i>
                                            </span>
                                </div>
                            </div>
                            <div class="emailrequired mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="sosiyal-block">
                        <ul class="sosiyal sosiyal-inverse ">
                            <li style="margin-top: 40px;"><a target="_blank" href="https://www.facebook.com/ebugsbd"><i class="fa fa-facebook"></i></a> <a target="_blank" href="#"><i class="fa fa-twitter"></i></a> <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a> <a target="_blank" href="#"><i class="fa fa-instagram"></i></a> <a target="_blank" href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <br><br><br>

@endsection
