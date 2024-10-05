<div class="footer-area-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <a href="/">
                        @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo-footer.png')}}" alt="logo">
                        @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}" alt="logo">
                        @endif
                    </a>
                    <div class="footer-about">
                        <p> {{@$footer->desc}} </p>
                    </div>
                    <ul class="footer-social">
                        <li><a href="{{'https://www.linkedin.com/in',@$footer->linkedln}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.twitter.com/',@$footer->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.facebook.com/',@$footer->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="{{'https://www.instagram.com/',@$footer->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <h3>Informasi Pendaftaran</h3>
                   
                    <div class="newsletter-area">
                        <a href="https://wa.me/6281217173406?text=Hallo,%20ingin%20bertanya%20tentang%20pendaftaran%20di%20PPT%20Dahlia%20Sememi" target="_blank">
                            <button style="background-color: #25D366; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                Hubungi Kami di WhatsApp
                            </button>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="footer-box">
                    <h3>Photos</h3>
                    <ul class="flickr-photos">
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/1.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/2.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/3.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/4.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/5.jpg')}}" alt="flickr"></a>
                        </li>
                        <li>
                            <a href="#"><img class="img-responsive" src="{{asset('Assets/Frontend/img/footer/6.jpg')}}" alt="flickr"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-area-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <p>&copy; {{date('Y')}} <a href="http://github.com/suryo/" target="_blank">IntegerHead</a> All Rights Reserved.</p>
            </div>
            {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <ul class="payment-method">
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method1.jpg"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method2.jpg"></a>
                    </li>
                    <li>
                        <a href="https://theidioms.com"><img alt="Idioms" src="img/payment-method3.jpg"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="payment-method" src="img/payment-method4.jpg"></a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
