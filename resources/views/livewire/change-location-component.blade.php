<div>
<style>
    .c-central{
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 10px;
    }

    .content_info {
    margin-top: 20px;
    }

    .addLocation {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
   }

    .addLocation h4 {
        margin-bottom: 20px;
    }

    .addLocation address {
        font-size: 16px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn2 {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .btn2:hover {
        background-color: #0056b3;
    }

    .alert {
        margin-top: 20px;
    }

    #map {
        margin-top: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
    }`

</style>
    <div class="c-central">
        <div class="text-center">
            <img src="" alt="">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container6">
                    <div class="row6">
                        <form wire:submit.prevent="changeLocation">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <div class="col-md-8">
                                <h3>Search Your Location</h3>
                                <p class="lead">
                                </p>
                                <input type="text" class="form-control" id="autocomplete" name="location" placeholder="Search Location....">
                                <div id="map" style="height:400px"></div>
                            </div>
                            <div class="col-md-4">
                                <aside class="addLocation">
                                    <h4>Your Location <input type="submit" class="btn2 btn-primary pull-right" name="submit" value="Add Location"></h4>
                                    <address>
                                        <div class="form-group">
                                            <label for="streetnumber" class="col-form-label">Street Number:</label>
                                            <input type="text" class="form-control" id="street_number" name="streetnumber" wire:model="streetnumber">
                                        </div>
                                        <div class="form-group">
                                            <label for="routes" class="col-form-label">Route:</label>
                                            <input type="text" class="form-control" id="route" name="routes" wire:model="routes">
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-form-label">City:</label>
                                            <input type="text" class="form-control" id="locality" name="city" wire:model="city">
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-form-label">State:</label>
                                            <input type="text" class="form-control" id="locality" name="administrative_area_level_1" name="state" wire:model="state">
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-form-label">Country:</label>
                                            <input type="text" class="form-control" id="country" name="country" wire:model="country">
                                        </div>
                                    </address>
                                </aside>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
