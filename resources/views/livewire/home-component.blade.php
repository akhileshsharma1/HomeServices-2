<div>
<div class="first1">
        <div class="first2">
            <h1>Welcome to <span class="web">GharSajilo,</span> <br> a <span class="web">Home Service Platform</span></h1>
            <p>We work to ensure people people comfort at their home,<br> and to provide the best and the fastest help at <br>heir fair prices</p><br>
                 <div class="icons">
                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.gmail.com/"><i class="fab fa-envelope"></i></a>
                </div>
                 <a href="{{ route('login') }}" target="_blank"> <button type="button"><span class="web2"></span id="join">JOIN US</button></a>
        </div>
        <div class="frstimage">
            <!-- <img src="{{ asset('assets/images/homeservice2.png')}}" alt="logo"> -->
                <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="{{ asset('images/homeservice1.png')}}">
            </div>

            <div class="mySlides fade">
                <img src="{{ asset('images/homeservice2.png')}}">
            </div>

            <div class="mySlides fade">
                <img src="{{ asset('images/homeservice3.png')}}">
            </div>

            <div class="mySlides fade">
                <img src="{{ asset('images/homeservice4.png')}}">
            </div>
            <!-- Add more images here -->

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
         </div>
         <div class="col-md-12">
         <ul class="tooltip-hover" id="sponsors">
        @foreach($scategories as $scategory)
                <li data-toggle="tooltip" data-original-title="{{$scategory->name}}">
                    <a href="{{route('home.services_by_category',['category_slug'=>$scategory->slug])}}">
                        <img src="{{asset('images/categories')}}/{{$scategory->image}}" alt="{{$scategory->name}}">
                    </a>
                </li>
        @endforeach
        </ul>
        </div>
    </div>
    <div class="portfolioContainer" style="margin-top : -50px;">
        @foreach($fservices as $service)
        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right:5px;padding-left:5px;">\
            <a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="g-list"></a>
            <div class="img-hover">
                <img src="{{asset('images/services/thumbnails')}}/{{$service->thumbnail}}" alt="{{$service->name}}" class="img-responsive">
            </div>
            <div class="info-gallery">
                <h3>{{$service->name}}</h3>
                <hr class="separator">
                <p>{{$service->tagline}}</p>
                <div class="content-btn"><a href="{{route('home.service_details',['service_slug'=>$service->slug])}}" class="btn1 btn-primary">Book Now</a></div>
                <div class="price"><span>&#36;</span><b>From</b>${{$service->price}}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
