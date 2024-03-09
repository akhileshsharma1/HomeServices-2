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
            <div class="col-md-4">
                Profile
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                @if($customer && $customer->image)
                    <img src="{{asset('images/customer')}}/{{$customer->image}}" alt="dummy" width="100%">
                @else
                    <img src="{{asset('images/customer/default.png')}}" alt="dummy" width="100%">
                @endif
            </div>
            <div class="col-md-8">
                <h3>Name : {{ Auth::user()->name }}</h3>
                <p>{{ $customer ? $customer->about : '' }}</p>
                <p><b>Email :</b>{{ Auth::user()->email }}</p>
                <p><b>City :</b>{{ $customer ? $customer->city : '' }}</p>
                <a href="{{route('customer.edit_profile')}}" class="btn btn-info pull-right">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
