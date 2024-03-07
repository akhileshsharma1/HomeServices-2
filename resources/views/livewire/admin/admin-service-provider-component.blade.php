<div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
        .tablentable-striped {
            color: #fff;
        }

        .container_5 {
            margin-top:50px;
            padding: 40px;
        }

        h1 {
            color: #ffffff; /* White text color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for header */
            color: #333333; /* Dark gray text color */
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container_5">
                    <div class="row PortfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            All Service Providers
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                    @endif
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Service Category</th>
                                        <th>Service Locations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sproviders as $sprovider)
                                    <tr>
                                    <td>{{$sprovider->id}}</td>
                                    <td><img src="{{ asset('assets/images/sproviders') }}/{{ $sprovider->image }}" width="60" /></td>
                                    <td>{{$sprovider->user->name}}</td>
                                    <td>{{$sprovider->user->email}}</td>
                                    <td>{{$sprovider->city}}</td>
                                    <td>{{$sprovider->category->name}}</td>
                                    <td>{{$sprovider->service_locations}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$providers->links()}}
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
