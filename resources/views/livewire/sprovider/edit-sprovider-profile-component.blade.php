<div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
        .profile {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 240px auto;
        }

        .row7 {
            margin-bottom: 30px;
            display: flex;
            align-items: center;
        }

        .col4 {
            flex: 1;
            padding: 15px;
            text-align: center;
        }

        .col4 img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .profile p {
            margin-bottom: 5px;
            font-size: 16px;
            color: #555;
        }

        .profile b {
            color: #007bff;
            font-weight: bold;
        }

        .profile b:last-of-type {
            margin-bottom: 0;
        }

        .profile .row7:first-child {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn3 {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-edit-service {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
    <div class="panel-body">
        <div class="profile">
        <div class="row">
            <div class="col-md-12">
               Edit Profile
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert" role="alert">{{Session::get('message')}}</div>
                @endif
               <form class="form-horizontal" wire:submit.prevent="updateProfile">
                <div class="form-group">
                    <label for="newimage" class="control-label col-md-3">Profile Image:</label>
                    <input type="file" class="form-control-file" name="newimage" wire:model="newimage" />
                    @if($newimage)
                        <img src="{{$newimage->temporaryUrl()}}" width="220">
                    @elseif($image)
                        <img src="{{asset('images/sproviders')}}/{{$image}}" width="220">
                    @else
                        <img src="{{asset('images/default.jpg')}}" width="220">
                    @endif
                </div>
                <div class="form-group">
                    <label for="about" class="control-label col-md-3">About:</label>
                    <textarea name="about" class="form-control" wire:model="about"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="phoneno" class="control-label col-md-3">Phone no:</label>
                    <input type="text" class="form-control" name="phoneno" wire:model="phoneno" />
                </div> -->
                <div class="form-group">
                    <label for="city" class="control-label col-md-3">City:</label>
                    <input type="text" class="form-control" name="city" wire:model="city" />
                </div>
                <div class="form-group">
                    <label for="service_category_id" class="control-label col-md-3">Service Category:</label>
                    <select class="form-control" name="service_category_id" wire:model="service_category_id">
                        @foreach($scategories as $scategory)
                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="service_locations" class="control-label col-md-3">Service Locations:</label>
                    <input type="text" class="form-control" name="service_locations" wire:model="service_locations" />
                </div>
                <button type="submit" class="btn btn-success pull-right">Edit Service</button>
               </form>
               </div>
            </div>
        </div>
    </div>
</div>
