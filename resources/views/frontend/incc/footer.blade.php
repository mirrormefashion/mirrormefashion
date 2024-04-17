<footer id="foot" class="bg-black text-decoration-none pt-5 text-white">
    <section class=" subscription">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="text-align: center; padding-right: 2vw;">
                    <h5 class="text-center">Company Info</h5>
                    <ul class="text-white" style="list-style:none; padding-left:0px">
                        <li><a class="text-white" href="{{ route('about') }}"> Contact Us</a></li>
                        <li><a class="text-white" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="text-white" href="{{ route('alpha') }}">Beta</a></li>
                        <li><a class="text-white" href="{{ route('admin.dashboard') }}">Admin</a></li>

                        <h4 class="">Join us</h4>

                        <li><a href="{{route('shops.create')}}" class="text-white">Become a Retailer</a> </li>
                        <li><a href="#" class="text-white" id="homefreechat">Become a Member</a> </li>
                        <!--   -->

                    </ul>
                </div>
                <div class="col-md-4" id="footer-icons">
                    <h5 class="text-center">My Account</h5>
                    <ul class="text-white text-center" style="list-style:none; padding-left:0px">
                        <li> <a class="text-white" href="{{ url('login') }}"> Login</a></li>
                        <li> <a class="text-white" href="{{ route('purchase_history.index') }}"> Order History</a></li>

                        <li> <a class="text-white" href="{{ route('orders.track') }}"> Track Order</a></li>
                    </ul>

                    <h4 class="text-center">FOLLOW US ONLINE</h4>
                    <ul class="list-inline my-3 my-md-0 social colored text-center">
                        <li class="list-inline-item"> <a class="facebook"
                                href="https://www.facebook.com/mirrormefashion"><i class="lab la-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item"> <a class="twitter"
                                href="https://www.twitter.com/mirrormefashion"><i class="lab la-twitter"></i></a> </li>
                        <li class="list-inline-item"> <a class="linkedin"
                                href="https://www.linkedin.com/company/mirrormefashion"><i
                                    class="lab la-linkedin-in"></i></a> </li>
                        <li class="list-inline-item"> <a class="instagram"
                                href="https://www.instagram.com/mirrormefashion/"><i class="lab la-instagram"></i></a>
                        </li>
                    </ul>
                </div>


                <div class="d-inline-block d-md-block col-md-4">
                    <h5 class="text-center">Want to stay current ?</h5>
                    <form class="form-inline" method="POST" action="{{ route('subscribers.store') }}">
                        @csrf
                        <div class="form-group mb-0">
                            <input type="email" class="form-control"
                                placeholder="{{ translate('Your Email Address') }}" name="email" required>
                        </div>
                        <button type="submit" class="btn text-white" style="background:#900">
                            {{ translate('Subscribe') }}
                        </button>
                    </form>
                </div>

                <div class="text-center col-md-12 mb-4">
                    <a href="{{ route('home') }}" class="d-block">
                        @if (get_setting('footer_logo') != null)
                            <img class="lazyload footer-logo ml-auto mr-auto"
                                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" width="180px"
                                data-src="{{ uploaded_asset(get_setting('footer_logo')) }}"
                                alt="{{ env('APP_NAME') }}">
                        @else
                            <img class="lazyload footer-logo ml-auto mr-auto"
                                src="{{ static_asset('assets/img/placeholder-rect.jpg') }}" width="180px"
                                data-src="{{ static_asset('assets/img/logo.png') }}" alt="{{ env('APP_NAME') }}">
                        @endif
                    </a>

                    <p class="text-white"><small> Mirror Me Fashion LLC | © 2022 All Rights Reserved.</small></p>
                    <p id="footer-terms"><a class="text-white" href="{{ url('privacy') }}">Privacy Policy | </a><a
                            class="text-white" href="{{ url('terms') }}">Terms &amp; Conditions | </a> <a
                            class="text-white" href="{{ url('alpha') }}">Beta</a></p>
                </div>
                <div class="clearfix"></div>
                <div class="seperator-40"></div>
            </div>
        </div>
    </section>

</footer>

@if (Request::is('/'))
    <script src="{{ app()->isLocal() ? asset('public/home/js/app.js') : asset('public/home/js/app.js') }}"></script>
@endif


<script>

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }


</script>
<script>
    
    var index = 0;
    var slides = document.querySelectorAll(".slides");

    function changeSlide(){

        if(index<0) {
            index = slides.length-1;
        }
        
        if(index>slides.length-1) {
            index = 0;
        }
        
        for(let i=0;i<slides.length;i++) {
            slides[i].style.display = "none";
        }
    
        slides[index].style.display= "block";    
        index++;    
        setTimeout(changeSlide, 5000);
    
    }

    changeSlide();
</script>





