<style>
   .container4 {
    display: flex;
    flex-wrap: nowrap; /* Ensure items stay in a single row */
    justify-content: center; /* Center items horizontally */
    overflow-x: auto; /* Allow horizontal scrolling if items exceed container width */
}

/* Style each item */
.portfolioContainer .nature.hsgrids {
    flex: 0 0 auto; /* Let the browser determine the width of each item */
    margin: 5px; /* Add margin around each item */
}
</style>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <section class="content-central">
        <div class="container4">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2>{{ $scategory->name }}<span>Services</span></h2>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px;">
            <div>
                <div class="container4">
                    <div class="portfolioContainer">
                        @if($scategory->services->count() > 0)
                        @foreach($scategory->services as $service)
                        <div class="col-xs-6 col-sm-4 col-md-3 nature hsgrids"
                            style="padding-right: 5px;padding-left: 5px;">
                            <a class="g-list" href="{{route('home.services_details',['service_slug'=>$service->slug])}}">
                                <div class="img-hover">
                                    <img src="{{ asset('images/services/thumbnails/' . $service->thumbnail) }}"
                                        alt="{{ $scategory->name }}" class="img-responsive">
                                </div>
                                <div class="info-gallery">
                                    <h3>{{ $service->name }}</h3>
                                    <hr class="separator">
                                    <p>{{ $service->tagline }}</p> 
                                    <div class="content-btn"><a href="service-details/ac-repair.html"
                                            class="btn1 btn-primary">Book Now</a></div>
                                    <div class="price"><span>&#36;</span><b>From</b>{{ $service->price }}</div> 
                            </a>
                        </div>
                        @endforeach
                        @else
                        <p>There is no services available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
     
        </section>               