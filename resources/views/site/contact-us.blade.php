<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

 <div class="container">
     <div class="row">
         <div class="col-md-12">


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
                         @includeIf('message.message')
                         <div class="col-xl-6 offset-xl-3">
                             <h3 class="text-center mb-3">Get in touch</h3>

                             <form action="{{ route('site.contact-us.send-mail') }}" method="POST">
                                 @csrf

                                 <div class="form-group">
                                     <span><label for="to">To</label></span>
                                     <span><input class="form-control" name="to" id="to" type="text" value="{{ old('to') }}" placeholder="Enter Sender Mail"></span>
                                 </div>
                                 <div class="form-group">
                                     <span><label for="name">NAME</label></span>
                                     <span><input class="form-control" name="name" id="name" type="text" value="{{ old('name') }}" placeholder="Enter Name"></span>
                                 </div>
                                 <div class="form-group">
                                     <span><label for="email">E-MAIL</label></span>
                                     <span><input class="form-control" name="email" id="email" type="text" value="{{ old('email') }}" placeholder="Enter Email Address"></span>
                                 </div>
                                 <div class="form-group">
                                     <span><label for="subject">SUBJECT</label></span>
                                     <span><input class="form-control" name="subject" id="subject" type="text" value="{{ old('subject') }}" placeholder="Enter Subject"></span>
                                 </div>
                                 <div class="form-group">
                                     <span><label for="phone">MOBILE.NO</label></span>
                                     <span><input class="form-control" name="phone" id="ohone" type="text" value="{{ old('phone') }}" placeholder="Enter Phone Number"></span>
                                 </div>
                                 <div class="form-group">
                                     <span><label for="message">Message</label></span>
                                     <span><textarea class="form-control" name="message" id="message"> {{ old('message') }}</textarea></span>
                                 </div>
                                 <div class="clearfix pull-right contact-us-btn">
                                     <span><button class="btn-upper btn btn-primary" type="submit">Send Message</button></span>
                                 </div>
                             </form>
                         </div>
                     </div>
                     <br><br><br>
                     <div class="row">
                         <div class="col-md-12">
                             <iframe style="width: 1100px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1824.4679052984254!2d90.40308300000001!3d23.856413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c69d354d8577%3A0xaa0c7e6302ab0cf!2sBlock-E%2C%201%20Road-04%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1573551964341!5m2!1sen!2sbd"
                                     allowfullscreen=""></iframe>
                         </div>
                     </div>
                 </div>
                 <hr>
                 <br><br>




                 <!--footer start-->
                 <div class="row">
                     <div class="col-md-6">
                         <h4>Subscribe to Newsletter</h4>
                         <div>
                             <div class="col-sm-1">
                                 <i class="fa fa-envelope-o"></i>

                             </div>
                             <div class="col-sm-5">
                                 <input type="email" class="form-control " id="subscribe" name="email" placeholder="your email">
                             </div>
                         </div>
                         <button  class="btn btn-primary btn-xs " type="submit">Subscribe</button>
                     </div>


                     <div class="col-md-6">
                         <ul>
                             <li>
                                 <a target="_blank" href="#"><i class="fa fa-facebook"></i></a>
                             </li>
                             <li>
                                 <a target="_blank" href="#"><i class="fa fa-twitter"></i></a>
                             </li>
                             <li>
                                 <a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                             </li>
                             <li>
                                 <a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
                             </li>
                         </ul>

                     </div>
                 </div>
                 <br>
             </section>

             <!--Section ends-->



             <br><br><br>





         </div>
     </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>






