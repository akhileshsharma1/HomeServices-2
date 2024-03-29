<div>
<style>

    .row5 {
        margin-top: 100px;
    }

    .post-title h2 {
        color: black;
    }

    .panel-body table {
        width: 100%;
    }

    .panel-body table tr td {
        padding: 10px;
        border-top: 1px solid #ddd;
    }

    .panel-body table tr td:first-child {
        font-weight: bold;
        color: #333;
    }

    /* Style for the book now button */
    .panel-footer {
        text-align: center;
    }

    .panel-footer form input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .panel-footer form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    /* Style for the related service section */
    .related-service {
        margin-top: 20px;
    }

    .related-service h3 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #333;
    }

    .related-service .service-item {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .related-service .service-item img {
        max-width: 100%;
        border-radius: 5px;
    }

    .related-service .service-item h3 {
        font-size: 18px;
        margin-top: 10px;
        margin-bottom: 5px;
        color: #333;
    }

    .related-service .service-item p {
        margin-bottom: 10px;
        color: #555;
    }

    .related-service .service-item .btn-warning {
        background-color: #ffc107;
        color: #333;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .related-service .service-item .btn-warning:hover {
        background-color: #ffcd38;
    }
    /* .content_infos{
        margin-top: -350px auto;
    } */
    .img-hover img{
        max-height: 243px;
    }
    </style>
    <div style="display: flex; justify-content: center; align-items: center; height: 48vh;">
    <section class="content-central">
        <div class="content_infos">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row5">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-format-icon post-format-standard" style="margin-top: -10px;"></div>
                                            <div class="post-info-wrap">
                                                <h2 class="post-title"><a href="#">{{$service->name}}</a></h2>
                                                <div class="post-meta" style="height: 10px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                <img src="{{asset('images/services')}}/{{$service->image}}" alt="{{$service->name}}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{$service->name}}</h3>
                                            <p>{{$service->description}}</p>
                                            <h4>Inclusion</h4>
                                            <ul class="list-styles">
                                                @foreach(explode("|",$service->inclusion) as $inclusion)
                                                <li><i class="fa fa-plus"></i>{{$inclusion}}</li>
                                                @endforeach
                                            </ul>
                                            <h4>Exclusion</h4>
                                            <ul class="list-styles">
                                                @foreach(explode("|",$service->exclusion) as $exclusion)
                                                <li><i class="fa fa-minus"></i>{{$exclusion}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Booking Details</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Price</td>
                                                <td style="border-top: none;"> {{$service->price}}</td>
                                            </tr>
                                            @php
                                            $total = $service->price;
                                            @endphp
                                            @if($service->discount)
                                            @if($service->discount_type == 'fixed')
                                            <tr>
                                                <td>Discount</td>
                                                <td>{{$service->discount}}</td>
                                            </tr>
                                            @php $total = $total - $service->discount; @endphp
                                            @elseif($service->discount_type == 'percent')
                                            <tr>
                                                <td>Discount</td>
                                                <td>{{$service->discount}}</td>
                                                @php $total = $total - ($total*$service->discount/100); @endphp
                                            </tr>
                                            @endif
                                            @endif
                                            <tr>
                                                <td>Total</td>
                                                <td><span>Rs</span> {{$total}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        @auth
                                        @if(auth()->check())
                                        @if(auth()->user()->utype === 'ADM')
                                        <div class="alert alert-danger" role="alert" id="loginAlert" style="display: none; color:red;">
                                            <h4>You are Admin.Login as Customer to book services</h4>
                                        </div>
                                            <input type="submit" class="btn btn-primary" name="submit" id="bookNowBtn" value="Book Now" onclick="showLoginAlert()">                                                                                         
                                        @elseif(Auth::user()->utype === 'SVP')
                                        <div class="alert alert-danger" role="alert" id="loginAlert" style="display: none; color:red;">
                                            <h4>You are Service Provider.Login as Customer to book services</h4>
                                        </div>
                                            <input type="submit" class="btn btn-primary" name="submit" id="bookNowBtn" value="Book Now" onclick="showLoginAlert()">                                           
                                        @elseif(Auth::user()->utype === 'CST')
                                            <a href="{{route('home.booking-form')}}"><input type="submit" class="btn btn-primary" name="submit" value=" Book Now"></a>
                                        @endif
                                        @endif
                                        @endauth
                                        @guest
                                        <div class="alert alert-danger" role="alert" id="loginAlert" style="display: none; color:red;">
                                            <h4>You are Guest.Login book services</h4>
                                        </div>
                                            <input type="submit" class="btn btn-primary"  id="bookNowBtn" name="submit" value="Book Now" onclick="showLoginAlert()"> 
                                        @endguest
                                    </div>
                                </div>
                            </aside>
                            <aside>
                                @if($r_service)
                                <h3>Related Service</h3>
                                <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini" style="max-width: 360px">
                                    <a href="{{route('home.services_details',['service_slug'=>$r_service->slug])}}">
                                        <div class="img-hover">
                                            <img src="{{asset('images/services/thumbnails')}}/{{$r_service->thumbnail}}" alt="{{$r_service->name}}" class="img-responsive">
                                        </div>
                                        <div class="info-gallery">
                                            <h3>{{$r_service->name}}</h3>
                                            <hr class="separator">
                                            <p>{{$r_service->name}}</p>
                                            <div class="content-btn"><a href="{{route('home.services_details',['service_slug'=>$r_service->slug])}}" class="btn2 btn-warning">View Details</a></div>
                                            <div class="price"><b>From</b>Rs {{$r_service->price}}</div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <script>
                function showLoginAlert() {
                document.getElementById("loginAlert").style.display = "block";
                }

            document.addEventListener('DOMContentLoaded', function() {
                const bookNowBtn = document.getElementById('bookNowBtn');
                const loginPopup = document.getElementById('loginPopup');
                const hidePopupBtn = document.createElement('button');
                hidePopupBtn.textContent = 'Close';
                hidePopupBtn.classList.add('close-btn');

                bookNowBtn.addEventListener('click', () => {
                    document.body.classList.add('show-popup');
                    loginPopup.classList.add('show-signup');
                    const loginForm = document.createElement('form');
                    loginPopup.appendChild(loginForm);
                    loginPopup.appendChild(hidePopupBtn);
                });

                hidePopupBtn.addEventListener('click', () => {
                    document.body.classList.remove('show-popup');
                    loginPopup.classList.remove('show-signup');
                    loginPopup.innerHTML = '';
                });
            });
        </script>
</div>
